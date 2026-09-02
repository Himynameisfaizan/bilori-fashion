<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <title>About | Beroli</title>
    <meta name="description" content="Morden Bootstrap HTML5 Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />

    <!-- ======= All CSS Plugins here ======== -->
    <link rel="stylesheet" href="{{ asset('css/plugins/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/plugins/glightbox.min.css') }}" />
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet" />

    <!-- Plugin css -->
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}" />

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
</head>

<body>
    @include('partials.header')

    <main class="main__content_wrapper">
        <!-- Start slider section -->
        <!--<section class="hero__slider--section">-->
        <!--    <div class="hero__slider--inner hero__slider--activation swiper dot-Swiper">-->
        <!--        <div class="hero__slider--wrapper swiper-wrapper">-->
        <!--            <div class="swiper-slide">-->
        <!--                <div class="hero__slider--items home1__slider--bg">-->
        <!--                    <div class="container-fluid">-->
        <!--                        <div class="hero__slider--items__inner">-->
        <!--                            <div class="row row-cols-1">-->
        <!--                                <div class="col">-->
        <!--                                    <div class="slider__content">-->
        <!--                                        <p class="slider__content--desc desc1 mb-15">-->
        <!--                                            <img class="slider__text--shape__icon"-->
        <!--                                                src="img/icon/text-shape-icon.png" alt="text-shape-icon" />-->
        <!--                                            New Collection-->
        <!--                                        </p>-->
        <!--                                        <h2 class="slider__content--maintitle h1">-->
        <!--                                            The Great Fashion <br />-->
        <!--                                            Collection 2022-->
        <!--                                        </h2>-->
        <!--                                        <p class="slider__content--desc desc2 d-sm-2-none mb-40">-->
        <!--                                            Up To 40% Off Final Sale Items. <br />-->
        <!--                                            Caught in the Moment!-->
        <!--                                        </p>-->
        <!--                                        <a class="slider__btn primary__btn" href="shop.html">Show Collection-->
        <!--                                            <svg class="primary__btn--arrow__icon"-->
        <!--                                                xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2"-->
        <!--                                                viewBox="0 0 6.2 6.2">-->
        <!--                                                <path-->
        <!--                                                    d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z"-->
        <!--                                                    transform="translate(-4 -4)" fill="currentColor"></path>-->
        <!--                                            </svg>-->
        <!--                                        </a>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="swiper-slide">-->
        <!--                <div class="hero__slider--items home1__slider--bg two">-->
        <!--                    <div class="container-fluid">-->
        <!--                        <div class="row">-->
        <!--                            <div class="col">-->
        <!--                                <div class="hero__slider--items__inner">-->
        <!--                                    <div class="slider__content">-->
        <!--                                        <p class="slider__content--desc desc1 mb-15">-->
        <!--                                            <img class="slider__text--shape__icon"-->
        <!--                                                src="img/icon/text-shape-icon.png" alt="text-shape-icon" />-->
        <!--                                            New Collection-->
        <!--                                        </p>-->
        <!--                                        <h2 class="slider__content--maintitle h1">-->
        <!--                                            The Great Fashion <br />-->
        <!--                                            Collection 2022-->
        <!--                                        </h2>-->
        <!--                                        <p class="slider__content--desc desc2 d-sm-2-none mb-40">-->
        <!--                                            Up To 40% Off Final Sale Items. <br />-->
        <!--                                            Caught in the Moment!-->
        <!--                                        </p>-->
        <!--                                        <a class="primary__btn slider__btn" href="shop.html">Show Collection-->
        <!--                                            <svg class="slider__btn--arrow__icon"-->
        <!--                                                xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2"-->
        <!--                                                viewBox="0 0 6.2 6.2">-->
        <!--                                                <path-->
        <!--                                                    d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z"-->
        <!--                                                    transform="translate(-4 -4)" fill="currentColor"></path>-->
        <!--                                            </svg>-->
        <!--                                        </a>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="swiper-slide">-->
        <!--                <div class="hero__slider--items home1__slider--bg three">-->
        <!--                    <div class="container-fluid">-->
        <!--                        <div class="row">-->
        <!--                            <div class="col-lg-6 offset-lg-6">-->
        <!--                                <div class="hero__slider--items__inner">-->
        <!--                                    <div class="slider__content text-center">-->
        <!--                                        <p class="slider__content--desc desc1 mb-15">-->
        <!--                                            <img class="slider__text--shape__icon"-->
        <!--                                                src="img/icon/text-shape-icon.png" alt="text-shape-icon" />-->
        <!--                                            New Collection-->
        <!--                                        </p>-->
        <!--                                        <h2 class="slider__content--maintitle h1">-->
        <!--                                            The Great Fashion <br />-->
        <!--                                            Collection 2022-->
        <!--                                        </h2>-->
        <!--                                        <p class="slider__content--desc desc2 d-sm-2-none mb-40">-->
        <!--                                            Up To 40% Off Final Sale Items. <br />-->
        <!--                                            Caught in the Moment!-->
        <!--                                        </p>-->
        <!--                                        <a class="primary__btn slider__btn" href="shop.html">Show Collection-->
        <!--                                            <svg class="slider__btn--arrow__icon"-->
        <!--                                                xmlns="http://www.w3.org/2000/svg" width="20.2" height="12.2"-->
        <!--                                                viewBox="0 0 6.2 6.2">-->
        <!--                                                <path-->
        <!--                                                    d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z"-->
        <!--                                                    transform="translate(-4 -4)" fill="currentColor"></path>-->
        <!--                                            </svg>-->
        <!--                                        </a>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div class="swiper-pagination"></div>-->
        <!--    </div>-->
        <!--</section>-->
        
        <!-- End slider section -->
        <section class="hero__slider--section">
    <div class="hero__slider--inner hero__slider--activation swiper dot-Swiper">
        <div class="hero__slider--wrapper swiper-wrapper">

            @forelse($banners as $banner)

                <div class="swiper-slide">
                    <div class="hero__slider--items"
                        style="
                            background-image: url('{{ asset($banner->image) }}');
                            background-size: cover;
                            background-position: center;
                            background-repeat: no-repeat;
                        ">

                        <div class="container-fluid">
                            <div class="hero__slider--items__inner">
                                <div class="row">
                                    <div class="col-lg-6">

                                        <div class="slider__content">

                                            @if($banner->subtitle)
                                                <p class="slider__content--desc desc1 mb-15">
                                                    <img class="slider__text--shape__icon"
                                                        src="{{ asset('img/icon/text-shape-icon.png') }}"
                                                        alt="text-shape-icon" />

                                                    {{ $banner->subtitle }}
                                                </p>
                                            @endif

                                            <h2 class="slider__content--maintitle h1"
                                                style="color: {{ $banner->text_color ?? '#ffffff' }};">
                                                {!! nl2br(e($banner->title)) !!}
                                            </h2>

                                            @if($banner->button_text)
                                                <a class="slider__btn primary__btn"
                                                    href="{{ $banner->link ?? '#' }}"
                                                    style="
                                                        background-color: {{ $banner->button_color ?? '#000' }};
                                                        border-color: {{ $banner->button_color ?? '#000' }};
                                                    ">

                                                    {{ $banner->button_text }}

                                                    <svg class="primary__btn--arrow__icon"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="20.2"
                                                        height="12.2"
                                                        viewBox="0 0 6.2 6.2">

                                                        <path
                                                            d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z"
                                                            transform="translate(-4 -4)"
                                                            fill="currentColor">
                                                        </path>

                                                    </svg>
                                                </a>
                                            @endif

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            @empty

                <div class="swiper-slide">
                    <div class="hero__slider--items"
                        style="background:#f5f5f5; padding:100px 0;">

                        <div class="container text-center">
                            <h2>No Banner Found</h2>
                        </div>

                    </div>
                </div>

            @endforelse

        </div>

        <div class="swiper-pagination"></div>
    </div>
