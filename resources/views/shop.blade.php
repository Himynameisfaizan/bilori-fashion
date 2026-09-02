<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <title>Shop | Bilori</title>
    <meta name="description" content="Morden Bootstrap HTML5 Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />

    <!-- ======= All CSS Plugins here ======== -->
    <link rel="stylesheet" href="{{ asset('css/plugins/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/plugins/glightbox.min.css') }}" />
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet" />

    <!-- Plugin css -->
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
        
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
        .shop__banner {
            /*background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);*/
            padding: 60px 0;
            margin-bottom: 50px;
        }

        .filter__widget {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .filter__title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
            position: relative;
        }

        .filter__title::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 50px;
            height: 2px;
            background: #ff6b6b;
        }

        .category__list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .category__item {
            margin-bottom: 12px;
        }

        .category__link {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #666;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 5px 0;
        }

        .category__link:hover,
        .category__link.active {
            color: #ff6b6b;
            padding-left: 10px;
        }

        .category__count {
            margin-left: auto;
            color: #999;
            font-size: 12px;
        }

        .price__filter {
            margin-top: 20px;
        }

        .price__inputs {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .price__input {
            flex: 1;
        }

        .price__input label {
            font-size: 12px;
            color: #666;
            margin-bottom: 5px;
            display: block;
        }

        .price__input input {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-size: 14px;
        }

        .filter__btn {
            width: 100%;
            background: #ff6b6b;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .filter__btn:hover {
            background: #ff5252;
            transform: translateY(-2px);
        }

        .product__card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            margin-bottom: 30px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
        }

        .product__card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.15);
        }

        .product__image {
            position: relative;
            overflow: hidden;
            padding-top: 100%;
        }

        .product__image img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product__card:hover .product__image img {
            transform: scale(1.05);
        }

        .product__badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: #ff6b6b;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            z-index: 1;
        }

        .product__badge.featured {
            background: #4caf50;
        }

        .product__badge.trending {
            background: #ff9800;
        }

        .product__actions {
            position: absolute;
            bottom: -50px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            gap: 10px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.95);
            transition: bottom 0.3s ease;
        }

        .product__card:hover .product__actions {
            bottom: 0;
        }

        .product__action__btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            border: 1px solid #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .product__action__btn:hover {
            background: #ff6b6b;
            color: white;
            border-color: #ff6b6b;
        }

        .product__info {
            padding: 20px;
        }

        .product__category {
            font-size: 12px;
            color: #999;
            margin-bottom: 8px;
        }

        .product__title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .product__title a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .product__title a:hover {
            color: #ff6b6b;
        }

        .product__price {
            font-size: 18px;
            font-weight: 700;
            color: #ff6b6b;
            margin-bottom: 15px;
        }

        .product__price old {
            font-size: 14px;
            color: #999;
            text-decoration: line-through;
            margin-left: 10px;
            font-weight: normal;
        }

        .product__cart__btn {
            width: 100%;
            background: #333;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 6px;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .product__cart__btn:hover {
            background: #ff6b6b;
        }

        .product__cart__btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .pagination__wrapper {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .pagination .page-link {
            color: #333;
            border: none;
            margin: 0 5px;
            border-radius: 6px;
            padding: 8px 15px;
        }

        .pagination .page-item.active .page-link {
            background: #ff6b6b;
            color: white;
        }

        .pagination .page-link:hover {
            background: #ff6b6b;
            color: white;
        }

        /* Cart Popup Styles */
        .cart-popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
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

        .popup-header h4 {
            color: #28a745;
            margin: 0;
        }

        .popup-header button {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #999;
        }

        .popup-body {
            margin-bottom: 20px;
        }

        .product-detail {
            display: flex;
            gap: 15px;
            text-align: left;
            margin-bottom: 15px;
        }

        .product-detail img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        .cart-summary {
            background: #f8f9fa;
            padding: 12px;
            border-radius: 8px;
            margin-top: 10px;
        }

        .popup-footer {
            display: flex;
            gap: 10px;
        }

        .popup-footer button,
        .popup-footer a {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }

        .popup-footer button {
            background: #e9ecef;
            color: #333;
        }

        .popup-footer a {
            background: #ff6b6b;
            color: white;
        }

        /* Toast Notification */
        .toast-notification {
            visibility: hidden;
            min-width: 300px;
            background: #28a745;
            color: #fff;
            border-radius: 8px;
            padding: 16px;
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 10000;
            display: flex;
            align-items: center;
            gap: 12px;
            transform: translateX(400px);
            transition: all 0.3s ease;
        }

        .toast-notification.show {
            visibility: visible;
            transform: translateX(0);
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes shake {

            0%,
            100% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(15deg);
            }

            75% {
                transform: rotate(-15deg);
            }
        }

        .cart-count-update {
            animation: shake 0.3s ease;
        }

        @media (max-width: 768px) {
            .shop__banner {
                padding: 40px 0;
            }

            .filter__widget {
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    @include('partials.header')

    <main class="main__content_wrapper">

        <!-- Shop Banner -->
        <div style="padding-top:150px;" class="shop__banner bg-light">
            <div class="container pt-5">
                <div class="text-center text-dark">
                    <h1 class="display-4 mb-3">Shop Collection</h1>
                    <!--<nav aria-label="breadcrumb">-->
                    <!--    <ol class="breadcrumb justify-content-center bg-transparent">-->
                    <!--        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>-->
                    <!--        <li class="breadcrumb-item active text-white" aria-current="page">Shop</li>-->
                    <!--    </ol>-->
                    <!--</nav>-->
                </div>
            </div>
        </div>

        <div class="container py-5">
            <div class="row">

                <!-- ================= LEFT FILTER SIDEBAR ================= -->
                <div class="col-lg-3">

                    <form method="GET" action="{{ route('shop') }}" id="filterForm">

                        <!-- Categories Filter -->
                        <div class="filter__widget">
                            <h5 class="filter__title">Categories</h5>

                            <div class="category__list">
                                <div class="category__item">
                                    <a href="{{ route('shop') }}"
                                        class="category__link {{ !request('category') ? 'active' : '' }}">
                                        <span>All Products</span>
                                        <span
                                            class="category__count">({{ $totalProducts ?? $products->total() }})</span>
                                    </a>
                                </div>

                                @foreach($categories as $cat)
                                    <div class="category__item">
                                        <a href="{{ route('shop', array_merge(request()->except('category'), ['category' => $cat->id])) }}"
                                            class="category__link {{ request('category') == $cat->id ? 'active' : '' }}">
                                            <span>{{ $cat->name }}</span>
                                            <span
                                                class="category__count">({{ $cat->products_count ?? $cat->products->count() }})</span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Price Filter -->
                        <div class="filter__widget">
                            <h5 class="filter__title">Price Range</h5>

                            <div class="price__filter">
                                <div class="price__inputs">
                                    <div class="price__input">
                                        <label>Min Price</label>
                                        <input type="number" name="min_price" class="form-control"
                                            value="{{ request('min_price') }}" placeholder="Min">
                                    </div>
                                    <div class="price__input">
                                        <label>Max Price</label>
                                        <input type="number" name="max_price" class="form-control"
                                            value="{{ request('max_price') }}" placeholder="Max">
                                    </div>
                                </div>

                                <button type="submit" class="filter__btn">
                                    Apply Filter
                                </button>

                                @if(request('min_price') || request('max_price') || request('category'))
                                    <a href="{{ route('shop') }}" class="btn btn-link mt-2 d-block text-center"
                                        style="font-size: 14px;">
                                        Clear Filters
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!-- Sort Options -->
                        <div class="filter__widget">
                            <h5 class="filter__title">Sort By</h5>
                            <select name="sort" class="form-control" onchange="this.form.submit()">
                                <option value="">Default</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price:
                                    Low to High</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price:
                                    High to Low</option>
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First
                                </option>
                                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name: A to
                                    Z</option>
                                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name: Z
                                    to A</option>
                            </select>
                        </div>

                    </form>

                </div>

                <!-- ================= PRODUCTS GRID ================= -->
                <div class="col-lg-9">

                    <!-- Results Info -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <p class="mb-0 text-muted">
                            Showing {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} of
                            {{ $products->total() }} products
                        </p>
                        <div class="view__options">
                            <button class="btn btn-sm btn-outline-secondary" onclick="changeView('grid')">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <rect x="3" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="3" width="7" height="7"></rect>
                                    <rect x="3" y="14" width="7" height="7"></rect>
                                    <rect x="14" y="14" width="7" height="7"></rect>
                                </svg>
                            </button>
                            <button class="btn btn-sm btn-outline-secondary" onclick="changeView('list')">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <line x1="8" y1="6" x2="21" y2="6"></line>
                                    <line x1="8" y1="12" x2="21" y2="12"></line>
                                    <line x1="8" y1="18" x2="21" y2="18"></line>
                                    <line x1="3" y1="6" x2="3.01" y2="6"></line>
                                    <line x1="3" y1="12" x2="3.01" y2="12"></line>
                                    <line x1="3" y1="18" x2="3.01" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Products Grid -->
                 <!-- ================= PRODUCTS GRID ================= -->
<div class="row" id="productsContainer">

    @forelse($products as $product)

        <div class="col-lg-4 col-md-6 col-6 mb-4">

            <div class="product-card">

                <!-- Product Image -->
                <div class="product-img">

                    <a href="{{ route('product.detail', $product->slug) }}">

                        @if($product->image && file_exists(public_path($product->image)))
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('assets/images/no-image.png') }}" alt="{{ $product->name }}">
                        @endif

                    </a>

                    <!-- Top Left Badge -->
                    <div class="badge-group top-left">

    @if($product->is_featured == 1)

        <span class="badge-custom badge-featured">
            Featured
        </span>

    @elseif($product->is_trending == 1)

        <span class="badge-custom badge-trending">
            Trending
        </span>

    @elseif($product->is_new_arrival == 1)

        <span class="badge-custom badge-new">
            New
        </span>

    @endif

</div>

                </div>

                <!-- Product Body -->
                <div class="product-body">

                    <!-- Sale Percentage -->
                    @if($product->sale_price)

                        @php
                            $discount = round((($product->price - $product->sale_price) / $product->price) * 100);
                        @endphp

                        <div class="sale-percentage-badge">

                            <span class="sale-badge">
                                -{{ $discount }}% OFF
                            </span>

                        </div>

                    @endif

                    <!-- Product Title -->
                    <h6 class="product-title">

                        <a href="{{ route('product.detail', $product->slug) }}">
                            {{ $product->name }}
                        </a>

                    </h6>

                    <!-- Colors -->
                    @if($product->colors && $product->colors->count() > 0)

                        <div class="product-colors mb-2">

                            <small class="label-text">
                                Colors:
                            </small>

                            <div class="color-wrapper">

                                @foreach($product->colors->take(5) as $color)

                                    <span class="color-dot"
                                        style="background-color: {{ $color->code }}"
                                        title="{{ $color->name }}">
                                    </span>

                                @endforeach

                                @if($product->colors->count() > 5)

                                    <small class="more-text">
                                        +{{ $product->colors->count() - 5 }} more
                                    </small>

                                @endif

                            </div>

                        </div>

                    @endif

                    <!-- Sizes -->
                    @if($product->sizes && $product->sizes->count() > 0)

                        <div class="product-sizes mb-2">

                            <small class="label-text">
                                Sizes:
                            </small>

                            <div class="size-wrapper">

                                @foreach($product->sizes->take(5) as $size)

                                    <span class="size-tag">
                                        {{ $size->size }}
                                    </span>

                                @endforeach

                                @if($product->sizes->count() > 5)

                                    <small class="more-text">
                                        +{{ $product->sizes->count() - 5 }}
                                    </small>

                                @endif

                            </div>

                        </div>

                    @endif

                    <!-- Price -->
                    <div class="price">

                        <span class="new-price">
                            ₹{{ number_format($product->sale_price ?? $product->price, 2) }}
                        </span>

                        @if($product->sale_price)

                            <span class="old-price">
                                ₹{{ number_format($product->price, 2) }}
                            </span>

                        @endif

                    </div>

                    <!-- Add To Cart -->
                    <button type="button"
    class="btn-cart add-to-cart-btn"
    data-id="{{ $product->id }}"
    data-name="{{ $product->name }}"
    data-price="{{ $product->sale_price ?? $product->price }}"
    data-image="{{ $product->image && file_exists(public_path($product->image)) ? asset($product->image) : asset('assets/images/no-image.png') }}"
    {{ $product->stock_quantity <= 0 ? 'disabled' : '' }}>
    <i class="fas fa-shopping-cart"></i>
    {{ $product->stock_quantity <= 0 ? 'Out of Stock' : 'Add to Cart' }}
</button>

                </div>

            </div>

        </div>

    @empty

        <div class="col-12 text-center py-5">

            <h4>No Products Found</h4>

        </div>

    @endforelse

</div>

                    <!-- Pagination -->
                    <div class="pagination__wrapper">
                        {{ $products->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>

                </div>

            </div>
        </div>
        
        <style>
            /* ================= PRODUCT CARD ================= */

.product-card{
    border:1px solid #e5e5e5;
    border-radius:10px;
    overflow:hidden;
    background:#fff;
    transition:all 0.3s ease;
    height:100%;
    position:relative;
}

.product-card:hover{
    transform:translateY(-4px);
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
}

/* ================= PRODUCT IMAGE ================= */

.product-img{
    position:relative;
    overflow:hidden;
    background:#f8f8f8;
}

.product-img img{
    width:100%;
    /*height:320px;*/
    object-fit:cover;
    transition:0.4s ease;
}

.product-card:hover .product-img img{
    transform:scale(1.05);
}

/* ================= BADGES ================= */

/* ================= CORNER BADGE ================= */

.badge-group.top-left{
    position:absolute;
    top:0;
    left:0;
    z-index:5;
}

.badge-custom{
    position:absolute;
    top:15px;
    left:-35px;
    width:140px;
    text-align:center;
    transform:rotate(-45deg);
    padding:6px 0;
    font-size:11px;
    font-weight:700;
    text-transform:uppercase;
    letter-spacing:1px;
    color:#fff;
    box-shadow:0 3px 10px rgba(0,0,0,0.2);
}

.badge-featured{
    background:#f39c12;
}

.badge-trending{
    background:#e74c3c;
}

.badge-new{
    background:#27ae60;
}

/* ================= PRODUCT BODY ================= */

.product-body{
    padding:16px;
}

/* ================= SALE BADGE ================= */

.sale-percentage-badge{
    margin-bottom:12px;
        text-align: center;
}

.sale-badge{
    background:#c40000;
    color:#fff;
    font-size:13px;
    font-weight:700;
    padding:6px 14px;
    border-radius:4px;
    display:inline-block;
}

/* ================= TITLE ================= */

.product-title{
    font-size:15px;
    font-weight:500;
    line-height:1.5;
    margin-bottom:12px;
    min-height:45px;
}

.product-title a{
    color:#333;
    text-decoration:none;
    transition:0.3s ease;
}

.product-title a:hover{
    color:#c40000;
}

/* ================= LABELS ================= */

.label-text{
    color:#777;
    font-size:12px;
    display:block;
    margin-bottom:6px;
}

/* ================= COLORS ================= */

.color-wrapper{
    display:flex;
    align-items:center;
    gap:6px;
    flex-wrap:wrap;
}

.color-dot{
    width:16px;
    height:16px;
    border-radius:50%;
    border:1px solid #ddd;
    cursor:pointer;
    transition:0.2s ease;
}

.color-dot:hover{
    transform:scale(1.15);
    border-color:#c40000;
}

/* ================= SIZES ================= */

.size-wrapper{
    display:flex;
    gap:6px;
    flex-wrap:wrap;
}

.size-tag{
    border:1px solid #ddd;
    padding:3px 8px;
    border-radius:4px;
    font-size:12px;
    transition:0.2s ease;
    cursor:pointer;
}

.size-tag:hover{
    background:#c40000;
    color:#fff;
    border-color:#c40000;
}

.more-text{
    font-size:12px;
    color:#999;
}

/* ================= PRICE ================= */

.price{
    display:flex;
    align-items:center;
    gap:10px;
    margin-top:15px;
    margin-bottom:15px;
}

.new-price{
    font-size:22px;
    font-weight:700;
    color:#c40000;
}

.old-price{
    font-size:14px;
    color:#999;
    text-decoration:line-through;
}

/* ================= CART BUTTON ================= */

.btn-cart{
    width:100%;
    background:#000;
    color:#fff;
    border:none;
    padding:12px;
    border-radius:6px;
    font-size:14px;
    font-weight:600;
    transition:0.3s ease;
    cursor:pointer;
}

.btn-cart:hover{
    background:#c40000;
    color:#fff;
    transform:translateY(-1px);
}

/* ================= MOBILE ================= */

@media(max-width:768px){

    .product-img img{
        height:220px;
    }

    .product-title{
        font-size:13px;
        min-height:40px;
    }

    .new-price{
        font-size:18px;
    }

    .old-price{
        font-size:12px;
    }

    .btn-cart{
        padding:10px;
        font-size:13px;
    }

    .sale-badge{
        font-size:12px;
        padding:5px 10px;
    }

    .badge-custom{
        font-size:10px;
        padding:4px 10px;
    }

}
        </style>

    </main>

    <!-- Cart Popup -->
    <div id="cartPopup" class="cart-popup">
        <div class="cart-popup-content">
            <div class="popup-header">
                <h4><i class="fas fa-check-circle"></i> Added to Cart!</h4>
                <button onclick="closePopup()">×</button>
            </div>
            <div class="popup-body" id="popupBody"></div>
            <div class="popup-footer">
                <button onclick="closePopup()">Continue Shopping</button>
                <a href="{{ route('cart.index') }}">View Cart →</a>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div id="toastNotification" class="toast-notification">
        <div class="toast-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="toast-content">
            <strong>Success!</strong>
            <span id="toastMessage">Product added to cart</span>
        </div>
    </div>

    @include('partials.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // CSRF Token for AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Add to Cart Function
      // Add to Cart Function
$(document).on('click', '.add-to-cart-btn', function () {
    let btn = $(this);
    let productId = btn.data('id');
    let productName = btn.data('name');
    let productPrice = btn.data('price');
    let productImage = btn.data('image');

    // Show loading state
    let originalHtml = btn.html();
    btn.html('<i class="fas fa-spinner fa-spin"></i> Adding...').prop('disabled', true);

    $.ajax({
        // FIXED: Use dynamic URL with productId from data attribute
        url: "{{ url('cart/add') }}/" + productId,
        type: "POST",
        data: {
            product_id: productId,
            quantity: 1
        },
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                // Update cart count
                if (response.cart_count !== undefined) {
                    updateCartCounter(response.cart_count);
                }

                // Show popup
                showPopup(productName, productPrice, productImage, response);

                // Show toast
                showToast(response.message);
            } else {
                showToast(response.message || 'Failed to add to cart', 'error');
            }
            btn.html(originalHtml).prop('disabled', false);
        },
        error: function (xhr) {
            console.error('Error:', xhr);
            let errorMsg = xhr.responseJSON?.message || 'Something went wrong!';
            showToast(errorMsg, 'error');
            btn.html(originalHtml).prop('disabled', false);
        }
    });
});

        // Show popup
       // Show popup
function showPopup(name, price, image, response) {
    $('#popupBody').html(`
        <div class="product-detail">
            <img src="${image}" alt="${name}" onerror="this.src='{{ asset('assets/images/no-image.png') }}'">
            <div>
                <h5>${name}</h5>
                <p class="text-success fw-bold">₹${parseFloat(price).toFixed(2)}</p>
                <small>Quantity: 1</small>
            </div>
        </div>
        <div class="cart-summary">
            <p><strong>Cart Total:</strong> ${response.cart_total || '₹0.00'}</p>
            <p><strong>Total Items:</strong> ${response.cart_count || 0}</p>
            ${response.bogo_discount && response.bogo_discount !== '₹0.00' ? 
                `<p class="text-success"><strong>🎁 BOGO Discount:</strong> -${response.bogo_discount}</p>` : ''}
        </div>
    `);
    $('#cartPopup').fadeIn();

    // Auto close after 4 seconds
    setTimeout(() => {
        closePopup();
    }, 4000);
}

        // Close popup
        function closePopup() {
            $('#cartPopup').fadeOut();
        }

        // Show toast notification
        function showToast(message, type = 'success') {
            let toast = $('#toastNotification');
            let toastMessage = $('#toastMessage');

            toastMessage.text(message);

            if (type === 'success') {
                toast.css('background', '#28a745');
                toast.find('.toast-icon').css('background', '#28a745').html('<i class="fas fa-check-circle"></i>');
                toast.find('.toast-content strong').text('Success!');
            } else {
                toast.css('background', '#dc3545');
                toast.find('.toast-icon').css('background', '#dc3545').html('<i class="fas fa-exclamation-circle"></i>');
                toast.find('.toast-content strong').text('Error!');
            }

            toast.addClass('show');
            setTimeout(() => {
                toast.removeClass('show');
            }, 3000);
        }

        // Update cart counter with animation
        function updateCartCounter(count) {
            let cartBadge = $('.cart-count');
            if (cartBadge.length) {
                cartBadge.text(count);
                cartBadge.addClass('cart-count-update');
                setTimeout(() => {
                    cartBadge.removeClass('cart-count-update');
                }, 300);
            }
        }

        // Close popup when clicking outside
        $(document).click(function (event) {
            if ($(event.target).is('#cartPopup') || $(event.target).closest('#cartPopup').length === 0 && $(event.target).is('#cartPopup') === false) {
                // Only close if clicking on the overlay background
                if ($(event.target).is('#cartPopup')) {
                    closePopup();
                }
            }
        });

        // Load initial cart count
        $(document).ready(function () {
            $.get('/cart/count', function (data) {
                if (data && data.count !== undefined) {
                    $('.cart-count').text(data.count);
                }
            }).fail(function () {
                console.log('Cart info not available');
            });
        });

        function changeView(view) {
            if (view === 'list') {
                document.getElementById('productsContainer').classList.remove('row-cols-1', 'row-cols-md-2', 'row-cols-lg-3');
                document.getElementById('productsContainer').classList.add('list-view');
            } else {
                document.getElementById('productsContainer').classList.remove('list-view');
            }
        }

        function addToWishlist(productId) {
            fetch('/wishlist/add/' + productId, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast('Added to wishlist!', 'success');
                    } else if (data.message) {
                        showToast(data.message, 'error');
                    }
                }).catch(() => {
                    showToast('Please login to add to wishlist', 'error');
                });
        }

        function quickView(productId) {
            window.location.href = '/product/' + productId;
        }
    </script>
</body>

</html>