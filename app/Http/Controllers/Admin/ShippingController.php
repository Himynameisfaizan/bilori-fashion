<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\iThinkLogisticsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShippingController extends Controller
{
    private $logisticsService;

    public function __construct()
    {
        $this->logisticsService = new iThinkLogisticsService();
    }

    /**
     * Shipping Dashboard
     */
    public function index()
    {
        // Orders ready for sync (COD + Paid Prepaid)
        $orders = Order::where(function($query) {
                $query->where(function($q) {
                    $q->where('payment_method', '!=', 'cash_on_delivery')
                      ->where('payment_status', 'paid');
                })
                ->orWhere('payment_method', 'cash_on_delivery');
            })
            ->whereNull('awb_number')
            ->where('status', '!=', 'cancelled')
            ->with('items')
            ->latest()
            ->take(50)
            ->get();

        // Already synced orders
        $recentShipments = Order::whereNotNull('awb_number')
            ->with('items')
            ->latest('shipped_at')
            ->take(20)
            ->get();

        // Stats
        $pendingShipments = Order::whereNull('awb_number')
            ->where('status', '!=', 'cancelled')
            ->where(function($q) {
                $q->where('payment_status', 'paid')
                  ->orWhere('payment_method', 'cash_on_delivery');
            })
            ->count();

        $inTransit = Order::whereNotNull('awb_number')
            ->where('status', 'shipped')
            ->count();
            
        $deliveredToday = Order::where('status', 'delivered')
            ->whereDate('delivered_at', today())
            ->count();
            
        $totalShipments = Order::whereNotNull('awb_number')->count();

        return view('admin.shipping.index', compact(
            'orders',
            'pendingShipments',
            'recentShipments',
            'inTransit',
            'deliveredToday',
            'totalShipments'
        ));
    }

    /**
     * Bulk Sync Page
     */
    public function bulkShipPage()
    {
        $orders = Order::where(function($query) {
                $query->where(function($q) {
                    $q->where('payment_method', '!=', 'cash_on_delivery')
                      ->where('payment_status', 'paid');
                })
                ->orWhere('payment_method', 'cash_on_delivery');
            })
            ->whereNull('awb_number')
            ->where('status', '!=', 'cancelled')
            ->with('items')
            ->latest()
            ->get();

        return view('admin.shipping.bulk', compact('orders'));
    }

    /**
     * Process Bulk Sync (Max 25)
     */
    public function bulkShip(Request $request)
    {
        $request->validate([
            'order_ids' => 'required|array|max:25',
            'order_ids.*' => 'exists:orders,id'
        ]);

        $orders = Order::whereIn('id', $request->order_ids)
            ->whereNull('awb_number')
            ->with('items')
            ->get();

        if ($orders->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No valid orders to sync'
            ]);
        }

        $response = $this->logisticsService->bulkSyncOrders($orders);

        if (isset($response['status']) && $response['status'] == true) {
            $results = [];
            $successCount = 0;
            
            $responseData = $response['data']['data'] ?? [];
            
            foreach ($orders as $index => $order) {
                $shipmentResponse = $responseData[$index + 1] ?? null;
                
                if ($shipmentResponse && isset($shipmentResponse['status']) && $shipmentResponse['status'] == 'Success') {
                    $refnum = $shipmentResponse['refnum'] ?? null;
                    
                    $order->update([
                        'awb_number' => $refnum,
                        'shipping_response' => json_encode($response),
                        'status' => 'processing',
                        'shipped_at' => now(),
                    ]);
                    
                    $results[] = "✅ {$order->order_number} - Ref: {$refnum}";
                    $successCount++;
                } else {
                    $remark = $shipmentResponse['remark'] ?? 'Failed';
                    $results[] = "❌ {$order->order_number} - {$remark}";
                }
            }

            return response()->json([
                'success' => true,
                'message' => "Synced: {$successCount} of " . count($orders),
                'results' => $results
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => $response['message'] ?? 'Bulk sync failed'
        ]);
    }

    /**
     * Sync Single Order
     */
//   public function createShipment(Order $order)
// {
//     if ($order->payment_method != 'cash_on_delivery' && $order->payment_status != 'paid') {
//         return response()->json(['success' => false, 'message' => 'Payment not completed']);
//     }

//     if ($order->awb_number) {
//         return response()->json(['success' => false, 'message' => 'Already shipped: ' . $order->awb_number]);
//     }

//     // Create order via Add Order API
//     $response = $this->logisticsService->createOrder($order);

//     if (isset($response['status']) && $response['status'] == true) {
//         $data = $response['data'] ?? [];
//         $awb = null;

//         // Extract waybill from response
//         if (isset($data['data']['shipments'][0]['waybill'])) {
//             $awb = $data['data']['shipments'][0]['waybill'];
//         }
//         if (!$awb && isset($data['data']['1']['waybill'])) {
//             $awb = $data['data']['1']['waybill'];
//         }
//         if (!$awb && isset($data['waybill'])) {
//             $awb = $data['waybill'];
//         }

//         $order->update([
//             'awb_number' => $awb,
//             'shipping_response' => json_encode($response),
//             'status' => 'processing',
//             'shipped_at' => now(),
//         ]);

