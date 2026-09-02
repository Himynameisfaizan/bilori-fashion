@extends('admin.layout.app')

@section('title', 'Edit Product')

@section('content')
    <div class="container-fluid px-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold">Edit Product</h3>
                <small class="text-muted">{{ $product->name }}</small>
            </div>
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">← Back</a>
        </div>

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" id="productForm">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-lg-8">
                    
                    <div class="card mb-4 shadow-sm border-0 rounded-4">
                        <div class="card-body">
                            <h5 class="fw-semibold mb-3">Basic Info</h5>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label>Product Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                    <label>Slug</label>
                                    <input type="text" name="slug" id="slug" value="{{ old('slug', $product->slug) }}" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label>Category <span class="text-danger">*</span></label>
                                    <select name="category_id" id="category_id" class="form-select" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label>Main SKU</label>
                                    <input type="text" name="sku" value="{{ old('sku', $product->sku) }}" class="form-control">
                                </div>

                                <div class="col-12">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card mb-4 shadow-sm border-0 rounded-4" id="bogoOfferCard">
                        <div class="card-body">
                            <h5 class="fw-semibold mb-3">
                                <i class="fas fa-tags text-success me-2"></i> Buy 1 Get 1 Free (BOGO) Settings
                            </h5>
                            
                            <div class="row g-3">
                                {{-- Enable BOGO --}}
                                <div class="col-12">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="bogo_enabled" id="bogo_enabled" value="1"
                                            {{ old('bogo_enabled', $product->bogo_enabled ?? false) ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold" for="bogo_enabled">
                                            Include this product in "₹1500 for 2 Suits" BOGO Pool
                                        </label>
                                    </div>
                                    <small class="text-muted">Turn ON to allow this suit to mix-and-match with other suits under the ₹1500 offer in the cart.</small>
                                </div>

                                {{-- Hidden default system attributes --}}
                                <input type="hidden" name="bogo_type" value="any_product">
                                <input type="hidden" name="bogo_buy_quantity" value="1">
                                <input type="hidden" name="bogo_free_quantity" value="1">

                                {{-- BOGO Price Override --}}
                                <div class="col-md-6">
                                    <label>Offer Group Price (₹) <span class="text-danger">*</span></label>
                                    <input type="number" name="bogo_price" id="bogo_price" class="form-control" 
                                        value="{{ old('bogo_price', $product->bogo_price ?? 1500) }}" min="0" step="0.01" required>
                                    <small class="text-muted">System will auto-calculate cart total when any 2 eligible items are added.</small>
                                </div>

                                {{-- Badge Text --}}
                                <div class="col-md-6">
                                    <label>Promotional Tag Text</label>
                                    <input type="text" name="bogo_badge_text" class="form-control" 
                                        value="{{ old('bogo_badge_text', $product->bogo_badge_text ?? 'Buy any 2 for ₹1500') }}">
                                    <small class="text-muted">Product display ribbon/badge on store front.</small>
                                </div>

                                {{-- Dates --}}
                                <div class="col-md-6">
                                    <label>Offer Start Date</label>
                                    <input type="datetime-local" name="bogo_start_date" class="form-control"
                                        value="{{ old('bogo_start_date', isset($product->bogo_start_date) ? \Carbon\Carbon::parse($product->bogo_start_date)->format('Y-m-d\TH:i') : '') }}">
                                </div>

                                <div class="col-md-6">
                                    <label>Offer End Date</label>
                                    <input type="datetime-local" name="bogo_end_date" class="form-control"
                                        value="{{ old('bogo_end_date', isset($product->bogo_end_date) ? \Carbon\Carbon::parse($product->bogo_end_date)->format('Y-m-d\TH:i') : '') }}">
                                </div>

                                {{-- Terms --}}
                                <div class="col-12">
                                    <label>Terms & Conditions</label>
                                    <textarea name="bogo_terms" class="form-control" rows="2"
                                        placeholder="e.g., Offer valid on Suits only.">{{ old('bogo_terms', $product->bogo_terms ?? 'Offer valid on Suits only. Cannot combine with other offers.') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card mb-4 shadow-sm border-0 rounded-4">
                        <div class="card-body">
                            <h5 class="fw-semibold mb-3">Pricing (Single Purchase)</h5>
                            
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label>Regular Price <span class="text-danger">*</span></label>
                                    <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $product->price) }}" class="form-control" required>
                                    <small class="text-muted">Price when bought as a single item.</small>
                                </div>

                                <div class="col-md-4">
                                    <label>Sale Price</label>
                                    <input type="number" name="sale_price" id="sale_price" step="0.01" value="{{ old('sale_price', $product->sale_price) }}" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label>Stock Quantity <span class="text-danger">*</span></label>
                                    <input type="number" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 shadow-sm border-0 rounded-4">
                        <div class="card-body">
                            <h5 class="fw-semibold mb-3">Product Variations</h5>
                            
                            <div id="variationsContainer">
                                <label class="fw-semibold mb-3">Color Variations</label>
                                
                                @php
                                    $colorVariations = collect();
                                    if($product->colors) {
                                        $colorVariations = $product->colors;
                                    }
                                    $hasVariations = $colorVariations->count() > 0;
                                    $variationCount = $hasVariations ? $colorVariations->count() : 0;
                                @endphp
                                
                                @if($hasVariations)
                                    @foreach($colorVariations as $colorIndex => $color)
                                        <div class="variation-card border rounded-3 p-3 mb-3" data-color-index="{{ $colorIndex }}">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h6 class="mb-0">Variation #{{ $colorIndex + 1 }}</h6>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="removeVariation(this)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                            
                                            <input type="hidden" name="variations[{{ $colorIndex }}][id]" value="{{ $color->id }}">
                                            
                                            <div class="row g-3">
                                                <div class="col-md-3">
                                                    <label>Color</label>
                                                    <input type="color" name="variations[{{ $colorIndex }}][color_code]" class="form-control-color" value="{{ $color->code }}">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Color Name</label>
                                                    <input type="text" name="variations[{{ $colorIndex }}][color_name]" class="form-control" value="{{ $color->name }}" placeholder="e.g., Red">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Color SKU Prefix</label>
                                                    <input type="text" name="variations[{{ $colorIndex }}][color_sku]" class="form-control" value="{{ $color->sku ?? '' }}" placeholder="e.g., RED">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Add More Images</label>
                                                    <input type="file" name="variations[{{ $colorIndex }}][images][]" class="form-control variation-images" accept="image/*" multiple onchange="previewVariationImages(this, {{ $colorIndex }})">
                                                </div>
                                            </div>
                                            
                                            @php
                                                $variationImages = $color->all_images_array ?? [];
                                            @endphp
                                            @if(count($variationImages) > 0)
                                                <div class="mt-3">
                                                    <label class="fw-semibold mb-2">Current Images (Drag to reorder)</label>
                                                    <div class="existing-variation-images d-flex flex-wrap gap-2" id="existingImages_{{ $colorIndex }}">
                                                        @foreach($variationImages as $imgIndex => $image)
                                                            <div class="position-relative existing-image-item" data-image-id="{{ $imgIndex }}" style="cursor: grab;">
                                                                <img src="{{ asset($image) }}" style="width:80px; height:80px; object-fit:cover; border-radius:8px; border:2px solid #ddd;">
                                                                <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 rounded-circle"
                                                                        style="width:20px; height:20px; padding:0; font-size:10px;"
                                                                        onclick="event.stopPropagation(); markImageForDeletion(this)" title="Remove">
                                                                    <i class="fas fa-times"></i>
                                                                </button>
                                                                <input type="hidden" name="variations[{{ $colorIndex }}][existing_images][{{ $imgIndex }}][path]" value="{{ $image }}">
                                                                <input type="hidden" name="variations[{{ $colorIndex }}][existing_images][{{ $imgIndex }}][keep]" value="1" class="keep-image">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                            
                                            <div class="variation-images-preview mt-2" id="variationPreview_{{ $colorIndex }}"></div>
                                            
                                            <div class="mt-3">
                                                <label class="fw-semibold mb-2">Sizes for this Color</label>
                                                <div class="sizes-container" data-color-index="{{ $colorIndex }}">
                                                    @php
                                                        $colorSizes = collect();
                                                        if($color->sizes) {
                                                            $colorSizes = $color->sizes;
                                                        }
                                                        $hasSizes = $colorSizes->count() > 0;
                                                    @endphp
                                                    
                                                    @if($hasSizes)
                                                        @foreach($colorSizes as $sizeIndex => $size)
                                                            <div class="row g-2 mb-2 size-row">
                                                                <input type="hidden" name="variations[{{ $colorIndex }}][sizes][{{ $sizeIndex }}][id]" value="{{ $size->id }}">
                                                                <div class="col-md-2">
                                                                    <select name="variations[{{ $colorIndex }}][sizes][{{ $sizeIndex }}][size]" class="form-select">
                                                                        <option value="">Size</option>
                                                                        @foreach(['XS','S','M','L','XL','XXL','28','30','32','34','36','38','40','42','44'] as $s)
                                                                            <option value="{{ $s }}" {{ $size->size == $s ? 'selected' : '' }}>{{ $s }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <input type="number" name="variations[{{ $colorIndex }}][sizes][{{ $sizeIndex }}][price]" step="0.01" class="form-control" placeholder="Price" min="0" value="{{ $size->extra_price }}">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <input type="number" name="variations[{{ $colorIndex }}][sizes][{{ $sizeIndex }}][stock]" class="form-control" placeholder="Stock" min="0" value="{{ $size->stock }}">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="text" name="variations[{{ $colorIndex }}][sizes][{{ $sizeIndex }}][sku]" class="form-control" placeholder="SKU" value="{{ $size->sku ?? '' }}">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-check mt-2">
                                                                        <input type="checkbox" name="variations[{{ $colorIndex }}][sizes][{{ $sizeIndex }}][is_active]" class="form-check-input" {{ ($size->is_active ?? true) ? 'checked' : '' }}>
                                                                        <label class="form-check-label">Active</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <button type="button" class="btn btn-danger btn-sm" onclick="removeSizeRow(this)">
                                                                        <i class="fas fa-times"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <button type="button" class="btn btn-outline-secondary btn-sm mt-2" onclick="addSizeToVariation(this)">
                                                    <i class="fas fa-plus"></i> Add Size
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="variation-card border rounded-3 p-3 mb-3" data-color-index="0">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h6 class="mb-0">Variation #1</h6>
                                            <button type="button" class="btn btn-danger btn-sm" onclick="removeVariation(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                        
                                        <div class="row g-3">
                                            <div class="col-md-3">
                                                <label>Color</label>
                                                <input type="color" name="variations[0][color_code]" class="form-control-color" value="#000000">
                                            </div>
                                            <div class="col-md-3">
                                                <label>Color Name</label>
                                                <input type="text" name="variations[0][color_name]" class="form-control" placeholder="e.g., Red">
                                            </div>
                                            <div class="col-md-3">
                                                <label>Color SKU Prefix</label>
                                                <input type="text" name="variations[0][color_sku]" class="form-control" placeholder="e.g., RED">
                                            </div>
                                            <div class="col-md-3">
                                                <label>Images</label>
                                                <input type="file" name="variations[0][images][]" class="form-control variation-images" accept="image/*" multiple onchange="previewVariationImages(this, 0)">
                                            </div>
                                        </div>
                                        
                                        <div class="variation-images-preview mt-2" id="variationPreview_0"></div>
                                        
                                        <div class="mt-3">
                                            <label class="fw-semibold mb-2">Sizes for this Color</label>
                                            <div class="sizes-container" data-color-index="0">
                                                <div class="row g-2 mb-2 size-row">
                                                    <div class="col-md-2">
                                                        <select name="variations[0][sizes][0][size]" class="form-select">
                                                            <option value="">Size</option>
                                                            @foreach(['XS','S','M','L','XL','XXL','28','30','32','34','36','38','40','42','44'] as $s)
                                                                <option value="{{ $s }}">{{ $s }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="number" name="variations[0][sizes][0][price]" step="0.01" class="form-control" placeholder="Price" min="0">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="number" name="variations[0][sizes][0][stock]" class="form-control" placeholder="Stock" min="0">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" name="variations[0][sizes][0][sku]" class="form-control" placeholder="SKU">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-check mt-2">
                                                            <input type="checkbox" name="variations[0][sizes][0][is_active]" class="form-check-input" checked>
                                                            <label class="form-check-label">Active</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="removeSizeRow(this)">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-outline-secondary btn-sm mt-2" onclick="addSizeToVariation(this)">
                                                <i class="fas fa-plus"></i> Add Size
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            
                            <button type="button" class="btn btn-outline-primary mt-3" onclick="addVariation()">
                                <i class="fas fa-plus"></i> Add Color Variation
                            </button>
                        </div>
                    </div>
                    
                    <div class="card mb-4 shadow-sm border-0 rounded-4">
                        <div class="card-body">
                            <h5 class="fw-semibold mb-3">Main Image</h5>
                            
                            <div class="main-image-upload">
                                <input type="file" name="image" id="mainImage" class="form-control mb-3" accept="image/*" onchange="previewMainImage(this)">
                                
                                @if($product->image && file_exists(public_path($product->image)))
                                    <div class="mb-2" id="existingMainImage">
                                        <div class="position-relative d-inline-block">
                                            <img src="{{ asset($product->image) }}" width="120" class="rounded border">
                                            <button type="button" class="btn btn-danger btn-sm " onclick="removeExistingMainImage()" title="Remove Main Image">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            <small class="text-muted d-block mt-1">Current Image</small>
                                        </div>
                                        <input type="hidden" name="remove_main_image" id="removeMainImageFlag" value="0">
                                    </div>
                                @else
                                    <p class="text-muted">No image uploaded</p>
                                @endif
                                
                                <div id="mainImagePreview"></div>
                            </div>
                        </div>
                    </div>
                      
                    <div class="card mb-4 shadow-sm border-0 rounded-4">
                        <div class="card-body">
                            <h5 class="fw-semibold mb-3">Gallery Images</h5>
                            
                            <div class="gallery-upload">
                                <input type="file" name="images[]" id="galleryImages" class="form-control mb-3" accept="image/*" multiple>
                                
                                @php
                                    $productImages = is_string($product->images) ? json_decode($product->images, true) : ($product->images ?? []);
                                @endphp
                                
                                @if($productImages && count($productImages) > 0)
                                    <div class="d-flex flex-wrap gap-2 mb-3" id="existingGallery">
                                        @foreach($productImages as $imgIndex => $img)
                                            <div class="position-relative existing-gallery-item" data-gallery-id="{{ $imgIndex }}" style="cursor: grab;">
                                                <img src="{{ asset($img) }}" width="80" height="80" style="object-fit:cover;" class="rounded border">
                                                <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 rounded-circle delete-gallery-image"
                                                        style="width:20px; height:20px; padding:0; font-size:10px;"
                                                        onclick="event.stopPropagation(); removeExistingGalleryImage(this)" title="Remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                                <input type="hidden" name="existing_images[{{ $imgIndex }}][path]" value="{{ $img }}">
                                                <input type="hidden" name="existing_images[{{ $imgIndex }}][keep]" value="1" class="keep-gallery-image">
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-muted">No gallery images uploaded</p>
                                @endif
                                
                                <div id="galleryPreview" class="d-flex flex-wrap gap-2"></div>
                                <small class="text-muted">Upload new images to add to gallery. Drag images to reorder before saving.</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card mb-4 shadow-sm border-0 rounded-4">
                        <div class="card-body">
                            <h5 class="fw-semibold mb-3">SEO</h5>
                            
                            <input type="text" name="meta_title" value="{{ old('meta_title', $product->meta_title) }}" class="form-control mb-2" placeholder="Meta Title">
                            <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $product->meta_keywords) }}" class="form-control mb-2" placeholder="Keywords">
                            <textarea name="meta_description" class="form-control" rows="2" placeholder="Meta Description">{{ old('meta_description', $product->meta_description) }}</textarea>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card mb-4 shadow-sm border-0 rounded-4">
                        <div class="card-body">
                            <h5 class="fw-semibold mb-3">Product Status</h5>

                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ $product->is_active ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Active</label>
                            </div>

                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" {{ $product->is_featured ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">⭐ Featured</label>
                            </div>

                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" name="is_trending" id="is_trending" {{ $product->is_trending ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_trending">🔥 Trending</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_new_arrival" id="is_new_arrival" {{ $product->is_new_arrival ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_new_arrival">🆕 New Arrival</label>
                            </div>
                        </div>
                    </div>
