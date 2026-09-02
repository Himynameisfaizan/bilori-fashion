<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display user account dashboard
     */
    public function index()
    {
        $user = Auth::user();
        
        $orders = Order::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
            
        $totalOrders = Order::where('user_id', $user->id)->count();
        $totalSpent = Order::where('user_id', $user->id)
            ->where('payment_status', 'paid')
            ->sum('total_amount');
        $pendingOrders = Order::where('user_id', $user->id)
            ->whereIn('status', ['pending', 'processing'])
            ->count();

        return view('account', compact('user', 'orders', 'totalOrders', 'totalSpent', 'pendingOrders'));
    }

    /**
     * Display order detail
     */
    public function orderDetail($id)
    {
        $order = Order::with('items')
            ->where('user_id', Auth::id())
            ->findOrFail($id);
        
        return view('order-detail', compact('order'));
    }

    /**
     * Display all orders
     */
    public function orders()
    {
        $orders = Order::with('items')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('orders', compact('orders'));
    }

    /**
     * Update user profile
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    /**
     * Update password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password changed successfully!');
    }

    /**
     * Cancel order
     */
    public function cancelOrder($id)
    {
        $order = Order::where('user_id', Auth::id())
            ->whereIn('status', ['pending', 'processing'])
            ->findOrFail($id);
        
        $order->status = 'cancelled';
        $order->save();

        return redirect()->back()->with('success', 'Order #' . $order->order_number . ' has been cancelled.');
    }

    /**
     * Track order
     */
    public function trackOrder($id)
    {
        $order = Order::with('items')
            ->where('user_id', Auth::id())
            ->findOrFail($id);
        
        return view('track-order', compact('order'));
    }
}