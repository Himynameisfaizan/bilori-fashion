<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <title>Bilori</title>
    <meta name="description" content="Beroli" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />
  <meta name="google-site-verification" content="GJ6lVCm0HKPp2DUnjyT-Id3W_WVfbKmDiTGv61kjPBI" />
<link rel="canonical" href="https://www.bilorifashion.com/">
<meta name="robots" content="index, follow">



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
        
        <!-- Meta Pixel Code -->
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



<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=840233335473914&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->

    <style>
        /* Category and product styles (same as before) */
        .category-section {
            background: #f8f9fa;
        }

        .cat-card {
            display: block;
            position: relative;
            border-radius: 14px;
            overflow: hidden;
            text-decoration: none;
            height: 200px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
            transition: 0.3s;
        }

        .cat-card:hover {
            transform: translateY(-5px);
        }

        .cat-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.5s;
        }

        .cat-card:hover .cat-img img {
            transform: scale(1.1);
        }

        .cat-overlay {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 15px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
            color: #fff;
        }

        .cat-overlay h5 {
            margin: 0;
            font-weight: 600;
        }

        .cat-overlay span {
            font-size: 12px;
            opacity: 0.8;
        }

        .product-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid #eee;
            transition: 0.3s ease;
            text-align: center;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }

        .product-img {
            position: relative;
            overflow: hidden;
        }

        .product-img img {
            width: 100%;
            height: 260px;
            object-fit: cover;
            transition: 0.4s ease;
        }

        .product-card:hover .product-img img {
            transform: scale(1.08);
        }

        .product-img .badge {
            position: absolute;
            top: 12px;
            left: 12px;
            padding: 6px 10px;
            font-size: 12px;
            border-radius: 6px;
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
            font-size: 12px;
        }

        .price {
            margin-bottom: 12px;
        }

        .price .new {
            font-weight: bold;
            font-size: 16px !important;
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
        }

        .btn-cart:hover {
            background: #ff4d00;
            color: #fff;
        }

        .product-tabs .nav-link {
            border-radius: 30px;
            padding: 8px 18px;
            margin: 0 5px;
            background: #f5f5f5;
            color: #333;
        }

        .product-tabs .nav-link.active {
            background: #000;
            color: #fff;
        }

        /* Popup & Toast Styles */
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

        .toast-icon {
            background: #28a745;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
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
    </style>
</head>

<body>
    @include('partials.header')

    <main class="main__content_wrapper">
       
        
<!-- =========================
        MOBILE SLIDER
========================= -->
<section class="hero__slider--section mobile-slider-only">

    <div class="swiper hero__slider--activation">

        <div class="swiper-wrapper">

            @forelse($mobileBanners as $banner)

                <div class="swiper-slide">

                    @if($banner->link)
                        <a href="{{ $banner->link }}" class="d-block">
                    @endif

                    <div class="hero__slider--items"
                         style="background-image:url('{{ asset($banner->image) }}');">

                        <div class="hero__overlay"></div>

                    </div>

                    @if($banner->link)
                        </a>
                    @endif

                </div>

            @empty
            @endforelse

        </div> <div class="swiper-pagination"></div>

    </div>

</section>


<!-- =========================
        DESKTOP SLIDER
========================= -->
<section class="hero__slider--section d-none d-md-block">

    <div class="swiper hero__slider--activation">

        <div class="swiper-wrapper">

    @forelse($laptopBanners as $banner)

        <div class="swiper-slide">

            @if($banner->link)
                <a href="{{ $banner->link }}" class="d-block">
            @endif

            <div class="hero__slider--items"
                 style="background-image:url('{{ asset($banner->image) }}');">

                <div class="hero__overlay"></div>

                <div class="slider__content">

                    @if($banner->button_text)
                        <span class="slider__btn">
                            {{ $banner->button_text }}
                        </span>
                    @endif

                </div>

            </div>

            @if($banner->link)
                </a>
            @endif

        </div>

    @empty

    @endforelse

</div>

        <div class="swiper-pagination"></div>

    </div>

</section>



<style>

/* =========================
        HEADER ABOVE SLIDER
========================= */
header,
.site-header,
.main-header,
.header,
.header__section{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 99999 !important;
    background: transparent !important;
}


/* =========================
        SLIDER SECTION
========================= */
.hero__slider--section{
    position: relative;
    overflow: hidden;
    z-index: 1;
}

/* MOBILE ONLY */
.mobile-slider-only{
    display: block;
    position: relative;
    z-index: 1;
}

/* DESKTOP HIDE MOBILE */
@media (min-width:768px){
    .mobile-slider-only{
        display:none !important;
    }
}


/* =========================
        SWIPER FIX
========================= */
.swiper,
.swiper-wrapper,
.swiper-slide{
    z-index: 1 !important;
}


/* =========================
        SLIDER ITEM
========================= */
.hero__slider--items{
    position: relative;
    width: 100%;
    min-height: 100vh;

    display: flex;
    align-items: center;

    background-size: cover !important;
    background-position: center center !important;
    background-repeat: no-repeat !important;
}


/* MOBILE HEIGHT */
.mobile-slider-only .hero__slider--items{
    height: 300px;
}


/* =========================
        OVERLAY
========================= */
.hero__overlay{
    position: absolute;
    inset: 0;
    z-index: 1;

    /* OPTIONAL DARK OVERLAY */

    /*
    background: linear-gradient(
        90deg,
        rgba(0,0,0,0.70) 0%,
        rgba(0,0,0,0.40) 45%,
        rgba(0,0,0,0.15) 100%
    );
    */
}


/* =========================
        CONTENT
========================= */
.slider__content{
    position: relative;
    z-index: 2;

    max-width: 650px;
    padding-left: 70px;
}


/* MOBILE CENTER */
.mobile-slider-only .slider__content{
    width: 100%;
    padding: 0 20px;
    text-align: center;
}


/* =========================
        BUTTON
========================= */
.slider__btn{
    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 12px;

    padding: 16px 34px;

    border: 2px solid #c62828;
    border-radius: 60px;

    color: #fff;
    font-size: 14px;
    font-weight: 700;

    letter-spacing: 1px;
    text-transform: uppercase;

    text-decoration: none;

    box-shadow: 0 10px 30px rgba(0,0,0,0.20);

    transition: all 0.35s ease;
}

.slider__btn:hover{
    transform: translateY(-4px);
    box-shadow: 0 16px 40px rgba(0,0,0,0.30);
    color: #fff;
}


/* =========================
        PAGINATION
========================= */
.swiper-pagination{
    bottom: 28px !important;
    z-index: 3;
}

.swiper-pagination-bullet{
    width: 12px;
    height: 12px;

    background: #fff;
    opacity: 0.45;

    transition: 0.3s ease;
}

.swiper-pagination-bullet-active{
    opacity: 1;
    background: #c62828;
    transform: scale(1.2);
}


/* =========================
        TABLET
========================= */
@media(max-width:991px){

    .hero__slider--items{
        min-height: 80vh;
    }

    .slider__content{
        padding-left: 40px;
        max-width: 520px;
    }

}


/* =========================
        MOBILE
========================= */
@media(max-width:768px){

    header,
    .site-header,
    .main-header,
    .header,
    .header__section{
        position: absolute;
        background: transparent !important;
    }

    .hero__slider--items{
        background-size: cover !important;
        background-position: center center !important;
    }

    .slider__content{
        padding: 0 20px;
        max-width: 100%;
        text-align: center;
        margin: 0 auto;
    }

    .slider__btn{
        padding: 12px 24px;
        font-size: 12px;
    }

}


/* =========================
        SMALL MOBILE
========================= */
@media(max-width:480px){

    .slider__btn{
        padding: 10px 20px;
        font-size: 11px;
    }

}

</style>

        
        <!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<section class="category-section py-5">
    <div class="container-fluid px-lg-4">

        <!-- Heading -->
        <div class="section-heading text-center mb-5">
            <h2>Category</h2>
           
        </div>

        <!-- Owl Carousel -->
        <div class="owl-carousel category-slider">

            @foreach($categories as $category)

            <div class="item">

                <a href="{{ url('category/' . $category->slug) }}" class="category-card">

                    <div class="category-image">

                        @if($category->image && file_exists(public_path($category->image)))
                            <img src="{{ asset($category->image) }}" alt="{{ $category->name }}">
                        @else
                            <img src="{{ asset('assets/images/no-image.png') }}" alt="{{ $category->name }}">
                        @endif

                    </div>

                    <div class="category-overlay">

                        <div class="category-content">

                            <h3>
                                {{ strtoupper($category->name) }}
                            </h3>

                            <span>
                                
                            </span>

                        </div>

                    </div>

                </a>

            </div>

            @endforeach

        </div>

    </div>
</section>

<!-- jQuery -->


<style>
    /* =========================================
CATEGORY SECTION PREMIUM DESIGN
FULLY RESPONSIVE
========================================= */

.category-section{
    background:#fff;
    overflow:hidden;
    padding:80px 80px;
}

/* =========================
HEADING
========================= */

.section-heading{
    max-width:700px;
    margin:auto;
    padding:0 15px;
}

.section-heading h2{
    font-size:46px;
    font-weight:800;
    color:#111;
    margin-bottom:14px;
    font-family:'Montserrat', sans-serif;
    letter-spacing:-1px;
    position:relative;
    display:inline-block;
}

.section-heading h2::after{
    content:'';
    position:absolute;
    left:50%;
    transform:translateX(-50%);
    bottom:-12px;
    width:80px;
    height:4px;
    background:#c62828;
    border-radius:20px;
}

.section-heading p{
    margin-top:25px;
    color:#777;
    font-size:16px;
    line-height:1.7;
}

/* =========================================
CATEGORY CARD
========================================= */

.category-card{
    position:relative;
    display:block;
    overflow:hidden;
    border-radius:24px;
    text-decoration:none;
    height:100%;
    background:#000;
    isolation:isolate;
    transition:all 0.4s ease;
}

.category-card:hover{
    transform:translateY(-5px);
}

/* =========================
IMAGE
========================= */

.category-image{
    position:relative;
    overflow:hidden;
    height:650px;
}

.category-image::after{
    content:'';
    position:absolute;
    inset:0;
    background:linear-gradient(
        to top,
        rgba(0,0,0,0.80) 0%,
        rgba(0,0,0,0.25) 45%,
        rgba(0,0,0,0.08) 100%
    );
    z-index:1;
}

.category-image img{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:transform 0.8s ease;
    display:block;
}

.category-card:hover img{
    transform:scale(1.08);
}

/* =========================
OVERLAY
========================= */

.category-overlay{
    position:absolute;
    inset:0;
    z-index:3;

    display:flex;
    align-items:flex-end;
    justify-content:center;

    padding:40px;
}

.category-content{
    width:100%;
    text-align:center;
}

/* =========================
TITLE
========================= */

.category-content h3{
    font-size:20px;
    line-height:1.2;
    font-weight:700;
    color:#fff;
    margin-bottom:18px;

    text-transform:uppercase;
    letter-spacing:2px;

    font-family:'Montserrat', sans-serif;

    text-shadow:0 6px 25px rgba(0,0,0,0.35);
    word-break:break-word;
}

/* =========================
BUTTON
========================= */

.category-content span{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:10px;

    padding:14px 28px;

    border-radius:60px;

    background:#fff;
    color:#111;

    font-size:13px;
    font-weight:700;
    letter-spacing:1px;
    text-transform:uppercase;

    transition:all 0.35s ease;
}

.category-content span::after{
    content:'→';
    font-size:16px;
    transition:0.3s ease;
}

.category-card:hover .category-content span{
    background:#c62828;
    color:#fff;
    transform:translateY(-3px);
}

.category-card:hover .category-content span::after{
    transform:translateX(4px);
}

/* =========================================
LARGE LAPTOP
========================================= */

@media (max-width:1400px){

    .category-image{
        height:560px;
    }

    .category-content h3{
        font-size:20px;
    }
}

/* =========================================
LAPTOP
========================================= */

@media (max-width:1199px){

    .category-image{
        height:500px;
    }

    .category-content h3{
        font-size:28px;
    }

    .category-overlay{
        padding:30px;
    }
}

/* =========================================
TABLET
========================================= */

@media (max-width:991px){

    .category-section{
        padding:70px 0;
    }

    .section-heading h2{
        font-size:38px;
    }

    .category-image{
        height:420px;
    }

    .category-content h3{
        font-size:24px;
        letter-spacing:1px;
    }

    .category-content span{
        padding:12px 24px;
        font-size:12px;
    }
}

/* =========================================
MOBILE
========================================= */

@media (max-width:767px){

    .category-section{
        padding:50px 0;
    }

    .section-heading{
        margin-bottom:40px !important;
    }

    .section-heading h2{
        font-size:30px;
    }

    .section-heading h2::after{
        width:60px;
        height:3px;
    }

    .section-heading p{
        font-size:14px;
        margin-top:18px;
    }

    .row.g-3{
        --bs-gutter-y:1rem;
    }

    .category-image{
        height:340px;
    }

    .category-overlay{
        padding:20px;
    }

    .category-content h3{
        font-size:22px;
        margin-bottom:14px;
    }

    .category-content span{
        padding:10px 18px;
        font-size:11px;
        gap:6px;
    }
}

/* =========================================
SMALL MOBILE
========================================= */

@media (max-width:575px){

    .container-fluid{
        padding-left:15px !important;
        padding-right:15px !important;
    }

    .category-card{
        border-radius:18px;
    }

    .category-image{
        height:300px;
    }

    .category-overlay{
        padding:18px;
    }

    .category-content h3{
        font-size:20px;
        line-height:1.3;
        margin-bottom:12px;
    }

    .category-content span{
        width:100%;
        max-width:220px;
        padding:10px 15px;
        font-size:10px;
    }
}

/* =========================================
EXTRA SMALL DEVICES
========================================= */

@media (max-width:380px){

    .section-heading h2{
        font-size:26px;
    }

    .category-image{
        height:260px;
    }

    .category-content h3{
        font-size:18px;
    }

    .category-content span{
        font-size:9px;
        padding:9px 12px;
    }
}
</style>
<!-- Swiper CSS -->
<!-- SWIPER CSS -->
<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<!-- SWIPER JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<!-- =========================
        PRODUCTS SECTION
========================= -->
<section class="product-section py-5">

    <div class="container-fluid">

        <!-- TABS -->
        <ul class="nav nav-pills justify-content-center product-tabs mb-5"
            id="productTabs">

            <li class="nav-item">
                <button class="nav-link active"
                        data-bs-toggle="tab"
                        data-bs-target="#newarrival"
                        type="button">
                    New Arrival
                </button>
            </li>

            <li class="nav-item">
                <button class="nav-link"
                        data-bs-toggle="tab"
                        data-bs-target="#trending"
                        type="button">
                    Trending
                </button>
            </li>

            <li class="nav-item">
                <button class="nav-link"
                        data-bs-toggle="tab"
                        data-bs-target="#featured"
                        type="button">
                    Featured
                </button>
            </li>

        </ul>


        <!-- TAB CONTENT -->
        <div class="tab-content">

            <!-- =========================
                    NEW ARRIVAL
            ========================== -->
            <div class="tab-pane fade show active"
                 id="newarrival">

                <div class="swiper productSlider">

                    <div class="swiper-wrapper">

                        @foreach($newArrival as $product)

                            <div class="swiper-slide">

                                @include('product-card', ['product' => $product])

                            </div>

                        @endforeach

                    </div>

                    <!-- NAVIGATION -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                    <!-- PAGINATION -->
                    <div class="swiper-pagination"></div>

                </div>

            </div>



            <!-- =========================
                    TRENDING
            ========================== -->
            <div class="tab-pane fade"
                 id="trending">

                <div class="swiper productSlider">

                    <div class="swiper-wrapper">

                        @foreach($trending as $product)

                            <div class="swiper-slide">

                                @include('product-card', ['product' => $product])

                            </div>

                        @endforeach

                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                    <div class="swiper-pagination"></div>

                </div>

            </div>



            <!-- =========================
                    FEATURED
            ========================== -->
            <div class="tab-pane fade"
                 id="featured">

                <div class="swiper productSlider">

                    <div class="swiper-wrapper">

                        @foreach($featured as $product)

                            <div class="swiper-slide">

                                @include('product-card', ['product' => $product])

                            </div>

                        @endforeach

                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                    <div class="swiper-pagination"></div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- =========================
        CSS
========================= -->
<style>

.product-section{
    overflow: hidden;
    padding: 80px;
}

/* SWIPER */
.productSlider{
    padding: 10px 10px 50px;
    position: relative;
}

/* SLIDE */
.productSlider .swiper-slide{
    height: auto;
}

/* PRODUCT CARD FULL HEIGHT */
.productSlider .product-card{
    height: 100%;
}


/* NAVIGATION BUTTONS */
.productSlider .swiper-button-next,
.productSlider .swiper-button-prev{

    width: 42px;
    height: 42px;
    background: #fff;
    border-radius: 50%;
    box-shadow: 0 2px 12px rgba(0,0,0,0.15);

}

/* Make sure the image container stretches 100% with no gaps */
.product-card .product-img-wrapper, 
.product-card .card-img-top-wrapper {
    width: 100%;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

/* Force the image to fill the layout completely without distorting */
.product-card img, 
.product-card .card-img-top {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important; /* Fills container cleanly */
    display: block;
}

/* Optional: If the overall template section wrapper has too much side padding on web views */
.product-section {
    overflow: hidden;
    padding: 80px 0px; /* Reduced horizontal padding to 0px to pull cards edge-to-edge */
}

.productSlider .swiper-button-next::after,
.productSlider .swiper-button-prev::after{

    font-size: 16px;
    font-weight: bold;
    color: #000;

}


/* PAGINATION */
.productSlider .swiper-pagination-bullet{
    background: #ccc;
    opacity: 1;
}

.productSlider .swiper-pagination-bullet-active{
    background: #000;
}


/* MOBILE */
@media(max-width:767px){

    .productSlider{
        padding: 10px 5px 40px;
    }

    .productSlider .swiper-button-next,
    .productSlider .swiper-button-prev{

        width: 35px;
        height: 35px;
    }

    .productSlider .swiper-button-next::after,
    .productSlider .swiper-button-prev::after{

        font-size: 14px;
    }

}

</style>



<!-- =========================
        SWIPER JS
========================= -->
<script>

document.addEventListener('DOMContentLoaded', function () {

    // ALL SLIDERS
    document.querySelectorAll('.productSlider').forEach(slider => {

        new Swiper(slider, {

            loop: true,

            spaceBetween: 20,

            slidesPerView: 1,
            autoplay: {
        delay: 2000, // 3 sec
        disableOnInteraction: false,
    },

            navigation: {
                nextEl: slider.querySelector('.swiper-button-next'),
                prevEl: slider.querySelector('.swiper-button-prev'),
            },

            pagination: {
                el: slider.querySelector('.swiper-pagination'),
                clickable: true,
            },

            breakpoints: {

                // MOBILE
                0: {
                    slidesPerView: 1
                },

                // TABLET
                768: {
                    slidesPerView: 2
                },

                // LAPTOP
                992: {
                    slidesPerView: 3
                },

                // DESKTOP
                1200: {
                    slidesPerView: 5
                }

            }

        });

    });


    // TAB CHANGE FIX
    const tabs = document.querySelectorAll('#productTabs button');

    tabs.forEach(tab => {

        tab.addEventListener('shown.bs.tab', function () {

            document.querySelectorAll('.productSlider').forEach(slider => {

                if (slider.swiper) {
                    slider.swiper.update();
                }

            });

        });

    });

});

</script>
        
         

        <!-- Best Seller Swiper (kept as original) -->
        <section class="product__section section--padding pt-0">
    <div class="container-fluid">
        <div class="section__heading text-center mb-50">
            <h2 class="section__heading--maintitle">Our Best Seller</h2>
        </div>
        
        <div class="product__section--inner product__swiper--activation swiper">
            <div class="swiper-wrapper">
                @foreach($trending as $product)
                    <div class="swiper-slide">
                        <div class="product__items">
                            
                            {{-- Product Image --}}
                            <div class="product__items--thumbnail position-relative">
                                <a class="product__items--link" href="{{ url('product/' . $product->slug) }}">
                                    {{-- ✅ Updated for public folder --}}
                                    @if($product->image && file_exists(public_path($product->image)))
                                        <img class="product__items--img product__primary--img"
                                            src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                    @else
                                        <img class="product__items--img product__primary--img"
                                            src="{{ asset('assets/images/no-image.png') }}" alt="{{ $product->name }}">
                                    @endif
                                </a>
                                
                                {{-- Badges --}}
                                <!--<div class="product__badge">-->
                                <!--    @if($product->sale_price)-->
                                <!--        <span class="product__badge--items sale">Sale</span>-->
                                <!--    @endif-->
                                <!--    @if($product->is_featured)-->
                                <!--        <span class="product__badge--items featured">Featured</span>-->
                                <!--    @endif-->
                                <!--    @if($product->is_trending)-->
                                <!--        <span class="product__badge--items trending">Trending</span>-->
                                <!--    @endif-->
                                <!--    @if($product->is_new_arrival)-->
                                <!--        <span class="product__badge--items new">New</span>-->
                                <!--    @endif-->
                                <!--</div>-->
                                
                                {{-- Quick Actions Overlay --}}
                                <div class="product__quick--actions">
                                    @if($product->colors && $product->colors->count() > 0)
                                        <div class="product__colors--preview">
                                            @foreach($product->colors->take(4) as $color)
                                                <span class="color--dot" 
                                                      style="background-color: {{ $color->code }};"
                                                      title="{{ $color->name }}">
                                                </span>
                                            @endforeach
                                            @if($product->colors->count() > 4)
                                                <span class="color--more">+{{ $product->colors->count() - 4 }}</span>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            {{-- Product Content --}}
                            <div class="product__items--content text-center">
                                <span class="product__items--content__subtitle">
                                    {{ $product->category->name ?? 'Product' }}
                                </span>
                                
                                <h3 class="product__items--content__title h4">
                                    <a href="{{ url('product/' . $product->slug) }}">{{ $product->name }}</a>
                                </h3>
                                
                                {{-- ✅ Available Colors --}}
                                @if($product->colors && $product->colors->count() > 0)
                                    <div class="product__colors mb-2">
                                        <div class="d-flex justify-content-center gap-1">
                                            @foreach($product->colors->take(5) as $color)
                                                <div class="color-circle" 
                                                     style="background-color: {{ $color->code }}; 
                                                            width: 18px; height: 18px; 
                                                            border-radius: 50%; 
                                                            border: 1px solid #ddd;
                                                            cursor: pointer;"
                                                     title="{{ $color->name }} @if($color->extra_price > 0) (+₹{{ $color->extra_price }}) @endif"
                                                     data-bs-toggle="tooltip">
                                                </div>
                                            @endforeach
                                            @if($product->colors->count() > 5)
                                                <small class="text-muted align-self-center">
                                                    +{{ $product->colors->count() - 5 }}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                
                                {{-- ✅ Available Sizes --}}
                                @if($product->sizes && $product->sizes->count() > 0)
                                    <div class="product__sizes mb-2">
                                        <small class="text-muted">Sizes: </small>
                                        @foreach($product->sizes->take(4) as $size)
                                            <span class="size--tag">{{ $size->size }}</span>
                                        @endforeach
                                        @if($product->sizes->count() > 4)
                                            <small class="text-muted">+{{ $product->sizes->count() - 4 }}</small>
                                        @endif
                                    </div>
                                @endif
                                
                                {{-- Price --}}
                                <div class="product__items--price">
                                    <span class="current__price">
                                        ₹{{ $product->sale_price ?? $product->price }}
                                    </span>
                                    @if($product->sale_price)
                                        <span class="price__divided"></span>
                                        <span class="old__price">₹{{ $product->price }}</span>
                                        <span class="discount__percent">
                                            -{{ round((($product->price - $product->sale_price) / $product->price) * 100) }}%
                                        </span>
                                    @endif
                                </div>
                                
                                {{-- Stock Status --}}
                                @if($product->stock_quantity <= 0)
                                    <div class="stock__status out--of--stock">
                                        <span class="text-danger">Out of Stock</span>
                                    </div>
                                @elseif($product->stock_quantity <= 5)
                                    <div class="stock__status low--stock">
                                        <span class="text-warning">Only {{ $product->stock_quantity }} left</span>
                                    </div>
                                @endif
                                
                                {{-- Action Buttons --}}
                                <ul class="product__items--action d-flex justify-content-center">
                                    <li class="product__items--action__list">
                                        <button type="button" 
        class="btn btn-cart add-to-cart-btn"
        data-id="{{ $product->id }}" 
        data-name="{{ $product->name }}"
        data-price="{{ $product->sale_price ?? $product->price }}"
        data-image="{{ $product->image ? asset($product->image) : asset('assets/images/no-image.png') }}"
        {{ $product->stock_quantity <= 0 ? 'disabled' : '' }}>
    <i class="fas fa-shopping-cart"></i> 
    {{ $product->stock_quantity <= 0 ? 'Out of Stock' : 'Add to Cart' }}
</button>
                                    </li>
                                    <li class="product__items--action__list">
                                        <a class="product__items--action__btn"
                                            href="{{ url('product/' . $product->slug) }}" 
                                            title="Quick View">
                                            👁
                                        </a>
                                    </li>
                                    <!--<li class="product__items--action__list">-->
                                    <!--    <button type="button" -->
                                    <!--            class="product__items--action__btn wishlist-btn"-->
                                    <!--            data-id="{{ $product->id }}"-->
                                    <!--            title="Add to Wishlist">-->
                                    <!--        ♥-->
                                    <!--    </button>-->
                                    <!--</li>-->
<!--                                    <a href="{{ route('wishlist.index') }}">-->
<!--    ❤️ Wishlist-->
<!--</a>-->
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                @endforeach
            </div>
            <script>
document.querySelectorAll('.wishlist-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        let id = this.dataset.id;

        fetch("{{ route('wishlist.add') }}", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ id: id })
        })
        .then(res => res.json())
        .then(data => {
            alert('Added to wishlist ❤️');
        });
    });
});
</script>
            
            {{-- Swiper Navigation --}}
            <div class="swiper__nav--btn swiper-button-next"></div>
            <div class="swiper__nav--btn swiper-button-prev"></div>
            
            {{-- Swiper Pagination --}}
            <div class="swiper-pagination mt-4"></div>
        </div>
    </div>
