<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\iThinkLogisticsService;

class OrderController extends Controller
{
    /**
     * Display a listing of all orders.
     */
    public function index(Request $request)
    {
        $query = Order::with(['user', 'items'])->latest();

        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('order_number', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('tracking_number', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Payment status filter
        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        // Date range filter
        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }
        if ($request->filled('to_date')) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        $orders = $query->paginate(15)->withQueryString();

        $stats = [
            'total' => Order::count(),
            'pending' => Order::where('status', 'pending')->count(),
            'processing' => Order::where('status', 'processing')->count(),
            'completed' => Order::where('status', 'completed')->count(),
            'cancelled' => Order::where('status', 'cancelled')->count(),
            'revenue' => Order::where('status', 'completed')->sum('total_amount')
        ];

        return view('admin.orders.index', compact('orders', 'stats'));
    }

    /**
     * Display pending orders.
     */
    public function pending(Request $request)
    {
        $orders = Order::with(['user', 'items'])
            ->where('status', 'pending')
            ->latest()
            ->paginate(15);

        $stats = [
            'total' => Order::count(),
            'pending' => Order::where('status', 'pending')->count(),
            'processing' => Order::where('status', 'processing')->count(),
            'completed' => Order::where('status', 'completed')->count(),
            'cancelled' => Order::where('status', 'cancelled')->count(),
            'revenue' => Order::where('status', 'completed')->sum('total_amount')
        ];

        return view('admin.orders.index', compact('orders', 'stats'));
    }

    /**
     * Display processing orders.
     */
    public function processing(Request $request)
    {
        $orders = Order::with(['user', 'items'])
            ->where('status', 'processing')
            ->latest()
            ->paginate(15);

        $stats = [
            'total' => Order::count(),
            'pending' => Order::where('status', 'pending')->count(),
            'processing' => Order::where('status', 'processing')->count(),
            'completed' => Order::where('status', 'completed')->count(),
            'cancelled' => Order::where('status', 'cancelled')->count(),
            'revenue' => Order::where('status', 'completed')->sum('total_amount')
        ];

        return view('admin.orders.index', compact('orders', 'stats'));
    }

    /**
     * Display completed orders.
     */
    public function completed(Request $request)
    {
        $orders = Order::with(['user', 'items'])
            ->where('status', 'completed')
            ->latest()
            ->paginate(15);

        $stats = [
            'total' => Order::count(),
            'pending' => Order::where('status', 'pending')->count(),
            'processing' => Order::where('status', 'processing')->count(),
            'completed' => Order::where('status', 'completed')->count(),
            'cancelled' => Order::where('status', 'cancelled')->count(),
            'revenue' => Order::where('status', 'completed')->sum('total_amount')
        ];

        return view('admin.orders.index', compact('orders', 'stats'));
    }

    /**
     * Display the specified order.
     */
    public function show($id)
    {
        $order = Order::with(['user', 'items'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified order.
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $statuses = ['pending', 'processing', 'shipped', 'delivered', 'completed', 'cancelled'];
        return view('admin.orders.edit', compact('order', 'statuses'));
    }

    /**
     * Update the specified order.
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,completed,cancelled',
            'payment_status' => 'nullable|in:pending,paid,failed',
            'tracking_number' => 'nullable|string|max:255',
            'notes' => 'nullable|string'
        ]);

        $order->update($request->only([
            'status', 'payment_status', 'tracking_number', 'notes'
        ]));

        return redirect()->route('admin.orders.show', $order->id)
            ->with('success', 'Order updated successfully!');
    }

    /**
     * Delete order.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        if (!in_array($order->status, ['cancelled', 'failed'])) {
            return back()->with('error', 'Only cancelled or failed orders can be deleted.');
        }

        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Order deleted!');
    }

    /**
     * Update order status (AJAX or form).
     */
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,completed,cancelled'
        ]);

        $order->status = $request->status;
        $order->save();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Status updated!']);
        }

        return redirect()->back()->with('success', 'Order status updated!');
    }

    /**
     * Update tracking number.
     */
    public function updateTracking(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'tracking_number' => 'required|string|max:255'
        ]);

        $order->tracking_number = $request->tracking_number;
        $order->status = 'shipped';
        $order->save();

        return redirect()->back()->with('success', 'Tracking number updated!');
    }

    /**
     * Generate invoice.
     */
    public function invoice($id)
    {
        $order = Order::with(['user', 'items'])->findOrFail($id);
        return view('admin.orders.invoice', compact('order'));
    }

    /**
     * Export orders.
     */
    public function export(Request $request)
    {
        $orders = Order::with('items')->latest()->get();
        
        $filename = 'orders-export-' . date('Y-m-d') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        
        $callback = function() use ($orders) {
            $file = fopen('php://output', 'w');
            
            fputcsv($file, ['Order Number', 'Customer', 'Phone', 'Items', 'Total', 'Payment', 'Status', 'Date']);
            
            foreach ($orders as $order) {
                fputcsv($file, [
                    $order->order_number,
                    $order->name ?? 'N/A',
                    $order->phone ?? 'N/A',
                    $order->items->count(),
                    number_format($order->total_amount ?? 0, 2),
                    $order->payment_status ?? 'N/A',
                    $order->status ?? 'N/A',
                    $order->created_at ? $order->created_at->format('Y-m-d H:i:s') : 'N/A',
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
    
    
    /**
 * Update shipping dimensions
 */
public function updateDimensions(Request $request, Order $order)
{
    $validated = $request->validate([
        'shipping_weight' => 'required|numeric|min:0.1|max:50',
        'shipping_length' => 'required|numeric|min:1|max:200',
        'shipping_width' => 'required|numeric|min:1|max:200',
        'shipping_height' => 'required|numeric|min:1|max:200',
    ]);

    $order->update($validated);

    return response()->json([
        'success' => true,
        'message' => 'Dimensions saved successfully',
        'data' => $order->only(['shipping_weight', 'shipping_length', 'shipping_width', 'shipping_height'])
    ]);
}
    


// Add this to your existing OrderController
public function ship(Order $order, iThinkLogisticsService $logisticsService)
{
    try {
        // Check serviceability
        $pincodeCheck = $logisticsService->checkPincode($order->pincode);
        
        if (!isset($pincodeCheck['status']) || $pincodeCheck['status'] != true) {
            return back()->with('error', 'Pincode not serviceable: ' . ($pincodeCheck['message'] ?? ''));
        }

        // Create shipment
        $response = $logisticsService->createShipment($order);

        if (isset($response['status']) && $response['status'] == true) {
            $order->update([
                'awb_number' => $response['data']['awb_number'] ?? $response['awb_number'] ?? null,
                'courier_name' => $response['data']['courier_name'] ?? null,
                'shipping_label_url' => $response['data']['label_url'] ?? null,
                'shipping_response' => $response,
                'status' => 'processing',
                'shipped_at' => now(),
            ]);

            return back()->with('success', 'Order shipped! AWB: ' . $order->awb_number);
        }

        return back()->with('error', $response['message'] ?? 'Failed to ship order');
        
    } catch (\Exception $e) {
        Log::error('Shipping error', ['error' => $e->getMessage()]);
        return back()->with('error', 'Shipping failed: ' . $e->getMessage());
    }
}
}