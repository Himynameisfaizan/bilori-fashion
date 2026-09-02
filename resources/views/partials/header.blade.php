<header class="header__section" style="position: absolute; width: 100%; top: 0; z-index: 99999;">
    <div class="header__topbar bg__secondary d-none d-lg-block">
        <div class="container-fluid">
            <div class="header__topbar--inner d-flex align-items-center justify-content-between">
                <div class="header__shipping">
                    <ul class="header__shipping--wrapper d-flex">
                        <li class="header__shipping--text text-white">Welcome to Bilori Fashion Store</li>
                        <li class="header__shipping--text text-white d-sm-2-none">
                            <img class="header__shipping--text__icon" src="{{ asset('img/icon/bus.png') }}" alt="bus-icon" /> Track Your Order
                        </li>
                        <li class="header__shipping--text text-white d-sm-2-none">
                            <img class="header__shipping--text__icon" src="{{asset('img/icon/email.png')}}" alt="email-icon" />
                            <a class="header__shipping--text__link" href="mailto:supportbilorifashion@gmail.com">supportbilorifashion@gmail.com</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="header__sticky">
        <div class="main__header">
            <div class="container-fluid px-3 px-lg-0">
                <div class="main__header--inner position__relative d-flex flex-wrap justify-content-between align-items-center">
                    
                    <div class="offcanvas__header--menu__open" style="position: relative; z-index: 9999999; pointer-events: auto;">
                        <a class="offcanvas__header--menu__open--btn" 
                           href="javascript:void(0)" 
                           data-bs-toggle="offcanvas" 
                           data-bs-target="#offcanvasMenu" 
                           aria-controls="offcanvasMenu"
                           style="display: block; padding: 10px; cursor: pointer;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon offcanvas__header--menu__open--svg" viewBox="0 0 512 512" width="28" height="28" style="pointer-events: none;">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352" />
                            </svg>
                            <span class="visually-hidden">Menu Open</span>
                        </a>
                    </div>

                    <div class="main__logo">
                        <h1 class="main__logo--title m-0">
                            <a class="main__logo--link" href="{{ url('/') }}">
                                <img class="main__logo--img" src="{{ asset('img/logo/1.png') }}" alt="logo-img" />
                            </a>
                        </h1>
                    </div>
                    
                    <div class="header__search d-none d-lg-block flex-grow-1 mx-4" style="max-width: 500px;">
                        <form class="d-flex position-relative" action="{{ url('/search') }}" method="GET">
                            <input class="form-control rounded-pill px-4 pe-5 py-2" type="text" autocomplete="off" name="query" placeholder="Search for products..." aria-label="Search" style="border: 1px solid #ddd; background: rgba(255, 255, 255, 0.9);">
                            <button class="btn position-absolute end-0 top-50 translate-middle-y" type="submit" style="background: transparent; border: none; box-shadow: none; color: #555;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512">
                                    <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/>
                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/>
                                </svg>
                            </button>
                        </form>
                    </div>

                    <div class="header__account_group d-flex align-items-center gap-3">
                        <div class="header__account--items">
                            <div class="dropdown">
                                <a class="header__account--btn dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer; display: flex; align-items: center; gap: 5px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512">
                                        <path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                                        <path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                                    </svg>
                                    @if(Auth::check())
                                        <span class="header__account--btn__text d-none d-lg-inline-block">{{ Auth::user()->name }}</span>
                                    @endif
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end custom-user-dropdown">
                                    @if(Auth::check())
                                        <li><a class="dropdown-item" href="{{ url('/my-account') }}">My Account</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        </li>
                                    @else
                                        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                                        <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        <div class="header__account--items" style="position: relative; z-index: 999999; pointer-events: auto;">
                            <a class="header__account--btn minicart__open--btn position-relative" href="{{ url('/cart') }}" style="display: block; padding: 10px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 14.706 13.534">
                                    <path fill="currentColor" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)"/>
                                </svg>
                                <span class="items__count mobile__badge bg-danger text-white rounded-circle position-absolute">{{ session('cart') ? count(session('cart')) : 0 }}</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
        <div class="header__bottom d-none d-lg-block">
            <div class="container-fluid">
                <div class="header__bottom--inner position__relative d-flex justify-content-between align-items-center">
                    <div class="header__menu">
                        <nav class="header__menu--navigation">
                            <ul class="d-flex">
                                <li class="header__menu--items"><a class="header__menu--link" href="{{ url('/') }}">HOME </a></li>
                                <li class="header__menu--items mega__menu--items"><a class="header__menu--link" href="{{ route('shop') }}">SHOP</a></li>
                                @foreach($categories as $category)
                                    <li class="header__menu--items">
                                        <a class="header__menu--link" href="{{ url('/category/' . $category->slug) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
</header>

<style>
/* ==========================================================================
    🛠️ STRUCTURAL RESPONSIVE OVERRIDES
   ========================================================================== */