</section>

<style>
    /* =========================================
BEST SELLER SECTION MODERN UI
FULLY RESPONSIVE
========================================= */

.product__section{
    padding:80px 80px;
    background:#fafafa;
    overflow:hidden;
}

/* =========================================
CONTAINER
========================================= */

.container-fluid{
    padding-left:20px;
    padding-right:20px;
}

/* =========================================
HEADING
========================================= */

.section__heading{
    margin-bottom:55px;
    padding:0 15px;
}

.section__heading--maintitle{
    font-size:42px;
    font-weight:700;
    color:#111;
    position:relative;
    display:inline-block;
    margin:0;
    letter-spacing:-0.5px;
    line-height:1.2;
}

.section__heading--maintitle::after{
    content:'';
    position:absolute;
    left:50%;
    bottom:-14px;
    transform:translateX(-50%);
    width:70px;
    height:3px;
    background:#111;
    border-radius:20px;
}

/* =========================================
PRODUCT CARD
========================================= */

.product__items{
    background:#fff;
    border-radius:24px;
    overflow:hidden;
    transition:all .35s ease;
    position:relative;
    border:1px solid #f1f1f1;
    height:100%;
    display:flex;
    flex-direction:column;
}

.product__items:hover{
    transform:translateY(-8px);
    box-shadow:0 20px 45px rgba(0,0,0,0.08);
}

