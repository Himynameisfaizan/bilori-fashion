<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <title>{{ $product->name }} | Beroli</title>
    <meta name="description" content="{{ $product->short_description ?? $product->name }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />

    <link rel="stylesheet" href="{{ asset('css/plugins/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/plugins/glightbox.min.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />

    <style>
        .product__banner{background:linear-gradient(135deg,#667eea,#764ba2);padding:60px 0;margin-bottom:50px}
        .product__image--wrapper{background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 5px 25px rgba(0,0,0,0.08);position:sticky;top:30px}
        .product__main--image{width:100%;height:auto;transition:transform 0.3s ease}
        .product__main--image:hover{transform:scale(1.02)}
        .product__thumbnails{display:flex;gap:10px;margin-top:15px;padding:0 10px 10px;flex-wrap:wrap}
        .product__thumb{width:65px;height:65px;min-width:65px;border-radius:8px;overflow:hidden;cursor:pointer;border:2px solid transparent;transition:all 0.3s ease}
        .product__thumb.active,.product__thumb:hover{border-color:#ff6b6b}
        .product__thumb img{width:100%;height:100%;object-fit:cover}
        .product__details{padding:20px 0}
        .product__title{font-size:28px;font-weight:700;margin-bottom:15px;color:#333}
        .product__rating{display:flex;align-items:center;gap:10px;margin-bottom:20px}
        .stars{color:#ffc107;font-size:18px}
        .product__price{margin-bottom:20px}
        .current__price{font-size:28px;font-weight:700;color:#ff6b6b}
        .old__price{font-size:18px;color:#999;text-decoration:line-through;margin-left:12px}
        .discount__badge{background:#ff6b6b;color:white;padding:5px 12px;border-radius:20px;font-size:13px;font-weight:600;margin-left:12px}
        .product__short__desc{color:#666;line-height:1.6;margin-bottom:20px;padding-bottom:15px;border-bottom:1px solid #f0f0f0}
        .product__meta{margin-bottom:20px}
        .meta__item{display:flex;margin-bottom:8px}
        .meta__label{width:90px;font-weight:600;color:#333}
        .meta__value{color:#666}
        .product__variations{margin-bottom:25px}
        .variation__title{font-weight:600;margin-bottom:10px;color:#333;font-size:14px}
        .variation__title strong{color:#ff6b6b}
        .color__options{display:flex;gap:12px;margin-bottom:20px;flex-wrap:wrap}
        .color__option{width:38px;height:38px;border-radius:50%; cursor: pointer !important;border:3px solid #ddd;transition:all 0.3s ease;position:relative;box-shadow:0 2px 5px rgba(0,0,0,0.1)}
        .color__option:hover:not(.disabled){border-color:#ff6b6b;transform:scale(1.2);box-shadow:0 5px 15px rgba(255,107,107,0.3)}
        .color__option.active{border-color:#ff6b6b;transform:scale(1.2);box-shadow:0 5px 15px rgba(255,107,107,0.5)}
        .color__option.disabled{opacity:0.5;cursor:pointer;pointer-events:auto}
        .size__options{display:flex;gap:12px;flex-wrap:wrap}
        .size__option{padding:8px 20px;border:2px solid #e0e0e0;border-radius:30px;cursor:pointer;transition:all 0.3s ease;font-size:14px;background:#fff;text-align:center}
        .size__option:hover:not(.disabled){background:#ff6b6b;color:white;border-color:#ff6b6b}
        .size__option.active{background:#ff6b6b;color:white;border-color:#ff6b6b}
        .size__option.disabled{opacity:0.4;cursor:not-allowed;pointer-events:none;text-decoration:line-through}
        .product__quantity{margin:20px 0}
        .quantity__selector{display:flex;align-items:center;border:1px solid #e0e0e0;border-radius:40px;width:fit-content}
        .quantity__btn{width:40px;height:40px;background:#f8f9fa;border:none;font-size:18px;cursor:pointer;transition:all 0.3s ease}
        .quantity__btn:hover{background:#ff6b6b;color:white}
        .quantity__input{width:55px;height:40px;text-align:center;border:none;border-left:1px solid #e0e0e0;border-right:1px solid #e0e0e0;font-size:15px}
        .quantity__input:focus{outline:none}
        .product__actions{display:flex;gap:15px;margin-bottom:30px;flex-wrap:wrap}
        .btn__add__cart{background:#ff6b6b;color:white;border:none;padding:14px 35px;border-radius:40px;font-weight:600;cursor:pointer;transition:all 0.3s ease;font-size:15px;width:100%}
        .btn__add__cart:hover{background:#ff5252;transform:translateY(-2px)}
        .btn__add__cart:disabled{opacity:0.6;cursor:not-allowed}

        .cart-popup{display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.6);z-index:10000;justify-content:center;align-items:center}
        .cart-popup-content{background:white;border-radius:16px;width:90%;max-width:400px;overflow:hidden;animation:slideUp 0.3s ease;box-shadow:0 20px 60px rgba(0,0,0,0.3)}
        .popup-header{padding:20px;background:linear-gradient(135deg,#667eea,#764ba2);text-align:center;position:relative}
        .success-icon{color:#28a745;font-size:40px;margin-bottom:5px;background:white;width:60px;height:60px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center}
        .popup-header h4{margin:8px 0 0;color:white;font-size:20px}
        .popup-close{position:absolute;top:10px;right:15px;background:rgba(255,255,255,0.3);border:none;font-size:22px;cursor:pointer;color:white;width:28px;height:28px;border-radius:50%;display:flex;align-items:center;justify-content:center}
        .popup-body{padding:20px}
        .product-detail{display:flex;gap:15px;margin-bottom:15px;padding-bottom:15px;border-bottom:1px solid #f0f0f0}
        .product-detail img{width:80px;height:80px;object-fit:cover;border-radius:10px}
        .product-info h4{margin:0 0 5px;font-size:16px;font-weight:700}
        .product-info p{margin:0 0 3px;color:#ff6b6b;font-weight:700;font-size:18px}
        .cart-summary{background:#f8f9fa;padding:12px;border-radius:10px}
        .cart-summary p{margin:6px 0;font-size:14px}
        .popup-footer{padding:15px;background:#f8f9fa;border-top:1px solid #eee;display:flex;gap:10px}
        .btn-continue,.btn-viewcart{flex:1;padding:10px;border:none;border-radius:30px;cursor:pointer;text-align:center;text-decoration:none;font-weight:600;font-size:14px}
        .btn-continue{background:#e9ecef;color:#333}
        .btn-viewcart{background:#ff6b6b;color:white}

        .toast-notification{visibility:hidden;min-width:280px;background:#333;color:#fff;border-radius:10px;padding:14px 18px;position:fixed;bottom:30px;right:30px;z-index:10001;display:flex;align-items:center;gap:10px;box-shadow:0 5px 20px rgba(0,0,0,0.2);transform:translateX(400px);transition:all 0.3s ease}
        .toast-notification.show{visibility:visible;transform:translateX(0)}
        .toast-icon{width:35px;height:35px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:18px}

        @keyframes slideUp{from{transform:translateY(50px);opacity:0}to{transform:translateY(0);opacity:1}}
        @keyframes shake{0%,100%{transform:rotate(0deg)}25%{transform:rotate(15deg)}75%{transform:rotate(-15deg)}}
        .cart-count-update{animation:shake 0.3s ease}

        .product__tabs{margin-top:60px;padding:0 0 40px}
        .tabs__header{display:flex;gap:30px;border-bottom:2px solid #f0f0f0;margin-bottom:30px}
        .tab__btn{padding:10px 0;background:none;border:none;font-weight:600;color:#666;position:relative;cursor:pointer}
        .tab__btn.active{color:#ff6b6b}
        .tab__btn.active::after{content:'';position:absolute;bottom:-2px;left:0;right:0;height:2px;background:#ff6b6b}
        .tab__content{display:none;padding:20px 0;line-height:1.8;color:#666}
        .tab__content.active{display:block}
        .related__products{margin-top:80px;padding:40px 0}
        .section__title{font-size:28px;font-weight:700;margin-bottom:40px;padding-bottom:15px;position:relative}
        .section__title::after{content:'';position:absolute;bottom:0;left:0;width:60px;height:3px;background:#ff6b6b}

        /* Color Gallery Styles */
        .color-gallery-section{margin-top:12px;padding:12px;background:#f8f9fa;border-radius:10px;display:none}
        .color-gallery-section.active{display:block}
        .color-gallery-title{font-weight:600;color:#333;margin-bottom:8px;font-size:12px}
        .color-gallery-images{display:flex;gap:8px;flex-wrap:wrap}
        .color-gallery-image{width:50px;height:50px;border-radius:6px;overflow:hidden;cursor:pointer;border:2px solid transparent;transition:all 0.3s ease}
        .color-gallery-image:hover,.color-gallery-image.active{border-color:#ff6b6b}
        .color-gallery-image img{width:100%;height:100%;object-fit:cover}

        @media(max-width:768px){
            .product__title{font-size:22px}
            .current__price{font-size:22px}
            .product__image--wrapper{position:relative;top:0;margin-bottom:20px}
        }
    </style>
</head>

<body>
    @include('partials.header')

    <main class="main__content_wrapper">

        <!-- Banner -->
        <!--<div style="background:linear-gradient(135deg,#667eea,#764ba2);padding:50px 0;margin-bottom:40px;text-align:center;color:white">-->
        <!--    <h1 style="font-size:36px;font-weight:700">{{ $product->name }}</h1>-->
        <!--    <p class="mb-0 mt-2" style="opacity:0.8">Home / {{ $product->category->name ?? 'Shop' }} / {{ $product->name }}</p>-->
        <!--</div>-->

        <div class="container py-4">
            <div class="row g-4">

                <!-- PRODUCT IMAGE -->
                <div class="col-md-6">
                    <div class="product__image--wrapper">
                        <img id="mainProductImage" src="{{ $product->image_url ?? asset('assets/images/no-image.png') }}" alt="{{ $product->name }}" class="product__main--image">

                        @php
                            $galleryImages = [];
                            if($product->images){
                                $galleryImages = is_string($product->images) ? json_decode($product->images,true) : (is_array($product->images) ? $product->images : []);
                            }
                        @endphp

                        <!-- ============ MAIN PRODUCT GALLERY (Default) ============ -->
                        <div class="product__thumbnails" id="mainGalleryThumbnails">
                            <!-- Main product thumbnail -->
                            @if($product->image_url)
                                <div class="product__thumb product__thumb--main active" onclick="changeMainImage('{{ $product->image_url }}', this, 'main')">
                                    <img src="{{ $product->image_url }}" alt="Main Product Image">
                                </div>
                            @endif
                            
                            <!-- Additional gallery thumbnails -->
                            @foreach($galleryImages as $img)
                                @if(file_exists(public_path($img)))
                                    <div class="product__thumb product__thumb--main" onclick="changeMainImage('{{ asset($img) }}', this, 'gallery')">
                                        <img src="{{ asset($img) }}" alt="Gallery Image">
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <!-- ============ COLOR THUMBNAILS (Always visible to show available colors) ============ -->
                       

                        <!-- ============ COLOR-SPECIFIC GALLERIES (Hidden by default) ============ -->
                        @foreach($product->colors as $color)
                            @php $imgs = $color->all_images_array; @endphp
                            @if(count($imgs) > 0)
                                <div class="color-gallery-section" id="colorGallery_{{ $color->id }}" style="display:none;">
                                    <div class="color-gallery-title">
                                        <span style="display:inline-block;width:10px;height:10px;background:{{ $color->code }};border-radius:50%;margin-right:5px;"></span>
                                        {{ $color->name }} - All Images ({{ count($imgs) }})
                                    </div>
                                    <div class="color-gallery-images">
                                        @foreach($imgs as $idx => $img)
                                            @if(file_exists(public_path($img)))
                                                <div class="color-gallery-image {{ $idx===0?'active':'' }}" 
                                                     onclick="changeMainImage('{{ asset($img) }}', this, 'color-img', {{ $color->id }})">
                                                    <img src="{{ asset($img) }}" alt="{{ $color->name }} {{ $idx+1 }}">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- PRODUCT DETAILS -->
                <div class="col-md-6">
                    <div class="product__details">
                        <h1 class="product__title">{{ $product->name }}</h1>

                        <!-- PRICE - Will update dynamically -->
                        <div class="product__price">
                            @php
                                $basePrice = $product->sale_price ?? $product->price;
                                $originalPrice = $product->price;
                            @endphp
                            @if($product->sale_price)
                                <span class="current__price" id="productPrice">₹{{ number_format($basePrice, 2) }}</span>
                                <span class="old__price">₹{{ number_format($originalPrice, 2) }}</span>
                                <span class="discount__badge">-{{ $product->discount_percentage }}%</span>
                            @else
                                <span class="current__price" id="productPrice">₹{{ number_format($basePrice, 2) }}</span>
                            @endif
                            <input type="hidden" id="basePrice" value="{{ $basePrice }}">
                            <input type="hidden" id="extraPriceTotal" value="0">
                        </div>

                        <div class="product__short__desc">{{ $product->short_description ?? Str::limit(strip_tags($product->description ?? ''), 200) }}</div>

                        <!-- COLOR SELECTION -->
                        <div class="product__variations">
                            <div class="variation__title">
                                Color: <strong id="selectedColorText">Select Color</strong>
                                <button type="button" class="btn btn-sm btn-light ms-2" onclick="clearColorSelection()" style="font-size:11px">✕ Clear</button>
                            </div>

                            <div class="color__options">
                                @foreach($product->colors as $color)
                                    <div class="color__option"
                                        style="background-color: {{ $color->code }};"
                                        data-color-id="{{ $color->id }}"
                                        data-color-name="{{ $color->name }}"
                                        data-color-code="{{ $color->code }}"
                                        data-color-sku="{{ $color->sku ?? '' }}"
                                        onclick="selectColor(this, {{ $color->id }}, '{{ addslashes($color->name) }}')"
                                        title="{{ $color->name }} - Click to select">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- SIZE SELECTION -->
                        <div class="product__variations">
                            <div class="variation__title">
                                Size: <strong id="selectedSizeText">Select Color First</strong>
                                <button type="button" class="btn btn-sm btn-light ms-2" onclick="clearSizeOnly()" style="font-size:11px">✕ Clear</button>
                            </div>
                            <div class="size__options" id="sizeOptionsContainer">
                                <p class="text-muted" style="font-size:13px">Please select a color to see available sizes</p>
                            </div>
                        </div>

                        <input type="hidden" id="selectedColorId" value="">
                        <input type="hidden" id="selectedColorName" value="">
                        <input type="hidden" id="selectedSizeId" value="">
                        <input type="hidden" id="selectedSizeName" value="">

                        <!-- Meta -->
                        <div class="product__meta">
                            <!--@if($product->sku)-->
                            <!--    <div class="meta__item">-->
                            <!--        <div class="meta__label">SKU:</div>-->
                            <!--        <div class="meta__value"><span id="displaySku">{{ $product->sku }}</span></div>-->
                            <!--    </div>-->
                            <!--@endif-->
                            <!--<div class="meta__item">-->
                            <!--    <div class="meta__label">Stock:</div>-->
                            <!--    <div class="meta__value"><span id="stockStatus">-->
                            <!--        @if($product->stock_quantity > 0)-->
                            <!--            <span class="text-success">In Stock</span>-->
                            <!--        @else-->
                            <!--            <span class="text-danger">Out of Stock</span>-->
                            <!--        @endif-->
                            <!--    </span></div>-->
                            <!--</div>-->
                        </div>

                        <!-- Quantity -->
                        <div class="product__quantity">
                            <div class="quantity__selector">
                                <button type="button" class="quantity__btn" onclick="qtyMinus()">−</button>
                                <input type="number" id="quantity" class="quantity__input" value="1" min="1" max="99" readonly>
                                <button type="button" class="quantity__btn" onclick="qtyPlus()">+</button>
                            </div>
                        </div>

                        <!-- Add to Cart -->
                        <button type="button" onclick="addToCart()" class="btn__add__cart" id="addToCartBtn">
                            🛒 Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="container mt-5">
            <div class="tabs__header">
                <button class="tab__btn active" data-tab="description">Description</button>
                <!--<button class="tab__btn" data-tab="additional">Additional Info</button>-->
            </div>
            <div id="description" class="tab__content active">{!! $product->description !!}</div>
            <div id="additional" class="tab__content">
                <table class="table table-bordered">
                    <tr><th>SKU</th><td>{{ $product->sku ?? 'N/A' }}</td></tr>
                    <tr><th>Category</th><td>{{ $product->category->name ?? 'N/A' }}</td></tr>
                    <tr><th>Stock</th><td>{{ $product->stock_quantity }}</td></tr>
                    @foreach($product->colors as $c)
                        <tr><th>{{ $c->name }}</th><td>{{ $c->total_stock }} in stock</td></tr>
                    @endforeach
                </table>
            </div>
        </div>

        <!-- Related Products -->
        @if(isset($relatedProducts) && $relatedProducts->count() > 0)
            <div class="container">
                <div class="related__products">
                    <h2 class="section__title">Related Products</h2>
                    <div class="row">
                        @foreach($relatedProducts as $related)
                            <div class="col-lg-3 col-md-4 col-6 mb-4">
                                <div class="related__product__card" style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 2px 15px rgba(0,0,0,0.08);transition:0.3s">
                                    <a href="{{ url('product/'.$related->slug) }}">
                                        <div style="position:relative;padding-top:100%;overflow:hidden">
                                            <img src="{{ $related->image_url ?? asset('assets/images/no-image.png') }}" alt="{{ $related->name }}" style="position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover">
                                        </div>
                                        <div style="padding:15px;text-align:center">
                                            <h6 style="font-size:14px;margin-bottom:8px;color:#333">{{ $related->name }}</h6>
                                            <span style="font-size:16px;font-weight:700;color:#ff6b6b">₹{{ number_format($related->final_price, 2) }}</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

    </main>

    <!-- Cart Popup -->
    <div id="cartPopup" class="cart-popup">
        <div class="cart-popup-content">
            <div class="popup-header">
                <div class="success-icon"><i class="fas fa-check-circle"></i></div>
                <h4>Added to Cart!</h4>
                <button class="popup-close" onclick="closePopup()">&times;</button>
            </div>
            <div class="popup-body" id="popupBody"></div>
            <div class="popup-footer">
                <button class="btn-continue" onclick="closePopup()">Continue Shopping</button>
                <a href="{{ route('cart.index') }}" class="btn-viewcart">View Cart →</a>
            </div>
        </div>
    </div>

    <!-- Toast -->
    <div id="toastNotification" class="toast-notification">
        <div class="toast-icon" style="background:#28a745"><i class="fas fa-check-circle"></i></div>
        <div class="toast-content"><strong>Success!</strong><span id="toastMessage">Added to cart</span></div>
    </div>

    @include('partials.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        // ==================== CSRF SETUP ====================
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // ==================== DATA STORAGE ====================
        // Store ALL images for each color
        var colorImagesAll = {};
        @foreach($product->colors as $color)
            colorImagesAll[{{ $color->id }}] = [];
            @foreach($color->all_images_array as $img)
                @if(file_exists(public_path($img)))
                    colorImagesAll[{{ $color->id }}].push("{{ asset($img) }}");
                @endif
            @endforeach
        @endforeach

        var defaultImage = "{{ $product->image_url ?? asset('assets/images/no-image.png') }}";
        
        // Selected values
        var selColorId = '', selColorName = '';
        var selSizeId = '', selSizeName = '', selSizePrice = 0, selSizeStock = 0, selSizeSku = '';

        console.log('✅ Color Images:', colorImagesAll);

        // ==================== IMAGE FUNCTIONS ====================
        function changeMainImage(url, el, type, colorId) {
            var img = $('#mainProductImage');
            img.css({ opacity: '0', transform: 'scale(0.95)', transition: 'all 0.2s ease' });
            
            setTimeout(function () {
                img.attr('src', url);
                img.css({ opacity: '1', transform: 'scale(1)' });
            }, 200);

            // Remove active from all thumbs
            $('.product__thumb').removeClass('active');
            $('.color-gallery-image').removeClass('active');

            if (type === 'main' || type === 'gallery') {
                // ✅ SHOW main gallery, HIDE color galleries
                $('#mainGalleryThumbnails').show();
                $('.color-gallery-section').hide().removeClass('active');
                if (el) $(el).addClass('active');
            }

            if (type === 'color') {
                // ✅ HIDE main gallery
                $('#mainGalleryThumbnails').hide();
                // ✅ HIDE all color galleries
                $('.color-gallery-section').hide().removeClass('active');
                // ✅ SHOW selected color gallery
                $('#colorGallery_' + colorId).show().addClass('active');
                // Activate first color gallery image
                $('#colorGallery_' + colorId + ' .color-gallery-image').first().addClass('active');
                // Highlight color thumb
                $('.product__thumb--color[data-color-id="' + colorId + '"]').addClass('active');
            }

            if (type === 'color-img') {
                // ✅ Keep main gallery hidden
                $('#mainGalleryThumbnails').hide();
                // ✅ Keep color gallery visible
                $('.color-gallery-section').hide().removeClass('active');
                $('#colorGallery_' + colorId).show().addClass('active');
                if (el) $(el).addClass('active');
                // Highlight color thumb
                $('.product__thumb--color[data-color-id="' + colorId + '"]').addClass('active');
            }
        }

        function handleColorThumbClick(colorId, imgUrl) {
            console.log('🖼️ Color thumb clicked:', colorId);
            changeMainImage(imgUrl, null, 'color', colorId);
            
            // Also trigger color selection
            var colorEl = $('.color__option[data-color-id="' + colorId + '"]');
            if (colorEl.length) {
                selectColor(colorEl[0], colorId, colorEl.attr('data-color-name'));
            }
        }

        // ==================== COLOR SELECTION ====================
        function selectColor(el, id, name) {
            $('.color__option').removeClass('active');
            $(el).addClass('active');
            
            selColorId = id;
            selColorName = name;
            $('#selectedColorId').val(id);
            $('#selectedColorName').val(name);
            $('#selectedColorText').text(name);
            
            // ✅ HIDE main gallery, SHOW color gallery
            $('#mainGalleryThumbnails').hide();
            $('.color-gallery-section').hide().removeClass('active');
            
            if (colorImagesAll[id] && colorImagesAll[id].length > 0) {
                changeMainImage(colorImagesAll[id][0], null, 'color', id);
            }
            
            // Reset size
            clearSizeData();
            $('#sizeOptionsContainer').html('<p class="text-muted" style="font-size:13px"><i class="fas fa-spinner fa-spin"></i> Loading sizes...</p>');
            $('#selectedSizeText').text('Loading...');
            
            loadSizes(id);
            updatePrice();
            
            console.log('🎨 Color selected:', name, '- Main gallery hidden');
        }

        function clearColorSelection() {
            selColorId = '';
            selColorName = '';
            $('#selectedColorId').val('');
            $('#selectedColorName').val('');
            $('#selectedColorText').text('Select Color');
            
            $('.color__option').removeClass('active');
            
            // ✅ HIDE color galleries, SHOW main gallery
            $('.color-gallery-section').hide().removeClass('active');
            $('#mainGalleryThumbnails').show();
            
            // Reset to default image
            changeMainImage(defaultImage, $('#mainGalleryThumbnails .product__thumb--main').first()[0], 'main');
            
            // Reset sizes
            $('#sizeOptionsContainer').html('<p class="text-muted" style="font-size:13px">Please select a color to see available sizes</p>');
            $('#selectedSizeText').text('Select Color First');
            $('#displaySku').text('{{ $product->sku ?? 'N/A' }}');
            
            clearSizeData();
            updatePrice();
            
            console.log('🔄 Color cleared - Main gallery shown');
        }

        // ==================== SIZE FUNCTIONS ====================
        function loadSizes(colorId) {
            $.ajax({
                url: "{{ route('get.size.stock') }}",
                method: "GET",
                data: { product_id: {{ $product->id }}, color_id: colorId },
                dataType: "json",
                success: function(response) {
                    if (response.success && response.sizes && response.sizes.length > 0) {
                        var html = '';
                        response.sizes.forEach(function(s) {
                            var stock = parseInt(s.stock) || 0;
                            var disabled = stock <= 0 ? ' disabled' : '';
                            var extraPrice = parseFloat(s.extra_price) || 0;
                            var extraText = extraPrice > 0 ? ' <small>(+₹' + extraPrice.toFixed(2) + ')</small>' : '';
                            var stockClass = stock <= 0 ? 'text-danger' : (stock <= 5 ? 'text-warning' : 'text-success');
                            var stockText = stock <= 0 ? 'Out of Stock' : stock + ' in stock';
                            
                            html += '<div class="size__option' + disabled + '" ' +
                                'data-size="' + s.size + '" data-size-id="' + s.id + '" ' +
                                'data-size-price="' + extraPrice + '" data-size-stock="' + stock + '" ' +
                                'data-size-sku="' + (s.sku || '') + '" ' +
                                'onclick="selectSize(this, \'' + s.size + '\', ' + s.id + ', ' + extraPrice + ', ' + stock + ', \'' + (s.sku || '') + '\')" ' +
                                'title="' + stockText + '">' +
                                s.size + extraText +
                                '<small class="' + stockClass + ' d-block" style="font-size:10px">' + stockText + '</small>' +
                                '</div>';
                        });
                        $('#sizeOptionsContainer').html(html);
                        $('#selectedSizeText').text('Select Size');
                    } else {
                        $('#sizeOptionsContainer').html('<p class="text-danger" style="font-size:13px">No sizes available</p>');
                    }
                },
                error: function() {
                    $('#sizeOptionsContainer').html('<p class="text-danger" style="font-size:13px">Error loading sizes</p>');
                }
            });
        }

        function selectSize(el, size, id, price, stock, sku) {
            if (parseInt(stock) <= 0) return;
            $('.size__option').removeClass('active');
            $(el).addClass('active');
            
            selSizeName = size;
            selSizeId = id;
            selSizePrice = parseFloat(price) || 0;
            selSizeStock = parseInt(stock);
            selSizeSku = sku || '';
            
            var extraText = selSizePrice > 0 ? ' (+₹' + selSizePrice.toFixed(2) + ')' : '';
            $('#selectedSizeText').text(size + extraText);
            $('#selectedSizeId').val(id);
            $('#quantity').attr('max', stock);
            if (parseInt($('#quantity').val()) > stock) $('#quantity').val(stock);
            $('#stockStatus').html('<span class="text-success">In Stock (' + stock + ' available)</span>');
            if (sku) $('#displaySku').text(sku);
            updatePrice();
        }

        function clearSizeData() {
            selSizeName = ''; selSizeId = ''; selSizePrice = 0; selSizeStock = 0; selSizeSku = '';
            $('#selectedSizeId').val(''); $('#quantity').attr('max', '99'); $('#quantity').val(1);
            $('#stockStatus').html('<span class="text-success">In Stock</span>');
            $('#displaySku').text('{{ $product->sku ?? 'N/A' }}');
        }

        function clearSizeOnly() {
            clearSizeData();
            $('.size__option').removeClass('active');
            $('#selectedSizeText').text('Select Size');
            updatePrice();
        }

        // ==================== PRICE & QUANTITY ====================
        function updatePrice() {
            var total = (parseFloat($('#basePrice').val()) + selSizePrice).toFixed(2);
            $('#productPrice').text('₹' + total);
            $('#extraPriceTotal').val(selSizePrice);
        }

        function qtyMinus() {
            var val = parseInt($('#quantity').val()) || 1;
            if (val > 1) $('#quantity').val(val - 1);
        }

        function qtyPlus() {
            var val = parseInt($('#quantity').val()) || 1;
            var max = parseInt($('#quantity').attr('max')) || 99;
            if (val < max) $('#quantity').val(val + 1);
        }

        // ==================== ADD TO CART ====================
        function addToCart() {
            var btn = $('#addToCartBtn');
            var orig = btn.html();
            btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Adding...');
            
            $.ajax({
                url: "{{ route('cart.add', $product->id) }}",
                method: "POST",
                dataType: "json",
                data: {
                    quantity: $('#quantity').val() || 1,
                    color: selColorName, color_id: selColorId,
                    size: selSizeName, size_id: selSizeId,
                    extra_price: selSizePrice, sku: selSizeSku,
                    _token: "{{ csrf_token() }}"
                },
                success: function(r) {
                    if (r.success) {
                        if (r.cart_count) {
                            $('#cartCount').text(r.cart_count).addClass('cart-count-update');
                            setTimeout(function(){ $('#cartCount').removeClass('cart-count-update'); }, 300);
                        }
                        showToast(r.message || 'Added!', 'success');
                        showCartPopup(r);
                    } else {
                        showToast(r.message || 'Failed', 'error');
                    }
                },
                error: function(xhr) {
                    showToast(xhr.responseJSON?.message || 'Error', 'error');
                },
                complete: function() {
                    btn.prop('disabled', false).html(orig);
                }
            });
        }

        function showCartPopup(r) {
            var img = defaultImage;
            if (selColorId && colorImagesAll[selColorId]?.length) img = colorImagesAll[selColorId][0];
            var price = (parseFloat($('#basePrice').val()) + selSizePrice).toFixed(2);
            var qty = $('#quantity').val() || 1;
            var info = '';
            if (selColorName) info += '<small>Color: ' + selColorName + '</small><br>';
            if (selSizeName) info += '<small>Size: ' + selSizeName + '</small><br>';
            if (selSizeSku) info += '<small>SKU: ' + selSizeSku + '</small><br>';
            
            $('#popupBody').html(
                '<div class="product-detail">' +
                '<img src="' + img + '" alt="{{ $product->name }}">' +
                '<div class="product-info"><h4>{{ $product->name }}</h4><p>₹' + price + '</p><small>Qty: ' + qty + '</small><br>' + info + '</div>' +
                '</div>' +
                '<div class="cart-summary"><p><strong>🛒 Total:</strong> ' + (r.cart_total || 'N/A') + '</p><p><strong>📦 Items:</strong> ' + (r.cart_count || 0) + '</p></div>'
            );
            
            $('#cartPopup').css('display', 'flex');
            $('body').css('overflow', 'hidden');
            setTimeout(closePopup, 3000);
        }

        function closePopup() {
            $('#cartPopup').css('display', 'none');
            $('body').css('overflow', '');
        }

        function showToast(msg, type) {
            var t = $('#toastNotification');
            $('#toastMessage').text(msg);
            t.find('.toast-icon').css('background', type === 'success' ? '#28a745' : '#dc3545')
                .html('<i class="fas fa-' + (type === 'success' ? 'check' : 'exclamation') + '-circle"></i>');
            t.addClass('show');
            setTimeout(function(){ t.removeClass('show'); }, 3000);
        }

        // ==================== INIT ====================
        $(document).ready(function() {
            // Start with main gallery visible, color galleries hidden
            $('#mainGalleryThumbnails').show();
            $('.color-gallery-section').hide();
            
            $('.tab__btn').on('click', function() {
                $('.tab__btn').removeClass('active');
                $('.tab__content').removeClass('active');
                $(this).addClass('active');
                $('#' + $(this).data('tab')).addClass('active');
            });
            
            $(document).on('click', function(e) {
                if (e.target === document.getElementById('cartPopup')) closePopup();
            });
            $(document).on('keydown', function(e) {
                if (e.key === 'Escape') closePopup();
            });
        });
    </script>
</body>
</html>