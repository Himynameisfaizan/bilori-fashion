<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::withCount('orders')
            ->latest()
            ->paginate(15);

        $stats = [
            'total' => User::count(),
            'active' => User::where('status', 'active')->count(),
            'inactive' => User::where('status', 'inactive')->count(),
            'total_spent' => User::with('orders')->get()->sum(function ($user) {
                return $user->orders->where('status', 'completed')->sum('total_amount');
            })
        ];

        return view('admin.customers.index', compact('customers', 'stats'));
    }

    public function reviews()
    {
        $reviews = ProductReview::with(['user', 'product'])
            ->latest()
            ->paginate(15);

        $stats = [
            'total' => ProductReview::count(),
            'pending' => ProductReview::where('status', 'pending')->count(),
            'approved' => ProductReview::where('status', 'approved')->count(),
            'rejected' => ProductReview::where('status', 'rejected')->count(),
            'avg_rating' => ProductReview::avg('rating')
        ];

        return view('admin.customers.reviews', compact('reviews', 'stats'));
    }

    public function show($id)
    {
        $customer = User::with([
            'orders' => function ($q) {
                $q->latest()->limit(10);
            }
        ])->findOrFail($id);

        return view('admin.customers.show', compact('customer'));
    }

    public function updateStatus(Request $request, $id)
    {
        $customer = User::findOrFail($id);
        $customer->update(['status' => $request->status]);

        return response()->json(['success' => true]);
    }

    public function updateReviewStatus(Request $request, $id)
    {
        $review = ProductReview::findOrFail($id);
        $review->update(['status' => $request->status]);

        return response()->json(['success' => true]);
    }

    public function destroyReview($id)
    {
        $review = ProductReview::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('success', 'Review deleted successfully!');
    }
}