/* =========================================
IMAGE AREA
========================================= */

.product__items--thumbnail{
    position:relative;
    overflow:hidden;
    background:#f7f7f7;
    border-radius:24px 24px 0 0;
}

.product__items--img{
    width:100%;
    height:420px;
    object-fit:cover;
    transition:all .6s ease;
    display:block;
}

.product__items:hover .product__items--img{
    transform:scale(1.06);
}

/* Overlay */

.product__items--thumbnail::after{
    content:'';
    position:absolute;
    inset:0;
    background:linear-gradient(
        to top,
        rgba(0,0,0,0.18),
        transparent 40%
    );
    opacity:0;
    transition:.4s ease;
}

.product__items:hover .product__items--thumbnail::after{
    opacity:1;
}

/* =========================================
COLOR PREVIEW
========================================= */

.product__quick--actions{
    position:absolute;
    bottom:16px;
    left:16px;
    z-index:3;
}

.product__colors--preview{
    display:flex;
    align-items:center;
    gap:7px;
    flex-wrap:wrap;
}

.color--dot{
    width:16px;
    height:16px;
    border-radius:50%;
    border:2px solid #fff;
    box-shadow:0 2px 8px rgba(0,0,0,0.2);
    transition:.3s ease;
}

.color--dot:hover{
    transform:scale(1.2);
}

