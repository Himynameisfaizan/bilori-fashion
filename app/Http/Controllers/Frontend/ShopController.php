<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display shop page with products.
     */
    public function index(Request $request)
    {
        $query = Product::query()->where('is_active', '1');

        // Category filter
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        // Price filter
        if ($request->has('min_price') && $request->min_price != '') {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price') && $request->max_price != '') {
            $query->where('price', '<=', $request->max_price);
        }

        // Search
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Sorting
        $sort = $request->get('sort', 'latest');
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            default:
                $query->latest();
        }

        $products = $query->paginate(12);
        $categories = Category::where('status', 'active')->get()->latest();

        return view('frontend.shop', compact('products', 'categories'));
    }

    /**
     * Display single product details.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->limit(4)
            ->get();

        return view('frontend.product-detail', compact('product', 'relatedProducts'));
    }

    /**
     * Filter products by category.
     */
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::where('category_id', $category->id)
            ->where('status', 'active')
            ->paginate(12);
        $categories = Category::where('status', 'active')->get();

        return view('frontend.shop', compact('products', 'categories', 'category'));
    }

    /**
     * Quick view product (AJAX).
     */
    public function quickView($id)
    {
        $product = Product::with('category')->findOrFail($id);

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'product' => $product
            ]);
        }

        return view('frontend.quick-view', compact('product'));
    }
}