<div class="card mb-4 shadow-sm border-0 rounded-4">
    <div class="card-body">
        <h5 class="fw-semibold mb-3">Product Badges</h5>

        <div class="p-3 mb-2 rounded-3 border d-flex justify-content-between align-items-center bg-light-subtle">
            <div>
                <span class="fw-bold d-block">🔥 Best Seller</span>
                <small class="text-muted d-block" style="font-size: 11px;">Show "Best Seller" ribbon on product card.</small>
            </div>
            <div class="form-check form-switch m-0">
                <input class="form-check-input" type="checkbox" name="is_best_seller" id="is_best_seller_badge" {{ ($product->is_best_seller ?? false) ? 'checked' : '' }} style="transform: scale(1.2);">
            </div>
        </div>

        <div class="p-3 rounded-3 border d-flex justify-content-between align-items-center bg-light-subtle">
            <div>
                <span class="fw-bold d-block">🆕 New Arrival</span>
                <small class="text-muted d-block" style="font-size: 11px;">Mark this product explicitly as fresh stock.</small>
            </div>
            <div class="form-check form-switch m-0">
                <input class="form-check-input" type="checkbox" name="badge_new_arrival" id="badge_new_arrival" {{ ($product->badge_new_arrival ?? false) ? 'checked' : '' }} style="transform: scale(1.2);">
            </div>
        </div>
    </div>