.color--more{
    background:#fff;
    color:#111;
    font-size:11px;
    padding:3px 7px;
    border-radius:20px;
    font-weight:600;
}

/* =========================================
CONTENT
========================================= */

.product__items--content{
    padding:24px 22px 26px;
    display:flex;
    flex-direction:column;
    flex:1;
}

/* Category */

.product__items--content__subtitle{
    display:inline-block;
    font-size:12px;
    font-weight:600;
    text-transform:uppercase;
    letter-spacing:1px;
    color:#888;
    margin-bottom:10px;
}

/* =========================================
TITLE
========================================= */

.product__items--content__title{
    margin:0 0 14px;
    line-height:1.4;
    min-height:56px;
}

.product__items--content__title a{
    color:#111;
    font-size:12px;
    font-weight:600;
    text-decoration:none;
    transition:.3s ease;

    display:-webkit-box;
    -webkit-line-clamp:2;
    -webkit-box-orient:vertical;
    overflow:hidden;
}

.product__items--content__title a:hover{
    color:#c62828;
}

/* =========================================
COLORS
========================================= */

.product__colors{
    margin-bottom:14px;
}

.color-circle{
    transition:.3s ease;
    border:2px solid #fff !important;
    box-shadow:0 2px 6px rgba(0,0,0,0.1);
}

