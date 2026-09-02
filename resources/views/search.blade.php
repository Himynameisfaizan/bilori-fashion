<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <title>Shop | Beroli - Premium Collection</title>
    <meta name="description" content="Discover premium quality products crafted for modern lifestyle" />
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
    
    <script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '840233335473914');
fbq('track', 'PageView');
</script>

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Jost', sans-serif; background: #f8fafc; color: #1e293b; }

        .shop__banner {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
            padding: 80px 0 70px; margin-bottom: 50px; position: relative; overflow: hidden;
        }
        .shop__banner::before {
            content: ''; position: absolute; top: -50%; right: -10%;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(255,107,107,0.12) 0%, rgba(255,107,107,0) 70%);
            border-radius: 50%; animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-20px) scale(1.05); }
        }
        .shop__banner .container { position: relative; z-index: 2; }
        .shop__banner h1 { font-weight: 800; font-size: 3.2rem; }
        .shop__banner p { font-size: 1.1rem; color: rgba(255,255,255,0.7); }

        .filter__widget { background: #fff; border-radius: 20px; padding: 24px 20px; margin-bottom: 24px; box-shadow: 0 4px 20px rgba(0,0,0,0.03); }
        .filter__title { font-weight: 700; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 2px solid #f1f5f9; }
        .category__list { list-style: none; padding: 0; }
        .category__item { margin-bottom: 10px; }
        .category__link { display: flex; justify-content: space-between; color: #64748b; text-decoration: none; padding: 8px 12px; border-radius: 10px; }
        .category__link:hover, .category__link.active { color: #ff6b6b; background: #fef2f2; }
        .category__count { background: #f1f5f9; padding: 2px 10px; border-radius: 20px; font-size: 0.75rem; }
        .filter__btn { width: 100%; background: #ff6b6b; color: white; border: none; padding: 12px; border-radius: 40px; font-weight: 600; cursor: pointer; }
        .sort-select { width: 100%; padding: 10px; border: 1.5px solid #e2e8f0; border-radius: 12px; }

        .product__card { background: #fff; border-radius: 20px; overflow: hidden; transition: 0.35s; margin-bottom: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.04); }
        .product__card:hover { transform: translateY(-8px); box-shadow: 0 20px 40px -12px rgba(0,0,0,0.12); }
        .product__image { position: relative; overflow: hidden; aspect-ratio: 1/1; background: #f8fafc; }
        .product__image img { width: 100%; height: 100%; object-fit: cover; transition: 0.5s; }
        .product__card:hover .product__image img { transform: scale(1.06); }
        .product__badge { position: absolute; top: 16px; left: 16px; background: #ff6b6b; color: #fff; padding: 5px 14px; border-radius: 30px; font-size: 0.7rem; font-weight: 700; }
        .product__info { padding: 20px 18px; }
        .product__category { font-size: 0.72rem; color: #ff6b6b; text-transform: uppercase; font-weight: 600; }
        .product__title { font-size: 1.05rem; font-weight: 700; margin: 8px 0; }
        .product__title a { color: #1e293b; text-decoration: none; }
        .product__price { font-size: 1.3rem; font-weight: 800; color: #ff6b6b; }
        .product__price old { font-size: 0.85rem; color: #94a3b8; text-decoration: line-through; margin-left: 8px; }
        .product__cart__btn { width: 100%; background: #1e293b; color: #fff; border: none; padding: 12px; border-radius: 40px; font-weight: 600; cursor: pointer; }
        .product__cart__btn:hover { background: #ff6b6b; }

        .pagination__wrapper { display: flex; justify-content: center; margin-top: 40px; }
        .pagination .page-link { color: #1e293b; border: 1.5px solid #e2e8f0; margin: 0 4px; border-radius: 12px; padding: 10px 18px; }
        .pagination .page-item.active .page-link { background: #ff6b6b; border-color: #ff6b6b; color: #fff; }

        .cart-popup { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.6); z-index: 9999; justify-content: center; align-items: center; }
        .cart-popup-content { background: #fff; border-radius: 24px; width: 400px; max-width: 90%; overflow: hidden; animation: slideUp 0.35s ease; }
        @keyframes slideUp { from { transform: translateY(40px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        .popup-header { background: #28a745; padding: 24px; color: #fff; display: flex; justify-content: space-between; align-items: center; }
        .popup-close { background: rgba(255,255,255,0.2); border: none; color: #fff; width: 32px; height: 32px; border-radius: 50%; font-size: 20px; cursor: pointer; }
        .popup-body { padding: 24px; }
        .product-detail { display: flex; gap: 16px; padding-bottom: 20px; border-bottom: 1px solid #f1f5f9; }
        .product-detail img { width: 85px; height: 85px; object-fit: cover; border-radius: 14px; }
        .cart-summary { background: #f8fafc; padding: 16px; border-radius: 14px; margin-top: 16px; }
        .popup-footer { padding: 20px 24px; display: flex; gap: 12px; background: #f8fafc; }
        .btn-continue { flex: 1; padding: 12px; background: #e2e8f0; border: none; border-radius: 40px; cursor: pointer; }
        .btn-viewcart { flex: 1; padding: 12px; background: #ff6b6b; color: #fff; text-align: center; border-radius: 40px; text-decoration: none; }

        .toast-notification { visibility: hidden; min-width: 320px; background: #1e293b; color: #fff; border-radius: 16px; padding: 16px 20px; position: fixed; bottom: 30px; right: 30px; z-index: 10000; display: flex; align-items: center; gap: 12px; transform: translateX(400px); transition: 0.35s; }
        .toast-notification.show { visibility: visible; transform: translateX(0); }
        .toast-icon { width: 42px; height: 42px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 20px; }

        @media (max-width: 768px) {
            .shop__banner { padding: 45px 0 40px; }
            .shop__banner h1 { font-size: 2rem; }
            .popup-footer { flex-direction: column; }
        }
    </style>
</head>

<body>
    @include('partials.header')

    <main class="main__content_wrapper">

        <!-- Shop Banner -->
        <div style="padding-top:150px;" class="shop__banner">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 text-center text-lg-start">
                        <h1>Shop Collection</h1>
                        <p>Discover premium quality products crafted for modern lifestyle</p>
                    </div>
                    <div class="col-lg-4 text-center mt-3 mt-lg-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center justify-content-lg-end bg-transparent mb-0">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}" style="color:rgba(255,255,255,0.7);">Home</a></li>
                                <li class="breadcrumb-item active" style="color:#ff6b6b;">Shop</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container pb-5">
            <div class="row g-4">

                <!-- Left Filter Sidebar -->
                <div class="col-lg-3">
                    <form method="GET" action="{{ route('shop') }}" id="filterForm">
                        <div class="filter__widget">
                            <h5 class="filter__title">Categories</h5>
                            <ul class="category__list">
                                <li class="category__item">
                                    <a href="{{ route('shop') }}" class="category__link {{ !request('category') ? 'active' : '' }}">
                                        <span>All Products</span>
                                        <span class="category__count">{{ $totalProducts ?? $products->total() }}</span>
                                    </a>
                                </li>
                                @foreach($categories as $cat)
                                    <li class="category__item">
                                        <a href="{{ route('shop', array_merge(request()->except('category'), ['category' => $cat->id])) }}" class="category__link {{ request('category') == $cat->id ? 'active' : '' }}">
                                            <span>{{ $cat->name }}</span>
                                            <span class="category__count">{{ $cat->products_count ?? 0 }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="filter__widget">
                            <h5 class="filter__title">Price Range</h5>
                            <div class="row g-2 mb-3">
                                <div class="col-6">
                                    <input type="number" name="min_price" value="{{ request('min_price') }}" class="form-control form-control-sm" placeholder="Min ₹">
                                </div>
                                <div class="col-6">
                                    <input type="number" name="max_price" value="{{ request('max_price') }}" class="form-control form-control-sm" placeholder="Max ₹">
                                </div>
                            </div>
                            <button type="submit" class="filter__btn"><i class="fas fa-filter me-2"></i> Apply Filter</button>
                            @if(request('min_price') || request('max_price') || request('category'))
                                <a href="{{ route('shop') }}" class="btn btn-link mt-2 d-block text-center text-decoration-none">Clear All</a>
                            @endif
                        </div>

                        <div class="filter__widget">
                            <h5 class="filter__title">Sort By</h5>
                            <select name="sort" class="sort-select" onchange="this.form.submit()">
                                <option value="">Default</option>
                                <option value="price_asc" {{ request('sort')=='price_asc'?'selected':'' }}>Price: Low to High</option>
                                <option value="price_desc" {{ request('sort')=='price_desc'?'selected':'' }}>Price: High to Low</option>
                                <option value="newest" {{ request('sort')=='newest'?'selected':'' }}>Newest First</option>
                                <option value="name_asc" {{ request('sort')=='name_asc'?'selected':'' }}>Name: A to Z</option>
                                <option value="name_desc" {{ request('sort')=='name_desc'?'selected':'' }}>Name: Z to A</option>
                            </select>
                        </div>
                    </form>
                </div>

                <!-- Products Grid -->
                <div class="col-lg-9">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <p class="mb-0 text-muted">
                            Showing <strong>{{ $products->firstItem() ?? 0 }}</strong> - <strong>{{ $products->lastItem() ?? 0 }}</strong> of <strong>{{ $products->total() }}</strong> products
                        </p>
                    </div>

                    <div class="row">
                        @forelse($products as $product)
                            <div class="col-lg-4 col-md-6">
                                <div class="product__card">
                                    <div class="product__image">
                                        @if($product->is_featured)
                                            <span class="product__badge">Featured</span>
                                        @endif
                                        <a href="{{ route('product.detail', $product->slug) }}">
                                            <img src="{{ $product->image && file_exists(public_path($product->image)) ? asset($product->image) : asset('assets/images/no-image.png') }}" alt="{{ $product->name }}">
                                        </a>
                                    </div>
                                    <div class="product__info">
                                        @if($product->category)
                                            <div class="product__category">{{ $product->category->name }}</div>
                                        @endif
                                        <h3 class="product__title">
                                            <a href="{{ route('product.detail', $product->slug) }}">{{ $product->name }}</a>
                                        </h3>
                                        <div class="product__price">
                                            ₹{{ number_format($product->sale_price ?? $product->price, 2) }}
                                            @if($product->sale_price)
                                                <old>₹{{ number_format($product->price, 2) }}</old>
                                            @endif
                                        </div>
                                        <button type="button" class="product__cart__btn add-to-cart-btn mt-3"
                                            data-id="{{ $product->id }}"
                                            data-name="{{ $product->name }}"
                                            data-price="₹{{ number_format($product->sale_price ?? $product->price, 2) }}"
                                            data-image="{{ $product->image && file_exists(public_path($product->image)) ? asset($product->image) : asset('assets/images/no-image.png') }}">
                                            <i class="fas fa-shopping-bag me-2"></i> Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <h4>No Products Found</h4>
                                <p class="text-muted">Try adjusting your filters</p>
                                <a href="{{ route('shop') }}" class="btn btn-dark rounded-pill px-4">Reset Filters</a>
                            </div>
                        @endforelse
                    </div>

                    <!-- ✅ PAGINATION -->
                    @if($products->hasPages())
                        <div class="pagination__wrapper">
                            {{ $products->withQueryString()->links('pagination::bootstrap-4') }}
                        </div>
                    @endif
                </div>

            </div>
        </div>

    </main>

    <!-- Cart Popup -->
    <div id="cartPopup" class="cart-popup">
        <div class="cart-popup-content">
            <div class="popup-header">
                <h4><i class="fas fa-check-circle me-2"></i> Added to Cart!</h4>
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
        <div class="toast-icon" style="background:#28a745;"><i class="fas fa-check-circle"></i></div>
        <div class="toast-content"><strong>Success!</strong><span id="toastMessage">Product added to cart</span></div>
    </div>

    @include('partials.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

        $(document).on('click', '.add-to-cart-btn', function() {
            let btn = $(this);
            let productId = btn.data('id');
            let productName = btn.data('name');
            let productPrice = btn.data('price');
            let productImage = btn.data('image');
            let originalText = btn.html();

            btn.html('<i class="fas fa-spinner fa-spin"></i> Adding...').prop('disabled', true);

            $.ajax({
                url: `/cart/add/${productId}`,
                type: "POST",
                data: { product_id: productId, quantity: 1 },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        if (response.cart_count !== undefined) {
                            $('.cart-count').text(response.cart_count).addClass('cart-count-update');
                            setTimeout(() => $('.cart-count').removeClass('cart-count-update'), 400);
                        }
                        showPopup(productName, productPrice, productImage, response);
                        showToast(response.message || 'Added to cart!', 'success');
                    } else {
                        showToast(response.message || 'Failed', 'error');
                    }
                    btn.html(originalText).prop('disabled', false);
                },
                error: function(xhr) {
                    showToast(xhr.responseJSON?.message || 'Error!', 'error');
                    btn.html(originalText).prop('disabled', false);
                }
            });
        });

        function showPopup(name, price, image, response) {
            $('#popupBody').html(`
                <div class="product-detail">
                    <img src="${image}" onerror="this.src='{{ asset('assets/images/no-image.png') }}'">
                    <div><h5>${name}</h5><p style="color:#ff6b6b;font-weight:700;">${price}</p><small>Quantity: 1</small></div>
                </div>
                <div class="cart-summary">
                    <p><strong>Cart Total:</strong> <span>${response.cart_total || '₹0'}</span></p>
                    <p><strong>Items:</strong> <span>${response.cart_count || 0}</span></p>
                </div>
            `);
            $('#cartPopup').fadeIn(300);
            setTimeout(closePopup, 4000);
        }

        function closePopup() { $('#cartPopup').fadeOut(300); }

        function showToast(message, type = 'success') {
            let toast = $('#toastNotification');
            $('#toastMessage').text(message);
            if (type === 'error') {
                toast.find('.toast-icon').css('background', '#dc3545').html('<i class="fas fa-exclamation-circle"></i>');
            } else {
                toast.find('.toast-icon').css('background', '#28a745').html('<i class="fas fa-check-circle"></i>');
            }
            toast.addClass('show');
            setTimeout(() => toast.removeClass('show'), 3000);
        }

        $(document).click(function(e) { if ($(e.target).is('#cartPopup')) closePopup(); });

        $(document).ready(function() {
            $.get('{{ route("cart.info") }}', function(data) {
                if (data?.cart_count) $('.cart-count').text(data.cart_count);
            });
        });
    </script>
</body>
</html>