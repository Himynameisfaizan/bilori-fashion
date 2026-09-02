<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        // Basic Stats
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalUsers = User::count();

        // Check if orders table exists
        if (Schema::hasTable('orders')) {
            $totalOrders = DB::table('orders')->count();
            $recentOrders = DB::table('orders')
                ->leftJoin('users', 'orders.user_id', '=', 'users.id')
                ->select('orders.*', 'users.name as user_name')
                ->orderBy('orders.created_at', 'desc')
                ->limit(5)
                ->get();
            $totalRevenue = DB::table('orders')->where('status', 'completed')->sum('total');
            $todayRevenue = DB::table('orders')
                ->where('status', 'completed')
                ->whereDate('created_at', today())
                ->sum('total');

            // Monthly Sales Data
            $monthlySales = DB::table('orders')
                ->where('status', 'completed')
                ->whereYear('created_at', date('Y'))
                ->select(
                    DB::raw('MONTH(created_at) as month'),
                    DB::raw('SUM(total) as total')
                )
                ->groupBy('month')
                ->orderBy('month')
                ->get();

            $salesData = array_fill(0, 12, 0);
            foreach ($monthlySales as $sale) {
                $salesData[$sale->month - 1] = $sale->total;
            }
        } else {
            $totalOrders = 0;
            $recentOrders = collect();
            $totalRevenue = 0;
            $todayRevenue = 0;
            $salesData = array_fill(0, 12, 0);
        }

        // Check if products table has quantity column for low stock
        if (Schema::hasColumn('products', 'quantity')) {
            $lowStockProducts = Product::where('quantity', '<=', 10)
                ->orderBy('quantity', 'asc')
                ->limit(5)
                ->get();
        } else {
            $lowStockProducts = collect();
        }

        // Recent Products
        $recentProducts = Product::with('category')
            ->latest()
            ->limit(5)
            ->get();

        // Recent Categories
        $recentCategories = Category::latest()
            ->limit(5)
            ->get();

        // Get product count by category
        $categoryStats = Category::withCount('products')
            ->having('products_count', '>', 0)
            ->orderBy('products_count', 'desc')
            ->limit(5)
            ->get();

        $totalCustomers = $totalUsers;

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalUsers',
            'totalOrders',
            'totalCustomers',
            'recentProducts',
            'recentCategories',
            'recentOrders',
            'categoryStats',
            'lowStockProducts',
            'totalRevenue',
            'todayRevenue',
            'salesData'
        ));
    }
}