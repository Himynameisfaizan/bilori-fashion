<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <title>{{ $category->name }} | Bilori</title>
    <meta name="description" content="Products in {{ $category->name }} category" />
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
        /* Breadcrumb */
        .breadcrumb-section { padding: 15px 0; background: #fafafa; border-bottom: 1px solid #eee; }
        .breadcrumb-nav { font-size: 13px; color: #666; }
        .breadcrumb-nav a { color: #333; text-decoration: none; }
        .breadcrumb-nav a:hover { color: #c62828; }
        .breadcrumb-nav .separator { margin: 0 8px; color: #999; }
        .breadcrumb-nav .current { color: #c62828; font-weight: 500; }

        /* Product Card */
        .product-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid #eee;
            transition: 0.3s ease;
            text-align: center;
            height: 100%;
        }
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }
        .product-img {
            display: block;
            overflow: hidden;
        }
        .product-img img {
            width: 100%;
            /*height: 260px;*/
            /*object-fit: cover;*/
            transition: 0.4s ease;
        }
        .product-card:hover .product-img img {
            transform: scale(1.08);
        }
        .product-body {
            padding: 15px;
        }
        .product-body h6 {
            font-size: 15px;
            margin-bottom: 10px;
        }
        .product-body h6 a {
            text-decoration: none;
            color: #222;
        }
        .price {
            margin-bottom: 12px;
        }
        .price .new {
            font-weight: bold;
            font-size: 16px;
            color: #000;
        }
        .price .old {
            text-decoration: line-through;
            color: #999;
            margin-left: 8px;
            font-size: 13px;
        }
        .btn-cart {
            width: 100%;
            background: #111;
            color: #fff;
            border-radius: 10px;
            padding: 10px;
            transition: 0.3s;
            border: none;
        }
        .btn-cart:hover {
            background: #ff4d00;
            color: #fff;
        }
        .btn-cart:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        /* Pagination */
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            margin-top: 40px;
            padding: 20px 0;
        }
        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
            gap: 5px;
        }
        .page-item .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 40px;
            height: 40px;
            padding: 0 12px;
            border: 1.5px solid #e0e0e0;
            border-radius: 8px;
            background: #fff;
            color: #333;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .page-item .page-link:hover {
            background: #f5f5f5;
            border-color: #999;
            color: #000;
        }
        .page-item.active .page-link {
            background: #000;
            border-color: #000;
            color: #fff;
            font-weight: 600;
        }
        .page-item.disabled .page-link {
            background: #f5f5f5;
            border-color: #e0e0e0;
            color: #ccc;
            cursor: not-allowed;
            pointer-events: none;
        }

        /* Popup */
        .cart-popup {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.6);
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
        .cart-popup-content {
            background: #fff;
            padding: 25px;
            border-radius: 16px;
            width: 350px;
            max-width: 90%;
            text-align: center;
            animation: slideUp 0.3s ease;
        }
        .popup-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        .popup-header h4 { color: #28a745; margin: 0; }
        .popup-header button { background: none; border: none; font-size: 24px; cursor: pointer; color: #999; }
        .popup-body { margin-bottom: 20px; }
        .product-detail {
            display: flex; gap: 15px;
            text-align: left; margin-bottom: 15px;
        }
        .product-detail img {
            width: 80px; height: 80px;
            object-fit: cover; border-radius: 8px;
        }
        .cart-summary {
            background: #f8f9fa;
            padding: 12px; border-radius: 8px;
            margin-top: 10px;
        }
        .popup-footer { display: flex; gap: 10px; }
        .popup-footer button, .popup-footer a {
            flex: 1; padding: 10px; border: none;
            border-radius: 8px; cursor: pointer;
            text-decoration: none; text-align: center;
        }
        .popup-footer button { background: #e9ecef; color: #333; }
        .popup-footer a { background: #ff6b6b; color: white; }

        /* Toast */
        .toast-notification {
            visibility: hidden;
            min-width: 300px; background: #28a745; color: #fff;
            border-radius: 8px; padding: 16px;
            position: fixed; bottom: 30px; right: 30px;
            z-index: 10000; display: flex; align-items: center; gap: 12px;
            transform: translateX(400px); transition: all 0.3s ease;
        }
        .toast-notification.show { visibility: visible; transform: translateX(0); }
        .toast-icon {
            width: 40px; height: 40px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center; font-size: 20px;
        }

        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        @keyframes shake {
            0%,100% { transform: rotate(0deg); }
            25% { transform: rotate(15deg); }
            75% { transform: rotate(-15deg); }
        }
        .cart-count-update { animation: shake 0.3s ease; }

        @media (max-width: 768px) {
            .product-img img { height:auto; }
            .pagination .page-link { min-width: 35px; height: 35px; font-size: 12px; }
        }
    </style>
</head>

<body>
    @include('partials.header')

    <main class="main__content_wrapper">

        <!-- Breadcrumb -->
        <div style="padding-top:200px;" class="breadcrumb-section">
            <div class="container">
                <nav class="breadcrumb-nav">
                    <a href="{{ url('/') }}">Home</a>
                    <span class="separator">/</span>
                    <a href="{{ route('shop') }}">Shop</a>
                    <span class="separator">/</span>
                    <span class="current">{{ $category->name }}</span>
                </nav>
            </div>
        </div>

        <!-- Category Header -->
        <section class="py-4">
            <div class="container text-center">
                <h2 class="fw-bold mb-2">{{ $category->name }}</h2>
                <p class="text-muted">
                    Showing {{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }} 
                    of {{ $products->total() }} products
                </p>
            </div>
        </section>

        <!-- Products Grid -->
        <section class="pb-5">
            <div class="container">
                <div class="row g-4">
                    @forelse($products as $product)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                            <div class="product-card">
                                <a href="{{ url('product/' . $product->slug) }}" class="product-img">
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                </a>
                                <div class="product-body">
                                    <h6>
                                        <a href="{{ url('product/' . $product->slug) }}">{{ $product->name }}</a>
                                    </h6>
                                    <div class="price">
                                        <span class="new">₹{{ number_format($product->sale_price ?? $product->price, 2) }}</span>
                                        @if($product->sale_price)
                                            <span class="old">₹{{ number_format($product->price, 2) }}</span>
                                        @endif
                                    </div>
                                    <button type="button" class="btn btn-cart add-to-cart-btn" 
                                        data-id="{{ $product->id }}"
                                        data-name="{{ $product->name }}"
                                        data-price="{{ $product->sale_price ?? $product->price }}"
                                        data-image="{{ $product->image && file_exists(public_path($product->image)) ? asset($product->image) : asset('assets/images/no-image.png') }}"
                                        {{ ($product->stock_quantity ?? 0) <= 0 ? 'disabled' : '' }}>
                                        <i class="fas fa-shopping-cart"></i>
                                        {{ ($product->stock_quantity ?? 0) <= 0 ? 'Out of Stock' : 'Add to Cart' }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <i class="fas fa-box-open fa-4x text-muted mb-3"></i>
                            <h4>No Products Found</h4>
                            <p class="text-muted">This category has no products yet.</p>
                            <a href="{{ route('shop') }}" class="btn btn-dark mt-2">Browse All Products</a>
                        </div>
                    @endforelse
                </div>

                {{-- ✅ PAGINATION --}}
                @if($products->hasPages())
                    <div class="pagination-wrapper">
                        <ul class="pagination">
                            {{-- Previous --}}
                            @if($products->onFirstPage())
                                <li class="page-item disabled"><span class="page-link"><i class="fas fa-chevron-left"></i></span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $products->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a></li>
                            @endif

                            {{-- Page Numbers --}}
                            @php
                                $start = max(1, $products->currentPage() - 2);
                                $end = min($products->lastPage(), $products->currentPage() + 2);
                            @endphp

                            @if($start > 1)
                                <li class="page-item"><a class="page-link" href="{{ $products->url(1) }}">1</a></li>
                                @if($start > 2)<li class="page-item disabled"><span class="page-link">...</span></li>@endif
                            @endif

                            @for($i = $start; $i <= $end; $i++)
                                <li class="page-item {{ $i == $products->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if($end < $products->lastPage())
                                @if($end < $products->lastPage() - 1)<li class="page-item disabled"><span class="page-link">...</span></li>@endif
                                <li class="page-item"><a class="page-link" href="{{ $products->url($products->lastPage()) }}">{{ $products->lastPage() }}</a></li>
                            @endif

                            {{-- Next --}}
                            @if($products->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $products->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a></li>
                            @else
                                <li class="page-item disabled"><span class="page-link"><i class="fas fa-chevron-right"></i></span></li>
                            @endif
                        </ul>
                    </div>
                @endif
            </div>
        </section>

    </main>

    <!-- Cart Popup -->
    <div id="cartPopup" class="cart-popup">
        <div class="cart-popup-content">
            <div class="popup-header">
                <h4><i class="fas fa-check-circle"></i> Added to Cart!</h4>
                <button onclick="closePopup()">&times;</button>
            </div>
            <div class="popup-body" id="popupBody"></div>
            <div class="popup-footer">
                <button onclick="closePopup()">Continue Shopping</button>
                <a href="{{ route('cart.index') }}">View Cart →</a>
            </div>
        </div>
    </div>

    <!-- Toast -->
    <div id="toastNotification" class="toast-notification">
        <div class="toast-icon"><i class="fas fa-check-circle"></i></div>
        <div class="toast-content">
            <strong>Success!</strong>
            <span id="toastMessage">Product added to cart</span>
        </div>
    </div>

    @include('partials.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $(document).on('click', '.add-to-cart-btn', function () {
            let btn = $(this);
            let productId = btn.data('id');
            let productName = btn.data('name');
            let productPrice = btn.data('price');
            let productImage = btn.data('image');
            let originalHtml = btn.html();

            btn.html('<i class="fas fa-spinner fa-spin"></i> Adding...').prop('disabled', true);

            $.ajax({
                url: "{{ url('cart/add') }}/" + productId,
                type: "POST",
                data: { product_id: productId, quantity: 1 },
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        if (response.cart_count !== undefined) {
                            let cartBadge = $('.cart-count');
                            if (cartBadge.length) {
                                cartBadge.text(response.cart_count).addClass('cart-count-update');
                                setTimeout(() => cartBadge.removeClass('cart-count-update'), 300);
                            }
                        }
                        showPopup(productName, productPrice, productImage, response);
                        showToast(response.message);
                    } else {
                        showToast(response.message || 'Failed to add', 'error');
                    }
                    btn.html(originalHtml).prop('disabled', false);
                },
                error: function (xhr) {
                    let msg = xhr.responseJSON?.message || 'Something went wrong!';
                    showToast(msg, 'error');
                    btn.html(originalHtml).prop('disabled', false);
                }
            });
        });

        function showPopup(name, price, image, response) {
            $('#popupBody').html(`
                <div class="product-detail">
                    <img src="${image}" alt="${name}" onerror="this.src='{{ asset('assets/images/no-image.png') }}'">
                    <div>
                        <h5>${name}</h5>
                        <p class="text-success fw-bold">₹${price}</p>
                        <small>Quantity: 1</small>
                    </div>
                </div>
                <div class="cart-summary">
                    <p><strong>Cart Total:</strong> ${response.cart_total || '₹0.00'}</p>
                    <p><strong>Total Items:</strong> ${response.cart_count || 0}</p>
                </div>
            `);
            $('#cartPopup').fadeIn();
            setTimeout(() => closePopup(), 4000);
        }

        function closePopup() { $('#cartPopup').fadeOut(); }

        function showToast(message, type = 'success') {
            let toast = $('#toastNotification');
            $('#toastMessage').text(message);
            if (type === 'error') {
                toast.css('background', '#dc3545');
                toast.find('.toast-icon').css('background', '#dc3545').html('<i class="fas fa-exclamation-circle"></i>');
            } else {
                toast.css('background', '#28a745');
                toast.find('.toast-icon').css('background', '#28a745').html('<i class="fas fa-check-circle"></i>');
            }
            toast.addClass('show');
            setTimeout(() => toast.removeClass('show'), 3000);
        }

        $(document).click(function (event) {
            if ($(event.target).is('#cartPopup')) closePopup();
        });
    </script>
</body>
</html>