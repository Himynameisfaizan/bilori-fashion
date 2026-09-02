<!-- Start footer section -->
<footer class="footer__section bg__black p-4">
    <div class="container-fluid">
        <div class="main__footer d-flex justify-content-between py-4 flex-wrap">
            
            {{-- ABOUT US WIDGET --}}
            <div class="footer__widget footer__widget--width mb-4" style="max-width: 300px;">
                <h2 class="footer__widget--title text-ofwhite h3">
                    About Us
                    <button class="footer__widget--button" aria-label="footer widget button">
                        <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                            <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                        </svg>
                    </button>
                </h2>
                <div class="footer__widget--inner">
                    <p class="footer__widget--desc text-ofwhite mb-20" style="font-size: 14px; line-height: 1.6;">
                        At Bilori, we believe that fashion is more than just clothing—it is a way to express individuality and confidence. Our team carefully selects fabrics.
                    </p>
                </div>
                    <div class="footer__social mt-3">
                    <h3 class="social__title text-ofwhite h4 mb-15">Follow Us</h3>
                    {{-- Font Awesome CDN --}}
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

                    @php
                        $social = \App\Models\SocialMedia::first();
                    @endphp

                    <ul class="social__shear d-flex gap-3 m-0 p-0" style="list-style: none;">
                        {{-- Facebook --}}
                        @if(!empty($social->facebook))
                        <li class="social__shear--list">
                            <a class="social__icon facebook" target="_blank" href="{{ $social->facebook }}">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        @endif

                        {{-- Instagram --}}
                        @if(!empty($social->instagram))
                        <li class="social__shear--list">
                            <a class="social__icon instagram" target="_blank" href="{{ $social->instagram }}">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        @endif

                        {{-- Twitter / X --}}
                        @if(!empty($social->twitter))
                        <li class="social__shear--list">
                            <a class="social__icon twitter" target="_blank" href="{{ $social->twitter }}">
                                <i class="fab fa-x-twitter"></i>
                            </a>
                        </li>
                        @endif

                        {{-- YouTube --}}
                        @if(!empty($social->youtube))
                        <li class="social__shear--list">
                            <a class="social__icon youtube" target="_blank" href="{{ $social->youtube }}">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                        @endif

                        {{-- LinkedIn --}}
                        @if(!empty($social->linkedin))
                        <li class="social__shear--list">
                            <a class="social__icon linkedin" target="_blank" href="{{ $social->linkedin }}">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
            
            {{-- BRAND WIDGET --}}
            <div class="footer__widget mb-4">
                <h2 class="footer__widget--title text-ofwhite h3">
                    Brand
                    <button class="footer__widget--button" aria-label="footer widget button">
                        <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                            <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                        </svg>
                    </button>
                </h2>
                <ul class="footer__widget--menu footer__widget--inner">
                    <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{ url('/about-us') }}">About us</a></li>
                    <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{ url('/contact') }}">Contact us</a></li>
                    <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{ url('/blog') }}">Blogs</a></li>
                    <!--<li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{ url('/our-media') }}">Our Media</a></li>-->
                    <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{ url('/shop') }}">Our Store</a></li>
                </ul>
            </div>

            {{-- HELP WIDGET --}}
            <div class="footer__widget mb-4">
                <h2 class="footer__widget--title text-ofwhite h3">
                    Help
                    <button class="footer__widget--button" aria-label="footer widget button">
                        <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                            <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                        </svg>
                    </button>
                </h2>
                <ul class="footer__widget--menu footer__widget--inner">
                    <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
                    <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{ url('/terms-of-service') }}">Terms of Service</a></li>
                    <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{ url('/shipping-policy') }}">Shipping Policy</a></li>
                    <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{ url('/return-exchange-policy') }}">Return & Exchange Policy</a></li>
                    <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="{{ url('/return-exchange-request') }}">Return & Exchange Request</a></li>
                </ul>
            </div>

            {{-- INSTAGRAM WIDGET --}}
         <div class="footer__widget mb-4">
    <h2 class="footer__widget--title text-ofwhite h3">
        Social media
        <button class="footer__widget--button" aria-label="footer widget button">
            <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
            </svg>
        </button>
    </h2>

    {{-- FIXED: Removed 'footer__widget--inner' class so it stays visible on mobile --}}
    
    @php
        $social = \App\Models\SocialMedia::first();
    @endphp

    <div class="d-flex gap-3 align-items-center mt-3">
        
        {{-- Facebook --}}
        @if(!empty($social->facebook))
        <a target="_blank" href="{{ $social->facebook }}" aria-label="Facebook" style="color: inherit; transition: opacity 0.3s;" onmouseover="this.style.opacity='0.7'" onmouseout="this.style.opacity='1'">
            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
            </svg>
        </a>
        @endif

        {{-- Instagram --}}
        @if(!empty($social->instagram))
        <a target="_blank" href="{{ $social->instagram }}" aria-label="Instagram" style="color: inherit; transition: opacity 0.3s;" onmouseover="this.style.opacity='0.7'" onmouseout="this.style.opacity='1'">
            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.036 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
            </svg>
        </a>
        @endif

        {{-- Twitter / X --}}
        @if(!empty($social->twitter))
        <a target="_blank" href="{{ $social->twitter }}" aria-label="Twitter" style="color: inherit; transition: opacity 0.3s;" onmouseover="this.style.opacity='0.7'" onmouseout="this.style.opacity='1'">
            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" viewBox="0 0 16 16">
                <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
            </svg>
        </a>
        @endif

        {{-- YouTube --}}
        @if(!empty($social->youtube))
        <a target="_blank" href="{{ $social->youtube }}" aria-label="YouTube" style="color: inherit; transition: opacity 0.3s;" onmouseover="this.style.opacity='0.7'" onmouseout="this.style.opacity='1'">
            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.052-.074 1.957l-.008.105-.022.26-.01.104c-.048.519-.119 1.023-.22 1.402a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/>
            </svg>
        </a>
        @endif

        {{-- LinkedIn --}}
        @if(!empty($social->linkedin))
        <a target="_blank" href="{{ $social->linkedin }}" aria-label="LinkedIn" style="color: inherit; transition: opacity 0.3s;" onmouseover="this.style.opacity='0.7'" onmouseout="this.style.opacity='1'">
            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" viewBox="0 0 16 16">
                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
            </svg>
        </a>
        @endif

    </div>
