<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $productId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:3|max:1000',
        ]);

        $product = Product::findOrFail($productId);

        // Check if user already reviewed this product
        $existingReview = Review::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($existingReview) {
            return back()->with('error', 'You have already reviewed this product!');
        }

        $review = Review::create([
            'user_id' => Auth::id(),
            'product_id' => $productId,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'status' => 'pending', // or 'approved' if you want auto-approve
        ]);

        return back()->with('success', 'Thank you for your review! It will be visible after approval.');
    }

    public function index($productId)
    {
        $reviews = Review::where('product_id', $productId)
            ->where('status', 'approved')
            ->with('user')
            ->latest()
            ->paginate(10);

        return response()->json($reviews);
    }
}