</section>



        <section class="category-section py-5 text-center">
            <div class="container-fluid">

                <!-- Section Heading -->
                <div class="section-heading mb-5">
                    <p class="subtitle">Browse Collections</p>
                    <h2>Shop By Category</h2>
                </div>

                <div class="category-grid">
                    @foreach($category as $cat)
                        <div class="category-card">
                            <a href="{{ url('category/' . $cat->slug) }}">
                                <div class="img-box">
                                    <img src="{{ $cat->image_url }}" alt="{{ $cat->name }}">
                                </div>

                                <div class="category-content">
                                    <h4>{{ $cat->name }}</h4>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>


        <style>
            .category-grid {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 20px;
            }

            /* Card */
            .category-card {
                border-radius: 15px;
                overflow: hidden;
                background: #fff;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
                transition: 0.3s;
            }

            .category-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            }

            .section-heading {
                position: relative;
            }

            .section-heading .subtitle {
                color: #e63946;
                font-size: 14px;
                letter-spacing: 1px;
                text-transform: uppercase;
                margin-bottom: 5px;
            }

            .section-heading h2 {
                font-size: 30px;
                font-weight: 700;
                position: relative;
                display: inline-block;
            }

            /* underline */
            .section-heading h2::after {
                content: "";
                width: 60px;
                height: 3px;
                background: #e63946;
                display: block;
                margin: 10px auto 0;
            }

            /* Image */
            .img-box {
                width: 100%;
                height: 280px;
                overflow: hidden;
            }

            .img-box img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: 0.4s;
            }

            /* Hover Zoom */
            .category-card:hover img {
                transform: scale(1.1);
            }

            /* Content */
            .category-content {
                padding: 15px;
                text-align: center;
            }

            .category-content h4 {
                font-size: 16px;
                font-weight: 600;
                margin: 0;
            }

            @media (max-width: 992px) {
                .category-grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media (max-width: 576px) {
                .category-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <section class="product-section py-5">
            <div class="container">

                <!-- Heading -->
                <div class="section-heading text-center mb-5">
                    <p class="subtitle">Latest Collection</p>
                    <h2>Trending Products</h2>
                </div>

                <!-- Grid -->
                <div class="row g-4">
                    @foreach($product as $item)
                        @php
                            $images = json_decode($item->images, true);
                        @endphp

                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product-card">

                                <!-- Image -->
                                <div class="product-img">
                                    <a href="{{ url('product/' . $item->slug) }}">
                                        <img src="{{ asset($images[0] ?? 'img/no-image.png') }}" alt="{{ $item->name }}">
                                    </a>

                                    <!-- Hover Buttons -->
                                    <div class="product-actions">
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                        <a href="#"><i class="fa fa-eye"></i></a>
                                        <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                    </div>

                                    @if($item->sale_price)
                                        <span class="badge-sale">Sale</span>
                                    @endif
                                </div>

                                <!-- Content -->
                                <div class="product-content">
                                    <h5>
                                        <a href="{{ url('product/' . $item->slug) }}">
                                            {{ $item->name }}
                                        </a>
                                    </h5>

                                    <div class="price">
                                        @if($item->sale_price)
                                            <span class="new">₹{{ $item->sale_price }}</span>
                                            <span class="old">₹{{ $item->price }}</span>
                                        @else
                                            <span class="new">₹{{ $item->price }}</span>
                                        @endif
                                    </div>

                                    <!-- Add to cart -->
                                    <button class="btn-cart">Add to Cart</button>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>
        <style>
            .product-card {
                background: #fff;
                border-radius: 12px;
                overflow: hidden;
                transition: 0.3s;
                position: relative;
                border: 1px solid #eee;
            }

            .product-card:hover {
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
                transform: translateY(-5px);
            }

            /* Image */
            .product-img {
                position: relative;
                height: 260px;
                overflow: hidden;
            }

            .product-img img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: 0.4s;
            }

            .product-card:hover img {
                transform: scale(1.08);
            }

            /* Sale Badge */
            .badge-sale {
                position: absolute;
                top: 10px;
                left: 10px;
                background: #e63946;
                color: #fff;
                padding: 4px 10px;
                font-size: 12px;
                border-radius: 20px;
            }

            /* Hover Icons */
            .product-actions {
                position: absolute;
                top: 50%;
                right: -50px;
                transform: translateY(-50%);
                display: flex;
                flex-direction: column;
                gap: 10px;
                transition: 0.3s;
            }

            .product-card:hover .product-actions {
                right: 10px;
            }

            .product-actions a {
                width: 35px;
                height: 35px;
                background: #fff;
                color: #333;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                text-decoration: none;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            }

            .product-actions a:hover {
                background: #e63946;
                color: #fff;
            }

            /* Content */
            .product-content {
                padding: 15px;
                text-align: center;
            }

            .product-content h5 {
                font-size: 15px;
                font-weight: 600;
                margin-bottom: 8px;
            }

            .product-content h5 a {
                text-decoration: none;
                color: #333;
            }

            /* Price */
            .price {
                margin-bottom: 10px;
            }

            .price .new {
                color: #e63946;
                font-weight: 700;
                font-size: 16px;
            }

            .price .old {
                text-decoration: line-through;
                color: #999;
                margin-left: 8px;
            }

            /* Button */
            .btn-cart {
                width: 100%;
                background: #000;
                color: #fff;
                border: none;
                padding: 8px;
                border-radius: 6px;
                transition: 0.3s;
            }

            .btn-cart:hover {
                background: #e63946;
            }

            /* Heading */
            .section-heading .subtitle {
                color: #e63946;
                text-transform: uppercase;
                font-size: 14px;
            }

            .section-heading h2 {
                font-weight: 700;
                position: relative;
            }

            .section-heading h2::after {
                content: "";
                width: 60px;
                height: 3px;
                background: #e63946;
                display: block;
                margin: 8px auto;
            }
        </style>

        <!-- Start product section -->
        <section class="product__section section--padding">
            <div class="container-fluid">
                <div class="section__heading text-center mb-35">
                    <h2 class="section__heading--maintitle">New Products</h2>
                </div>
                <ul class="product__tab--one product__tab--primary__btn d-flex justify-content-center mb-50">
                    <li class="product__tab--primary__btn__list active" data-toggle="tab" data-target="#featured">
                        Featured
                    </li>
                    <li class="product__tab--primary__btn__list" data-toggle="tab" data-target="#trending">
                        Trending
                    </li>
                    <li class="product__tab--primary__btn__list" data-toggle="tab" data-target="#newarrival">
                        New Arrival
                    </li>
                </ul>
                <div class="tab_content">
                    <div id="featured" class="tab_pane active show">
                        <div class="product__section--inner">
                            <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">
                                @foreach($featureproduct as $featureproductt)
                                    <div class="col mb-30">
                                        <div class="product__items">
                                            <div class="product__items--thumbnail">
                                                <a class="product__items--link" href="product-details.html">
                                                    <img class="product__items--img product__primary--img"
                                                        src="img/product/product1.png" alt="product-img" />
                                                    <img class="product__items--img product__secondary--img"
                                                        src="img/product/product2.png" alt="product-img" />
                                                </a>
                                                <div class="product__badge">
                                                    <span class="product__badge--items sale">Sale</span>
                                                </div>
                                            </div>
                                            <div class="product__items--content">
                                                <span class="product__items--content__subtitle">Jacket, Women</span>
                                                <h3 class="product__items--content__title h4">
                                                    <a href="product-details.html">{{ $featureproductt->name }}</a>
                                                </h3>
                                                <div class="product__items--price">
                                                    <span class="current__price">$110</span>
                                                    <span class="price__divided"></span>
                                                    <span class="old__price">$78</span>
                                                </div>
                                                <ul class="rating product__rating d-flex">
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg"
                                                                xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                                height="14.732" viewBox="0 0 10.105 9.732">
                                                                <path data-name="star - Copy"
                                                                    d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                    transform="translate(0 -0.018)" fill="currentColor">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg"
                                                                xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                                height="14.732" viewBox="0 0 10.105 9.732">
                                                                <path data-name="star - Copy"
                                                                    d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                    transform="translate(0 -0.018)" fill="currentColor">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg"
                                                                xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                                height="14.732" viewBox="0 0 10.105 9.732">
                                                                <path data-name="star - Copy"
                                                                    d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                    transform="translate(0 -0.018)" fill="currentColor">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg"
                                                                xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                                height="14.732" viewBox="0 0 10.105 9.732">
                                                                <path data-name="star - Copy"
                                                                    d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                    transform="translate(0 -0.018)" fill="currentColor">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li class="rating__list">
                                                        <span class="rating__list--icon">
                                                            <svg class="rating__list--icon__svg"
                                                                xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                                height="14.732" viewBox="0 0 10.105 9.732">
                                                                <path data-name="star - Copy"
                                                                    d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                    transform="translate(0 -0.018)" fill="currentColor">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                </ul>
                                                <ul class="product__items--action d-flex">
                                                    <li class="product__items--action__list">
                                                        <a class="product__items--action__btn add__to--cart"
                                                            href="cart.html">
                                                            <svg class="product__items--action__btn--svg"
                                                                xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                                height="20.443" viewBox="0 0 14.706 13.534">
                                                                <g transform="translate(0 0)">
                                                                    <g>
                                                                        <path data-name="Path 16787"
                                                                            d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                            transform="translate(0 -463.248)"
                                                                            fill="currentColor"></path>
                                                                        <path data-name="Path 16788"
                                                                            d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                            transform="translate(-1.191 -466.622)"
                                                                            fill="currentColor"></path>
                                                                        <path data-name="Path 16789"
                                                                            d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                            transform="translate(-2.875 -466.622)"
                                                                            fill="currentColor"></path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                            <span class="add__to--cart__text">
                                                                + Add to cart</span>
                                                        </a>
                                                    </li>
                                                    <li class="product__items--action__list">
                                                        <a class="product__items--action__btn" href="wishlist.html">
                                                            <svg class="product__items--action__btn--svg"
                                                                xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                                height="23.443" viewBox="0 0 512 512">
                                                                <path
                                                                    d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                    fill="none" stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="32"></path>
                                                            </svg>
                                                            <span class="visually-hidden">Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li class="product__items--action__list">
                                                        <a class="product__items--action__btn" data-open="modal1"
                                                            href="javascript:void(0)">
                                                            <svg class="product__items--action__btn--svg"
                                                                xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                                height="23.443" viewBox="0 0 512 512">
                                                                <path
                                                                    d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                    fill="none" stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="32" />
                                                                <circle cx="256" cy="256" r="80" fill="none"
                                                                    stroke="currentColor" stroke-miterlimit="10"
                                                                    stroke-width="32" />
                                                            </svg>
                                                            <span class="visually-hidden">Quick View</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product3.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product4.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h3 class="product__items--content__title h4">
                                                <a href="product-details.html">Boxy Denim Jacket</a>
                                            </h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$120</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$88</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product5.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product11.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h4 class="product__items--content__title">
                                                <a href="product-details.html">Quilted Shoulder Bag</a>
                                            </h4>
                                            <div class="product__items--price">
                                                <span class="current__price">$115</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$75</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product6.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product7.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h4 class="product__items--content__title">
                                                <a href="product-details.html">High Ankle Jeans</a>
                                            </h4>
                                            <div class="product__items--price">
                                                <span class="current__price">$125</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$85</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product8.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product15.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h4 class="product__items--content__title">
                                                <a href="product-details.html">Square Shoulder Bag</a>
                                            </h4>
                                            <div class="product__items--price">
                                                <span class="current__price">$117</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$80</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="trending" class="tab_pane">
                        <div class="product__section--inner">
                            <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product8.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product15.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h4 class="product__items--content__title">
                                                <a href="product-details.html">Square Shoulder Bag</a>
                                            </h4>
                                            <div class="product__items--price">
                                                <span class="current__price">$117</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$80</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product9.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product10.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h4 class="product__items--content__title">
                                                <a href="product-details.html">Light Denim Jacket</a>
                                            </h4>
                                            <div class="product__items--price">
                                                <span class="current__price">$130</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$66</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product12.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product13.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h4 class="product__items--content__title">
                                                <a href="product-details.html">Wool-blend Jacket</a>
                                            </h4>
                                            <div class="product__items--price">
                                                <span class="current__price">$144</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$98</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product11.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product8.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h4 class="product__items--content__title">
                                                <a href="product-details.html">Aware organic cotton</a>
                                            </h4>
                                            <div class="product__items--price">
                                                <span class="current__price">$135</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$68</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product14.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product15.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h4 class="product__items--content__title">
                                                <a href="product-details.html">Western denim shirt</a>
                                            </h4>
                                            <div class="product__items--price">
                                                <span class="current__price">$128</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$72</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product2.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product1.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h4 class="product__items--content__title">
                                                <a href="product-details.html">OSmock Mini Dresss</a>
                                            </h4>
                                            <div class="product__items--price">
                                                <span class="current__price">$142</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$72</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product1.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product2.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h3 class="product__items--content__title h4">
                                                <a href="product-details.html">Oversize Cotton Dress</a>
                                            </h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$110</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$78</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product3.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product4.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h3 class="product__items--content__title h4">
                                                <a href="product-details.html">Boxy Denim Jacket</a>
                                            </h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$120</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$88</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product5.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product11.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h4 class="product__items--content__title">
                                                <a href="product-details.html">Quilted Shoulder Bag</a>
                                            </h4>
                                            <div class="product__items--price">
                                                <span class="current__price">$115</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$75</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product6.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product7.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h4 class="product__items--content__title">
                                                <a href="product-details.html">High Ankle Jeans</a>
                                            </h4>
                                            <div class="product__items--price">
                                                <span class="current__price">$125</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$85</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="newarrival" class="tab_pane">
                        <div class="product__section--inner">
                            <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product6.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product7.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h4 class="product__items--content__title">
                                                <a href="product-details.html">High Ankle Jeans</a>
                                            </h4>
                                            <div class="product__items--price">
                                                <span class="current__price">$125</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$85</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product8.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product15.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h4 class="product__items--content__title">
                                                <a href="product-details.html">Square Shoulder Bag</a>
                                            </h4>
                                            <div class="product__items--price">
                                                <span class="current__price">$117</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$80</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product9.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product10.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h4 class="product__items--content__title">
                                                <a href="product-details.html">Light Denim Jacket</a>
                                            </h4>
                                            <div class="product__items--price">
                                                <span class="current__price">$130</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$66</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product12.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product13.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h4 class="product__items--content__title">
                                                <a href="product-details.html">Wool-blend Jacket</a>
                                            </h4>
                                            <div class="product__items--price">
                                                <span class="current__price">$144</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$98</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product1.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product2.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h3 class="product__items--content__title h4">
                                                <a href="product-details.html">Oversize Cotton Dress</a>
                                            </h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$110</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$78</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product3.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product4.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h3 class="product__items--content__title h4">
                                                <a href="product-details.html">Boxy Denim Jacket</a>
                                            </h3>
                                            <div class="product__items--price">
                                                <span class="current__price">$120</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$88</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product5.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product11.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h4 class="product__items--content__title">
                                                <a href="product-details.html">Quilted Shoulder Bag</a>
                                            </h4>
                                            <div class="product__items--price">
                                                <span class="current__price">$115</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$75</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product11.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product8.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h4 class="product__items--content__title">
                                                <a href="product-details.html">Aware organic cotton</a>
                                            </h4>
                                            <div class="product__items--price">
                                                <span class="current__price">$135</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$68</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product14.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product15.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h4 class="product__items--content__title">
                                                <a href="product-details.html">Western denim shirt</a>
                                            </h4>
                                            <div class="product__items--price">
                                                <span class="current__price">$128</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$72</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-30">
                                    <div class="product__items">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="product-details.html">
                                                <img class="product__items--img product__primary--img"
                                                    src="img/product/product2.png" alt="product-img" />
                                                <img class="product__items--img product__secondary--img"
                                                    src="img/product/product1.png" alt="product-img" />
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product__items--content">
                                            <span class="product__items--content__subtitle">Jacket, Women</span>
                                            <h4 class="product__items--content__title">
                                                <a href="product-details.html">OSmock Mini Dresss</a>
                                            </h4>
                                            <div class="product__items--price">
                                                <span class="current__price">$142</span>
                                                <span class="price__divided"></span>
                                                <span class="old__price">$72</span>
                                            </div>
                                            <ul class="rating product__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="14.105"
                                                            height="14.732" viewBox="0 0 10.105 9.732">
                                                            <path data-name="star - Copy"
                                                                d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                                transform="translate(0 -0.018)" fill="currentColor">
                                                            </path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>
                                            <ul class="product__items--action d-flex">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn add__to--cart"
                                                        href="cart.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="20.443" viewBox="0 0 14.706 13.534">
                                                            <g transform="translate(0 0)">
                                                                <g>
                                                                    <path data-name="Path 16787"
                                                                        d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                        transform="translate(0 -463.248)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16788"
                                                                        d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                        transform="translate(-1.191 -466.622)"
                                                                        fill="currentColor"></path>
                                                                    <path data-name="Path 16789"
                                                                        d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                        transform="translate(-2.875 -466.622)"
                                                                        fill="currentColor"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="add__to--cart__text">
                                                            + Add to cart</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="wishlist.html">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" data-open="modal1"
                                                        href="javascript:void(0)">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="25.51"
                                                            height="23.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="32" />
                                                            <circle cx="256" cy="256" r="80" fill="none"
                                                                stroke="currentColor" stroke-miterlimit="10"
                                                                stroke-width="32" />
                                                        </svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End product section -->

        <!-- Start deals banner section -->
        <section class="deals__banner--section section--padding pt-0">
            <div class="deals__banner--inner banner__bg">
                <div class="row row-cols-1 align-items-center">
                    <div class="col">
                        <div class="deals__banner--content position__relative">
                            <span class="deals__banner--content__subtitle text__secondary">Hurry up and Get 25%
                                Discount</span>
                            <h2 class="deals__banner--content__maintitle">
                                Deals Of The Day
                            </h2>
                            <p class="deals__banner--content__desc">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                <br />
                                sed do eiusmod tempor incididunt ut labore
                            </p>
                            <div class="deals__banner--countdown d-flex" data-countdown="Sep 30, 2022 00:00:00"></div>
                            <a class="primary__btn" href="shop.html">Show Collection
                                <svg class="primary__btn--arrow__icon" xmlns="http://www.w3.org/2000/svg" width="20.2"
                                    height="12.2" viewBox="0 0 6.2 6.2">
                                    <path
                                        d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z"
                                        transform="translate(-4 -4)" fill="currentColor"></path>
                                </svg>
                            </a>
                            <br />
                            <div class="banner__bideo--play">
                                <a class="banner__bideo--play__icon glightbox" href="https://vimeo.com/115041822"
                                    data-gallery="video">
                                    <svg id="play" xmlns="http://www.w3.org/2000/svg" width="40.302" height="40.302"
                                        viewBox="0 0 46.302 46.302">
                                        <g id="Group_193" data-name="Group 193" transform="translate(0 0)">
                                            <path id="Path_116" data-name="Path 116"
                                                d="M39.521,6.781a23.151,23.151,0,0,0-32.74,32.74,23.151,23.151,0,0,0,32.74-32.74ZM23.151,44.457A21.306,21.306,0,1,1,44.457,23.151,21.33,21.33,0,0,1,23.151,44.457Z"
                                                fill="currentColor" />
                                            <g id="Group_188" data-name="Group 188" transform="translate(15.588 11.19)">
                                                <g id="Group_187" data-name="Group 187">
                                                    <path id="Path_117" data-name="Path 117"
                                                        d="M190.3,133.213l-13.256-8.964a3,3,0,0,0-4.674,2.482v17.929a2.994,2.994,0,0,0,4.674,2.481l13.256-8.964a3,3,0,0,0,0-4.963Zm-1.033,3.435-13.256,8.964a1.151,1.151,0,0,1-1.8-.953V126.73a1.134,1.134,0,0,1,.611-1.017,1.134,1.134,0,0,1,1.185.063l13.256,8.964a1.151,1.151,0,0,1,0,1.907Z"
                                                        transform="translate(-172.366 -123.734)" fill="currentColor" />
                                                </g>
                                            </g>
                                            <g id="Group_190" data-name="Group 190" transform="translate(28.593 5.401)">
                                                <g id="Group_189" data-name="Group 189">
                                                    <path id="Path_118" data-name="Path 118"
                                                        d="M328.31,70.492a18.965,18.965,0,0,0-10.886-10.708.922.922,0,1,0-.653,1.725,17.117,17.117,0,0,1,9.825,9.664.922.922,0,1,0,1.714-.682Z"
                                                        transform="translate(-316.174 -59.724)" fill="currentColor" />
                                                </g>
                                            </g>
                                            <g id="Group_192" data-name="Group 192" transform="translate(22.228 4.243)">
                                                <g id="Group_191" data-name="Group 191">
                                                    <path id="Path_119" data-name="Path 119"
                                                        d="M249.922,47.187a19.08,19.08,0,0,0-3.2-.27.922.922,0,0,0,0,1.845,17.245,17.245,0,0,1,2.889.243.922.922,0,1,0,.31-1.818Z"
                                                        transform="translate(-245.801 -46.917)" fill="currentColor" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="visually-hidden">Video Play</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End deals banner section -->

        <!-- Start product section -->
        <section class="product__section section--padding pt-0">
            <div class="container-fluid">
                <div class="section__heading text-center mb-50">
                    <h2 class="section__heading--maintitle">Our Best Seller</h2>
                </div>
                <div class="product__section--inner product__swiper--activation swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="product__items">
                                <div class="product__items--thumbnail">
                                    <a class="product__items--link" href="product-details.html">
                                        <img class="product__items--img product__primary--img"
                                            src="img/product/product1.png" alt="product-img" />
                                        <img class="product__items--img product__secondary--img"
                                            src="img/product/product2.png" alt="product-img" />
                                    </a>
                                    <div class="product__badge">
                                        <span class="product__badge--items sale">Sale</span>
                                    </div>
                                </div>
                                <div class="product__items--content">
                                    <span class="product__items--content__subtitle">Jacket, Women</span>
                                    <h3 class="product__items--content__title h4">
                                        <a href="product-details.html">Oversize Cotton Dress</a>
                                    </h3>
                                    <div class="product__items--price">
                                        <span class="current__price">$110</span>
                                        <span class="price__divided"></span>
                                        <span class="old__price">$78</span>
                                    </div>
                                    <ul class="rating product__rating d-flex">
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                    </ul>
                                    <ul class="product__items--action d-flex">
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn add__to--cart" href="cart.html">
                                                <svg class="product__items--action__btn--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443"
                                                    viewBox="0 0 14.706 13.534">
                                                    <g transform="translate(0 0)">
                                                        <g>
                                                            <path data-name="Path 16787"
                                                                d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                transform="translate(0 -463.248)" fill="currentColor">
                                                            </path>
                                                            <path data-name="Path 16788"
                                                                d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                transform="translate(-1.191 -466.622)"
                                                                fill="currentColor"></path>
                                                            <path data-name="Path 16789"
                                                                d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                transform="translate(-2.875 -466.622)"
                                                                fill="currentColor"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <span class="add__to--cart__text">
                                                    + Add to cart</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="wishlist.html">
                                                <svg class="product__items--action__btn--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="32"></path>
                                                </svg>
                                                <span class="visually-hidden">Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" data-open="modal1"
                                                href="javascript:void(0)">
                                                <svg class="product__items--action__btn--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="32" />
                                                    <circle cx="256" cy="256" r="80" fill="none" stroke="currentColor"
                                                        stroke-miterlimit="10" stroke-width="32" />
                                                </svg>
                                                <span class="visually-hidden">Quick View</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product__items">
                                <div class="product__items--thumbnail">
                                    <a class="product__items--link" href="product-details.html">
                                        <img class="product__items--img product__primary--img"
                                            src="img/product/product3.png" alt="product-img" />
                                        <img class="product__items--img product__secondary--img"
                                            src="img/product/product4.png" alt="product-img" />
                                    </a>
                                    <div class="product__badge">
                                        <span class="product__badge--items sale">Sale</span>
                                    </div>
                                </div>
                                <div class="product__items--content">
                                    <span class="product__items--content__subtitle">Jacket, Women</span>
                                    <h3 class="product__items--content__title h4">
                                        <a href="product-details.html">Boxy Denim Jacket</a>
                                    </h3>
                                    <div class="product__items--price">
                                        <span class="current__price">$120</span>
                                        <span class="price__divided"></span>
                                        <span class="old__price">$88</span>
                                    </div>
                                    <ul class="rating product__rating d-flex">
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                    </ul>
                                    <ul class="product__items--action d-flex">
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn add__to--cart" href="cart.html">
                                                <svg class="product__items--action__btn--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443"
                                                    viewBox="0 0 14.706 13.534">
                                                    <g transform="translate(0 0)">
                                                        <g>
                                                            <path data-name="Path 16787"
                                                                d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                transform="translate(0 -463.248)" fill="currentColor">
                                                            </path>
                                                            <path data-name="Path 16788"
                                                                d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                transform="translate(-1.191 -466.622)"
                                                                fill="currentColor"></path>
                                                            <path data-name="Path 16789"
                                                                d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                transform="translate(-2.875 -466.622)"
                                                                fill="currentColor"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <span class="add__to--cart__text">
                                                    + Add to cart</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="wishlist.html">
                                                <svg class="product__items--action__btn--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="32"></path>
                                                </svg>
                                                <span class="visually-hidden">Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" data-open="modal1"
                                                href="javascript:void(0)">
                                                <svg class="product__items--action__btn--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="32" />
                                                    <circle cx="256" cy="256" r="80" fill="none" stroke="currentColor"
                                                        stroke-miterlimit="10" stroke-width="32" />
                                                </svg>
                                                <span class="visually-hidden">Quick View</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product__items">
                                <div class="product__items--thumbnail">
                                    <a class="product__items--link" href="product-details.html">
                                        <img class="product__items--img product__primary--img"
                                            src="img/product/product5.png" alt="product-img" />
                                        <img class="product__items--img product__secondary--img"
                                            src="img/product/product11.png" alt="product-img" />
                                    </a>
                                    <div class="product__badge">
                                        <span class="product__badge--items sale">Sale</span>
                                    </div>
                                </div>
                                <div class="product__items--content">
                                    <span class="product__items--content__subtitle">Jacket, Women</span>
                                    <h4 class="product__items--content__title">
                                        <a href="product-details.html">Quilted Shoulder Bag</a>
                                    </h4>
                                    <div class="product__items--price">
                                        <span class="current__price">$115</span>
                                        <span class="price__divided"></span>
                                        <span class="old__price">$75</span>
                                    </div>
                                    <ul class="rating product__rating d-flex">
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                    </ul>
                                    <ul class="product__items--action d-flex">
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn add__to--cart" href="cart.html">
                                                <svg class="product__items--action__btn--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443"
                                                    viewBox="0 0 14.706 13.534">
                                                    <g transform="translate(0 0)">
                                                        <g>
                                                            <path data-name="Path 16787"
                                                                d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                transform="translate(0 -463.248)" fill="currentColor">
                                                            </path>
                                                            <path data-name="Path 16788"
                                                                d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                transform="translate(-1.191 -466.622)"
                                                                fill="currentColor"></path>
                                                            <path data-name="Path 16789"
                                                                d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                transform="translate(-2.875 -466.622)"
                                                                fill="currentColor"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <span class="add__to--cart__text">
                                                    + Add to cart</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="wishlist.html">
                                                <svg class="product__items--action__btn--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="32"></path>
                                                </svg>
                                                <span class="visually-hidden">Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" data-open="modal1"
                                                href="javascript:void(0)">
                                                <svg class="product__items--action__btn--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="32" />
                                                    <circle cx="256" cy="256" r="80" fill="none" stroke="currentColor"
                                                        stroke-miterlimit="10" stroke-width="32" />
                                                </svg>
                                                <span class="visually-hidden">Quick View</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product__items">
                                <div class="product__items--thumbnail">
                                    <a class="product__items--link" href="product-details.html">
                                        <img class="product__items--img product__primary--img"
                                            src="img/product/product8.png" alt="product-img" />
                                        <img class="product__items--img product__secondary--img"
                                            src="img/product/product15.png" alt="product-img" />
                                    </a>
                                    <div class="product__badge">
                                        <span class="product__badge--items sale">Sale</span>
                                    </div>
                                </div>
                                <div class="product__items--content">
                                    <span class="product__items--content__subtitle">Jacket, Women</span>
                                    <h4 class="product__items--content__title">
                                        <a href="product-details.html">Square Shoulder Bag</a>
                                    </h4>
                                    <div class="product__items--price">
                                        <span class="current__price">$117</span>
                                        <span class="price__divided"></span>
                                        <span class="old__price">$80</span>
                                    </div>
                                    <ul class="rating product__rating d-flex">
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                    </ul>
                                    <ul class="product__items--action d-flex">
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn add__to--cart" href="cart.html">
                                                <svg class="product__items--action__btn--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443"
                                                    viewBox="0 0 14.706 13.534">
                                                    <g transform="translate(0 0)">
                                                        <g>
                                                            <path data-name="Path 16787"
                                                                d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                transform="translate(0 -463.248)" fill="currentColor">
                                                            </path>
                                                            <path data-name="Path 16788"
                                                                d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                transform="translate(-1.191 -466.622)"
                                                                fill="currentColor"></path>
                                                            <path data-name="Path 16789"
                                                                d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                transform="translate(-2.875 -466.622)"
                                                                fill="currentColor"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <span class="add__to--cart__text">
                                                    + Add to cart</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="wishlist.html">
                                                <svg class="product__items--action__btn--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="32"></path>
                                                </svg>
                                                <span class="visually-hidden">Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" data-open="modal1"
                                                href="javascript:void(0)">
                                                <svg class="product__items--action__btn--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="32" />
                                                    <circle cx="256" cy="256" r="80" fill="none" stroke="currentColor"
                                                        stroke-miterlimit="10" stroke-width="32" />
                                                </svg>
                                                <span class="visually-hidden">Quick View</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product__items">
                                <div class="product__items--thumbnail">
                                    <a class="product__items--link" href="product-details.html">
                                        <img class="product__items--img product__primary--img"
                                            src="img/product/product12.png" alt="product-img" />
                                        <img class="product__items--img product__secondary--img"
                                            src="img/product/product13.png" alt="product-img" />
                                    </a>
                                    <div class="product__badge">
                                        <span class="product__badge--items sale">Sale</span>
                                    </div>
                                </div>
                                <div class="product__items--content">
                                    <span class="product__items--content__subtitle">Jacket, Women</span>
                                    <h4 class="product__items--content__title">
                                        <a href="product-details.html">Wool-blend Jacket</a>
                                    </h4>
                                    <div class="product__items--price">
                                        <span class="current__price">$144</span>
                                        <span class="price__divided"></span>
                                        <span class="old__price">$98</span>
                                    </div>
                                    <ul class="rating product__rating d-flex">
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                    </ul>
                                    <ul class="product__items--action d-flex">
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn add__to--cart" href="cart.html">
                                                <svg class="product__items--action__btn--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443"
                                                    viewBox="0 0 14.706 13.534">
                                                    <g transform="translate(0 0)">
                                                        <g>
                                                            <path data-name="Path 16787"
                                                                d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                transform="translate(0 -463.248)" fill="currentColor">
                                                            </path>
                                                            <path data-name="Path 16788"
                                                                d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                transform="translate(-1.191 -466.622)"
                                                                fill="currentColor"></path>
                                                            <path data-name="Path 16789"
                                                                d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                transform="translate(-2.875 -466.622)"
                                                                fill="currentColor"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <span class="add__to--cart__text">
                                                    + Add to cart</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="wishlist.html">
                                                <svg class="product__items--action__btn--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="32"></path>
                                                </svg>
                                                <span class="visually-hidden">Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" data-open="modal1"
                                                href="javascript:void(0)">
                                                <svg class="product__items--action__btn--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="32" />
                                                    <circle cx="256" cy="256" r="80" fill="none" stroke="currentColor"
                                                        stroke-miterlimit="10" stroke-width="32" />
                                                </svg>
                                                <span class="visually-hidden">Quick View</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product__items">
                                <div class="product__items--thumbnail">
                                    <a class="product__items--link" href="product-details.html">
                                        <img class="product__items--img product__primary--img"
                                            src="img/product/product14.png" alt="product-img" />
                                        <img class="product__items--img product__secondary--img"
                                            src="img/product/product15.png" alt="product-img" />
                                    </a>
                                    <div class="product__badge">
                                        <span class="product__badge--items sale">Sale</span>
                                    </div>
                                </div>
                                <div class="product__items--content">
                                    <span class="product__items--content__subtitle">Jacket, Women</span>
                                    <h4 class="product__items--content__title">
                                        <a href="product-details.html">Western denim shirt</a>
                                    </h4>
                                    <div class="product__items--price">
                                        <span class="current__price">$128</span>
                                        <span class="price__divided"></span>
                                        <span class="old__price">$72</span>
                                    </div>
                                    <ul class="rating product__rating d-flex">
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                    </ul>
                                    <ul class="product__items--action d-flex">
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn add__to--cart" href="cart.html">
                                                <svg class="product__items--action__btn--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443"
                                                    viewBox="0 0 14.706 13.534">
                                                    <g transform="translate(0 0)">
                                                        <g>
                                                            <path data-name="Path 16787"
                                                                d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                transform="translate(0 -463.248)" fill="currentColor">
                                                            </path>
                                                            <path data-name="Path 16788"
                                                                d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                transform="translate(-1.191 -466.622)"
                                                                fill="currentColor"></path>
                                                            <path data-name="Path 16789"
                                                                d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                transform="translate(-2.875 -466.622)"
                                                                fill="currentColor"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <span class="add__to--cart__text">
                                                    + Add to cart</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="wishlist.html">
                                                <svg class="product__items--action__btn--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="32"></path>
                                                </svg>
                                                <span class="visually-hidden">Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" data-open="modal1"
                                                href="javascript:void(0)">
                                                <svg class="product__items--action__btn--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="32" />
                                                    <circle cx="256" cy="256" r="80" fill="none" stroke="currentColor"
                                                        stroke-miterlimit="10" stroke-width="32" />
                                                </svg>
                                                <span class="visually-hidden">Quick View</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="product__items">
                                <div class="product__items--thumbnail">
                                    <a class="product__items--link" href="product-details.html">
                                        <img class="product__items--img product__primary--img"
                                            src="img/product/product11.png" alt="product-img" />
                                        <img class="product__items--img product__secondary--img"
                                            src="img/product/product8.png" alt="product-img" />
                                    </a>
                                    <div class="product__badge">
                                        <span class="product__badge--items sale">Sale</span>
                                    </div>
                                </div>
                                <div class="product__items--content">
                                    <span class="product__items--content__subtitle">Jacket, Women</span>
                                    <h4 class="product__items--content__title">
                                        <a href="product-details.html">Aware organic cotton</a>
                                    </h4>
                                    <div class="product__items--price">
                                        <span class="current__price">$135</span>
                                        <span class="price__divided"></span>
                                        <span class="old__price">$68</span>
                                    </div>
                                    <ul class="rating product__rating d-flex">
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                    </ul>
                                    <ul class="product__items--action d-flex">
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn add__to--cart" href="cart.html">
                                                <svg class="product__items--action__btn--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443"
                                                    viewBox="0 0 14.706 13.534">
                                                    <g transform="translate(0 0)">
                                                        <g>
                                                            <path data-name="Path 16787"
                                                                d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                                                                transform="translate(0 -463.248)" fill="currentColor">
                                                            </path>
                                                            <path data-name="Path 16788"
                                                                d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                                                                transform="translate(-1.191 -466.622)"
                                                                fill="currentColor"></path>
                                                            <path data-name="Path 16789"
                                                                d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                                                                transform="translate(-2.875 -466.622)"
                                                                fill="currentColor"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <span class="add__to--cart__text">
                                                    + Add to cart</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="wishlist.html">
                                                <svg class="product__items--action__btn--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="32"></path>
                                                </svg>
                                                <span class="visually-hidden">Wishlist</span>
                                            </a>
                                        </li>
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" data-open="modal1"
                                                href="javascript:void(0)">
                                                <svg class="product__items--action__btn--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="25.51" height="23.443"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="32" />
                                                    <circle cx="256" cy="256" r="80" fill="none" stroke="currentColor"
                                                        stroke-miterlimit="10" stroke-width="32" />
                                                </svg>
                                                <span class="visually-hidden">Quick View</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper__nav--btn swiper-button-next"></div>
                    <div class="swiper__nav--btn swiper-button-prev"></div>
                </div>
            </div>
        </section>
        <!-- End product section -->

        <!-- Start banner section -->
        <section class="banner__section section--padding pt-0">
            <div class="short-banner-2">
                <div class="container">
                    <div class="button">
                        <h2>Elegance in Every Style</h2>
                        <p>
                            Discover fashion that blends timeless elegance with modern
                            trends.
                        </p>
                        <a class="book-btn" href="">Shop Now</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End banner section -->

        <!-- Start testimonial section -->
        <section class="testimonial__section section--padding pt-0">
            <div class="container-fluid">
                <div class="section__heading text-center mb-40">
                    <h2 class="section__heading--maintitle">Our Clients Say</h2>
                </div>
                <div class="testimonial__section--inner testimonial__swiper--activation swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testimonial__items text-center">
                                <div class="testimonial__items--thumbnail">
                                    <img class="testimonial__items--thumbnail__img border-radius-50"
                                        src="img/clients/1.png" alt="testimonial-img" />
                                </div>
                                <div class="testimonial__items--content">
                                    <h3 class="testimonial__items--title">Nishant Sharma</h3>
                                    <span class="testimonial__items--subtitle">fashion</span>
                                    <p class="testimonial__items--desc">
                                        The variety of fashion clothes available at Bilori is
                                        fantastic. The designs are modern and the quality is
                                        excellent. I will definitely shop here again.
                                    </p>
                                    <ul class="rating testimonial__rating d-flex justify-content-center">
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial__items text-center">
                                <div class="testimonial__items--thumbnail">
                                    <img class="testimonial__items--thumbnail__img border-radius-50"
                                        src="img/clients/2.png" alt="testimonial-img" />
                                </div>
                                <div class="testimonial__items--content">
                                    <h3 class="testimonial__items--title">Preeti Verma</h3>
                                    <span class="testimonial__items--subtitle">fashion</span>
                                    <p class="testimonial__items--desc">
                                        Bilori has become my go-to brand for stylish outfits. The
                                        clothing looks premium and fits perfectly. Truly a
                                        reliable fashion brand.
                                    </p>
                                    <ul class="rating testimonial__rating d-flex justify-content-center">
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial__items text-center">
                                <div class="testimonial__items--thumbnail">
                                    <img class="testimonial__items--thumbnail__img border-radius-50"
                                        src="img/clients/3.png" alt="testimonial-img" />
                                </div>
                                <div class="testimonial__items--content">
                                    <h3 class="testimonial__items--title">Richa Chadda</h3>
                                    <span class="testimonial__items--subtitle">fashion</span>
                                    <p class="testimonial__items--desc">
                                        I recently purchased a few outfits from Bilori and I’m
                                        really impressed with the quality and style. The fabrics
                                        are comfortable .
                                    </p>
                                    <ul class="rating testimonial__rating d-flex justify-content-center">
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial__items text-center">
                                <div class="testimonial__items--thumbnail">
                                    <img class="testimonial__items--thumbnail__img border-radius-50"
                                        src="img/other/testimonial-thumb1.png" alt="testimonial-img" />
                                </div>
                                <div class="testimonial__items--content">
                                    <h3 class="testimonial__items--title">Nishant Sharma</h3>
                                    <span class="testimonial__items--subtitle">fashion</span>
                                    <p class="testimonial__items--desc">
                                        Bilori offers a great collection of fashion wear. The
                                        clothes are stylish, well-stitched, and very comfortable
                                        to wear..
                                    </p>
                                    <ul class="rating testimonial__rating d-flex justify-content-center">
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__list--icon">
                                                <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg"
                                                    width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                    <path data-name="star - Copy"
                                                        d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                        transform="translate(0 -0.018)" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial__pagination swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- End testimonial section -->

        <!-- Start banner section -->
        <section class="banner__section section--padding pt-0">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="banner__section--inner position__relative">
                        <a class="banner__items--thumbnail display-block" href="shop.html"><img
                                class="banner__items--thumbnail__img banner__img--height__md display-block"
                                src="img/slider/2.png" alt="banner-img" />
                            <div class="banner__content--style2">
                                <h2 class="banner__content--style2__title text-white">
                                    Discover Your Signature Style
                                </h2>
                                <p class="banner__content--style2__desc">
                                    Explore a collection designed to express your individuality,
                                    where fashion meets comfort and confidence.
                                </p>
                                <span class="primary__btn">Shop Now
                                    <svg class="primary__btn--arrow__icon" xmlns="http://www.w3.org/2000/svg"
                                        width="20.2" height="12.2" viewBox="0 0 6.2 6.2">
                                        <path
                                            d="M7.1,4l-.546.546L8.716,6.713H4v.775H8.716L6.554,9.654,7.1,10.2,9.233,8.067,10.2,7.1Z"
                                            transform="translate(-4 -4)" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End banner section -->

        <!-- Start blog section -->
        <section class="blog__section section--padding pt-0">
            <div class="container-fluid">
                <div class="section__heading text-center mb-40">
                    <h2 class="section__heading--maintitle">From The Blog</h2>
                </div>
                <div class="blog__section--inner blog__swiper--activation swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="blog__items">
                                <div class="blog__thumbnail">
                                    <a class="blog__thumbnail--link" href="blog-details.html"><img
                                            class="blog__thumbnail--img" src="img/blog/blog1.png" alt="blog-img" /></a>
                                </div>
                                <div class="blog__content">
                                    <span class="blog__content--meta">February 03, 2022</span>
                                    <h3 class="blog__content--title">
                                        <a href="blog-details.html">Fashion Trends In 2021 Styles, Colors,
                                            Accessories</a>
                                    </h3>
                                    <a class="blog__content--btn primary__btn" href="blog-details.html">Read more
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog__items">
                                <div class="blog__thumbnail">
                                    <a class="blog__thumbnail--link" href="blog-details.html"><img
                                            class="blog__thumbnail--img" src="img/blog/blog2.png" alt="blog-img" /></a>
                                </div>
                                <div class="blog__content">
                                    <span class="blog__content--meta">February 03, 2022</span>
                                    <h3 class="blog__content--title">
                                        <a href="blog-details.html">Meet the Woman Behind Cool Ethical Label Refor
                                        </a>
                                    </h3>
                                    <a class="blog__content--btn primary__btn" href="blog-details.html">Read more
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog__items">
                                <div class="blog__thumbnail">
                                    <a class="blog__thumbnail--link" href="blog-details.html"><img
                                            class="blog__thumbnail--img" src="img/blog/blog3.png" alt="blog-img" /></a>
                                </div>
                                <div class="blog__content">
                                    <span class="blog__content--meta">February 03, 2022</span>
                                    <h3 class="blog__content--title">
                                        <a href="blog-details.html">Lauryn Hill Could Make Tulle Skirt and Cowboy</a>
                                    </h3>
                                    <a class="blog__content--btn primary__btn" href="blog-details.html">Read more
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog__items">
                                <div class="blog__thumbnail">
                                    <a class="blog__thumbnail--link" href="blog-details.html"><img
                                            class="blog__thumbnail--img" src="img/blog/blog4.png" alt="blog-img" /></a>
                                </div>
                                <div class="blog__content">
                                    <span class="blog__content--meta">February 03, 2022</span>
                                    <h3 class="blog__content--title">
                                        <a href="blog-details.html">Fashion Trends In 2021 Styles, Colors,
                                            Accessories</a>
                                    </h3>
                                    <a class="blog__content--btn primary__btn" href="blog-details.html">Read more
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog__items">
                                <div class="blog__thumbnail">
                                    <a class="blog__thumbnail--link" href="blog-details.html"><img
                                            class="blog__thumbnail--img" src="img/blog/blog2.png" alt="blog-img" /></a>
                                </div>
                                <div class="blog__content">
                                    <span class="blog__content--meta">February 03, 2022</span>
                                    <h3 class="blog__content--title">
                                        <a href="blog-details.html">Lauryn Hill Could Make Tulle Skirt and Cowboy</a>
                                    </h3>
                                    <a class="blog__content--btn primary__btn" href="blog-details.html">Read more
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper__nav--btn swiper-button-next"></div>
                    <div class="swiper__nav--btn swiper-button-prev"></div>
                </div>
            </div>
        </section>
        <!-- End blog section -->
    </main>

    @include('partials.footer')
</body>

</html>