</div>

        </div>

        {{-- CSS STYLING --}}
        <style>
            .social__icon{
                width: 30px;
                height: 30px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #fff;
                font-size: 15px;
                transition: 0.3s ease;
                text-decoration: none;
            }

            /* Facebook */
            .social__icon.facebook{ background: #1877F2; }

            /* Instagram */
            .social__icon.instagram{
                background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
            }

            /* Twitter / X */
            .social__icon.twitter{ background: #000; }

            /* YouTube */
            .social__icon.youtube{ background: #FF0000; }

            /* LinkedIn */
            .social__icon.linkedin{ background: #0A66C2; }

            .social__icon:hover{
                transform: translateY(-4px);
                opacity: 0.9;
            }

            /* Mobile View adjustment */
            @media (max-width: 767px) {
                .footer__social {
                    display: block !important; /* Forces block display on mobile */
                    visibility: visible !important;
                }
            }
        </style>

        {{-- FOOTER BOTTOM --}}
       <div class="footer__bottom d-flex justify-content-between align-items-center border-top border-secondary pt-3 mt-2">
    <p class="copyright__content text-ofwhite m-0">
        Copyright © 2026
        <a class="copyright__content--link" href="{{ url('/') }}">Bilori</a>.
        All Rights Reserved.
    </p>

    <div class="footer__payment text-right text-white">
        Design & Developed By
        <a href="https://digitalwebtrackers.com/" target="_blank" class="copyright__content--link">
            Digital Web Trackers
        </a>
    </div>
</div>
    </div>
</footer>
<!-- End footer section -->

<!-- Quickview Wrapper -->
<div class="modal" id="modal1" data-animation="slideInUp">
    <div class="modal-dialog quickview__main--wrapper">
        <header class="modal-header quickview__header">
            <button class="close-modal quickview__close--btn" aria-label="close modal" data-close>
                ✕
            </button>
        </header>
        <div class="quickview__inner">
            <div class="row row-cols-lg-2 row-cols-md-2">
                <div class="col">
                    <div class="quickview__product--media product__details--media">
                        <div class="product__media--preview swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="product__media--preview__items">
                                        <a class="product__media--preview__items--link glightbox"
                                            data-gallery="product-media-preview"
                                            href="img/product/big-product1.jpg"><img
                                                class="product__media--preview__items--img"
                                                src="img/product/big-product1.jpg" alt="product-media-img" /></a>
                                        <div class="product__media--view__icon">
                                            <a class="product__media--view__icon--link glightbox"
                                                href="img/product/big-product1.jpg"
                                                data-gallery="product-media-preview">
                                                <svg class="product__media--view__icon--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                        fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                        stroke-width="32"></path>
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-miterlimit="10" stroke-width="32"
                                                        d="M338.29 338.29L448 448"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product__media--preview__items">
                                        <a class="product__media--preview__items--link glightbox"
                                            data-gallery="product-media-preview"
                                            href="img/product/big-product2.jpg"><img
                                                class="product__media--preview__items--img"
                                                src="img/product/big-product2.jpg" alt="product-media-img" /></a>
                                        <div class="product__media--view__icon">
                                            <a class="product__media--view__icon--link glightbox"
                                                href="img/product/big-product2.jpg"
                                                data-gallery="product-media-preview">
                                                <svg class="product__media--view__icon--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                        fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                        stroke-width="32"></path>
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-miterlimit="10" stroke-width="32"
                                                        d="M338.29 338.29L448 448"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product__media--preview__items">
                                        <a class="product__media--preview__items--link glightbox"
                                            data-gallery="product-media-preview"
                                            href="img/product/big-product3.jpg"><img
                                                class="product__media--preview__items--img"
                                                src="img/product/big-product3.jpg" alt="product-media-img" /></a>
                                        <div class="product__media--view__icon">
                                            <a class="product__media--view__icon--link glightbox"
                                                href="img/product/big-product3.jpg"
                                                data-gallery="product-media-preview">
                                                <svg class="product__media--view__icon--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                        fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                        stroke-width="32"></path>
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-miterlimit="10" stroke-width="32"
                                                        d="M338.29 338.29L448 448"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product__media--preview__items">
                                        <a class="product__media--preview__items--link glightbox"
                                            data-gallery="product-media-preview"
                                            href="img/product/big-product4.jpg"><img
                                                class="product__media--preview__items--img"
                                                src="img/product/big-product4.jpg" alt="product-media-img" /></a>
                                        <div class="product__media--view__icon">
                                            <a class="product__media--view__icon--link glightbox"
                                                href="img/product/big-product4.jpg"
                                                data-gallery="product-media-preview">
                                                <svg class="product__media--view__icon--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                        fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                        stroke-width="32"></path>
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-miterlimit="10" stroke-width="32"
                                                        d="M338.29 338.29L448 448"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product__media--preview__items">
                                        <a class="product__media--preview__items--link glightbox"
                                            data-gallery="product-media-preview"
                                            href="img/product/big-product5.jpg"><img
                                                class="product__media--preview__items--img"
                                                src="img/product/big-product5.jpg" alt="product-media-img" /></a>
                                        <div class="product__media--view__icon">
                                            <a class="product__media--view__icon--link glightbox"
                                                href="img/product/big-product5.jpg"
                                                data-gallery="product-media-preview">
                                                <svg class="product__media--view__icon--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                        fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                        stroke-width="32"></path>
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-miterlimit="10" stroke-width="32"
                                                        d="M338.29 338.29L448 448"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product__media--preview__items">
                                        <a class="product__media--preview__items--link glightbox"
                                            data-gallery="product-media-preview"
                                            href="img/product/big-product6.jpg"><img
                                                class="product__media--preview__items--img"
                                                src="img/product/big-product6.jpg" alt="product-media-img" /></a>
                                        <div class="product__media--view__icon">
                                            <a class="product__media--view__icon--link glightbox"
                                                href="img/product/big-product6.jpg"
                                                data-gallery="product-media-preview">
                                                <svg class="product__media--view__icon--svg"
                                                    xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                        fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                        stroke-width="32"></path>
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-miterlimit="10" stroke-width="32"
                                                        d="M338.29 338.29L448 448"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__media--nav swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="product__media--nav__items">
                                        <img class="product__media--nav__items--img"
                                            src="{{asset('img/product/small-product7.png')}}" alt="product-nav-img" />
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product__media--nav__items">
                                        <img class="product__media--nav__items--img"
                                            src="{{asset('img/product/small-product8.png')}}" alt="product-nav-img" />
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product__media--nav__items">
                                        <img class="product__media--nav__items--img"
                                            src="{{asset('img/product/small-product9.png')}}" alt="product-nav-img" />
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product__media--nav__items">
                                        <img class="product__media--nav__items--img"
                                            src="{{asset('img/product/small-product10.png')}}" alt="product-nav-img" />
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product__media--nav__items">
                                        <img class="product__media--nav__items--img"
                                            src="{{asset('img/product/small-product11.png')}}" alt="product-nav-img" />
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product__media--nav__items">
                                        <img class="product__media--nav__items--img"
                                            src="{{asset('img/product/small-product12.png')}}" alt="product-nav-img" />
                                    </div>
                                </div>
                            </div>
                            <div class="swiper__nav--btn swiper-button-next"></div>
                            <div class="swiper__nav--btn swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="quickview__info">
                        <form action="#">
                            <h2 class="product__details--info__title mb-15">
                                Oversize Cotton Dress
                            </h2>
                            <div class="product__details--info__price mb-10">
                                <span class="current__price">$58.00</span>
                                <span class="old__price">$68.00</span>
                            </div>
                            <div class="quickview__info--ratting d-flex align-items-center mb-10">
                                <ul class="rating d-flex justify-content-center">
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
                                <span class="quickview__info--review__text">(5 reviews)</span>
                            </div>
                            <p class="product__details--info__desc mb-15">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit is.
                                Deserunt totam dolores ea numquam labore! Illum magnam totam
                                tenetur fuga quo dolor.
                            </p>
                            <div class="product__variant">
                                <div class="product__variant--list mb-10">
                                    <fieldset class="variant__input--fieldset">
                                        <legend class="product__variant--title mb-8">
                                            Color :
                                        </legend>
                                        <input id="color-red1" name="color" type="radio" checked />
                                        <label class="variant__color--value red" for="color-red1" title="Red">
                                            <img class="variant__color--value__img"
                                                src="{{asset('img/product/product1.png')}}" alt="variant-color-img" />
                                        </label>
                                        <input id="color-red2" name="color" type="radio" />
                                        <label class="variant__color--value red" for="color-red2" title="Black">
                                            <img class="variant__color--value__img"
                                                src="{{asset('img/product/product2.png')}}"
                                                alt="variant-color-img" /></label>
                                        <input id="color-red3" name="color" type="radio" />
                                        <label class="variant__color--value red" for="color-red3" title="Pink">
                                            <img class="variant__color--value__img"
                                                src="{{asset('img/product/product3.png')}}"
                                                alt="variant-color-img" /></label>
                                        <input id="color-red4" name="color" type="radio" />
                                        <label class="variant__color--value red" for="color-red4" title="Orange">
                                            <img class="variant__color--value__img"
                                                src="{{asset('img/product/product4.png')}}"
                                                alt="variant-color-img" /></label>
                                    </fieldset>
                                </div>
                                <div class="product__variant--list mb-15">
                                    <fieldset class="variant__input--fieldset weight">
                                        <legend class="product__variant--title mb-8">
                                            Weight :
                                        </legend>
                                        <input id="weight1" name="weight" type="radio" checked />
                                        <label class="variant__size--value red" for="weight1">5 kg</label>
                                        <input id="weight2" name="weight" type="radio" />
                                        <label class="variant__size--value red" for="weight2">3 kg</label>
                                        <input id="weight3" name="weight" type="radio" />
                                        <label class="variant__size--value red" for="weight3">2 kg</label>
                                    </fieldset>
                                </div>
                                <div class="quickview__variant--list quantity d-flex align-items-center mb-15">
                                    <div class="quantity__box">
                                        <button type="button"
                                            class="quantity__value quickview__value--quantity decrease"
                                            aria-label="quantity value" value="Decrease Value">
                                            -
                                        </button>
                                        <label>
                                            <input type="number" class="quantity__number quickview__value--number"
                                                value="1" data-counter />
                                        </label>
                                        <button type="button"
                                            class="quantity__value quickview__value--quantity increase"
                                            aria-label="quantity value" value="Increase Value">
                                            +
                                        </button>
                                    </div>
                                    <button class="primary__btn quickview__cart--btn" type="submit">
                                        Add To Cart
                                    </button>
                                </div>
                                <div class="quickview__variant--list variant__wishlist mb-15">
                                    <a class="variant__wishlist--icon" href="wishlist.html" title="Add to wishlist">
                                        <svg class="quickview__variant--wishlist__svg"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path
                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="32" />
                                        </svg>
                                        Add to Wishlist
                                    </a>
                                </div>
                            </div>
                            <div class="quickview__social d-flex align-items-center">
                                <label class="quickview__social--title">Social Share:</label>
                                <ul class="quickview__social--wrapper mt-0 d-flex">
                                    <li class="quickview__social--list">
                                        <a class="quickview__social--icon" target="_blank"
                                            href="https://www.facebook.com/">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524"
                                                viewBox="0 0 7.667 16.524">
                                                <path data-name="Path 237"
                                                    d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z"
                                                    transform="translate(-960.13 -345.407)" fill="currentColor" />
                                            </svg>
                                            <span class="visually-hidden">Facebook</span>
                                        </a>
                                    </li>
                                    <li class="quickview__social--list">
                                        <a class="quickview__social--icon" target="_blank" href="https://twitter.com/">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384"
                                                viewBox="0 0 16.489 13.384">
                                                <path data-name="Path 303"
                                                    d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z"
                                                    transform="translate(-951.23 -1140.849)" fill="currentColor" />
                                            </svg>
                                            <span class="visually-hidden">Twitter</span>
                                        </a>
                                    </li>
                                    <li class="quickview__social--list">
                                        <a class="quickview__social--icon" target="_blank"
                                            href="https://www.instagram.com/">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16.497" height="16.492"
                                                viewBox="0 0 19.497 19.492">
                                                <path data-name="Icon awesome-instagram"
                                                    d="M9.747,6.24a5,5,0,1,0,5,5A4.99,4.99,0,0,0,9.747,6.24Zm0,8.247A3.249,3.249,0,1,1,13,11.238a3.255,3.255,0,0,1-3.249,3.249Zm6.368-8.451A1.166,1.166,0,1,1,14.949,4.87,1.163,1.163,0,0,1,16.115,6.036Zm3.31,1.183A5.769,5.769,0,0,0,17.85,3.135,5.807,5.807,0,0,0,13.766,1.56c-1.609-.091-6.433-.091-8.042,0A5.8,5.8,0,0,0,1.64,3.13,5.788,5.788,0,0,0,.065,7.215c-.091,1.609-.091,6.433,0,8.042A5.769,5.769,0,0,0,1.64,19.341a5.814,5.814,0,0,0,4.084,1.575c1.609.091,6.433.091,8.042,0a5.769,5.769,0,0,0,4.084-1.575,5.807,5.807,0,0,0,1.575-4.084c.091-1.609.091-6.429,0-8.038Zm-2.079,9.765a3.289,3.289,0,0,1-1.853,1.853c-1.283.509-4.328.391-5.746.391S5.28,19.341,4,18.837a3.289,3.289,0,0,1-1.853-1.853c-.509-1.283-.391-4.328-.391-5.746s-.113-4.467.391-5.746A3.289,3.289,0,0,1,4,3.639c1.283-.509,4.328-.391,5.746-.391s4.467-.113,5.746.391a3.289,3.289,0,0,1,1.853,1.853c.509,1.283.391,4.328.391,5.746S17.855,15.705,17.346,16.984Z"
                                                    transform="translate(0.004 -1.492)" fill="currentColor" />
                                            </svg>
                                            <span class="visually-hidden">Instagram</span>
                                        </a>
                                    </li>
                                    <li class="quickview__social--list">
                                        <a class="quickview__social--icon" target="_blank"
                                            href="https://www.youtube.com/">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16.49" height="11.582"
                                                viewBox="0 0 16.49 11.582">
                                                <path data-name="Path 321"
                                                    d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z"
                                                    transform="translate(-951.269 -1359.8)" fill="currentColor" />
                                            </svg>
                                            <span class="visually-hidden">Youtube</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quickview Wrapper End -->

<!-- Start News letter popup -->
<!--<div class="newsletter__popup" data-animation="slideInUp">-->
<!--    <div id="boxes" class="newsletter__popup--inner">-->
<!--        <button class="newsletter__popup--close__btn" aria-label="search close button">-->
<!--            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 512 512">-->
<!--                <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"-->
<!--                    stroke-width="32" d="M368 368L144 144M368 144L144 368"></path>-->
<!--            </svg>-->
<!--        </button>-->
<!--        <div class="box newsletter__popup--box d-flex align-items-center">-->
<!--            <div class="newsletter__popup--thumbnail">-->
<!--                <img class="newsletter__popup--thumbnail__img display-block"-->
<!--                    src="{{ asset('img/banner/newsletter-popup-thumb2.png') }}" alt="newsletter-popup-thumb" />-->
<!--            </div>-->
<!--            <div class="newsletter__popup--box__right">-->
<!--                <h2 class="newsletter__popup--title">Join Our Newsletter</h2>-->
<!--                <div class="newsletter__popup--content">-->
<!--                    <label class="newsletter__popup--content--desc">Enter your email address to subscribe our-->
<!--                        notification of our-->
<!--                        new post &amp; features by email.</label>-->
<!--                    <div class="newsletter__popup--subscribe" id="frm_subscribe">-->
<!--                        <form class="newsletter__popup--subscribe__form">-->
<!--                            <input class="newsletter__popup--subscribe__input" type="text"-->
<!--                                placeholder="Enter you email address here..." />-->
<!--                            <button class="newsletter__popup--subscribe__btn">-->
<!--                                Subscribe-->
<!--                            </button>-->
<!--                        </form>-->
<!--                        <div class="newsletter__popup--footer">-->
<!--                            <input type="checkbox" id="newsletter__dont--show" />-->
<!--                            <label class="newsletter__popup--dontshow__again--text" for="newsletter__dont--show">Don't-->
<!--                                show this popup again</label>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- End News letter popup -->

<!-- Scroll top bar -->
<button id="scroll__top">
    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48"
            d="M112 244l144-144 144 144M256 120v292" />
    </svg>
</button>

<!-- All Script JS Plugins here  -->
<script src="{{ asset('js/vendor/popper.js') }}" defer="defer"></script>
<script src="{{ asset('js/vendor/bootstrap.min.js') }}" defer="defer"></script>
<script src="{{ asset('js/plugins/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('js/plugins/glightbox.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>

</html>