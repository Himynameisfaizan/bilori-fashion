<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductColor;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Banner;
use App\Models\Testimonial;
use App\Models\NewArrival;
use App\Models\Policy;
use App\Models\About;

class   HomeController extends Controller
{
    /**
     * Display premium storefront homepage
     */
    public function index()
    {
        $userAgent = request()->header('User-Agent');
        $device = str_contains($userAgent, 'Mobile') ? 'mobile' : 'desktop';

        $mobileBanners = Banner::where('status', 1)
            ->where(function ($q) {
                $q->where('device_type', 'mobile')
                  ->orWhereNull('device_type');
            })
            ->orderBy('order')
            ->get();

        $laptopBanners = Banner::where('status', 1)
            ->where(function ($q) {
                $q->where('device_type', 'laptop')
                  ->orWhereNull('device_type');
            })
            ->orderBy('order')
            ->get();

        // FIXED: Added with() eager loading to completely eliminate N+1 database queries on homepage cards
        $featured = Product::where('is_active', 1)
            ->where('is_featured', 1)
            ->with(['colors', 'sizes', 'category'])
            ->latest()
            ->paginate(12); // ✅ PAGINATION ADDED

        $trending = Product::where('is_active', 1)
            ->where('is_trending', 1)
            ->with(['colors', 'sizes', 'category'])
            ->latest()
            ->paginate(12); // ✅ PAGINATION ADDED

        $newArrival = Product::where('is_active', 1)
            ->where('is_new_arrival', 1)
            ->with(['colors', 'sizes', 'category'])
            ->latest()
            ->paginate(12); // ✅ PAGINATION ADDED (was take(8) now paginate)

          $bestseller = Product::where('is_active', 1)
            ->where('is_best_seller', 1)
            ->with(['colors', 'sizes', 'category'])
            ->latest()
            ->paginate(12); // ✅ PAGINATION ADDED (was take(8) now paginate)
        
          $neWArrival = Product::where('is_active', 1)
            ->where('badge_new_arrival', 1)
            ->with(['colors', 'sizes', 'category'])
            ->latest()
            ->paginate(12); // ✅ PAGINATION ADDED (was take(8) now paginate)
        
        $categories = Category::all();
        $products = Product::where('is_active', 1)
            ->with(['colors', 'sizes'])
            ->latest()
            ->paginate(12); // ✅ PAGINATION ADDED
        
        $blogs = Blog::where('status', 1)
            ->latest()
            ->paginate(6); // ✅ PAGINATION ADDED

        $testimonials = Testimonial::where('status', 'active')->latest()->get();
        $newArrivalSection = NewArrival::first();

        return view('welcome', compact(
            'featured',
            'trending',
            'newArrival',
            'bestseller',
            'neWArrival',
            'categories',
            'products',
            'blogs',
            'testimonials',
            'mobileBanners', 
            'laptopBanners',
            'newArrivalSection'
        ));
    }

    /**
     * Storefront global elastic search handler
     */
    public function search(Request $request)
    {
        $query = Product::query()->with(['colors', 'sizes', 'category']);

        // Check for category filter
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Check for search keyword
        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        $products = $query->where('is_active', 1)->paginate(12)->withQueryString(); // ✅ PAGINATION 12 per page
        $categories = Category::all();

        return view('search', compact('products', 'categories'));
    }

    /**
     * Category archive landing handler
     */
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::where('category_id', $category->id)
            ->where('is_active', 1)
            ->with(['colors', 'sizes'])->latest()
            ->paginate(12)->withQueryString(); 

