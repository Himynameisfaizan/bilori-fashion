<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = session()->get('wishlist', []);
        $products = Product::whereIn('id', $wishlist)->get();

        return view('wishlist.index', compact('products'));
    }

    public function add(Request $request)
    {
        $wishlist = session()->get('wishlist', []);

        if (!in_array($request->id, $wishlist)) {
            $wishlist[] = $request->id;
        }

        session()->put('wishlist', $wishlist);

        return response()->json(['success' => true]);
    }

    public function remove(Request $request)
    {
        $wishlist = session()->get('wishlist', []);

        $wishlist = array_diff($wishlist, [$request->id]);

        session()->put('wishlist', $wishlist);

        return response()->json(['success' => true]);
    }
}