.color-circle:hover{
    transform:scale(1.18);
}

/* =========================================
SIZES
========================================= */

.product__sizes{
    margin-bottom:18px;
    line-height:1.8;
}

.size--tag{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    min-width:32px;
    height:30px;
    padding:0 10px;
    border-radius:30px;
    background:#f4f4f4;
    font-size:11px;
    font-weight:600;
    color:#333;
    margin:2px;
    transition:.3s ease;
}

.size--tag:hover{
    background:#111;
    color:#fff;
}

/* =========================================
PRICE
========================================= */

.product__items--price{
    display:flex;
    align-items:center;
    justify-content:center;
    flex-wrap:wrap;
    gap:8px;
    margin-bottom:14px;
    margin-top:auto;
}

.current__price{
    font-size:16px;
    font-weight:700;
    color:#111;
}

.old__price{
    font-size:15px;
    color:#999;
    text-decoration:line-through;
}

.discount__percent{
    background:#111;
    color:#fff;
    font-size:11px;
    font-weight:600;
    padding:4px 8px;
    border-radius:30px;
}

/* =========================================
STOCK STATUS
========================================= */

.stock__status{
    margin-bottom:18px;
}

.stock__status span{
    font-size:13px;
    font-weight:600;
}

/* =========================================
BUTTONS
========================================= */

.product__items--action{
    margin:0;
    padding:0;
    list-style:none;
    display:flex;
    justify-content:center;
    align-items:center;
    gap:10px;
    flex-wrap:wrap;
}

/* Add To Cart */

.btn-cart{
    height:46px;
    padding:0 20px;
    border-radius:50px;
    border:none;
    background:#111;
    color:#fff;
    font-size:13px;
    font-weight:600;
    letter-spacing:.3px;
    transition:.35s ease;
    white-space:nowrap;
}

.btn-cart:hover{
    background:#c62828;
    transform:translateY(-2px);
}

.btn-cart:disabled{
    background:#ccc;
    cursor:not-allowed;
}

/* Action Button */

.product__items--action__btn{
    width:46px;
    height:46px;
    border-radius:50%;
    background:#f4f4f4;
    color:#111;
    display:flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
    font-size:18px;
    transition:.35s ease;
    border:none;
}

.product__items--action__btn:hover{
    background:#111;
    color:#fff;
    transform:translateY(-2px);
}

/* =========================================
SWIPER NAVIGATION
========================================= */

.swiper__nav--btn{
    width:50px;
    height:50px;
    border-radius:50%;
    background:#fff;
    box-shadow:0 6px 20px rgba(0,0,0,0.08);
    color:#111;
    transition:.3s ease;
}

.swiper__nav--btn:hover{
    background:#111;
    color:#fff;
}

.swiper__nav--btn::after{
    font-size:18px;
    font-weight:700;
}

/* Pagination */

.swiper-pagination{
    position:relative;
    margin-top:35px;
}

.swiper-pagination-bullet{
    width:10px;
    height:10px;
    background:#ccc;
    opacity:1;
}

.swiper-pagination-bullet-active{
    width:30px;
    border-radius:20px;
    background:#111;
}

/* =========================================
LARGE SCREEN
========================================= */

@media(max-width:1400px){

    .product__items--img{
        height:380px;
    }
}

/* =========================================
LAPTOP
========================================= */

@media(max-width:1199px){

    .product__items--img{
        height:340px;
    }

    .product__items--content__title a{
        font-size:18px;
    }

    .current__price{
        font-size:22px;
    }
}

/* =========================================
TABLET
========================================= */

@media(max-width:991px){

    .product__section{
        padding:70px 0;
    }

    .section__heading{
        margin-bottom:40px;
    }

    .section__heading--maintitle{
        font-size:34px;
    }

    .product__items--img{
        height:300px;
    }

    .product__items--content{
        padding:20px 16px 22px;
    }

    .product__items--content__title{
        min-height:auto;
    }

    .product__items--content__title a{
        font-size:17px;
    }

    .current__price{
        font-size:20px;
    }

    .btn-cart{
        height:44px;
        padding:0 16px;
        font-size:12px;
    }

    .product__items--action__btn{
        width:44px;
        height:44px;
    }
}

/* =========================================
MOBILE
========================================= */

