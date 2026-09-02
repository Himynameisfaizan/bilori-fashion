<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductColor;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // LIST
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    // CREATE PAGE
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }
    
    public function lowStock()
    {
        $products = Product::where('stock_quantity', '<', 10)->paginate(10);
        return view('admin.products.low-stock', compact('products'));
    }

    // SHOW
    public function show($id)
    {
        $product = Product::with(['colors.sizes'])->findOrFail($id);
        
        if ($product->colors) {
            foreach ($product->colors as $color) {
                $color->images_array = $color->images ? json_decode($color->images, true) : [];
                $color->all_images = $color->all_images_array;
            }
        }
        
        if ($product->shipping_offers && is_string($product->shipping_offers)) {
            $product->shipping_offers = json_decode($product->shipping_offers, true);
        }
        if ($product->promo_badges && is_string($product->promo_badges)) {
            $product->promo_badges = json_decode($product->promo_badges, true);
        }
        
        return view('admin.products.show', compact('product'));
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'variations' => 'nullable|array',
            'variations.*.color_name' => 'nullable|string|max:255',
            'variations.*.color_code' => 'nullable|string|max:50',
            'variations.*.color_sku' => 'nullable|string|max:255',
            'variations.*.images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'variations.*.sizes' => 'nullable|array',
            'variations.*.sizes.*.size' => 'nullable|string|max:50',
            'variations.*.sizes.*.price' => 'nullable|numeric|min:0',
            'variations.*.sizes.*.stock' => 'nullable|integer|min:0',
            'variations.*.sizes.*.sku' => 'nullable|string|max:255',
            'size_fit' => 'nullable|string',
            'material_care' => 'nullable|string',
            'shipping_offers' => 'nullable|array',
            'shipping_offers.*' => 'nullable|string|max:255',
            'promo_badges' => 'nullable|array',
            'promo_badges.*.text' => 'nullable|string|max:255',
            'promo_badges.*.color' => 'nullable|string|max:50',
            
            // BOGO Validation
            'bogo_enabled' => 'nullable',
            'bogo_type' => 'nullable|string',
            'bogo_price' => 'nullable|numeric|min:0',
            'bogo_badge_text' => 'nullable|string|max:255',
        ]);

        // ==================== BASIC DATA ====================
        $data = $request->only([
            'name', 'category_id', 'price', 'sale_price', 
            'stock_quantity', 'sku', 'description', 
            'meta_title', 'meta_description', 'meta_keywords',
            'size_fit', 'material_care'
        ]);
        
        $data['slug'] = $request->slug ? Str::slug($request->slug) : Str::slug($request->name);
        
        // --- CORE STATUSES ---
        $data['is_active'] = $request->has('is_active') ? '1' : '0';
        $data['is_featured'] = $request->has('is_featured') ? '1' : '0';
        $data['is_trending'] = $request->has('is_trending') ? '1' : '0';
        $data['is_new_arrival'] = $request->has('is_new_arrival') ? '1' : '0'; // Status Box ka new arrival
        $data['status'] = $request->has('is_active') ? 'active' : 'inactive';
        $data['featured'] = $request->has('is_featured') ? 1 : 0;
        $data['quantity'] = $request->stock_quantity ?? 0;

        // --- NEW CHIPS & HIGHLIGHT BADGES BOX ---
        $data['is_best_seller'] = $request->has('is_best_seller') ? '1' : '0';
        $data['badge_new_arrival'] = $request->has('badge_new_arrival') ? '1' : '0'; // Highlights Box ka new arrival

        // ==================== SHIPPING OFFERS ====================
        if ($request->has('shipping_offers') && is_array($request->shipping_offers)) {
            $shippingOffers = array_values(array_filter($request->shipping_offers, function($offer) {
                return !empty(trim($offer));
            }));
            $data['shipping_offers'] = !empty($shippingOffers) ? json_encode($shippingOffers) : json_encode([
                '🚚 Free Shipping on orders above ₹999',
                '🔄 Easy 15 days return & exchange',
                '✅ 100% Authentic Products'
            ]);
        } else {
            $data['shipping_offers'] = json_encode([
                '🚚 Free Shipping on orders above ₹999',
                '🔄 Easy 15 days return & exchange',
                '✅ 100% Authentic Products'
            ]);
        }

        // ==================== PROMO BADGES ====================
        if ($request->has('promo_badges') && is_array($request->promo_badges)) {
            $promoBadges = [];
            foreach ($request->promo_badges as $badge) {
                if (!empty(trim($badge['text']))) {
                    $promoBadges[] = [
                        'text' => trim($badge['text']),
                        'color' => $badge['color'] ?? 'success'
                    ];
                }
            }
            $data['promo_badges'] = !empty($promoBadges) ? json_encode($promoBadges) : json_encode([
                ['text' => '🎁 Extra 5% off on prepaid orders', 'color' => 'success'],
                ['text' => 'Buy 2 Get 10% off', 'color' => 'danger']
            ]);
        } else {
            $data['promo_badges'] = json_encode([
                ['text' => '🎁 Extra 5% off on prepaid orders', 'color' => 'success'],
                ['text' => 'Buy 2 Get 10% off', 'color' => 'danger']
            ]);
        }

        // ==================== BOGO DATA ====================
        $data['bogo_enabled'] = $request->has('bogo_enabled') ? 1 : 0;
        $data['bogo_type'] = 'any_product';
        $data['bogo_price'] = $request->bogo_price ?? 1500;
        $data['bogo_buy_quantity'] = 1;
        $data['bogo_free_quantity'] = 1;
        $data['bogo_badge_text'] = $request->bogo_badge_text ?? 'Buy any 2 for ₹1500';
        $data['bogo_category_id'] = $request->category_id;
        $data['bogo_exclude_same'] = 0;
        $data['bogo_free_product_id'] = null;

        if ($request->has('bogo_enabled') && $request->bogo_price) {
            $data['price'] = $request->bogo_price;
        }

        // ==================== MAIN IMAGE UPLOAD ====================
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/products');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $image->move($destinationPath, $imageName);
            $data['image'] = 'uploads/products/' . $imageName;
        }

        // ==================== GALLERY IMAGES UPLOAD ====================
        $galleryImages = [];
        if ($request->hasFile('images')) {
            $galleryPath = public_path('uploads/products/gallery');
            if (!file_exists($galleryPath)) {
                mkdir($galleryPath, 0777, true);
            }
            foreach ($request->file('images') as $img) {
                if ($img && $img->isValid()) {
                    $imgName = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
                    $img->move($galleryPath, $imgName);
                    $galleryImages[] = 'uploads/products/gallery/' . $imgName;
                }
            }
        }
        $data['images'] = !empty($galleryImages) ? json_encode($galleryImages) : null;

        // CREATE PRODUCT
        $product = Product::create($data);

        // ==================== SAVE VARIATIONS ====================
        if ($request->has('variations') && is_array($request->variations)) {
            foreach ($request->variations as $variation) {
                if (empty($variation['color_name'])) { continue; }
                
                $colorData = [
                    'product_id' => $product->id,
                    'name' => $variation['color_name'],
                    'code' => $variation['color_code'] ?? '#000000',
                    'extra_price' => 0,
                    'sku' => $variation['color_sku'] ?? null,
                    'image' => null,
                    'images' => null,
                    'is_active' => true,
                ];
                
                $colorImages = [];
                if (isset($variation['images']) && is_array($variation['images'])) {
                    $colorImagesPath = public_path('uploads/products/colors');
                    if (!file_exists($colorImagesPath)) {
                        mkdir($colorImagesPath, 0777, true);
                    }
                    foreach ($variation['images'] as $colorImage) {
                        if ($colorImage instanceof \Illuminate\Http\UploadedFile && $colorImage->isValid()) {
                            $colorImgName = time() . '_' . uniqid() . '.' . $colorImage->getClientOriginalExtension();
                            $colorImage->move($colorImagesPath, $colorImgName);
                            $colorImages[] = 'uploads/products/colors/' . $colorImgName;
                        }
                    }
                }
                
                if (!empty($colorImages)) {
                    $colorData['images'] = json_encode($colorImages);
                    $colorData['image'] = $colorImages[0];
                }
                
                $color = ProductColor::create($colorData);

                if (isset($variation['sizes']) && is_array($variation['sizes'])) {
                    foreach ($variation['sizes'] as $size) {
                        if (empty($size['size'])) { continue; }
                        ProductSize::create([
                            'product_id' => $product->id,
                            'product_color_id' => $color->id,
                            'size' => $size['size'],
                            'extra_price' => $size['price'] ?? 0,
                            'stock' => $size['stock'] ?? 0,
                            'sku' => $size['sku'] ?? null,
                            'is_active' => isset($size['is_active']) ? true : false,
                        ]);
                    }
                }
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    // EDIT
    public function edit($id)
    {
        $product = Product::with(['colors.sizes'])->findOrFail($id);
        $categories = Category::all();

        if (is_string($product->images)) {
            $product->images = json_decode($product->images, true) ?? [];
        }
        if (!is_array($product->images)) { $product->images = []; }

        if ($product->shipping_offers && is_string($product->shipping_offers)) {
            $product->shipping_offers = json_decode($product->shipping_offers, true);
        }
        if ($product->promo_badges && is_string($product->promo_badges)) {
            $product->promo_badges = json_decode($product->promo_badges, true);
        }

        if ($product->colors) {
            foreach ($product->colors as $color) {
                $color->images_array = $color->images ? json_decode($color->images, true) : [];
                $color->all_images = $color->all_images_array;
            }
        }

        return view('admin.products.edit', compact('product', 'categories'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'variations' => 'nullable|array',
            'variations.*.id' => 'nullable|exists:product_colors,id',
            'variations.*.color_name' => 'nullable|string|max:255',
            'variations.*.color_code' => 'nullable|string|max:50',
            'variations.*.color_sku' => 'nullable|string|max:255',
            'variations.*.images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
            'variations.*.existing_images' => 'nullable|array',
            'variations.*.existing_images.*.path' => 'nullable|string',
            'variations.*.existing_images.*.keep' => 'nullable|in:0,1',
            'variations.*.sizes' => 'nullable|array',
            'variations.*.sizes.*.id' => 'nullable|exists:product_sizes,id',
            'variations.*.sizes.*.size' => 'nullable|string|max:50',
            'variations.*.sizes.*.price' => 'nullable|numeric|min:0',
            'variations.*.sizes.*.stock' => 'nullable|integer|min:0',
            'variations.*.sizes.*.sku' => 'nullable|string|max:255',
            'size_fit' => 'nullable|string',
            'material_care' => 'nullable|string',
            'shipping_offers' => 'nullable|array',
            'shipping_offers.*' => 'nullable|string|max:255',
            'promo_badges' => 'nullable|array',
            'promo_badges.*.text' => 'nullable|string|max:255',
            'promo_badges.*.color' => 'nullable|string|max:50',
            
            // BOGO Validation
            'bogo_enabled' => 'nullable',
            'bogo_type' => 'nullable|string',
            'bogo_price' => 'nullable|numeric|min:0',
            'bogo_badge_text' => 'nullable|string|max:255',
        ]);

        // ==================== BASIC DATA ====================
        $data = $request->only([
            'name', 'category_id', 'price', 'sale_price', 
            'stock_quantity', 'sku', 'description', 
            'meta_title', 'meta_description', 'meta_keywords',
            'size_fit', 'material_care'
        ]);
        
        $data['slug'] = $request->slug ? Str::slug($request->slug) : Str::slug($request->name);
        
        // --- CORE STATUSES ---
        $data['is_active'] = $request->has('is_active') ? '1' : '0';
        $data['is_featured'] = $request->has('is_featured') ? '1' : '0';
        $data['is_trending'] = $request->has('is_trending') ? '1' : '0';
        $data['is_new_arrival'] = $request->has('is_new_arrival') ? '1' : '0'; // Status Box ka new arrival
        $data['status'] = $request->has('is_active') ? 'active' : 'inactive';
        $data['featured'] = $request->has('is_featured') ? 1 : 0;

        // --- NEW CHIPS & HIGHLIGHT BADGES BOX ---
        $data['is_best_seller'] = $request->has('is_best_seller') ? '1' : '0';
        $data['badge_new_arrival'] = $request->has('badge_new_arrival') ? '1' : '0'; // Highlights Box ka new arrival

        // ==================== SHIPPING OFFERS ====================
        if ($request->has('shipping_offers') && is_array($request->shipping_offers)) {
            $shippingOffers = array_values(array_filter($request->shipping_offers, function($offer) {
                return !empty(trim($offer));
            }));
            $data['shipping_offers'] = !empty($shippingOffers) ? json_encode($shippingOffers) : null;
        } else {
            $data['shipping_offers'] = null;
        }

        // ==================== PROMO BADGES ====================
        if ($request->has('promo_badges') && is_array($request->promo_badges)) {
            $promoBadges = [];
            foreach ($request->promo_badges as $badge) {
                if (!empty(trim($badge['text']))) {
                    $promoBadges[] = [
                        'text' => trim($badge['text']),
                        'color' => $badge['color'] ?? 'success'
                    ];
                }
            }
            $data['promo_badges'] = !empty($promoBadges) ? json_encode($promoBadges) : null;
        } else {
            $data['promo_badges'] = null;
        }

        // ==================== BOGO DATA ====================
        $data['bogo_enabled'] = $request->has('bogo_enabled') ? 1 : 0;
        $data['bogo_type'] = 'any_product';
        $data['bogo_price'] = $request->bogo_price ?? 1500;
        $data['bogo_buy_quantity'] = 1;
        $data['bogo_free_quantity'] = 1;
        $data['bogo_badge_text'] = $request->bogo_badge_text ?? 'Buy any 2 for ₹1500';
        $data['bogo_category_id'] = $request->category_id;
        $data['bogo_exclude_same'] = 0;
        $data['bogo_free_product_id'] = null;

        if ($request->has('bogo_enabled') && $request->bogo_price) {
            $data['price'] = $request->bogo_price;
        }

        // ==================== MAIN IMAGE HANDLING ====================
        if ($request->remove_main_image == '1') {
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
            $data['image'] = null;
        } elseif ($request->hasFile('image')) {
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('uploads/products');
            $image->move($destinationPath, $imageName);
            $data['image'] = 'uploads/products/' . $imageName;
        }

        // ==================== GALLERY IMAGES HANDLING ====================
        $currentImages = [];
        if ($product->images) {
            if (is_string($product->images)) {
                $decoded = json_decode($product->images, true);
                $currentImages = is_array($decoded) ? $decoded : [];
            } elseif (is_array($product->images)) {
                $currentImages = $product->images;
            }
        }

        if ($request->has('existing_images') && is_array($request->existing_images)) {
            $keepImages = [];
            foreach ($request->existing_images as $existingImage) {
                if (isset($existingImage['keep']) && $existingImage['keep'] == '1' && isset($existingImage['path'])) {
                    $keepImages[] = $existingImage['path'];
                } elseif (isset($existingImage['path'])) {
                    $filePath = public_path($existingImage['path']);
                    if (file_exists($filePath)) { unlink($filePath); }
                }
            }
            $currentImages = $keepImages;
        }

        if ($request->hasFile('images')) {
            $galleryPath = public_path('uploads/products/gallery');
            foreach ($request->file('images') as $img) {
                if ($img && $img->isValid()) {
                    $imgName = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
                    $img->move($galleryPath, $imgName);
                    $currentImages[] = 'uploads/products/gallery/' . $imgName;
                }
            }
        }
        $data['images'] = !empty($currentImages) ? json_encode(array_values($currentImages)) : null;

        $product->update($data);

        // ==================== UPDATE VARIATIONS ====================
        if ($request->has('variations')) {
            $existingColorIds = $product->colors()->pluck('id')->toArray();
            $updatedColorIds = [];

            foreach ($request->variations as $colorIndex => $variation) {
                if (empty($variation['color_name'])) { continue; }

                $colorId = $variation['id'] ?? null;
                $colorData = [
                    'product_id' => $product->id,
                    'name' => $variation['color_name'],
                    'code' => $variation['color_code'] ?? '#000000',
                    'extra_price' => 0,
                    'sku' => $variation['color_sku'] ?? null,
                    'is_active' => true,
                ];

                $colorImages = [];
                if (isset($variation['existing_images']) && is_array($variation['existing_images'])) {
                    foreach ($variation['existing_images'] as $existingImage) {
                        if (isset($existingImage['keep']) && $existingImage['keep'] == '1' && isset($existingImage['path'])) {
                            $colorImages[] = $existingImage['path'];
                        } elseif (isset($existingImage['path'])) {
                            $filePath = public_path($existingImage['path']);
                            if (file_exists($filePath)) { unlink($filePath); }
                        }
                    }
                }

                if (isset($variation['images']) && is_array($variation['images'])) {
                    $colorImagesPath = public_path('uploads/products/colors');
                    foreach ($variation['images'] as $newImage) {
                        if ($newImage instanceof \Illuminate\Http\UploadedFile && $newImage->isValid()) {
                            $colorImgName = time() . '_' . uniqid() . '.' . $newImage->getClientOriginalExtension();
                            $newImage->move($colorImagesPath, $colorImgName);
                            $colorImages[] = 'uploads/products/colors/' . $colorImgName;
                        }
                    }
                }

                $colorData['images'] = !empty($colorImages) ? json_encode(array_values($colorImages)) : null;
                $colorData['image'] = !empty($colorImages) ? $colorImages[0] : null;

                if ($colorId && in_array($colorId, $existingColorIds)) {
                    $color = ProductColor::find($colorId);
                    if ($color) {
                        $color->update($colorData);
                        $updatedColorIds[] = $colorId;
                        $color->sizes()->delete();
                    }
                } else {
                    $color = ProductColor::create($colorData);
                    $updatedColorIds[] = $color->id;
                }

                if (isset($variation['sizes']) && is_array($variation['sizes']) && isset($color)) {
                    foreach ($variation['sizes'] as $size) {
                        if (empty($size['size'])) { continue; }
                        ProductSize::create([
                            'product_id' => $product->id,
                            'product_color_id' => $color->id,
                            'size' => $size['size'],
                            'extra_price' => $size['price'] ?? 0,
                            'stock' => $size['stock'] ?? 0,
                            'sku' => $size['sku'] ?? null,
                            'is_active' => isset($size['is_active']) ? true : false,
                        ]);
                    }
                }
            }

            $colorsToDelete = array_diff($existingColorIds, $updatedColorIds);
            foreach ($colorsToDelete as $colorId) {
                $color = ProductColor::find($colorId);
                if ($color) {
                    if ($color->images) {
                        $images = json_decode($color->images, true);
                        if (is_array($images)) {
                            foreach ($images as $img) {
                                if (file_exists(public_path($img))) { unlink(public_path($img)); }
                            }
                        }
                    }
                    if ($color->image && file_exists(public_path($color->image))) { unlink(public_path($color->image)); }
                    $color->sizes()->delete();
                    $color->delete();
                }
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    // DELETE
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);

            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            $galleryImages = $product->images;
            if (is_string($galleryImages)) {
                $galleryImages = json_decode($galleryImages, true) ?? [];
            }
            if (is_array($galleryImages)) {
                foreach ($galleryImages as $img) {
                    if (file_exists(public_path($img))) { unlink(public_path($img)); }
                }
            }

            $colors = ProductColor::where('product_id', $product->id)->get();
            foreach ($colors as $color) {
                if ($color->images) {
                    $colorImages = json_decode($color->images, true);
                    if (is_array($colorImages)) {
                        foreach ($colorImages as $img) {
                            if (file_exists(public_path($img))) { unlink(public_path($img)); }
                        }
                    }
                }
                if ($color->image && file_exists(public_path($color->image))) { unlink(public_path($color->image)); }
            }

            ProductSize::where('product_id', $product->id)->delete();
            ProductColor::where('product_id', $product->id)->delete();
            $product->delete();

            return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');

        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting product: ' . $e->getMessage());
        }
    }

    // AJAX: Delete single gallery image
    public function deleteGalleryImage(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $imageToDelete = $request->image;
        $images = $product->images;
        if (is_string($images)) { $images = json_decode($images, true) ?? []; }

        if ($imageToDelete && file_exists(public_path($imageToDelete))) {
            unlink(public_path($imageToDelete));
        }

        $images = array_filter($images, function ($img) use ($imageToDelete) {
            return $img !== $imageToDelete;
        });

        $product->update(['images' => !empty($images) ? json_encode(array_values($images)) : null]);
        return response()->json(['success' => true]);
    }

    // AJAX: Update Variant Stock
    public function updateSizeStock(Request $request, $productId, $sizeId)
    {
        $request->validate(['stock' => 'required|integer|min:0']);
        $size = ProductSize::where('product_id', $productId)->where('id', $sizeId)->firstOrFail();
        $size->update(['stock' => $request->stock]);

        return response()->json([
            'success' => true,
            'message' => 'Stock updated successfully!',
            'stock' => $size->stock,
        ]);
    }

    // AJAX: SKU Generator
    public function generateSku(Request $request)
    {
        $baseSku = $request->base_sku ?: 'PRD';
        $size = $request->size;
        $color = $request->color;
        $sku = $baseSku;
        
        if ($color) { $sku .= '-' . strtoupper($color); }
        if ($size) { $sku .= '-' . strtoupper($size); }
        $sku .= '-' . strtoupper(Str::random(4));
        
        $exists = ProductSize::where('sku', $sku)->exists() || 
                  ProductColor::where('sku', $sku)->exists() ||
                  Product::where('sku', $sku)->exists();
                  
        if ($exists) { $sku .= '-' . strtoupper(Str::random(2)); }
        
        return response()->json(['success' => true, 'sku' => $sku]);
    }
}