@extends('admin.layout.app')

@section('title', 'Create Product')

@section('content')
    <div class="container-fluid px-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold">Create Product</h3>
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">← Back</a>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" id="productForm">
            @csrf

            <div class="row">
                <div class="col-lg-8">

                    <div class="card mb-4 shadow-sm border-0 rounded-4">
                        <div class="card-body">
                            <h5 class="fw-semibold mb-3">Basic Info</h5>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>

                                <div class="col-md-6">
                                    <label>Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <label>Category <span class="text-danger">*</span></label>
                                    <select name="category_id" id="category_id" class="form-select" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label>Main SKU</label>
                                    <input type="text" name="sku" class="form-control">
                                </div>

                                <div class="col-12">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="4"></textarea>
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
                                {{-- Enable BOGO for this Product --}}
                                <div class="col-12">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="bogo_enabled" id="bogo_enabled" value="1" 
                                            {{ old('bogo_enabled') ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold" for="bogo_enabled">
                                            Include this product in "₹1500 for 2 Suits" BOGO Pool
                                        </label>
                                    </div>
                                    <small class="text-muted">Turn this ON to allow this suit to mix-and-match with other suits under the ₹1500 offer in the cart.</small>
                                </div>

                                {{-- Hidden default fields for global system query --}}
                                <input type="hidden" name="bogo_type" value="any_product">
                                <input type="hidden" name="bogo_buy_quantity" value="1">
                                <input type="hidden" name="bogo_free_quantity" value="1">

                                {{-- BOGO Price Override --}}
                                <div class="col-md-6">
                                    <label>Offer Group Price (₹) <span class="text-danger">*</span></label>
                                    <input type="number" name="bogo_price" id="bogo_price" class="form-control" value="1500" min="0" step="0.01">
                                    <small class="text-muted">System will auto-calculate cart total to this price when any 2 eligible items are mixed.</small>
                                </div>

                                {{-- BOGO Badge text --}}
                                <div class="col-md-6">
                                    <label>Promotional Tag Text</label>
                                    <input type="text" name="bogo_badge_text" class="form-control" value="Buy any 2 for ₹1500">
                                    <small class="text-muted">Product card/ribbon display text on website storefront.</small>
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
                                    <input type="number" name="price" id="price" step="0.01" class="form-control" required>
                                    <small class="text-muted">Price when bought as a single item.</small>
                                </div>

                                <div class="col-md-4">
                                    <label>Sale Price</label>
                                    <input type="number" name="sale_price" step="0.01" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <label>Stock Quantity <span class="text-danger">*</span></label>
                                    <input type="number" name="stock_quantity" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 shadow-sm border-0 rounded-4">
                        <div class="card-body">
                            <h5 class="fw-semibold mb-3">Product Variations</h5>
                            
                            <div id="variationsContainer">
                                <label class="fw-semibold mb-3">Color Variations</label>
                                
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
                                            <label>Color Images</label>
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
                                <input type="file" name="image" id="mainImage" class="form-control" accept="image/*" onchange="previewMainImage(this)">
                                <div id="mainImagePreview" class="mt-3"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 shadow-sm border-0 rounded-4">
                        <div class="card-body">
                            <h5 class="fw-semibold mb-3">Gallery Images</h5>
                            <div class="gallery-upload">
                                <input type="file" name="images[]" id="galleryImages" class="form-control mb-3" accept="image/*" multiple>
                                <div id="galleryPreview" class="d-flex flex-wrap gap-2"></div>
                                <small class="text-muted">You can select multiple images at once. Drag to reorder before upload.</small>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 shadow-sm border-0 rounded-4">
                        <div class="card-body">
                            <h5 class="fw-semibold mb-3">SEO</h5>
                            <input type="text" name="meta_title" class="form-control mb-2" placeholder="Meta Title">
                            <input type="text" name="meta_keywords" class="form-control mb-2" placeholder="Keywords">
                            <textarea name="meta_description" class="form-control" rows="2" placeholder="Meta Description"></textarea>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="card mb-4 shadow-sm border-0 rounded-4">
                        <div class="card-body">
                            <h5 class="fw-semibold mb-3">Product Status</h5>

                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" checked>
                                <label class="form-check-label" for="is_active">Active</label>
                            </div>

                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured">
                                <label class="form-check-label" for="is_featured">⭐ Featured</label>
                            </div>

                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" name="is_trending" id="is_trending">
                                <label class="form-check-label" for="is_trending">🔥 Trending</label>
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_new_arrival" id="is_new_arrival">
                                <label class="form-check-label" for="is_new_arrival">🆕 New Arrival</label>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 shadow-sm border-0 rounded-4">
    <div class="card-body">
        <h5 class="fw-semibold mb-3">Product Highlights</h5>

        <div class="p-3 mb-2 rounded-3 border d-flex justify-content-between align-items-center bg-light-subtle">
            <div>
                <span class="fw-bold d-block">🔥 Best Seller</span>
                <small class="text-muted d-block" style="font-size: 11px;">Show "Best Seller" ribbon on product card.</small>
            </div>
            <div class="form-check form-switch m-0">
                <input class="form-check-input" type="checkbox" name="is_best_seller" id="is_best_seller" style="transform: scale(1.2);">
            </div>
        </div>

        <div class="p-3 rounded-3 border d-flex justify-content-between align-items-center bg-light-subtle">
            <div>
                <span class="fw-bold d-block">🆕 New Arrival</span>
                <small class="text-muted d-block" style="font-size: 11px;">Mark this product as a fresh arrival.</small>
            </div>
            <div class="form-check form-switch m-0">
                <input class="form-check-input" type="checkbox" name="is_new_arrival" id="is_new_arrival" style="transform: scale(1.2);">
            </div>
        </div>
    </div>
</div>
                    
                    <div class="card mb-4 shadow-sm border-0 rounded-4">
                        <div class="card-body">
                            <h5 class="fw-semibold mb-3">Product Features</h5>
                            
                            <div class="mb-3">
                                <label>Size & Fit</label>
                                <textarea name="size_fit" class="form-control" rows="2" placeholder="e.g., Regular fit, Model wears size M"></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label>Material & Care</label>
                                <textarea name="material_care" class="form-control" rows="2" placeholder="e.g., 100% Cotton, Machine wash cold"></textarea>
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
                                <div class="shipping-offer-item border rounded-3 p-2 mb-2">
                                    <div class="input-group">
                                        <input type="text" name="shipping_offers[]" class="form-control" value="🚚 Free Shipping on orders above ₹999">
                                        <button type="button" class="btn btn-danger" onclick="removeItem(this)">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="shipping-offer-item border rounded-3 p-2 mb-2">
                                    <div class="input-group">
                                        <input type="text" name="shipping_offers[]" class="form-control" value="🔄 Easy 15 days return & exchange">
                                        <button type="button" class="btn btn-danger" onclick="removeItem(this)">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="shipping-offer-item border rounded-3 p-2 mb-2">
                                    <div class="input-group">
                                        <input type="text" name="shipping_offers[]" class="form-control" value="✅ 100% Authentic Products">
                                        <button type="button" class="btn btn-danger" onclick="removeItem(this)">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
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
                                <div class="promo-badge-item border rounded-3 p-2 mb-2">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-md-8">
                                            <input type="text" name="promo_badges[0][text]" class="form-control" placeholder="Badge text" value="🎁 Extra 5% off on prepaid orders">
                                        </div>
                                        <div class="col-md-3">
                                            <select name="promo_badges[0][color]" class="form-select">
                                                <option value="success" selected>Green</option>
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
                                </div>
                                
                                <div class="promo-badge-item border rounded-3 p-2 mb-2">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-md-8">
                                            <input type="text" name="promo_badges[1][text]" class="form-control" placeholder="Badge text" value="Buy 2 Get 10% off">
                                        </div>
                                        <div class="col-md-3">
                                            <select name="promo_badges[1][color]" class="form-select">
                                                <option value="success">Green</option>
                                                <option value="primary">Blue</option>
                                                <option value="danger" selected>Red</option>
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-body text-end">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save"></i> Save Product
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </form>

    </div>
@endsection

@push('scripts')
    <!-- SortableJS CDN for drag-and-drop reordering -->
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
                        <div class="position-relative d-inline-block">
                            <img src="${e.target.result}" 
                                style="width:150px; height:150px; object-fit:cover; border-radius:10px; border:2px solid #ddd;">
                            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 rounded-circle" 
                                onclick="removeMainImage()" title="Remove Image">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>`;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeMainImage() {
            document.getElementById('mainImage').value = '';
            document.getElementById('mainImagePreview').innerHTML = '';
        }

        // ========== GALLERY IMAGES FUNCTIONS (WITH DRAG & DROP SORTING) ==========
        let galleryFilesArray = []; // Store File objects with their preview data

        document.getElementById('galleryImages').addEventListener('change', function(e) {
            handleGalleryFiles(this.files);
            this.value = ''; // Reset input to allow re-selecting the same files if needed
        });

        function handleGalleryFiles(files) {
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
                    removeGalleryImage(item.id);
                });
                preview.appendChild(div);
            });

            // Initialize SortableJS for drag-and-drop reordering
            initGallerySortable();
        }

        function initGallerySortable() {
            let preview = document.getElementById('galleryPreview');
            if (preview.sortableInstance) {
                preview.sortableInstance.destroy();
            }
            preview.sortableInstance = new Sortable(preview, {
                animation: 150,
                ghostClass: 'sortable-ghost',
                onEnd: function(evt) {
                    // Reorder galleryFilesArray based on new DOM order
                    let newArray = [];
                    let items = preview.querySelectorAll('.gallery-item');
                    items.forEach(item => {
                        let id = item.getAttribute('data-id');
                        let found = galleryFilesArray.find(f => f.id === id);
                        if (found) newArray.push(found);
                    });
                    galleryFilesArray = newArray;
                    // Update data-index attributes
                    renderGalleryPreviews();
                }
            });
        }

        function removeGalleryImage(imageId) {
            galleryFilesArray = galleryFilesArray.filter(item => item.id !== imageId);
            renderGalleryPreviews();
        }

        // Override form submission to append gallery files in correct order
        document.getElementById('productForm').addEventListener('submit', function(e) {
            // Remove any previously appended hidden gallery file inputs
            document.querySelectorAll('.gallery-hidden-input').forEach(el => el.remove());
            
            // Create hidden file inputs for each gallery image in the correct order
            galleryFilesArray.forEach((item, index) => {
                // Create a DataTransfer to hold the file
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

        // ========== VARIATION IMAGES FUNCTIONS (WITH DRAG & DROP SORTING) ==========
        // Store variation image files per color index
        let variationImagesMap = {}; // Key: colorIndex, Value: array of {file, dataUrl, id}

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
                input.value = ''; // Reset input
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
                div.setAttribute('data-index', index);
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
                    removeVariationImage(colorIndex, item.id);
                });
                preview.appendChild(div);
            });

            // Initialize Sortable for this variation preview
            initVariationSortable(colorIndex);
        }

        function initVariationSortable(colorIndex) {
            let preview = document.getElementById('variationPreview_' + colorIndex);
            if (!preview) return;
            
            if (preview.sortableInstance) {
                preview.sortableInstance.destroy();
            }
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
                    renderVariationPreviews(colorIndex);
                }
            });
        }

        function removeVariationImage(colorIndex, imageId) {
            if (variationImagesMap[colorIndex]) {
                variationImagesMap[colorIndex] = variationImagesMap[colorIndex].filter(item => item.id !== imageId);
                renderVariationPreviews(colorIndex);
            }
        }

        // Override form submission to append variation files in correct order
        document.getElementById('productForm').addEventListener('submit', function(e) {
            // --- Gallery handling already done above ---

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
        let colorIndex = 1;
        
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
            // Initialize variationImagesMap for new color index
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
                            <label>Color Images</label>
                            <input type="file" name="variations[${colorIndex}][images][]" class="form-control variation-images" 
                                accept="image/*" multiple onchange="previewVariationImages(this, ${colorIndex})">
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
        let promoBadgeIndex = 2;
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

        // ========== BOGO INTERACTION LOGIC ==========
        document.addEventListener('DOMContentLoaded', function() {
            const bogoEnabled = document.getElementById('bogo_enabled');
            const categorySelect = document.getElementById('category_id');
            const bogoCard = document.getElementById('bogoOfferCard');

            // Category wise panel toggle logic
            function toggleBogoPanel() {
                let selectedText = categorySelect.options[categorySelect.selectedIndex]?.text.toLowerCase() || '';
                if (selectedText.includes('suit')) {
                    bogoCard.style.display = 'block';
                } else {
                    bogoCard.style.display = 'none';
                    if(bogoEnabled) bogoEnabled.checked = false;
                }
            }

            if(categorySelect && bogoCard) {
                categorySelect.addEventListener('change', toggleBogoPanel);
                toggleBogoPanel(); // Run on initial load
            }
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
        .variation-images-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            min-height: 40px;
        }
        .gallery-item {
            transition: opacity 0.2s ease;
        }
        .sortable-ghost {
            opacity: 0.4;
            border: 2px dashed #007bff !important;
            border-radius: 8px;
        }
        .variation-image-item {
            transition: opacity 0.2s ease;
        }
    </style>
@endpush