@media(max-width:767px){

    .product__section{
        padding:50px 0;
    }

    .container-fluid{
        padding-left:15px;
        padding-right:15px;
    }

    .section__heading{
        margin-bottom:30px;
    }

    .section__heading--maintitle{
        font-size:28px;
    }

    .section__heading--maintitle::after{
        width:50px;
    }

    .product__items{
        border-radius:18px;
    }

    .product__items--thumbnail{
        border-radius:18px 18px 0 0;
    }

    .product__items--img{
        height:250px;
    }

    .product__items--content{
        padding:18px 14px 20px;
    }

    .product__items--content__subtitle{
        font-size:10px;
    }

    .product__items--content__title a{
        font-size:15px;
        line-height:1.4;
    }

    .color-circle{
        width:16px !important;
        height:16px !important;
    }

    .size--tag{
        min-width:28px;
        height:28px;
        font-size:10px;
        padding:0 8px;
    }

    .current__price{
        font-size:18px;
    }

    .old__price{
        font-size:12px;
    }

    .discount__percent{
        font-size:9px;
    }

    .stock__status span{
        font-size:11px;
    }

    .btn-cart{
        width:100%;
        height:42px;
        font-size:11px;
        padding:0 12px;
    }

    .product__items--action{
        flex-direction:column;
        gap:8px;
    }

    .product__items--action__list{
        width:100%;
    }

    .product__items--action__btn{
        width:42px;
        height:42px;
        margin:auto;
        font-size:15px;
    }

    .swiper__nav--btn{
        display:none;
    }
}

/* =========================================
SMALL MOBILE
========================================= */

@media(max-width:576px){

    .product__items--img{
        height:220px;
    }

    .section__heading--maintitle{
        font-size:24px;
    }

    .product__items--content{
        padding:16px 12px 18px;
    }

    .product__items--content__title a{
        font-size:14px;
    }

    .current__price{
        font-size:17px;
    }

    .btn-cart{
        height:40px;
        border-radius:40px;
        font-size:10px;
    }

    .product__quick--actions{
        left:12px;
        bottom:12px;
    }

    .color--dot{
        width:14px;
        height:14px;
    }
}

/* =========================================
EXTRA SMALL MOBILE
========================================= */

@media(max-width:380px){

    .section__heading--maintitle{
        font-size:22px;
    }

    .product__items--img{
        height:190px;
    }

    .product__items--content__title a{
        font-size:13px;
    }

    .current__price{
        font-size:15px;
    }

    .old__price{
        font-size:11px;
    }

    .btn-cart{
        height:38px;
        font-size:9px;
    }

    .product__items--action__btn{
        width:38px;
        height:38px;
        font-size:14px;
    }
}
</style>

<!-- New Arrivals Section -->


<section class="new-arrivals-section py-5">

    <div class="container-fluid px-0">

        <div class="row g-0 align-items-center">

            <!-- LEFT IMAGE -->
            <div class="col-lg-7">

                <div class="arrival-image position-relative">

                    @if($newArrivalSection && $newArrivalSection->image)

                        <img src="{{ asset($newArrivalSection->image) }}"
                             alt="{{ $newArrivalSection->title }}"
                             class="img-fluid w-100">

                    @endif

                    <div class="overlay-pattern"></div>

                </div>

            </div>


            <!-- RIGHT CONTENT -->
            <div class="col-lg-5">

                <div class="arrival-content text-center d-flex flex-column justify-content-center h-100">

                    <h2>
                        {{ $newArrivalSection->title ?? 'New Arrivals' }}
                    </h2>

                    <p class="small-heading">
                        A new season brings new favourites.
                    </p>

                    <p class="description">

                        {{ $newArrivalSection->description ?? '' }}

                    </p>

                    <a href="{{ url('/shop') }}"
                       class="btn shop-btn mt-3">

                        SHOP NOW

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>




<style>
    .new-arrivals-section {
    background: #fff;
    overflow: hidden;
}

.arrival-image img {
    height: 100%;
    object-fit: cover;
    min-height: 500px;
}

.arrival-content {
    min-height: 500px;
    padding: 60px;
    background: #fff;
    position: relative;
}

.arrival-content h2 {
    font-size: 42px;
    font-weight: 500;
    color: #222;
    margin-bottom: 15px;
    font-family: serif;
}

.small-heading {
    font-size: 13px;
    letter-spacing: 1px;
    color: #777;
    margin-bottom: 10px;
    text-transform: uppercase;
}

.description {
    font-size: 15px;
    line-height: 1.8;
    color: #666;
    max-width: 420px;
    margin: auto;
}

.shop-btn {
    background: #8c2341;
    color: #fff;
    padding: 12px 28px;
    font-size: 13px;
    letter-spacing: 1px;
    border-radius: 0;
    transition: 0.3s;
    display: inline-block;
}

.shop-btn:hover {
    background: #5f1028;
    color: #fff;
}

/* Floral Decorations */
.arrival-content::before,
.arrival-content::after {
    content: "";
    position: absolute;
    width: 120px;
    height: 120px;
    background-size: contain;
    background-repeat: no-repeat;
    opacity: 0.9;
}

.arrival-content::before {
    top: 20px;
    left: 20px;
    background-image: url('https://png.pngtree.com/png-vector/20230408/ourmid/pngtree-watercolor-pink-hibiscus-flower-png-image_6688214.png');
}

.arrival-content::after {
    bottom: 20px;
    right: 20px;
    background-image: url('https://png.pngtree.com/png-vector/20230408/ourmid/pngtree-watercolor-pink-hibiscus-flower-png-image_6688214.png');
}