.brand-logo__text {
    font-size: 24px;
    font-weight: 700;
    color: #ffffff;
    text-decoration: none;
    transition: color 0.3s ease;
}

@media (min-width: 992px) {
    header, .header__section { padding: 0px 120px; position: relative !important; z-index: 1000 !important; }
}

@media (max-width: 991.98px) {
    header, .header__section {
        padding: 0 !important;
        position: absolute !important;
        background: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0) 100%) !important;
        pointer-events: none;
    }
    
    .main__header {
        background: transparent !important;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .main__header--inner, .header__account_group {
        pointer-events: auto !important;
    }

    /* 🔴 FIXED: केवल आइकॉन और स्पेसिफिक लिंक्स को ही व्हाइट करें, ड्रॉपडाउन लिस्ट को नहीं */
    .main__header--inner > div > a, 
    .main__header--inner svg,
    .header__account_group .header__account--btn svg { 
        color: #ffffff !important; 
        stroke: #ffffff; 
    }
    
    .main__logo img { max-height: 28px; width: auto; }
    .main__logo { position: absolute; left: 50%; transform: translateX(-50%); top: 10px; z-index: 10; pointer-events: auto; }

    .mobile__badge { font-size: 9px; width: 16px; height: 16px; display: flex; align-items: center; justify-content: center; top: -6px; right: -8px; }
}

/* 🟢 ADDED: कस्टम क्लास ड्रॉपडाउन मेनू को हर स्क्रीन पर सही दिखाने के लिए */
.custom-user-dropdown {
    display: none;
    position: absolute;
    background-color: #ffffff !important;
    border: 1px solid #eee !important;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1) !important;
    border-radius: 8px !important;
    padding: 8px 0 !important;
    z-index: 99999999 !important;
}

.custom-user-dropdown.show {
    display: block !important;
}

.custom-user-dropdown .dropdown-item {
    color: #333333 !important; /* मोबाइल पर भी टेक्स्ट ब्लैक रहेगा */
    font-size: 14px !important;
    padding: 8px 20px !important;
    display: block !important;
    text-align: left !important;
}

.custom-user-dropdown .dropdown-item:hover {
    background-color: #f8f9fa !important;
    color: #000000 !important;
}

/* Sticky state */
.header__sticky.sticky {
    position: fixed !important; 
    top: 0; 
    left: 0;
    width: 100%; 
    z-index: 9999999 !important;
    background: #ffffff !important; 
    box-shadow: 0 2px 10px rgba(0,0,0,0.06); 
    pointer-events: auto !important;
}

.header__bottom{
    border:0px !important;
}
header, .header__section{
    position: absolute;
    width: 100%;
    top: 0;
    z-index: 99999;
    position: absolute !important;
}

/* Offcanvas */
.offcanvas {
    z-index: 9999999 !important;
}
.offcanvas-backdrop {
    z-index: 9999998 !important; 
}

/* Make all links and icons black when sticky */
.header__sticky.sticky a, 
.header__sticky.sticky svg,
.header__sticky.sticky .brand-logo__text { 
    color: #000000 !important; 
    stroke: #000000; 
}

/* 🔴 FIXED: स्टिकी होने पर ड्रॉपडाउन आइटम ब्लैक ही रहें */
.header__sticky.sticky .custom-user-dropdown .dropdown-item {
    color: #333333 !important;
}

.header__sticky.sticky .header__bottom {
    background: #ffffff;
    border-top: 1px solid #eee;
}

/* डिबगबार को जबरदस्ती छुपाने के लिए */
.phpdebugbar, 
#phpdebugbar, 
.phpdebugbar-minimized, 
.phpdebugbar-open {
    display: none !important;
    visibility: hidden !important;
    opacity: 0 !important;
    height: 0 !important;
    overflow: hidden !important;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const stickyHeader = document.querySelector(".header__sticky");
    if (!stickyHeader) return;

    const placeholder = document.createElement("div");
    placeholder.className = "header-sticky-placeholder";
    placeholder.style.display = "none";
    stickyHeader.parentNode.insertBefore(placeholder, stickyHeader);

    const topbar = document.querySelector(".header__topbar");
    function getStickyOffset() {
        return (topbar && window.innerWidth >= 992) ? topbar.offsetHeight : 0;
    }

    window.addEventListener("scroll", function () {
        const offset = getStickyOffset();
        if (window.scrollY > offset) {
            if (!stickyHeader.classList.contains("sticky")) {
                placeholder.style.height = stickyHeader.offsetHeight + "px";
                placeholder.style.display = "block";
            }
            stickyHeader.classList.add("sticky");
        } else {
            stickyHeader.classList.remove("sticky");
            placeholder.style.display = "none";
        }
    });

    window.addEventListener("resize", function () {
        if (stickyHeader.classList.contains("sticky")) {
            placeholder.style.height = stickyHeader.offsetHeight + "px";
        }
    });
});
</script>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasMenuLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('shop') }}">Shop</a></li>
            @foreach($categories as $category)
                <li><a href="{{ url('/category/' . $category->slug) }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>