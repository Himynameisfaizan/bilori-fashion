<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function sales(Request $request)
    {
        $period = $request->get('period', 'monthly');
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        $query = Order::where('status', 'completed');

        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $salesData = [];

        switch ($period) {
            case 'daily':
                $salesData = $query->select(
                    DB::raw('DATE(created_at) as date'),
                    DB::raw('COUNT(*) as orders_count'),
                    DB::raw('SUM(total_amount) as total_sales')
                )
                    ->groupBy('date')
                    ->orderBy('date', 'DESC')
                    ->limit(30)
                    ->get();
                break;

            case 'monthly':
                $salesData = $query->select(
                    DB::raw('YEAR(created_at) as year'),
                    DB::raw('MONTH(created_at) as month'),
                    DB::raw('COUNT(*) as orders_count'),
                    DB::raw('SUM(total_amount) as total_sales')
                )
                    ->groupBy('year', 'month')
                    ->orderBy('year', 'DESC')
                    ->orderBy('month', 'DESC')
                    ->limit(12)
                    ->get();
                break;

            case 'yearly':
                $salesData = $query->select(
                    DB::raw('YEAR(created_at) as year'),
                    DB::raw('COUNT(*) as orders_count'),
                    DB::raw('SUM(total_amount) as total_sales')
                )
                    ->groupBy('year')
                    ->orderBy('year', 'DESC')
                    ->get();
                break;
        }

        $stats = [
            'total_orders' => Order::where('status', 'completed')->count(),
            'total_revenue' => Order::where('status', 'completed')->sum('total_amount'),
            'avg_order_value' => Order::where('status', 'completed')->avg('total_amount'),
            'total_customers' => User::count()
        ];
        
        $monthly_sales = Order::selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
    ->where('status', 'completed')
    ->groupBy('month')
    ->pluck('total', 'month');

        return view('admin.reports.sales', compact('salesData', 'stats', 'period', 'startDate', 'endDate','monthly_sales'));
    }

    public function products(Request $request)
    {
        $topProducts = Order::join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->where('orders.status', 'completed')
            ->select(
                'products.id',
                'products.name',
                'products.price',
                DB::raw('SUM(order_items.quantity) as total_quantity'),
                DB::raw('SUM(order_items.total) as total_revenue')
            )
            ->groupBy('products.id', 'products.name', 'products.price')
            ->orderBy('total_revenue', 'DESC')
            ->limit(10)
            ->get();

        $topCategories = Order::join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('orders.status', 'completed')
            ->select(
                'categories.id',
                'categories.name',
                DB::raw('SUM(order_items.quantity) as total_quantity'),
                DB::raw('SUM(order_items.total) as total_revenue')
            )
            ->groupBy('categories.id', 'categories.name')
            ->orderBy('total_revenue', 'DESC')
            ->get();

        $lowStockProducts = Product::where('quantity', '<=', 10)
            ->orderBy('quantity', 'asc')
            ->limit(10)
            ->get();

        return view('admin.reports.products', compact('topProducts', 'topCategories', 'lowStockProducts'));
    }

    public function exportSales(Request $request)
    {
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        $orders = Order::where('status', 'completed');

        if ($startDate && $endDate) {
            $orders->whereBetween('created_at', [$startDate, $endDate]);
        }

        $orders = $orders->with('user')->get();

        $csv = \League\Csv\Writer::new();
        $csv->insertOne(['Order #', 'Customer', 'Date', 'Total', 'Items Count']);

        foreach ($orders as $order) {
            $csv->insertOne([
                $order->order_number,
                $order->user->name ?? 'Guest',
                $order->created_at->format('Y-m-d'),
                $order->total_amount,
                $order->items->count()
            ]);
        }

        return response((string) $csv, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="sales-report.csv"',
        ]);
    }
}