/* Responsive */
@media(max-width:991px){

    .arrival-content{
        min-height:auto;
        padding:40px 25px;
    }

    .arrival-image img{
        min-height:auto;
    }

    .arrival-content h2{
        font-size:32px;
    }
}
</style>

  

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
$('.category-slider').owlCarousel({
    loop: true,
    margin: 15,
    nav: false,
    dots: true,
    items:4,
    autoplay: true,
    autoplayTimeout: 3000,
    responsive:{
        0:{
            items:2
        },
        768:{
            items:2
        },
        992:{
            items:3
        }
    }
});
</script>

        <!-- Additional sections (deals, testimonial, banner, blog) – kept as original -->
        <!-- ... (keep your existing deals, testimonial, blog sections) ... -->
        
          <section class="product__section section--padding pt-0">
    <div class="container-fluid">
        <div class="section__heading text-center mb-50">
            <h2 class="section__heading--maintitle">New Arrival</h2>
        </div>
        
        <div class="product__section--inner product__swiper--activation swiper">
            <div class="swiper-wrapper">
                @foreach($neWArrival as $product)
                    <div class="swiper-slide">
                        <div class="product__items">
                            
                            {{-- Product Image --}}
                            <div class="product__items--thumbnail position-relative">
                                <a class="product__items--link" href="{{ url('product/' . $product->slug) }}">
                                    {{-- ✅ Updated for public folder --}}
                                    @if($product->image && file_exists(public_path($product->image)))
                                        <img class="product__items--img product__primary--img"
                                            src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                    @else
                                        <img class="product__items--img product__primary--img"
                                            src="{{ asset('assets/images/no-image.png') }}" alt="{{ $product->name }}">
                                    @endif
                                </a>
                                
                                {{-- Badges --}}
                                <!--<div class="product__badge">-->
                                <!--    @if($product->sale_price)-->
                                <!--        <span class="product__badge--items sale">Sale</span>-->
                                <!--    @endif-->
                                <!--    @if($product->is_featured)-->
                                <!--        <span class="product__badge--items featured">Featured</span>-->
                                <!--    @endif-->
                                <!--    @if($product->is_trending)-->
                                <!--        <span class="product__badge--items trending">Trending</span>-->
                                <!--    @endif-->
                                <!--    @if($product->is_new_arrival)-->
                                <!--        <span class="product__badge--items new">New</span>-->
                                <!--    @endif-->
                                <!--</div>-->
                                
                                {{-- Quick Actions Overlay --}}
                                <div class="product__quick--actions">
                                    @if($product->colors && $product->colors->count() > 0)
                                        <div class="product__colors--preview">
                                            @foreach($product->colors->take(4) as $color)
                                                <span class="color--dot" 
                                                      style="background-color: {{ $color->code }};"
                                                      title="{{ $color->name }}">
                                                </span>
                                            @endforeach
                                            @if($product->colors->count() > 4)
                                                <span class="color--more">+{{ $product->colors->count() - 4 }}</span>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            {{-- Product Content --}}
                            <div class="product__items--content text-center">
                                <span class="product__items--content__subtitle">
                                    {{ $product->category->name ?? 'Product' }}
                                </span>
                                
                                <h3 class="product__items--content__title h4">
                                    <a href="{{ url('product/' . $product->slug) }}">{{ $product->name }}</a>
                                </h3>
                                
                                {{-- ✅ Available Colors --}}
                                @if($product->colors && $product->colors->count() > 0)
                                    <div class="product__colors mb-2">
                                        <div class="d-flex justify-content-center gap-1">
                                            @foreach($product->colors->take(5) as $color)
                                                <div class="color-circle" 
                                                     style="background-color: {{ $color->code }}; 
                                                            width: 18px; height: 18px; 
                                                            border-radius: 50%; 
                                                            border: 1px solid #ddd;
                                                            cursor: pointer;"
                                                     title="{{ $color->name }} @if($color->extra_price > 0) (+₹{{ $color->extra_price }}) @endif"
                                                     data-bs-toggle="tooltip">
                                                </div>
                                            @endforeach
                                            @if($product->colors->count() > 5)
                                                <small class="text-muted align-self-center">
                                                    +{{ $product->colors->count() - 5 }}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                
                                {{-- ✅ Available Sizes --}}
                                @if($product->sizes && $product->sizes->count() > 0)
                                    <div class="product__sizes mb-2">
                                        <small class="text-muted">Sizes: </small>
                                        @foreach($product->sizes->take(4) as $size)
                                            <span class="size--tag">{{ $size->size }}</span>
                                        @endforeach
                                        @if($product->sizes->count() > 4)
                                            <small class="text-muted">+{{ $product->sizes->count() - 4 }}</small>
                                        @endif
                                    </div>
                                @endif
                                
                                {{-- Price --}}
                                <div class="product__items--price">
                                    <span class="current__price">
                                        ₹{{ $product->sale_price ?? $product->price }}
                                    </span>
                                    @if($product->sale_price)
                                        <span class="price__divided"></span>
                                        <span class="old__price">₹{{ $product->price }}</span>
                                        <span class="discount__percent">
                                            -{{ round((($product->price - $product->sale_price) / $product->price) * 100) }}%
                                        </span>
                                    @endif
                                </div>
                                
                                {{-- Stock Status --}}
                                @if($product->stock_quantity <= 0)
                                    <div class="stock__status out--of--stock">
                                        <span class="text-danger">Out of Stock</span>
                                    </div>
                                @elseif($product->stock_quantity <= 5)
                                    <div class="stock__status low--stock">
                                        <span class="text-warning">Only {{ $product->stock_quantity }} left</span>
                                    </div>
                                @endif
                                
                                {{-- Action Buttons --}}
                                <ul class="product__items--action d-flex justify-content-center">
                                    <li class="product__items--action__list">
                                        <button type="button" 
                                                class="btn btn-cart add-to-cart-btn"
                                                data-id="{{ $product->id }}" 
                                                data-name="{{ $product->name }}"
                                                data-price="{{ $product->sale_price ?? $product->price }}"
                                                data-image="{{ asset($product->image) }}"
                                                {{ $product->stock_quantity <= 0 ? 'disabled' : '' }}>
                                            <i class="fas fa-shopping-cart"></i> 
                                            {{ $product->stock_quantity <= 0 ? 'Out of Stock' : 'Add to Cart' }}
                                        </button>
                                    </li>
                                    <li class="product__items--action__list">
                                        <a class="product__items--action__btn"
                                            href="{{ url('product/' . $product->slug) }}" 
                                            title="Quick View">
                                            👁
                                        </a>
                                    </li>
                                    <!--<li class="product__items--action__list">-->
                                    <!--    <button type="button" -->
                                    <!--            class="product__items--action__btn wishlist-btn"-->
                                    <!--            data-id="{{ $product->id }}"-->
                                    <!--            title="Add to Wishlist">-->
                                    <!--        ♥-->
                                    <!--    </button>-->
                                    <!--</li>-->
<!--                                    <a href="{{ route('wishlist.index') }}">-->
<!--    ❤️ Wishlist-->
<!--</a>-->
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                @endforeach
            </div>
            <script>
document.querySelectorAll('.wishlist-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        let id = this.dataset.id;

        fetch("{{ route('wishlist.add') }}", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ id: id })
        })
        .then(res => res.json())
        .then(data => {
            alert('Added to wishlist ❤️');
        });
    });
});
</script>
            
            {{-- Swiper Navigation --}}
            <div class="swiper__nav--btn swiper-button-next"></div>
            <div class="swiper__nav--btn swiper-button-prev"></div>
            
            {{-- Swiper Pagination --}}
            <div class="swiper-pagination mt-4"></div>
        </div>
    </div>
</section>