        return view('category', compact('category', 'products'));
    }

    /**
     * Dynamic product detail dispatcher
     */
    public function product($slug)
    {
        $product = Product::where('slug', $slug)
            ->where('is_active', 1)
            ->with(['colors', 'sizes', 'category'])
            ->firstOrFail();
            
        $categories = Category::all();

        // Get related products from matching pool criteria
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', 1)
            ->with(['colors', 'sizes'])
            ->paginate(8); // ✅ PAGINATION ADDED (8 related products)

        return view('product', compact('product', 'categories', 'relatedProducts'));
    }

    /**
     * Catalog master shopping grid filter context
     */
    public function shop(Request $request)
    {
        $categories = Category::withCount('products')->get();

        $products = Product::query()
            ->where('is_active', 1)
            ->with(['colors', 'sizes', 'category']);

        // Category filter
        if ($request->filled('category')) {
            $products->where('category_id', $request->category);
        }

        // Price range filter
        if ($request->filled('min_price')) {
            $products->where(function($q) use ($request) {
                $q->where('price', '>=', $request->min_price)
                  ->orWhere('sale_price', '>=', $request->min_price);
            });
        }
        
        if ($request->filled('max_price')) {
            $products->where(function($q) use ($request) {
                $q->where('price', '<=', $request->max_price)
                  ->orWhere('sale_price', '<=', $request->max_price);
            });
        }

        // Sorting Matrix
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'price_asc':
                    $products->orderByRaw('COALESCE(sale_price, price) ASC');
                    break;
                case 'price_desc':
                    $products->orderByRaw('COALESCE(sale_price, price) DESC');
                    break;
                case 'newest':
                    $products->latest();
                    break;
                case 'name_asc':
                    $products->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $products->orderBy('name', 'desc');
                    break;
                default:
                    $products->latest();
            }
        } else {
            $products->latest();
        }

        $totalProducts = $products->count();
        $products = $products->paginate(12)->withQueryString(); // ✅ PAGINATION 12 per page

        return view('shop', compact('products', 'categories', 'totalProducts'));
    }

    /**
     * Dynamic product detail dispatcher (for route: product.detail)
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->where('is_active', 1)
            ->with(['colors', 'sizes', 'category'])
            ->firstOrFail();
            
        $categories = Category::all();

        // Get related products from matching pool criteria
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', 1)
            ->with(['colors', 'sizes'])
            ->paginate(8); // ✅ PAGINATION ADDED (8 related products)

        return view('product', compact('product', 'categories', 'relatedProducts'));
    }

    /**
     * Get size stock matrix for specific variation selections (AJAX)
     */
    public function getSizeStock(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'color_id' => 'nullable|exists:product_colors,id',
            ]);

            $query = ProductSize::where('product_id', $request->product_id)
                ->where('is_active', 1);

            if ($request->filled('color_id')) {
                $query->where('product_color_id', $request->color_id);
            }

            $sizes = $query->get(['id', 'size', 'stock', 'extra_price', 'sku']);

            if ($sizes->isEmpty() && $request->filled('color_id')) {
                $sizes = ProductSize::where('product_id', $request->product_id)
                    ->where('is_active', 1)
                    ->get(['id', 'size', 'stock', 'extra_price', 'sku']);
            }

            // Compute inline data payloads safely
            $sizes->transform(function($size) {
                return [
                    'id' => $size->id,
                    'size' => $size->size,
                    'stock' => $size->stock,
                    'extra_price' => (float)($size->extra_price ?? 0),
                    'sku' => $size->sku ?? '',
                    'in_stock' => $size->stock > 0,
                    'is_low_stock' => $size->stock > 0 && $size->stock <= 5,
                ];
            });

            return response()->json([
                'success' => true,
                'sizes' => $sizes,
            ]);

        } catch (\Exception $e) {
            \Log::error('Error in getSizeStock: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error loading sizes'
            ], 500);
        }
    }
    
    /**
     * About page
     */
    public function about()
    {
        $about = About::first();
        return view('about', compact('about'));
    }
    
    /**
     * Privacy Policy
     */
    public function privacyPolicy()
    {
        $policy = Policy::first();
        return view('privacy-policy', compact('policy'));
    }

    /**
     * Terms of Service
     */
    public function termsOfService()
    {
        $policy = Policy::first();
        return view('terms-of-service', compact('policy'));
    }

    /**
     * Shipping Policy
     */
    public function shippingPolicy()
    {
        $policy = Policy::first();
        return view('shipping-policy', compact('policy'));
    }

    /**
     * Return & Exchange Policy
     */
    public function returnExchangePolicy()
    {
        $policy = Policy::first();
        return view('return-exchange-policy', compact('policy'));
    }

    /**
     * Return & Exchange Request
     */
    public function returnExchangeRequest()
    {
        $policy = Policy::first();
        return view('return-exchange-request', compact('policy'));
    }
}