</div>
                    <div class="card mb-4 shadow-sm border-0 rounded-4">
                        <div class="card-body">
                            <h5 class="fw-semibold mb-3">Product Features</h5>
                            
                            <div class="mb-3">
                                <label>Size & Fit</label>
                                <textarea name="size_fit" class="form-control" rows="2" placeholder="e.g., Regular fit, Model wears size M">{{ old('size_fit', $product->size_fit ?? '') }}</textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label>Material & Care</label>
                                <textarea name="material_care" class="form-control" rows="2" placeholder="e.g., 100% Cotton, Machine wash cold">{{ old('material_care', $product->material_care ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 shadow-sm border-0 rounded-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-semibold mb-0">Shipping & Offers</h5>
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="addShippingOffer()">
                                    <i class="fas fa-plus"></i> Add
                                </button>
                            </div>
                            
                            <div id="shippingOffersContainer">
                                @php
                                    $shippingOffers = isset($product->shipping_offers) ? (is_string($product->shipping_offers) ? json_decode($product->shipping_offers, true) : $product->shipping_offers) : [];
                                    if(!is_array($shippingOffers)) { $shippingOffers = []; }
                                    if(empty($shippingOffers)) {
                                        $shippingOffers = ['🚚 Free Shipping on orders above ₹999', '🔄 Easy 15 days return & exchange', '✅ 100% Authentic Products'];
                                    }
                                @endphp
                                
                                @foreach($shippingOffers as $offer)
                                    <div class="shipping-offer-item border rounded-3 p-2 mb-2">
                                        <div class="input-group">
                                            <input type="text" name="shipping_offers[]" class="form-control" value="{{ $offer }}" placeholder="Enter offer text">
                                            <button type="button" class="btn btn-danger" onclick="removeItem(this)">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 shadow-sm border-0 rounded-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-semibold mb-0">Promotional Badges</h5>
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="addPromoBadge()">
                                    <i class="fas fa-plus"></i> Add Badge
                                </button>
                            </div>
                            
                            <div id="promoBadgesContainer">
                                @php
                                    $promoBadges = isset($product->promo_badges) ? (is_string($product->promo_badges) ? json_decode($product->promo_badges, true) : $product->promo_badges) : [];
                                    if(!is_array($promoBadges)) { $promoBadges = []; }
                                    if(empty($promoBadges)) {
                                        $promoBadges = [
                                            ['text' => '🎁 Extra 5% off on prepaid orders', 'color' => 'success'],
                                            ['text' => 'Buy 2 Get 10% off', 'color' => 'danger']
                                        ];
                                    }
                                @endphp
                                
                                @foreach($promoBadges as $index => $badge)
                                    <div class="promo-badge-item border rounded-3 p-2 mb-2">
                                        <div class="row g-2 align-items-center">
                                            <div class="col-md-8">
                                                <input type="text" name="promo_badges[{{ $index }}][text]" class="form-control" placeholder="Badge text" value="{{ $badge['text'] ?? $badge }}">
                                            </div>
                                            <div class="col-md-3">
                                                <select name="promo_badges[{{ $index }}][color]" class="form-select">
                                                    <option value="success" {{ (isset($badge['color']) && $badge['color'] == 'success') ? 'selected' : '' }}>Green</option>
                                                    <option value="primary" {{ (isset($badge['color']) && $badge['color'] == 'primary') ? 'selected' : '' }}>Blue</option>
                                                    <option value="danger" {{ (isset($badge['color']) && $badge['color'] == 'danger') ? 'selected' : '' }}>Red</option>
                                                    <option value="warning" {{ (isset($badge['color']) && $badge['color'] == 'warning') ? 'selected' : '' }}>Orange</option>
                                                    <option value="info" {{ (isset($badge['color']) && $badge['color'] == 'info') ? 'selected' : '' }}>Cyan</option>
                                                    <option value="dark" {{ (isset($badge['color']) && $badge['color'] == 'dark') ? 'selected' : '' }}>Black</option>
                                                    <option value="secondary" {{ (isset($badge['color']) && $badge['color'] == 'secondary') ? 'selected' : '' }}>Gray</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" class="btn btn-danger btn-sm" onclick="removeItem(this)">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 shadow-sm border-0 rounded-4">
                        <div class="card-body">
                            <h6 class="text-muted mb-2">Created</h6>
                            <p>{{ $product->created_at->format('d M Y, h:i A') }}</p>
                            
                            <h6 class="text-muted mb-2">Last Updated</h6>
                            <p>{{ $product->updated_at->format('d M Y, h:i A') }}</p>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-body text-end">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save"></i> Update Product
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
    
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script>
        // Slug auto generate
        document.getElementById('name').addEventListener('input', function () {
            let slug = this.value.toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-+|-+$/g, '');
            document.getElementById('slug').value = slug;
        });

        // ========== MAIN IMAGE FUNCTIONS ==========
        function previewMainImage(input) {
            let preview = document.getElementById('mainImagePreview');
            preview.innerHTML = '';

            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    preview.innerHTML = `
                        <div class="position-relative d-inline-block mt-2">
                            <img src="${e.target.result}" 
                                style="width:120px; height:120px; object-fit:cover; border-radius:10px; border:2px solid #28a745;">
                            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 rounded-circle" 
                                onclick="removeNewMainImage()" title="Remove New Image">
                                <i class="fas fa-times"></i>
                            </button>
                            <small class="text-success d-block mt-1">New Image Preview</small>
                        </div>`;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeNewMainImage() {
            document.getElementById('mainImage').value = '';
            document.getElementById('mainImagePreview').innerHTML = '';
        }

        function removeExistingMainImage() {
            document.getElementById('existingMainImage').style.display = 'none';
            document.getElementById('removeMainImageFlag').value = '1';
        }

        // ========== GALLERY IMAGES FUNCTIONS ==========
        let galleryFilesArray = []; // Store new gallery files
        let existingGalleryOrder = []; // Track existing gallery image order

        document.getElementById('galleryImages').addEventListener('change', function(e) {
            handleNewGalleryFiles(this.files);
            this.value = '';
        });

        function handleNewGalleryFiles(files) {
            Array.from(files).forEach(file => {
                let reader = new FileReader();
                reader.onload = function (e) {
                    galleryFilesArray.push({
                        file: file,
                        dataUrl: e.target.result,
                        id: 'gallery_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9)
                    });
                    renderGalleryPreviews();
                };
                reader.readAsDataURL(file);
            });
        }

        function renderGalleryPreviews() {
            let preview = document.getElementById('galleryPreview');
            preview.innerHTML = '';

            galleryFilesArray.forEach((item, index) => {
                let div = document.createElement('div');
                div.className = 'position-relative gallery-item';
                div.setAttribute('data-id', item.id);
                div.setAttribute('data-index', index);
                div.style.cursor = 'grab';
                div.innerHTML = `
                    <img src="${item.dataUrl}" 
                        style="width:80px; height:80px; object-fit:cover; border-radius:8px; border:2px solid #28a745;">
                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 rounded-circle delete-gallery-image"
                        style="width:20px; height:20px; padding:0; font-size:10px;" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                div.querySelector('.delete-gallery-image').addEventListener('click', function(e) {
                    e.stopPropagation();
                    removeNewGalleryImage(item.id);
                });
                preview.appendChild(div);
            });

            initGallerySortable();
        }

        function initGallerySortable() {
            let preview = document.getElementById('galleryPreview');
            if (preview.sortableInstance) {
                preview.sortableInstance.destroy();
            }
            if (galleryFilesArray.length > 0) {
                preview.sortableInstance = new Sortable(preview, {
                    animation: 150,
                    ghostClass: 'sortable-ghost',
                    onEnd: function(evt) {
                        let newArray = [];
                        let items = preview.querySelectorAll('.gallery-item');
                        items.forEach(item => {
                            let id = item.getAttribute('data-id');
                            let found = galleryFilesArray.find(f => f.id === id);
                            if (found) newArray.push(found);
                        });
                        galleryFilesArray = newArray;
                    }
                });
            }
        }

        function removeNewGalleryImage(imageId) {
            galleryFilesArray = galleryFilesArray.filter(item => item.id !== imageId);
            renderGalleryPreviews();
        }

        function removeExistingGalleryImage(button) {
            let galleryItem = button.closest('.existing-gallery-item');
            let keepInput = galleryItem.querySelector('.keep-gallery-image');
            keepInput.value = '0';
            galleryItem.style.display = 'none';
        }

        // Initialize existing gallery sortable
        function initExistingGallerySortable() {
            let existingGallery = document.getElementById('existingGallery');
            if (existingGallery && existingGallery.children.length > 0) {
                new Sortable(existingGallery, {
                    animation: 150,
                    ghostClass: 'sortable-ghost',
                    onEnd: function(evt) {
                        updateExistingGalleryOrder();
                    }
                });
            }
        }

        function updateExistingGalleryOrder() {
            let existingGallery = document.getElementById('existingGallery');
            if (!existingGallery) return;
            
            let items = existingGallery.querySelectorAll('.existing-gallery-item');
            items.forEach((item, index) => {
                let pathInput = item.querySelector('input[name*="[path]"]');
                let keepInput = item.querySelector('input[name*="[keep]"]');
                if (pathInput && keepInput) {
                    // Update the name attribute to reflect new order
                    pathInput.name = `existing_images[${index}][path]`;
                    keepInput.name = `existing_images[${index}][keep]`;
                }
            });
        }

        // Form submission handler for gallery images
        document.getElementById('productForm').addEventListener('submit', function(e) {
            // Update existing gallery order before submission
            updateExistingGalleryOrder();
            
            // Remove any previously appended hidden gallery file inputs
            document.querySelectorAll('.gallery-hidden-input').forEach(el => el.remove());
            
            // Create hidden file inputs for each new gallery image in the correct order
            galleryFilesArray.forEach((item, index) => {
                let dt = new DataTransfer();
                dt.items.add(item.file);
                
                let input = document.createElement('input');
                input.type = 'file';
                input.name = 'images[]';
                input.className = 'gallery-hidden-input';
                input.style.display = 'none';
                input.files = dt.files;
                this.appendChild(input);
            });
        });

        // ========== VARIATION IMAGES FUNCTIONS ==========
        let variationImagesMap = {};

        function previewVariationImages(input, colorIndex) {
            if (!variationImagesMap[colorIndex]) {
                variationImagesMap[colorIndex] = [];
            }

            if (input.files) {
                Array.from(input.files).forEach(file => {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        variationImagesMap[colorIndex].push({
                            file: file,
                            dataUrl: e.target.result,
                            id: 'var_' + colorIndex + '_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9)
                        });
                        renderVariationPreviews(colorIndex);
                    };
                    reader.readAsDataURL(file);
                });
                input.value = '';
            }
        }

        function renderVariationPreviews(colorIndex) {
            let preview = document.getElementById('variationPreview_' + colorIndex);
            if (!preview) return;
            preview.innerHTML = '';

            let images = variationImagesMap[colorIndex] || [];
            images.forEach((item, index) => {
                let div = document.createElement('div');
                div.className = 'position-relative d-inline-block me-2 mb-2 variation-image-item';
                div.setAttribute('data-id', item.id);
                div.style.cursor = 'grab';
                div.innerHTML = `
                    <img src="${item.dataUrl}" 
                        style="width:80px; height:80px; object-fit:cover; border-radius:8px; border:2px solid #28a745;">
                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 rounded-circle" 
                        style="width:20px; height:20px; padding:0; font-size:10px;"
                        title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                div.querySelector('button').addEventListener('click', function(e) {
                    e.stopPropagation();
                    removeNewVariationImage(colorIndex, item.id);
                });
                preview.appendChild(div);
            });

            initVariationSortable(colorIndex);
        }

        function initVariationSortable(colorIndex) {
            let preview = document.getElementById('variationPreview_' + colorIndex);
            if (!preview) return;
            
            if (preview.sortableInstance) {
                preview.sortableInstance.destroy();
            }
            
            let images = variationImagesMap[colorIndex] || [];
            if (images.length > 0) {
                preview.sortableInstance = new Sortable(preview, {
                    animation: 150,
                    ghostClass: 'sortable-ghost',
                    onEnd: function(evt) {
                        let newArray = [];
                        let items = preview.querySelectorAll('.variation-image-item');
                        items.forEach(item => {
                            let id = item.getAttribute('data-id');
                            let found = (variationImagesMap[colorIndex] || []).find(f => f.id === id);
                            if (found) newArray.push(found);
                        });
                        variationImagesMap[colorIndex] = newArray;
                    }
                });
            }
        }

        function removeNewVariationImage(colorIndex, imageId) {
            if (variationImagesMap[colorIndex]) {
                variationImagesMap[colorIndex] = variationImagesMap[colorIndex].filter(item => item.id !== imageId);
                renderVariationPreviews(colorIndex);
            }
        }

        function markImageForDeletion(button) {
            let imageItem = button.closest('.existing-image-item');
            let keepInput = imageItem.querySelector('.keep-image');
            keepInput.value = '0';
            imageItem.style.display = 'none';
        }

        // Initialize existing variation images sortable
        function initExistingVariationSortable() {
            document.querySelectorAll('.existing-variation-images').forEach(container => {
                if (container.children.length > 0) {
                    new Sortable(container, {
                        animation: 150,
                        ghostClass: 'sortable-ghost',
                        onEnd: function(evt) {
                            updateExistingVariationOrder(container);
                        }
                    });
                }
            });
        }

        function updateExistingVariationOrder(container) {
            let items = container.querySelectorAll('.existing-image-item');
            let colorMatch = container.id.match(/existingImages_(\d+)/);
            if (!colorMatch) return;
            
            let colorIndex = colorMatch[1];
            items.forEach((item, index) => {
                let pathInput = item.querySelector('input[name*="[path]"]');
                let keepInput = item.querySelector('input[name*="[keep]"]');
                if (pathInput && keepInput) {
                    pathInput.name = `variations[${colorIndex}][existing_images][${index}][path]`;
                    keepInput.name = `variations[${colorIndex}][existing_images][${index}][keep]`;
                }
            });
        }

        // Override form submission to append variation files in correct order
        document.getElementById('productForm').addEventListener('submit', function(e) {
            // Update all existing variation orders
            document.querySelectorAll('.existing-variation-images').forEach(container => {
                updateExistingVariationOrder(container);
            });
            
            // Remove any previously appended hidden variation file inputs
            document.querySelectorAll('.variation-hidden-input').forEach(el => el.remove());

            // For each color index, append hidden file inputs
            Object.keys(variationImagesMap).forEach(colorIndex => {
                let images = variationImagesMap[colorIndex] || [];
                images.forEach((item, imgIndex) => {
                    let dt = new DataTransfer();
                    dt.items.add(item.file);
                    
                    let input = document.createElement('input');
                    input.type = 'file';
                    input.name = `variations[${colorIndex}][images][]`;
                    input.className = 'variation-hidden-input';
                    input.style.display = 'none';
                    input.files = dt.files;
                    this.appendChild(input);
                });
            });
        });

        // ========== VARIATION MANAGEMENT ==========
        let colorIndex = {{ $variationCount > 0 ? $variationCount : 1 }};
        
        function getSizeOptionsHtml() {
            return `
                <option value="">Size</option>
                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
                <option value="28">28</option>
                <option value="30">30</option>
                <option value="32">32</option>
                <option value="34">34</option>
                <option value="36">36</option>
                <option value="38">38</option>
                <option value="40">40</option>
                <option value="42">42</option>
                <option value="44">44</option>
            `;
        }

        function addVariation() {
            let container = document.getElementById('variationsContainer');
            if (!variationImagesMap[colorIndex]) {
                variationImagesMap[colorIndex] = [];
            }
            
            let html = `
                <div class="variation-card border rounded-3 p-3 mb-3" data-color-index="${colorIndex}">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0">Variation #${colorIndex + 1}</h6>
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeVariation(this)">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label>Color</label>
                            <input type="color" name="variations[${colorIndex}][color_code]" class="form-control-color" value="#000000">
                        </div>
                        <div class="col-md-3">
                            <label>Color Name</label>
                            <input type="text" name="variations[${colorIndex}][color_name]" class="form-control" placeholder="e.g., Red">
                        </div>
                        <div class="col-md-3">
                            <label>Color SKU Prefix</label>
                            <input type="text" name="variations[${colorIndex}][color_sku]" class="form-control" placeholder="e.g., RED">
                        </div>
                        <div class="col-md-3">
                            <label>Images</label>
                            <input type="file" name="variations[${colorIndex}][images][]" class="form-control variation-images" accept="image/*" multiple onchange="previewVariationImages(this, ${colorIndex})">
                        </div>
                    </div>
                    
                    <div class="variation-images-preview mt-2" id="variationPreview_${colorIndex}"></div>
                    
                    <div class="mt-3">
                        <label class="fw-semibold mb-2">Sizes for this Color</label>
                        <div class="sizes-container" data-color-index="${colorIndex}">
                            <div class="row g-2 mb-2 size-row">
                                <div class="col-md-2">
                                    <select name="variations[${colorIndex}][sizes][0][size]" class="form-select">
                                        ${getSizeOptionsHtml()}
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" name="variations[${colorIndex}][sizes][0][price]" step="0.01" class="form-control" placeholder="Price" min="0">
                                </div>
                                <div class="col-md-2">
                                    <input type="number" name="variations[${colorIndex}][sizes][0][stock]" class="form-control" placeholder="Stock" min="0">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="variations[${colorIndex}][sizes][0][sku]" class="form-control" placeholder="SKU">
                                </div>
                                <div class="col-md-2">
                                    <div class="form-check mt-2">
                                        <input type="checkbox" name="variations[${colorIndex}][sizes][0][is_active]" class="form-check-input" checked>
                                        <label class="form-check-label">Active</label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="removeSizeRow(this)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-secondary btn-sm mt-2" onclick="addSizeToVariation(this)">
                            <i class="fas fa-plus"></i> Add Size
                        </button>
                    </div>
                </div>`;
            
            container.insertAdjacentHTML('beforeend', html);
            colorIndex++;
        }

        function removeVariation(button) {
            if (document.querySelectorAll('.variation-card').length > 1) {
                let card = button.closest('.variation-card');
                let idx = card.getAttribute('data-color-index');
                if (idx && variationImagesMap[idx]) {
                    delete variationImagesMap[idx];
                }
                card.remove();
            } else {
                alert('At least one variation is required!');
            }
        }

        function addSizeToVariation(button) {
            let sizesContainer = button.previousElementSibling;
            let colorIdx = sizesContainer.dataset.colorIndex;
            
            let sizeRows = sizesContainer.querySelectorAll('.size-row');
            let maxIndex = -1;
            
            sizeRows.forEach(row => {
                let selectElem = row.querySelector('select');
                if (selectElem) {
                    let match = selectElem.name.match(/sizes\]\[(\d+)\]/);
                    if (match && match[1]) {
                        let idx = parseInt(match[1]);
                        if (idx > maxIndex) maxIndex = idx;
                    }
                }
            });
            
            let nextSizeIndex = maxIndex + 1;
            
            let html = `
                <div class="row g-2 mb-2 size-row">
                    <div class="col-md-2">
                        <select name="variations[${colorIdx}][sizes][${nextSizeIndex}][size]" class="form-select">
                            ${getSizeOptionsHtml()}
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="variations[${colorIdx}][sizes][${nextSizeIndex}][price]" step="0.01" class="form-control" placeholder="Price" min="0">
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="variations[${colorIdx}][sizes][${nextSizeIndex}][stock]" class="form-control" placeholder="Stock" min="0">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="variations[${colorIdx}][sizes][${nextSizeIndex}][sku]" class="form-control" placeholder="SKU">
                    </div>
                    <div class="col-md-2">
                        <div class="form-check mt-2">
                            <input type="checkbox" name="variations[${colorIdx}][sizes][${nextSizeIndex}][is_active]" class="form-check-input" checked>
                            <label class="form-check-label">Active</label>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeSizeRow(this)">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>`;
            
            sizesContainer.insertAdjacentHTML('beforeend', html);
        }

        function removeSizeRow(button) {
            let sizesContainer = button.closest('.sizes-container');
            if (sizesContainer.querySelectorAll('.size-row').length > 1) {
                button.closest('.size-row').remove();
            } else {
                alert('At least one size per variation is required!');
            }
        }

        // ========== DYNAMIC SHIPPING OFFERS ==========
        function addShippingOffer() {
            let container = document.getElementById('shippingOffersContainer');
            let html = `
                <div class="shipping-offer-item border rounded-3 p-2 mb-2">
                    <div class="input-group">
                        <input type="text" name="shipping_offers[]" class="form-control" placeholder="Enter offer text">
                        <button type="button" class="btn btn-danger" onclick="removeItem(this)">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>`;
            container.insertAdjacentHTML('beforeend', html);
        }

        // ========== DYNAMIC PROMO BADGES ==========
        let promoBadgeIndex = {{ count($promoBadges) }};

        function addPromoBadge() {
            let container = document.getElementById('promoBadgesContainer');
            let html = `
                <div class="promo-badge-item border rounded-3 p-2 mb-2">
                    <div class="row g-2 align-items-center">
                        <div class="col-md-8">
                            <input type="text" name="promo_badges[${promoBadgeIndex}][text]" class="form-control" placeholder="Badge text">
                        </div>
                        <div class="col-md-3">
                            <select name="promo_badges[${promoBadgeIndex}][color]" class="form-select">
                                <option value="success">Green</option>
                                <option value="primary">Blue</option>
                                <option value="danger">Red</option>
                                <option value="warning">Orange</option>
                                <option value="info">Cyan</option>
                                <option value="dark">Black</option>
                                <option value="secondary">Gray</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger btn-sm" onclick="removeItem(this)">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>`;
            container.insertAdjacentHTML('beforeend', html);
            promoBadgeIndex++;
        }

        function removeItem(button) {
            let item = button.closest('.shipping-offer-item') || button.closest('.promo-badge-item');
            if (item) { item.remove(); }
        }

        // ========== BOGO LOGIC FOR EDIT PAGE ==========
        document.addEventListener('DOMContentLoaded', function() {
            const bogoEnabled = document.getElementById('bogo_enabled');
            const categorySelect = document.getElementById('category_id');
            const bogoCard = document.getElementById('bogoOfferCard');
            const priceInput = document.getElementById('price');
            const salePriceInput = document.getElementById('sale_price');
            
            function toggleBogoPanel() {
                let selectedText = categorySelect.options[categorySelect.selectedIndex]?.text.toLowerCase() || '';
                if (selectedText.includes('suit')) {
                    bogoCard.style.display = 'block';
                } else {
                    bogoCard.style.display = 'none';
                    if (bogoEnabled) bogoEnabled.checked = false;
                }
            }
            
            if (categorySelect && bogoCard) {
                categorySelect.addEventListener('change', toggleBogoPanel);
                toggleBogoPanel();
            }

            if (bogoEnabled && priceInput) {
                bogoEnabled.addEventListener('change', function() {
                    if (this.checked) {
                        document.getElementById('bogo_price').value = '1500';
                        priceInput.value = '1500';
                        if (salePriceInput) salePriceInput.value = '';
                        
                        alert('BOGO Pool Enabled! ✅\n\nSingle Item Base Price synchronized to offer value (₹1500).');
                    } else {
                        document.getElementById('bogo_price').value = '';
                        priceInput.value = '{{ $product->price }}';
                    }
                });
            }

            // Initialize all sortable elements
            initExistingGallerySortable();
            initExistingVariationSortable();
            
            // Re-initialize existing variation buttons
            document.querySelectorAll('.sizes-container').forEach(container => {
                let button = container.closest('.mt-3')?.querySelector('button[onclick*="addSizeToVariation"]');
                if (button) {
                    button.setAttribute('onclick', '');
                    button.addEventListener('click', function() {
                        addSizeToVariation(this);
                    });
                }
            });
        });
    </script>
@endpush

@push('styles')
    <style>
        .form-control-color {
            cursor: pointer;
            height: 38px;
            padding: 5px;
        }
        .variation-card {
            background-color: #f8f9fa;
            transition: all 0.3s ease;
        }
        .variation-card:hover {
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .size-row {
            background-color: #fff;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #e9ecef;
        }
        .sizes-container {
            max-height: 400px;
            overflow-y: auto;
        }
        .variation-images-preview,
        .existing-variation-images {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            min-height: 40px;
        }
        .existing-image-item {
            transition: opacity 0.3s ease;
        }
        .sortable-ghost {
            opacity: 0.4;
            border: 2px dashed #007bff !important;
            border-radius: 8px;
        }
        .gallery-item {
            transition: opacity 0.2s ease;
        }
        .variation-image-item {
            transition: opacity 0.2s ease;
        }
        .existing-gallery-item {
            transition: opacity 0.2s ease;
        }
    </style>
@endpush