<style>
    /* Product Badge Styles */
    .product__badge {
        position: absolute;
        top: 10px;
        left: 10px;
        display: flex;
        flex-direction: column;
        gap: 5px;
        z-index: 2;
    }
    
    .product__badge--items {
        padding: 4px 10px;
        border-radius: 4px;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        color: #fff;
    }
    
    .product__badge--items.sale {
        background: #e74c3c;
    }
    
    .product__badge--items.featured {
        background: #f39c12;
    }
    
    .product__badge--items.trending {
        background: #e74c3c;
    }
    
    .product__badge--items.new {
        background: #2ecc71;
    }
    
    /* Color Preview */
    .product__quick--actions {
        position: absolute;
        bottom: 10px;
        left: 10px;
        z-index: 2;
    }
    
    .product__colors--preview {
        display: flex;
        gap: 4px;
        align-items: center;
    }
    
    .color--dot {
        width: 15px;
        height: 15px;
        border-radius: 50%;
        border: 2px solid #fff;
        box-shadow: 0 1px 3px rgba(0,0,0,0.2);
        display: inline-block;
        transition: transform 0.2s;
    }
    
    .color--dot:hover {
        transform: scale(1.2);
    }
    
    .color--more {
        background: rgba(255,255,255,0.9);
        padding: 2px 6px;
        border-radius: 10px;
        font-size: 10px;
        color: #333;
    }
    
    /* Color Circles in Content */
    .color-circle {
        transition: transform 0.2s;
    }
    
    .color-circle:hover {
        transform: scale(1.3);
    }
    
    /* Size Tags */
    .size--tag {
        display: inline-block;
        border: 1px solid #ddd;
        padding: 2px 6px;
        border-radius: 3px;
        font-size: 11px;
        background: #f8f9fa;
        margin: 0 2px;
    }
    
    /* Discount Percent */
    .discount__percent {
        display: inline-block;
        background: #e74c3c;
        color: #fff;
        padding: 2px 6px;
        border-radius: 3px;
        font-size: 11px;
        margin-left: 5px;
    }
    
    /* Stock Status */
    .stock__status {
        font-size: 13px;
        margin: 5px 0;
    }
    
    .stock__status span {
        font-weight: 500;
    }
    
    /* Add to Cart Button */
    .btn-cart {
        background: #000;
        color: #fff;
        padding: 8px 15px;
        border-radius: 6px;
        border: none;
        font-size: 13px;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .btn-cart:hover {
        background: #333;
    }
    
    .btn-cart:disabled {
        background: #ccc;
        cursor: not-allowed;
    }
    
    /* Product Action Buttons */
    .product__items--action {
        list-style: none;
        padding: 0;
        margin: 10px 0 0;
        gap: 8px;
    }
    
    .product__items--action__list {
        display: inline-block;
    }
    
    .product__items--action__btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background: #f5f5f5;
        border: 1px solid #ddd;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s;
        font-size: 16px;
    }
    
    .product__items--action__btn:hover {
        background: #000;
        color: #fff;
        border-color: #000;
    }
    
    .wishlist-btn {
        color: #e74c3c;
    }
    
    .wishlist-btn:hover {
        background: #e74c3c !important;
        color: #fff !important;
    }
    
    /* Swiper Pagination */
    .swiper-pagination {
        position: relative;
        margin-top: 20px;
    }
    
    .swiper-pagination-bullet-active {
        background: #000;
    }
</style>


<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<!-- Loved By Women Section -->
<section class="women-love-section py-5">

    <div class="container">

        <!-- Heading -->
        <div class="section-title text-center mb-5">

            <h2>
                Loved By 100,000+ Women ❤️
            </h2>

        </div>

        <!-- Carousel -->
        <div class="owl-carousel women-carousel">

            @foreach($testimonials as $testimonial)

                <div class="review-card">

                    <div class="review-img">

                        @if($testimonial->photo)

                            <img src="{{ asset($testimonial->photo) }}"
                                alt="{{ $testimonial->name }}">

                        @else

                            <img src="{{ asset('assets/images/default-user.png') }}"
                                alt="{{ $testimonial->name }}">

                        @endif

                    </div>

                    <div class="review-content">

                        <div class="stars">

                            @for($i = 1; $i <= 5; $i++)

                                @if($i <= $testimonial->review)

                                    <i class="fas fa-star text-warning"></i>

                                @else

                                    <i class="far fa-star text-warning"></i>

                                @endif

                            @endfor

                        </div>

                        <p>
                            {{ $testimonial->description }}
                        </p>

                        <h5>
                            - {{ $testimonial->name }}
                        </h5>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $('.women-carousel').owlCarousel({
        loop: true,
        margin: 25,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        smartSpeed: 800,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            992: {
                items: 5
            }
        }
    });
</script>

<style>
    .women-love-section {
    background: #fdf8f3;
    overflow: hidden;
}

.section-title h2 {
    font-size: 36px;
    font-weight: 600;
    color: #222;
    font-family: serif;
}

.review-card {
    background: #fff;
    border-radius: 25px;
    overflow: hidden;
    position: relative;
    transition: 0.4s;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
}

.review-card:hover {
    transform: translateY(-8px);
}

.review-img img {
    width: 100%;
    height: 450px;
    object-fit: cover;
}

.review-content {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 20px;
    background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
    color: #fff;
}

.review-content p {
    font-size: 13px;
    line-height: 1.7;
    margin-bottom: 10px;
    color: #ffffff;
}

.review-content h5 {
    font-size: 15px;
    margin: 0;
    font-weight: 600;
}

.stars {
    color: #ffcc00;
    margin-bottom: 10px;
    font-size: 14px;
    letter-spacing: 2px;
}

/* Owl Nav */
.owl-nav {
    text-align: center;
    margin-top: 30px;
}

.owl-nav button {
    width: 45px;
    height: 45px;
    border-radius: 50% !important;
    background: #fff !important;
    margin: 0 8px;
    font-size: 20px !important;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.owl-nav button:hover {
    background: #000 !important;
    color: #fff !important;
}

/* Mobile */
@media(max-width:767px){

    .section-title h2{
        font-size:28px;
    }

    .review-img img{
        height:380px;
    }
}
</style>
    </main>

    <!-- Popup HTML -->
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
    $(document).on('click', '.add-to-cart-btn', function () {
        let btn = $(this);
        let productId = btn.data('id');
        let productName = btn.data('name');
        let productPrice = btn.data('price');
        let productImage = btn.data('image');

        let originalText = btn.html();
        btn.html('<i class="fas fa-spinner fa-spin"></i> Adding...').prop('disabled', true);

        $.ajax({
            // Use the product ID from the data attribute dynamically
            url: "{{ url('cart/add') }}/" + productId,
            type: "POST",
            data: {
                product_id: productId,
                quantity: 1
            },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Update cart counter
                    if (response.cart_count !== undefined) {
                        updateCartCounter(response.cart_count);
                    }
                    // Show popup with product details
                    showPopup(productName, productPrice, productImage, response);
                    // Show toast notification
                    showToast(response.message);
                } else {
                    showToast(response.message || 'Failed to add to cart', 'error');
                }
                btn.html(originalText).prop('disabled', false);
            },
            error: function (xhr) {
                console.error('Error:', xhr);
                let errorMsg = xhr.responseJSON?.message || 'Something went wrong!';
                showToast(errorMsg, 'error');
                btn.html(originalText).prop('disabled', false);
            }
        });
    });

    function showPopup(name, price, image, response) {
        $('#popupBody').html(`
            <div class="product-detail">
                <img src="${image}" alt="${name}">
                <div>
                    <h5>${name}</h5>
                    <p>₹${price}</p>
                    <small>Quantity: 1</small>
                </div>
            </div>
            <div class="cart-summary">
                <p><strong>Cart Total:</strong> ${response.cart_total}</p>
                <p><strong>Total Items:</strong> ${response.cart_count}</p>
                ${response.bogo_discount ? `<p><strong>BOGO Discount:</strong> -${response.bogo_discount}</p>` : ''}
            </div>
        `);
        $('#cartPopup').fadeIn();
        // Auto close after 4 seconds
        setTimeout(() => {
            closePopup();
        }, 4000);
    }

    function closePopup() {
        $('#cartPopup').fadeOut();
    }

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

    $(document).click(function (event) {
        if ($(event.target).is('#cartPopup')) {
            closePopup();
        }
    });

    // Load initial cart count from server
    $(document).ready(function () {
        $.get('{{ route("cart.info") }}', function (data) {
            if (data && data.cart_count !== undefined) {
                $('.cart-count').text(data.cart_count);
            }
        }).fail(function () {
            console.log('Cart count not available');
        });
    });
</script>
</body>

</html>