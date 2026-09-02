<div class="product-card">

    <!-- PRODUCT IMAGE -->
    <div class="product-img">

        <a href="{{ url('product/' . $product->slug) }}">

            @if($product->image && file_exists(public_path($product->image)))

                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">

            @else

                <img src="{{ asset('assets/images/no-image.png') }}" alt="{{ $product->name }}">

            @endif

        </a>

        <!-- STATUS BADGES -->
        <div class="badge-group top-left">

            @if($product->is_featured == 1)

                <span class="badge badge-featured">
                    Featured
                </span>

            @elseif($product->is_trending == 1)

                <span class="badge badge-trending">
                    Trending
                </span>

            @elseif($product->is_new_arrival == 1)

                <span class="badge badge-new">
                    New
                </span>

            @endif

        </div>

    </div>

    <!-- PRODUCT BODY -->
    <div class="product-body">

        <!-- SALE BADGE -->
        @if($product->sale_price)

            <div class="sale-percentage-badge">

                <span class="sale-badge">

                    -{{ round((($product->price - $product->sale_price) / $product->price) * 100) }}% OFF

                </span>

            </div>

        @endif

        <!-- PRODUCT TITLE -->
        <h6 class="product-title">

            <a href="{{ url('product/' . $product->slug) }}">

                {{ $product->name }}

            </a>

        </h6>

        <!-- COLORS -->
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

        <!-- SIZES -->
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

        <!-- PRICE -->
        <div class="price">

            <span class="new">

                ₹{{ number_format($product->sale_price ?? $product->price, 2) }}

            </span>

            @if($product->sale_price)

                <span class="old">

                    ₹{{ number_format($product->price, 2) }}

                </span>

            @endif

        </div>

        <!-- ADD TO CART -->
        <button type="button"
            class="btn-cart add-to-cart-btn"
            data-id="{{ $product->id }}"
            data-name="{{ $product->name }}"
            data-price="{{ $product->sale_price ?? $product->price }}"
            data-image="{{ asset($product->image) }}">

            <i class="fas fa-shopping-cart"></i>

            Add to Cart

        </button>

    </div>

</div>

<style>
    /* =========================================
PRODUCT SECTION
========================================= */

.product-section{
    padding:80px 0;
    background:#fff;
    overflow:hidden;
}

/* =========================================
PRODUCT TABS
========================================= */

.product-tabs{
    gap:14px;
    flex-wrap:wrap;
}

.product-tabs .nav-link{
    border:none;
    border-radius:50px;
    padding:12px 28px;
    background:#f5f5f5;
    color:#111;
    font-size:14px;
    font-weight:600;
    transition:all .3s ease;
}

.product-tabs .nav-link.active{
    background:#111;
    color:#fff;
}

.product-tabs .nav-link:hover{
    background:#d62828;
    color:#fff;
}

/* =========================================
PRODUCT CARD
========================================= */

.product-card{
    position:relative;
    background:#fff;
    border-radius:24px;
    overflow:hidden;
    transition:all .4s ease;
    border:1px solid #f0f0f0;
    height:100%;
    display:flex;
    flex-direction:column;
}

.product-card:hover{
    transform:translateY(-8px);
    box-shadow:0 18px 45px rgba(0,0,0,0.08);
}

/* =========================================
PRODUCT IMAGE
========================================= */

.product-img{
    position:relative;
    overflow:hidden;
    background:#f7f7f7;
    border-radius:24px 24px 0 0;
}

.product-img::before{
    content:'';
    position:absolute;
    inset:0;
    background:linear-gradient(
        to top,
        rgba(0,0,0,0.15),
        transparent 40%
    );
    opacity:0;
    transition:.4s ease;
    z-index:1;
}

.product-card:hover .product-img::before{
    opacity:1;
}

.product-img img{
    width:100%;
    height:380px;
    object-fit:cover;
    transition:transform .7s ease;
    display:block;
}

.product-card:hover .product-img img{
    transform:scale(1.08);
}

/* =========================================
BADGES
========================================= */

.badge-group.top-left{
    position:absolute;
    top:14px;
    left:14px;
    z-index:3;
}

.badge{
    border:none !important;
    padding:7px 14px;
    border-radius:50px;
    font-size:10px;
    font-weight:700;
    text-transform:uppercase;
    letter-spacing:1px;
    color:#fff;
    backdrop-filter:blur(10px);
    box-shadow:0 4px 14px rgba(0,0,0,0.15);
}

.badge-featured{
    background:#111;
}

.badge-trending{
    background:#d62828;
}

.badge-new{
    background:#1b9c5a;
}

/* =========================================
DISCOUNT BADGE
========================================= */

.sale-percentage-badge{
    margin-bottom:16px;
}

.sale-badge{
    background:#fff3f3;
    color:#d62828;
    font-size:12px;
    font-weight:700;
    padding:7px 14px;
    border-radius:30px;
    display:inline-flex;
    align-items:center;
    border:1px solid #ffd7d7;
}

/* =========================================
BODY
========================================= */

.product-body{
    padding:22px 20px 24px;
    display:flex;
    flex-direction:column;
    flex:1;
}

/* =========================================
TITLE
========================================= */

.product-title{
    margin:0 0 16px;
    line-height:1.5;
    min-height:54px;
}

.product-title a{
    font-size:18px;
    font-weight:600;
    color:#111;
    text-decoration:none;
    transition:.3s ease;
    display:-webkit-box;
    -webkit-line-clamp:2;
    -webkit-box-orient:vertical;
    overflow:hidden;
}

.product-title a:hover{
    color:#d62828;
}

/* =========================================
LABEL
========================================= */

