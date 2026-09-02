<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::active()
            ->with('category')
            ->when($request->category, function ($query, $category) {
                return $query->where('category_id', $category);
            })
            ->when($request->min_price, function ($query, $price) {
                return $query->where('price', '>=', $price);
            })
            ->when($request->max_price, function ($query, $price) {
                return $query->where('price', '<=', $price);
            })
            ->when($request->sort, function ($query, $sort) {
                switch ($sort) {
                    case 'price_asc':
                        return $query->orderBy('price', 'asc');
                    case 'price_desc':
                        return $query->orderBy('price', 'desc');
                    case 'latest':
                        return $query->orderBy('created_at', 'desc');
                    default:
                        return $query->orderBy('name', 'asc');
                }
            })
            ->paginate(12);

        $categories = Category::where('is_active', true)->get();
        $maxPrice = Product::max('price');

        return view('frontend.shop.index', compact('products', 'categories', 'maxPrice'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->active()
            ->firstOrFail();

        // Increment view count
        $product->increment('view_count');

        // Get related products
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->active()
            ->limit(4)
            ->get();

        return view('frontend.shop.show', compact('product', 'relatedProducts'));
    }
}