//         return response()->json([
//             'success' => true,
//             'message' => '✅ Order shipped! AWB: ' . $awb,
//             'awb' => $awb
//         ]);
//     }

//     return response()->json([
//         'success' => false,
//         'message' => $response['message'] ?? 'Shipping failed'
//     ]);
// }



public function createShipment(Order $order)
{
    if ($order->payment_method != 'cash_on_delivery' && $order->payment_status != 'paid') {
        return response()->json(['success' => false, 'message' => 'Payment not completed']);
    }

    if ($order->awb_number) {
        return response()->json(['success' => false, 'message' => 'Already shipped: ' . $order->awb_number]);
    }

    // Create order via Add Order API
    $response = $this->logisticsService->createOrder($order);

    // LOG RESPONSE FOR DEBUGGING
    Log::info('Logistics API Response for Order ID #' . $order->id . ' :', [
        'response_data' => $response
    ]);

    if (isset($response['status']) && $response['status'] == true) {
        $data = $response['data'] ?? [];
        $awb = null;

        // ==================== FIXED FOR iTHINK V3 RESPONSE FORMAT ====================
        // Pathway 1: Standard top-level data waybill check
        if (isset($data['waybill'])) {
            $awb = $data['waybill'];
        }
        // Pathway 2: Direct nested data object response checklist
        if (!$awb && isset($data['data']['waybill'])) {
            $awb = $data['data']['waybill'];
        }
        // Pathway 3: Fallback check inside specific incremental shipment list arrays
        if (!$awb && isset($data['data']['shipments'][0]['waybill'])) {
            $awb = $data['data']['shipments'][0]['waybill'];
        }
        if (!$awb && isset($data['data']['1']['waybill'])) {
            $awb = $data['data']['1']['waybill'];
        }
        // =============================================================================

        // Agar safe fallback methods ke baad bhi AWB nahi mila toh response check karein
        if (!$awb) {
            return response()->json([
                'success' => false,
                'message' => '❌ API accepted order but Waybill/AWB number was missing in response structure.',
                'debug_api_response' => $response
            ]);
        }

        $order->update([
            'awb_number' => $awb,
            'shipping_response' => json_encode($response),
            'status' => 'processing',
            'shipped_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => '✅ Order shipped! AWB: ' . $awb,
            'awb' => $awb,
            'debug_api_response' => $response
        ]);
    }

    return response()->json([
        'success' => false,
        'message' => $response['message'] ?? 'Shipping failed',
        'debug_api_response' => $response
    ]);
}
    /**
     * Track Shipment
     */
    public function trackShipment($awb = null)
    {
        if (!$awb) {
            return view('admin.shipping.track', ['tracking' => null, 'awb' => null]);
        }

        $response = $this->logisticsService->trackShipment($awb);

        if (request()->ajax() || request()->wantsJson()) {
            return response()->json([
                'success' => isset($response['status']) && $response['status'] == true,
                'data' => $response['data'] ?? $response
            ]);
        }

        return view('admin.shipping.track', [
            'tracking' => $response,
            'awb' => $awb
        ]);
    }

    /**
     * Track by Form Submit
     */
    public function trackByForm(Request $request)
    {
        $request->validate(['awb_number' => 'required|string']);
        return redirect()->route('admin.shipping.track', ['awb' => $request->awb_number]);
    }

    /**
     * Cancel Shipment
     */
    public function cancelShipment(Order $order, Request $request)
    {
        if (!$order->awb_number) {
            return response()->json([
                'success' => false,
                'message' => 'No reference number found'
            ]);
        }

        $response = $this->logisticsService->cancelShipment(
            $order->awb_number,
            $request->reason ?? 'Cancelled by admin'
        );

        if (isset($response['status']) && $response['status'] == true) {
            $order->update([
                'awb_number' => null,
                'courier_name' => null,
                'shipping_label_url' => null,
                'shipping_response' => null,
                'status' => 'cancelled',
                'shipped_at' => null,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Shipment cancelled successfully'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => $response['message'] ?? 'Cancellation failed'
        ]);
    }

    /**
     * Print Label
     */
    public function printLabel(Order $order)
    {
        if (!$order->shipping_label_url) {
            return back()->with('error', 'No label available');
        }
        return redirect()->away($order->shipping_label_url);
    }

    /**
     * Print Manifest
     */
    public function printManifest(Order $order)
    {
        if (!$order->manifest_url) {
            return back()->with('error', 'No manifest available');
        }
        return redirect()->away($order->manifest_url);
    }

    /**
     * Check Pincode Serviceability
     */
    public function checkServiceability(Request $request)
    {
        $request->validate(['pincode' => 'required|digits:6']);
        $response = $this->logisticsService->checkPincode($request->pincode);
        return response()->json($response);
    }

    /**
     * Serviceability Check Page
     */
    public function serviceabilityPage()
    {
        return view('admin.shipping.serviceability');
    }

    /**
     * Get Shipping Rates
     */
    public function getRates(Request $request)
    {
        $request->validate([
            'pincode' => 'required|digits:6',
            'weight' => 'required|numeric',
            'amount' => 'required|numeric'
        ]);

        $response = $this->logisticsService->getRates(
            $request->pincode,
            $request->weight,
            $request->amount,
            $request->payment_mode ?? 'Prepaid'
        );

        return response()->json($response);
    }
}