.label-text{
    display:block;
    margin-bottom:8px;
    font-size:11px;
    font-weight:600;
    letter-spacing:.8px;
    color:#888;
    text-transform:uppercase;
}

/* =========================================
COLORS
========================================= */

.product-colors{
    margin-bottom:16px;
}

.color-wrapper{
    display:flex;
    align-items:center;
    flex-wrap:wrap;
    gap:8px;
}

.color-dot{
    width:18px;
    height:18px;
    border-radius:50%;
    border:2px solid #fff;
    box-shadow:0 2px 8px rgba(0,0,0,0.15);
    cursor:pointer;
    transition:.3s ease;
}

.color-dot:hover{
    transform:scale(1.2);
}

/* =========================================
SIZES
========================================= */

.product-sizes{
    margin-bottom:18px;
}

.size-wrapper{
    display:flex;
    gap:8px;
    flex-wrap:wrap;
}

.size-tag{
    min-width:34px;
    height:32px;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    padding:0 10px;
    border-radius:30px;
    background:#f5f5f5;
    font-size:12px;
    font-weight:600;
    color:#333;
    transition:.3s ease;
}

.size-tag:hover{
    background:#111;
    color:#fff;
}

.more-text{
    font-size:11px;
    color:#999;
    font-weight:500;
}

/* =========================================
PRICE
========================================= */

.price{
    display:flex;
    align-items:center;
    flex-wrap:wrap;
    gap:10px;
    margin-top:auto;
    margin-bottom:22px;
}

.price .new{
    font-size:26px;
    font-weight:700;
    color:#111;
    letter-spacing:-0.5px;
}

.price .old{
    font-size:15px;
    color:#999;
    text-decoration:line-through;
}

/* =========================================
BUTTON
========================================= */

.btn-cart{
    width:100%;
    height:50px;
    border:none;
    border-radius:50px;
    background:#111;
    color:#fff;
    font-size:14px;
    font-weight:600;
    letter-spacing:.3px;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    transition:all .35s ease;
}

.btn-cart i{
    font-size:15px;
}

.btn-cart:hover{
    background:#d62828;
    transform:translateY(-2px);
}

/* =========================================
LARGE DEVICES
========================================= */

@media(max-width:1400px){

    .product-img img{
        height:340px;
    }
}

/* =========================================
LAPTOP
========================================= */

@media(max-width:1199px){

    .product-img img{
        height:300px;
    }

    .product-title a{
        font-size:16px;
    }

    .price .new{
        font-size:22px;
    }
}

/* =========================================
TABLET
========================================= */

@media(max-width:991px){

    .product-section{
        padding:70px 0;
    }

    .product-tabs{
        gap:10px;
    }

    .product-tabs .nav-link{
        padding:10px 22px;
        font-size:13px;
    }

    .product-img img{
        height:260px;
    }

    .product-body{
        padding:18px 16px 20px;
    }

    .price .new{
        font-size:20px;
    }

    .btn-cart{
        height:46px;
    }
}

/* =========================================
MOBILE
========================================= */

@media(max-width:767px){

    .product-section{
        padding:50px 0;
    }

    .product-tabs{
        justify-content:center;
        gap:8px;
        margin-bottom:30px !important;
    }

    .product-tabs .nav-link{
        padding:9px 18px;
        font-size:12px;
    }

    .product-card{
        border-radius:18px;
    }

    .product-img{
        border-radius:18px 18px 0 0;
    }

    .product-img img{
        height:220px;
    }

    .product-body{
        padding:16px 14px 18px;
    }

    .product-title{
        min-height:auto;
        margin-bottom:12px;
    }

    .product-title a{
        font-size:14px;
        line-height:1.4;
    }

    .label-text{
        font-size:10px;
    }

    .color-dot{
        width:15px;
        height:15px;
    }

    .size-tag{
        min-width:28px;
        height:28px;
        font-size:10px;
        padding:0 8px;
    }

    .price{
        margin-bottom:16px;
        gap:6px;
    }

    .price .new{
        font-size:18px;
    }

    .price .old{
        font-size:12px;
    }

    .btn-cart{
        height:42px;
        font-size:12px;
        gap:7px;
    }

    .sale-badge{
        font-size:10px;
        padding:5px 10px;
    }

    .badge{
        padding:5px 10px;
        font-size:9px;
    }
}

/* =========================================
SMALL MOBILE
========================================= */

@media(max-width:576px){

    .container{
        padding-left:15px !important;
        padding-right:15px !important;
    }

    .product-tabs{
        flex-direction:row;
        overflow-x:auto;
        flex-wrap:nowrap;
        padding-bottom:5px;
    }

    .product-tabs::-webkit-scrollbar{
        height:4px;
    }

    .product-tabs::-webkit-scrollbar-thumb{
        background:#ccc;
        border-radius:10px;
    }

    .product-tabs .nav-link{
        white-space:nowrap;
    }

    .product-img img{
        height:200px;
    }

    .product-body{
        padding:14px 12px 16px;
    }

    .product-title a{
        font-size:13px;
    }

    .price .new{
        font-size:16px;
    }

    .btn-cart{
        height:40px;
        border-radius:40px;
        font-size:11px;
    }
}

/* =========================================
EXTRA SMALL MOBILE
========================================= */

@media(max-width:380px){

    .product-img img{
        height:180px;
    }

    .product-title a{
        font-size:12px;
    }

    .price .new{
        font-size:15px;
    }

    .price .old{
        font-size:11px;
    }

    .btn-cart{
        height:38px;
        font-size:10px;
        gap:5px;
    }

    .badge{
        font-size:8px;
        padding:4px 8px;
    }

    .sale-badge{
        font-size:9px;
    }
}
</style>