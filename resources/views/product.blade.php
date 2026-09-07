<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <title>{{ $product->name }} | Bilori</title>
    <meta name="description" content="{{ $product->short_description ?? $product->name }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta class="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />

    <link rel="stylesheet" href="{{ asset('css/plugins/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/plugins/glightbox.min.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />

    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '840233335473914');
        fbq('track', 'PageView');
    </script>

    <style>
        /* ============================================
           BREADCRUMB
           ============================================ */
        .breadcrumb-section {
            padding: 15px 0;
            background: #fafafa;
            border-bottom: 1px solid #eee;
        }

        .breadcrumb-nav {
            font-size: 13px;
            color: #666;
        }

        .breadcrumb-nav a {
            color: #333;
            text-decoration: none;
        }

        .breadcrumb-nav a:hover {
            color: #c62828;
        }

        .breadcrumb-nav .separator {
            margin: 0 8px;
            color: #999;
        }

        .breadcrumb-nav .current {
            color: #c62828;
            font-weight: 500;
        }

        /* ============================================
           PRODUCT MAIN SECTION
           ============================================ */
        .product-main-section {
            padding: 30px 0 60px;
        }

        /* ============================================
           PRODUCT GALLERY WRAPPER
           ============================================ */
        .product-gallery-wrapper {
            position: sticky;
            top: 20px;
        }

        /* ============================================
           MAIN IMAGE CONTAINER
           ============================================ */
        .main-image-container {
            position: relative;
            width: 100%;
            background: #fafafa;
            border: 1px solid #f0f0f0;
            border-radius: 8px;
            overflow: hidden;
            cursor: crosshair;
            margin-bottom: 15px;
        }

        .main-image-container img {
            width: 100%;
            height: auto;
            display: block;
            pointer-events: auto;
            user-select: none;
        }

        /* ============================================
           ZOOM LENS
           ============================================ */
        .img-zoom-lens {
            position: absolute;
            border: 2px solid #c62828;
            width: 180px;
            height: 180px;
            background: rgba(255, 255, 255, 0.4);
            pointer-events: none;
            z-index: 99;
            border-radius: 4px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            display: none;
        }

        .img-zoom-result {
            position: absolute;
            top: 0;
            left: calc(100% + 20px);
            width: 450px;
            height: 450px;
            border: 2px solid #ddd;
            background: #fff;
            background-repeat: no-repeat;
            z-index: 100;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            overflow: hidden;
            display: none;
        }

        /* ============================================
           THUMBNAIL SLIDER
           ============================================ */
        .thumbnail-slider {
            position: relative;
            padding: 0 35px;
        }

        .thumbnail-track {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            scroll-behavior: smooth;
            scrollbar-width: none;
            -ms-overflow-style: none;
            padding: 5px 0;
        }

        .thumbnail-track::-webkit-scrollbar {
            display: none;
        }

        .thumbnail-item {
            min-width: 75px;
            height: 95px;
            border: 2px solid #e0e0e0;
            border-radius: 6px;
            overflow: hidden;
            cursor: pointer;
            flex-shrink: 0;
            transition: all 0.2s ease;
        }

        .thumbnail-item.active {
            border-color: #c62828;
            box-shadow: 0 0 0 2px rgba(198, 40, 40, 0.2);
        }

        .thumbnail-item:hover {
            border-color: #c62828;
        }

        .thumbnail-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            pointer-events: none;
        }

        .thumb-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 30px;
            height: 30px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 2;
            font-size: 12px;
            color: #333;
            transition: all 0.2s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .thumb-nav-btn:hover {
            background: #c62828;
            color: #fff;
            border-color: #c62828;
        }

        .thumb-nav-btn.prev {
            left: 0;
        }

        .thumb-nav-btn.next {
            right: 0;
        }

        /* ============================================
           COLOR GALLERY PANEL
           ============================================ */
        .color-gallery-panel {
            display: none;
            margin-top: 12px;
            padding: 12px;
            background: #fafafa;
            border-radius: 8px;
            border: 1px solid #eee;
        }

        .color-gallery-panel.active {
            display: block;
        }

        .color-gallery-label {
            font-size: 12px;
            font-weight: 600;
            color: #666;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .color-gallery-thumbs {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .color-gallery-thumb {
            width: 55px;
            height: 65px;
            border-radius: 6px;
            overflow: hidden;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.2s;
        }

        .color-gallery-thumb:hover,
        .color-gallery-thumb.active {
            border-color: #c62828;
        }

        .color-gallery-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            pointer-events: none;
        }

        /* ============================================
           MOBILE GALLERY
           ============================================ */
        .mobile-gallery-wrapper {
            display: none;
            position: relative;
            width: 100%;
            overflow: hidden;
            border-radius: 8px;
            background: #fafafa;
            margin-bottom: 15px;
            touch-action: pan-y;
        }

        .mobile-gallery-track {
            display: flex;
            transition: transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            will-change: transform;
        }

        .mobile-gallery-slide {
            min-width: 100%;
            position: relative;
            overflow: hidden;
        }

        .mobile-gallery-slide img {
            width: 100%;
            height: auto;
            display: block;
            pointer-events: none;
            user-select: none;
        }

        .mobile-gallery-dots {
            position: absolute;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 8px;
            z-index: 5;
        }

        .mobile-gallery-dots .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.2);
        }

        .mobile-gallery-dots .dot.active {
            background: #c62828;
            transform: scale(1.3);
            border-color: #c62828;
        }

        .mobile-gallery-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid #ddd;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 5;
            font-size: 14px;
            color: #333;
            transition: all 0.2s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .mobile-gallery-arrow:active {
            background: #c62828;
            color: #fff;
            border-color: #c62828;
        }

        .mobile-gallery-arrow.prev {
            left: 10px;
        }

        .mobile-gallery-arrow.next {
            right: 10px;
        }

        .mobile-zoom-icon {
            position: absolute;
            bottom: 15px;
            right: 15px;
            width: 38px;
            height: 38px;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid #ddd;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 5;
            font-size: 15px;
            color: #333;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease;
        }

        .mobile-zoom-icon:active {
            background: #c62828;
            color: #fff;
            border-color: #c62828;
        }

        /* ============================================
           ZOOM MODAL
           ============================================ */
        .zoom-modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            z-index: 99999;
            cursor: zoom-out;
        }

        .zoom-modal-overlay.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .zoom-modal-content {
            position: relative;
            max-width: 90vw;
            max-height: 90vh;
            overflow: hidden;
            cursor: grab;
        }

        .zoom-modal-content:active {
            cursor: grabbing;
        }

        .zoom-modal-content img {
            display: block;
            max-width: 90vw;
            max-height: 90vh;
            object-fit: contain;
            transform: scale(1);
            transform-origin: center center;
            transition: transform 0.1s ease;
            pointer-events: none;
            user-select: none;
        }

        .zoom-modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 44px;
            height: 44px;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
            border-radius: 50%;
            font-size: 22px;
            cursor: pointer;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .zoom-modal-close:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .zoom-modal-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
            border-radius: 50%;
            font-size: 22px;
            cursor: pointer;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .zoom-modal-nav:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .zoom-modal-nav.prev {
            left: 20px;
        }

        .zoom-modal-nav.next {
            right: 20px;
        }

        .zoom-modal-counter {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            color: #fff;
            font-size: 14px;
            background: rgba(0, 0, 0, 0.5);
            padding: 6px 16px;
            border-radius: 20px;
            z-index: 10;
        }

        /* ============================================
           PRODUCT INFO
           ============================================ */
        .product-info-wrapper {
            padding-left: 20px;
        }

        .product-brand {
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #c62828;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .product-title {
            font-size: 26px;
            font-weight: 600;
            color: #222;
            margin-bottom: 12px;
            line-height: 1.3;
            font-family: 'Montserrat', sans-serif;
        }

        .product-rating-stars {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 15px;
        }

        .stars-container {
            color: #f59e0b;
            font-size: 14px;
            letter-spacing: 1px;
        }

        .rating-count {
            font-size: 13px;
            color: #666;
        }

        .rating-count a {
            color: #c62828;
            text-decoration: underline;
        }

        .price-section {
            display: flex;
            align-items: baseline;
            gap: 12px;
            margin-bottom: 10px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f0f0f0;
        }

        .current-price {
            font-size: 28px;
            font-weight: 700;
            color: #222;
        }

        .original-price {
            font-size: 18px;
            color: #999;
            text-decoration: line-through;
        }

        .discount-badge {
            background: #fff0f0;
            color: #c62828;
            padding: 4px 10px;
            border-radius: 3px;
            font-size: 13px;
            font-weight: 600;
        }

        .tax-info {
            font-size: 12px;
            color: #888;
            margin-bottom: 20px;
        }

        .selection-block {
            margin-bottom: 25px;
            padding: 5px;
            border: 2px solid transparent;
            border-radius: 8px;
            transition: border-color 0.3s;
        }

        .selection-block.validation-error {
            border-color: #dc3545 !important;
            background: #fff8f8;
        }

        .selection-label {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .selection-label .selected-value {
            color: #c62828;
            font-weight: 500;
        }

        .color-options-container {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .color-option-item {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            border: 2px solid #e0e0e0;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .color-option-item:hover {
            border-color: #999;
            transform: scale(1.1);
        }

        .color-option-item.selected {
            border-color: #c62828;
            box-shadow: 0 0 0 2px rgba(198, 40, 40, 0.2);
        }

        .color-option-item.selected::after {
            content: '✓';
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
        }

        .color-option-item.disabled {
            opacity: 0.4;
            cursor: not-allowed;
            pointer-events: auto;
        }

        .color-option-item.disabled::before {
            content: '';
            position: absolute;
            width: 120%;
            height: 2px;
            background: #999;
            transform: rotate(-45deg);
        }

        /* Color Helper Prompt styling */
        .color-prompt-msg {
            font-size: 12px;
            margin-top: 8px;
            font-weight: 500;
            color: #ff9800;
            animation: bouncePrompt 2s infinite;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        @keyframes bouncePrompt {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-3px);
            }
        }

        .size-options-container {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .size-option-item {
            min-width: 50px;
            padding: 10px 18px;
            border: 1px solid #d0d0d0;
            border-radius: 25px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            text-align: center;
            transition: all 0.2s ease;
            background: #fff;
            color: #333;
            position: relative;
        }

        .size-option-item:hover {
            border-color: #c62828;
            color: #c62828;
        }

        .size-option-item.selected {
            background: #c62828;
            color: #fff;
            border-color: #c62828;
        }

        .size-option-item.disabled {
            opacity: 0.4;
            cursor: not-allowed;
            pointer-events: none;
            text-decoration: line-through;
            background: #f5f5f5;
        }

        .size-option-item .stock-info {
            font-size: 10px;
            display: block;
            margin-top: 2px;
        }

        .quantity-block {
            margin-bottom: 20px;
        }

        .quantity-selector {
            display: inline-flex;
            align-items: center;
            border: 1px solid #d0d0d0;
            border-radius: 25px;
            overflow: hidden;
        }

        .qty-btn {
            width: 40px;
            height: 40px;
            background: #f8f8f8;
            border: none;
            font-size: 18px;
            cursor: pointer;
            color: #333;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qty-btn:hover {
            background: #c62828;
            color: #fff;
        }

        .qty-input {
            width: 55px;
            height: 40px;
            text-align: center;
            border: none;
            border-left: 1px solid #d0d0d0;
            border-right: 1px solid #d0d0d0;
            font-size: 15px;
            font-weight: 500;
            background: #fff;
        }

        .qty-input:focus {
            outline: none;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }

        .btn-add-to-cart {
            flex: 1;
            min-width: 200px;
            padding: 14px 30px;
            background: #c62828;
            color: #fff;
            border: none;
            border-radius: 25px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-add-to-cart:hover {
            background: #b71c1c;
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(198, 40, 40, 0.3);
        }

        .btn-add-to-cart:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .btn-wishlist {
            width: 50px;
            height: 50px;
            border: 1px solid #d0d0d0;
            border-radius: 50%;
            background: #fff;
            cursor: pointer;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
            color: #999;
        }

        .btn-wishlist:hover {
            border-color: #c62828;
            color: #c62828;
        }

        .btn-wishlist.active {
            color: #c62828;
            border-color: #c62828;
            background: #fff5f5;
        }

        .delivery-info {
            background: #fafafa;
            border: 1px solid #eee;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
        }

        .delivery-row {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 0;
            font-size: 13px;
            color: #555;
        }

        .delivery-row i {
            color: #c62828;
            width: 20px;
            text-align: center;
        }

        .offer-tag {
            display: inline-block;
            background: #fff5f5;
            border: 1px dashed #c62828;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            color: #c62828;
            margin: 3px;
        }

        /* ============================================
           BOGO OFFER BANNER
           ============================================ */
        .bogo-offer-banner {
            background: linear-gradient(135deg, #fff5f5 0%, #fff0f0 100%);
            border: 2px dashed #c62828;
            border-radius: 12px;
            padding: 15px 18px;
            margin: 15px 0;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: bogoPulse 2s infinite;
        }

        @keyframes bogoPulse {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(198, 40, 40, 0.2);
            }

            50% {
                box-shadow: 0 0 0 8px rgba(198, 40, 40, 0);
            }
        }

        .bogo-banner-icon {
            background: #c62828;
            color: #fff;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .bogo-free-selection {
            background: #f0fff4;
            border: 1px solid #28a745;
            border-radius: 8px;
            padding: 12px;
            margin: 10px 0;
        }

        .bogo-free-selection label {
            font-weight: 600;
            color: #155724;
            font-size: 14px;
        }

        .bogo-free-selection select {
            border: 1px solid #28a745;
            border-radius: 6px;
            padding: 8px 12px;
            font-size: 14px;
            width: 100%;
            margin-top: 5px;
        }

        /* ============================================
           ACCORDION
           ============================================ */
        .product-details-accordion {
            margin-top: 30px;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }

        .accordion-item {
            border-bottom: 1px solid #eee;
            padding: 20px !important;
        }

        .accordion-header {
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            font-size: 15px;
            color: #333;
            transition: color 0.2s;
        }

        .accordion-header:hover {
            color: #c62828;
        }

        .accordion-header i {
            transition: transform 0.3s;
            font-size: 12px;
        }

        .accordion-header.open i {
            transform: rotate(180deg);
        }

        .accordion-content {
            padding: 0 0 15px;
            display: none;
            font-size: 14px;
            color: #666;
            line-height: 1.8;
        }

        .accordion-content.show {
            display: block;
        }

        /* ============================================
           CART POPUP / TOAST
           ============================================ */
        .cart-popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 10000;
            justify-content: center;
            align-items: center;
        }

        .cart-popup-dialog {
            background: #fff;
            border-radius: 12px;
            width: 90%;
            max-width: 420px;
            overflow: hidden;
            animation: slideUp 0.3s ease;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        }

        .popup-top {
            background: #c62828;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        .popup-top .check-icon {
            width: 50px;
            height: 50px;
            background: #fff;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #c62828;
            margin-bottom: 8px;
        }

        .popup-top h4 {
            color: #fff;
            margin: 5px 0 0;
            font-size: 18px;
        }

        .popup-close-btn {
            position: absolute;
            top: 12px;
            right: 15px;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: #fff;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 16px;
        }

        .popup-middle {
            padding: 20px;
        }

        .popup-product {
            display: flex;
            gap: 12px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .popup-product img {
            width: 70px;
            height: 85px;
            object-fit: cover;
            border-radius: 6px;
        }

        .popup-product-info h5 {
            margin: 0 0 5px;
            font-size: 15px;
            font-weight: 600;
        }

        .popup-product-info .popup-price {
            color: #c62828;
            font-weight: 700;
            font-size: 16px;
        }

        .popup-summary {
            background: #fafafa;
            padding: 12px;
            border-radius: 8px;
            margin-top: 12px;
            font-size: 13px;
        }

        .popup-summary p {
            margin: 4px 0;
            display: flex;
            justify-content: space-between;
        }

        .popup-bottom {
            padding: 15px;
            display: flex;
            gap: 10px;
            border-top: 1px solid #eee;
        }

        .btn-continue-shop {
            flex: 1;
            padding: 12px;
            background: #f0f0f0;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
            color: #333;
        }

        .btn-view-cart {
            flex: 1;
            padding: 12px;
            background: #c62828;
            color: #fff;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
        }

        .toast-notify {
            visibility: hidden;
            min-width: 280px;
            background: #333;
            color: #fff;
            border-radius: 8px;
            padding: 14px 18px;
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 10001;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
            transform: translateX(400px);
            transition: all 0.3s ease;
        }

        .toast-notify.show {
            visibility: visible;
            transform: translateX(0);
        }

        .toast-icon-circle {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
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

        @keyframes cartBounce {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.3);
            }
        }

        .cart-bounce {
            animation: cartBounce 0.3s ease;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 1200px) {
            .img-zoom-result {
                width: 350px;
                height: 350px;
            }
        }

        @media (max-width: 992px) {
            .img-zoom-result {
                width: 280px;
                height: 280px;
            }
        }

        @media (max-width: 768px) {
            .product-info-wrapper {
                padding-left: 0;
                margin-top: 20px;
            }

            .product-title {
                font-size: 20px;
            }

            .current-price {
                font-size: 22px;
            }

            .product-gallery-wrapper {
                position: relative;
                top: 0;
            }

            .main-image-container {
                display: none;
            }

            .thumbnail-slider {
                display: none;
            }

            .mobile-gallery-wrapper {
                display: block;
            }

            .img-zoom-lens,
            .img-zoom-result {
                display: none !important;
            }

            .thumbnail-item {
                min-width: 55px;
                height: 70px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-wishlist {
                width: 100%;
                border-radius: 25px;
            }

            .zoom-modal-nav {
                width: 40px;
                height: 40px;
                font-size: 18px;
            }

            .zoom-modal-nav.prev {
                left: 10px;
            }

            .zoom-modal-nav.next {
                right: 10px;
            }

            .bogo-offer-banner {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (min-width: 769px) {
            .mobile-gallery-wrapper {
                display: none;
            }

            .main-image-container {
                display: block;
            }

            .thumbnail-slider {
                display: block;
            }
        }
    </style>
</head>

<body>
    @include('partials.header')

    <main class="main__content_wrapper">
        <div style="padding-top:200px;" class="breadcrumb-section">
            <div class="container">
                <nav class="breadcrumb-nav">
                    <a href="{{ url('/') }}">Home</a>
                    <span class="separator">/</span>
                    @if($product->category)
                    <a href="{{ url('category/'.$product->category->slug) }}">{{ $product->category->name }}</a>
                    <span class="separator">/</span>
                    @endif
                    <span class="current">{{ $product->name }}</span>
                </nav>
            </div>
        </div>

        <div class="product-main-section">
            <div class="container">
                <div class="row g-4">

                    <div class="col-lg-6 col-md-6">
                        <div class="product-gallery-wrapper">

                            <div class="main-image-container" id="mainImageContainer">
                                <img id="mainProductImage"
                                    src="{{ $product->image_url ?? asset('assets/images/no-image.png') }}"
                                    alt="{{ $product->name }}">
                            </div>

                            <div class="thumbnail-slider" id="thumbnailSlider">
                                <button class="thumb-nav-btn prev" onclick="scrollThumbs(-1)">&#10094;</button>
                                <div class="thumbnail-track" id="thumbnailTrack">
                                    @if($product->image_url)
                                    <div class="thumbnail-item main-thumb active"
                                        onclick="switchImage(0, 'main')"
                                        data-index="0"
                                        data-type="main">
                                        <img src="{{ $product->image_url }}" alt="Main">
                                    </div>
                                    @endif
                                    @php
                                    $galleryImages = [];
                                    if($product->images){
                                    $galleryImages = is_string($product->images) ? json_decode($product->images, true) : (is_array($product->images) ? $product->images : []);
                                    }
                                    $galleryIndex = 0;
                                    @endphp
                                    @foreach($galleryImages as $img)
                                    @if(file_exists(public_path($img)))
                                    @php $galleryIndex++; @endphp
                                    <div class="thumbnail-item main-thumb"
                                        onclick="switchImage({{ $galleryIndex }}, 'gallery')"
                                        data-index="{{ $galleryIndex }}"
                                        data-type="gallery">
                                        <img src="{{ asset($img) }}" alt="Gallery">
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                <button class="thumb-nav-btn next" onclick="scrollThumbs(1)">&#10095;</button>
                            </div>

                            <div class="mobile-gallery-wrapper" id="mobileGalleryWrapper">
                                <div class="mobile-gallery-track" id="mobileGalleryTrack">
                                    @if($product->image_url)
                                    <div class="mobile-gallery-slide">
                                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                                    </div>
                                    @endif
                                    @foreach($galleryImages as $img)
                                    @if(file_exists(public_path($img)))
                                    <div class="mobile-gallery-slide">
                                        <img src="{{ asset($img) }}" alt="Gallery">
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                <div class="mobile-gallery-dots" id="mobileGalleryDots"></div>
                                <button class="mobile-gallery-arrow prev" onclick="slideMobile(-1)">&#10094;</button>
                                <button class="mobile-gallery-arrow next" onclick="slideMobile(1)">&#10095;</button>
                                <div class="mobile-zoom-icon" onclick="openZoomModal()">
                                    <i class="fas fa-search-plus"></i>
                                </div>
                            </div>

                            <!-- Replace this logic -->
                            @foreach($product->colors as $color)
                            @php $colorImgs = is_array($color->all_images_array) ? $color->all_images_array : []; @endphp
                            @if(count($colorImgs) > 0)
                            @php $colorImgIndex = 0; @endphp
                            <div class="color-gallery-panel" id="colorGalleryPanel_{{ $color->id }}">
                                <div class="color-gallery-label">
                                    <span style="display:inline-block;width:12px;height:12px;background:{{ $color->code }};border-radius:50%;"></span>
                                    {{ $color->name }} - All Images
                                </div>
                                <div class="color-gallery-thumbs" id="colorGalleryThumbs_{{ $color->id }}">
                                    @foreach($colorImgs as $cImg)
                                    @if(file_exists(public_path($cImg)))
                                    <div class="color-gallery-thumb {{ $colorImgIndex===0 ? 'active' : '' }}"
                                        onclick="switchColorImage({{ $color->id }}, {{ $colorImgIndex }})">
                                        <img src="{{ asset($cImg) }}" alt="{{ $color->name }}">
                                    </div>
                                    @php $colorImgIndex++; @endphp
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="product-info-wrapper">
                            <div class="product-brand">Bilori</div>

                            <h1 class="product-title">{{ $product->name }}</h1>

                            <div class="product-rating-stars">
                                <div class="stars-container">★★★★☆</div>
                                <span class="rating-count">4.2 <a href="#reviews">(24 Reviews)</a></span>
                            </div>

                            <div class="price-section">
                                @php
                                $basePrice = $product->bogo_is_active ? ($product->bogo_price ?? $product->price) : ($product->sale_price ?? $product->price);
                                $originalPrice = $product->price;
                                @endphp
                                <span class="current-price" id="displayPrice">₹{{ number_format($basePrice, 2) }}</span>
                                @if($product->sale_price && !$product->bogo_is_active)
                                <span class="original-price">₹{{ number_format($originalPrice, 2) }}</span>
                                <span class="discount-badge">{{ $product->discount_percentage }}% OFF</span>
                                @endif
                                @if($product->bogo_is_active)
                                <span class="discount-badge" style="background: #d4edda; color: #155724; border: 1px solid #28a745;">
                                    BOGO DEAL
                                </span>
                                @endif
                            </div>
                            <p class="tax-info">Inclusive of all taxes</p>

                            {{-- BOGO OFFER BANNER --}}
                            @if($product->bogo_is_active)
                            <div class="bogo-offer-banner">
                                <div class="bogo-banner-icon">🎁</div>
                                <div style="flex: 1;">
                                    <div style="font-weight: 700; color: #c62828; font-size: 18px; margin-bottom: 4px; font-family: 'Montserrat', sans-serif;">
                                        {{ $product->bogo_badge_text ?? 'Buy 1 Get 1 Free' }}
                                    </div>
                                    <div style="color: #666; font-size: 13px; line-height: 1.4;">
                                        Buy {{ $product->bogo_buy_quantity }} Suit & Get {{ $product->bogo_free_quantity }} Suit <strong>FREE!</strong>
                                        <br>
                                        <span style="color: #28a745; font-weight: 600;">
                                            ✨ Offer Price: ₹{{ number_format($product->bogo_price ?? $product->price, 2) }} for {{ $product->bogo_buy_quantity + $product->bogo_free_quantity }} Suits
                                        </span>

                                        @if($product->bogo_end_date)
                                        <br>
                                        <span style="color: #dc3545; font-weight: 600;">
                                            ⏰ Hurry! Offer ends {{ $product->bogo_end_date->format('d M Y') }}
                                        </span>
                                        @endif
                                    </div>
                                    @if($product->bogo_terms)
                                    <div style="font-size: 11px; color: #999; margin-top: 4px;">
                                        *{{ $product->bogo_terms }}
                                    </div>
                                    @endif
                                </div>
                            </div>

                            @if($product->bogo_type == 'any_product' && $product->bogoEligibleFreeProducts->count() > 0)
                            <div class="bogo-free-selection">
                                <label>
                                    <i class="fas fa-gift text-success"></i>
                                    Select Your Free Suit:
                                </label>
                                <select id="bogoFreeProductSelect" onchange="updateBogoFreeProduct()">
                                    <option value="">-- Choose a Free Suit --</option>
                                    @foreach($product->bogoEligibleFreeProducts as $freeProduct)
                                    <option value="{{ $freeProduct->id }}"
                                        data-name="{{ $freeProduct->name }}"
                                        data-price="{{ $freeProduct->final_price }}"
                                        data-image="{{ $freeProduct->image_url }}">
                                        {{ $freeProduct->name }} — ₹{{ number_format($freeProduct->final_price, 2) }}
                                    </option>
                                    @endforeach
                                </select>
                                <div id="selectedFreeProductPreview" style="margin-top: 8px; display: none;">
                                    <small style="color: #28a745; font-weight: 600;">
                                        ✅ Free: <span id="freeProductName"></span>
                                    </small>
                                </div>
                            </div>
                            @endif
                            @endif

                            <div class="selection-block" id="colorSelectionBlock">
                                <div class="selection-label">
                                    Color: <span class="selected-value" id="selectedColorLabel">Select Color</span>
                                    <button type="button" class="btn btn-sm btn-link text-muted ms-2"
                                        onclick="clearColorSelection()" style="font-size:11px;text-decoration:none;">
                                        Clear
                                    </button>
                                </div>
                                <div class="color-options-container">
                                    @foreach($product->colors as $color)
                                    <div class="color-option-item"
                                        style="background-color: {{ $color->code }};"
                                        data-color-id="{{ $color->id }}"
                                        data-color-name="{{ $color->name }}"
                                        data-color-code="{{ $color->code }}"
                                        onclick="handleColorSelect(this, {{ $color->id }}, '{{ addslashes($color->name) }}')"
                                        title="{{ $color->name }}">
                                    </div>
                                    @endforeach
                                </div>
                                <div class="color-prompt-msg" id="colorPromptMsg">
                                    <i class="fas fa-hand-point-up"></i> Please click on a color circle above to see options.
                                </div>
                            </div>

                            <div class="selection-block" id="sizeSelectionBlock">
                                <div class="selection-label">
                                    Size: <span class="selected-value" id="selectedSizeLabel">Select Size</span>
                                    <button type="button" class="btn btn-sm btn-link text-muted ms-2"
                                        onclick="clearSizeSelection()" style="font-size:11px;text-decoration:none;">
                                        Clear
                                    </button>
                                </div>
                                <div class="size-options-container" id="sizeOptionsContainer">
                                    <p style="font-size:13px;color:#999;">Please select a color first</p>
                                </div>
                            </div>

                            <div class="quantity-block">
                                <div class="selection-label">Quantity</div>
                                <div class="quantity-selector">
                                    <button class="qty-btn" onclick="decreaseQty()">−</button>
                                    <input type="number" class="qty-input" id="quantityInput" value="1" min="1" max="99" readonly>
                                    <button class="qty-btn" onclick="increaseQty()">+</button>
                                </div>
                                <div id="bogoMessage" style="margin-top: 6px;"></div>
                            </div>

                            <input type="hidden" id="selectedColorId" value="">
                            <input type="hidden" id="selectedColorName" value="">
                            <input type="hidden" id="selectedSizeId" value="">
                            <input type="hidden" id="selectedSizeName" value="">
                            <input type="hidden" id="selectedSizePrice" value="0">
                            <input type="hidden" id="basePrice" value="{{ $basePrice }}">
                            <input type="hidden" id="bogoFreeProductId" value="">

                            <div class="action-buttons">
                                <button type="button" class="btn-add-to-cart" id="addToCartBtn" onclick="addToCart()">
                                    <i class="fas fa-shopping-bag"></i> Add to Bag
                                </button>
                                <button type="button" class="btn-wishlist" id="wishlistBtn" onclick="toggleWishlist()">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>

                            <div class="delivery-info">
                                @php $shippingOffers = $product->shipping_offers_list ?? []; @endphp
                                @if(count($shippingOffers) > 0)
                                @foreach($shippingOffers as $offer)
                                <div class="delivery-row">
                                    @php
                                    $emoji = '';
                                    $text = $offer;
                                    if(preg_match('/^[^\x20-\x7E]+/u', $offer, $matches)) {
                                    $emoji = $matches[0];
                                    $text = trim(substr($offer, strlen($emoji)));
                                    }
                                    @endphp
                                    @if($emoji)
                                    <span style="font-size:16px;">{{ $emoji }}</span>
                                    @else
                                    <i class="fas fa-check-circle"></i>
                                    @endif
                                    <span>{{ $text }}</span>
                                </div>
                                @endforeach
                                @else
                                <div class="delivery-row"><i class="fas fa-truck"></i><span>Free Shipping on orders above ₹999</span></div>
                                <div class="delivery-row"><i class="fas fa-undo"></i><span>Easy 15 days return & exchange</span></div>
                                <div class="delivery-row"><i class="fas fa-shield-alt"></i><span>100% Authentic Products</span></div>
                                @endif
                            </div>

                            <div>
                                @php $promoBadges = $product->promo_badges_list ?? []; @endphp
                                @if(count($promoBadges) > 0)
                                @foreach($promoBadges as $badge)
                                @php
                                $badgeText = is_array($badge) ? ($badge['text'] ?? '') : $badge;
                                $badgeColor = is_array($badge) ? ($badge['color'] ?? 'danger') : 'danger';
                                $bgColors = ['success'=>'#d4edda','primary'=>'#cce5ff','danger'=>'#fff0f0','warning'=>'#fff3cd','info'=>'#d1ecf1','dark'=>'#d6d8d9','secondary'=>'#e2e3e5'];
                                $textColors = ['success'=>'#155724','primary'=>'#004085','danger'=>'#c62828','warning'=>'#856404','info'=>'#0c5460','dark'=>'#1b1e21','secondary'=>'#383d41'];
                                $borderColors = ['success'=>'#c3e6cb','primary'=>'#b8daff','danger'=>'#c62828','warning'=>'#ffeaa7','info'=>'#bee5eb','dark'=>'#c6c8ca','secondary'=>'#d6d8db'];
                                $bg = $bgColors[$badgeColor] ?? '#fff0f0';
                                $text = $textColors[$badgeColor] ?? '#c62828';
                                $border = $borderColors[$badgeColor] ?? '#c62828';
                                @endphp
                                <span class="offer-tag" style="background:{{$bg}};color:{{$text}};border-color:{{$border}};">{{ $badgeText }}</span>
                                @endforeach
                                @else
                                <span class="offer-tag">🏷️ Extra 5% off on prepaid orders</span>
                                <span class="offer-tag">🎁 Buy 2 Get 10% off</span>
                                @endif
                                @if($product->bogo_is_active)
                                <span class="offer-tag" style="background:#d4edda;color:#155724;border-color:#28a745;font-weight:700;">🎁 {{ $product->bogo_badge_text ?? 'Buy 1 Get 1 Free' }}</span>
                                @endif
                            </div>

                            <div class="product-details-accordion">
                                <div class="accordion-item active">
                                    <div class="accordion-header open" onclick="toggleAccordion(this)">
                                        <span>Product Details</span>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div class="accordion-content show">
                                        <div class="product-description">
                                            @php
                                            $plainText = strip_tags($product->description ?? '');
                                            $shortText = Str::limit($plainText, 150, '...');
                                            @endphp
                                            @if($shortText !== $plainText)
                                            <span class="short-text">{!! $shortText !!}</span>
                                            <span class="full-text" style="display: none;">{!! $plainText !!}</span>
                                            <button onclick="toggleReadMore(this)" class="read-more-btn" style="font-size:14px;color:#c62828;background:none;border:none;cursor:pointer;font-weight:bold;margin-left:5px;">Read More</button>
                                            @else
                                            {!! $plainText !!}
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                @if($product->size_fit)
                                <div class="accordion-item">
                                    <div class="accordion-header" onclick="toggleAccordion(this)">
                                        <span>Size & Fit</span>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div class="accordion-content">
                                        <p>{!! nl2br(e($product->size_fit)) !!}</p>
                                    </div>
                                </div>
                                @endif

                                @if($product->material_care)
                                <div class="accordion-item">
                                    <div class="accordion-header" onclick="toggleAccordion(this)">
                                        <span>Material & Care</span>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div class="accordion-content">
                                        <p>{!! nl2br(e($product->material_care)) !!}</p>
                                    </div>
                                </div>
                                @endif

                                <div class="accordion-item">
                                    <div class="accordion-header" onclick="toggleAccordion(this)">
                                        <span>Shipping & Delivery</span>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div class="accordion-content">
                                        @php $shippingOffers = $product->shipping_offers_list ?? []; @endphp
                                        @if(count($shippingOffers) > 0)
                                        <ul style="list-style: none; padding: 0;">
                                            @foreach($shippingOffers as $offer)
                                            <li style="padding: 5px 0;">
                                                <i class="fas fa-check-circle" style="color: #28a745; margin-right: 8px;"></i>
                                                {{ $offer }}
                                            </li>
                                            @endforeach
                                        </ul>
                                        @else
                                        <p>Standard shipping available. Free shipping on orders above ₹999.</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <div class="accordion-header" onclick="toggleAccordion(this)">
                                        <span>Return & Exchange Policy</span>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div class="accordion-content">
                                        <ul style="list-style: none; padding: 0;">
                                            <li style="padding: 5px 0;">
                                                <i class="fas fa-undo" style="color: #c62828; margin-right: 8px;"></i>
                                                Easy 15 days return & exchange
                                            </li>
                                            <li style="padding: 5px 0;">
                                                <i class="fas fa-shield-alt" style="color: #c62828; margin-right: 8px;"></i>
                                                100% Authentic Products Guaranteed
                                            </li>
                                            <li style="padding: 5px 0;">
                                                <i class="fas fa-tags" style="color: #c62828; margin-right: 8px;"></i>
                                                Products must be unused and with original tags
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <div class="accordion-header" onclick="toggleAccordion(this)">
                                        <span>Offers & Promotions</span>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div class="accordion-content">
                                        @php $promoBadges = $product->promo_badges_list ?? []; @endphp
                                        @if(count($promoBadges) > 0)
                                        <ul style="list-style: none; padding: 0;">
                                            @foreach($promoBadges as $badge)
                                            @php
                                            $badgeText = is_array($badge) ? ($badge['text'] ?? '') : $badge;
                                            @endphp
                                            <li style="padding: 5px 0;">
                                                <i class="fas fa-tag" style="color: #f59e0b; margin-right: 8px;"></i>
                                                {{ $badgeText }}
                                            </li>
                                            @endforeach
                                        </ul>
                                        @else
                                        <ul style="list-style: none; padding: 0;">
                                            <li style="padding: 5px 0;">
                                                <i class="fas fa-tag" style="color: #f59e0b; margin-right: 8px;"></i>
                                                Extra 5% off on prepaid orders
                                            </li>
                                            <li style="padding: 5px 0;">
                                                <i class="fas fa-tag" style="color: #f59e0b; margin-right: 8px;"></i>
                                                Buy 2 Get 10% off
                                            </li>
                                        </ul>
                                        @endif
                                        @if($product->bogo_is_active)
                                        <div style="margin-top: 10px; padding: 10px; background: #f0fff4; border-radius: 8px; border: 1px solid #28a745;">
                                            <strong style="color: #155724;">
                                                🎁 {{ $product->bogo_badge_text ?? 'Buy 1 Get 1 Free' }}
                                            </strong>
                                            <p style="margin: 5px 0 0; font-size: 13px; color: #666;">
                                                Buy {{ $product->bogo_buy_quantity }} & Get {{ $product->bogo_free_quantity }} FREE
                                            </p>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <div class="accordion-header" onclick="toggleAccordion(this)">
                                        <span>Additional Information</span>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div class="accordion-content">
                                        <table style="width: 100%; font-size: 13px;">
                                            <tr>
                                                <td style="padding: 5px 0; color: #666;">Brand</td>
                                                <td style="padding: 5px 0; font-weight: 500;">Bilori</td>
                                            </tr>
                                            @if($product->sku)
                                            <tr>
                                                <td style="padding: 5px 0; color: #666;">SKU</td>
                                                <td style="padding: 5px 0; font-weight: 500;">{{ $product->sku }}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td style="padding: 5px 0; color: #666;">Product Code</td>
                                                <td style="padding: 5px 0; font-weight: 500;">BER-{{ $product->id }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Related Products Section --}}
        @if(isset($relatedProducts) && $relatedProducts->count() > 0)
        <section class="related-products-section class-py-5">
            <div class="container">
                <div class="section-heading text-center mb-5">
                    <span class="subtitle">Recommended Products</span>
                    <h2 class="related-title">You May Also Like</h2>
                </div>
                <div class="row g-4 justify-content-center">
                    @foreach($relatedProducts as $related)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-6">
                        <a href="{{ url('product/'.$related->slug) }}" class="related-product-card">
                            <div class="related-product-image">
                                <img src="{{ $related->image_url ?? asset('assets/images/no-image.png') }}" alt="{{ $related->name }}">
                            </div>
                            <div class="related-product-content">
                                <h6 class="product-name">{{ $related->name }}</h6>
                                <div class="price-box">
                                    <span class="product-price">₹{{ number_format($related->final_price, 2) }}</span>
                                </div>
                                <div class="view-btn">View Product</div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <style>
            .related-products-section {
                background: #f8f9fb;
            }

            .section-heading .subtitle {
                display: inline-block;
                font-size: 14px;
                font-weight: 600;
                color: #ff6600;
                text-transform: uppercase;
                letter-spacing: 1px;
                margin-bottom: 10px;
            }

            .related-title {
                font-size: 36px;
                font-weight: 700;
                color: #111;
                margin: 0;
            }

            .related-product-card {
                display: block;
                background: #fff;
                border-radius: 18px;
                overflow: hidden;
                text-decoration: none;
                transition: all 0.35s ease;
                height: 100%;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
                position: relative;
            }

            .related-product-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
            }

            .related-product-image {
                position: relative;
                overflow: hidden;
                background: #fff;
                padding: 20px;
            }

            .related-product-image img {
                width: 100%;
                height: 250px;
                object-fit: contain;
                transition: 0.4s ease;
            }

            .related-product-card:hover .related-product-image img {
                transform: scale(1.08);
            }

            .related-product-content {
                padding: 20px;
                text-align: center;
            }

            .product-name {
                font-size: 17px;
                font-weight: 600;
                color: #222;
                line-height: 1.5;
                min-height: 52px;
                margin-bottom: 14px;
            }

            .price-box {
                margin-bottom: 18px;
            }

            .product-price {
                font-size: 22px;
                font-weight: 700;
                color: #ff6600;
            }

            .view-btn {
                display: inline-block;
                padding: 10px 22px;
                border-radius: 50px;
                background: #111;
                color: #fff;
                font-size: 14px;
                font-weight: 600;
                transition: 0.3s ease;
            }

            .related-product-card:hover .view-btn {
                background: #ff6600;
            }

            @media(max-width:767px) {
                .related-title {
                    font-size: 28px;
                }

                .related-product-image img {
                    height: 180px;
                }

                .product-name {
                    font-size: 15px;
                    min-height: auto;
                }

                .product-price {
                    font-size: 18px;
                }

                .view-btn {
                    padding: 8px 18px;
                    font-size: 13px;
                }
            }
        </style>
    </main>

    <div class="zoom-modal-overlay" id="zoomModalOverlay">
        <button class="zoom-modal-close" onclick="closeZoomModal()">&times;</button>
        <button class="zoom-modal-nav prev" onclick="zoomModalNavigate(-1)">&#10094;</button>
        <div class="zoom-modal-content" id="zoomModalContent">
            <img id="zoomModalImage" src="" alt="Zoomed Image">
        </div>
        <button class="zoom-modal-nav next" onclick="zoomModalNavigate(1)">&#10095;</button>
        <div class="zoom-modal-counter" id="zoomModalCounter">1 / 1</div>
    </div>

    <div class="cart-popup-overlay" id="cartPopup">
        <div class="cart-popup-dialog">
            <div class="popup-top">
                <div class="check-icon"><i class="fas fa-check"></i></div>
                <h4>Added to Bag!</h4>
                <button class="popup-close-btn" onclick="closeCartPopup()">&times;</button>
            </div>
            <div class="popup-middle" id="popupMiddleContent"></div>
            <div class="popup-bottom">
                <button class="btn-continue-shop" onclick="closeCartPopup()">Continue Shopping</button>
                <a href="{{ route('cart.index') }}" class="btn-view-cart">View Bag →</a>
            </div>
        </div>
    </div>

    <div class="toast-notify" id="toastNotify">
        <div class="toast-icon-circle" id="toastIcon" style="background:#28a745;">
            <i class="fas fa-check"></i>
        </div>
        <div>
            <strong id="toastTitle">Success!</strong>
            <span id="toastMsg" style="display:block;font-size:13px;">Added to cart</span>
        </div>
    </div>

    @include('partials.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // CSRF token setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // ==================== DATA ====================
        var allImages = [];
        @if($product - > image_url)
        allImages.push("{{ $product->image_url }}");
        @endif
        @foreach($galleryImages as $img)
        @if(file_exists(public_path($img)))
        allImages.push("{{ asset($img) }}");
        @endif
        @endforeach

        var colorImagesMap = {};
        @foreach($product - > colors as $color)
        colorImagesMap[{
            {
                $color - > id
            }
        }] = [];
        @php $allColorImgs = is_array($color - > all_images_array) ? $color - > all_images_array : [];
        @endphp
        @foreach($allColorImgs as $img)
        @if(file_exists(public_path($img)))
        colorImagesMap[{
            {
                $color - > id
            }
        }].push("{{ asset($img) }}");
        @endif
        @endforeach
        @endforeach

        var currentImageIndex = 0;
        var currentColorId = null;
        var currentImageSet = allImages.slice(); // init with main images
        var isZoomModalOpen = false;
        var zoomModalIndex = 0;
        var mobileCurrentSlide = 0;

        // Color & size selections
        var selColorId = '',
            selColorName = '';
        var selSizeId = '',
            selSizeName = '',
            selSizePrice = 0,
            selSizeStock = 0;

        // BOGO variables
        var bogoEnabled = {
            {
                $product - > bogo_is_active ? 'true' : 'false'
            }
        };
        var bogoBuyQty = {
            {
                $product - > bogo_buy_quantity ?? 1
            }
        };
        var bogoFreeQty = {
            {
                $product - > bogo_free_quantity ?? 1
            }
        };

        console.log('🖼️ allImages:', allImages);
        console.log('🎨 colorImagesMap:', colorImagesMap);
        console.log('🎁 BOGO Enabled:', bogoEnabled);

        // ==================== BOGO FUNCTIONS ====================
        function updateBogoFreeProduct() {
            var select = document.getElementById('bogoFreeProductSelect');
            var preview = document.getElementById('selectedFreeProductPreview');
            var nameSpan = document.getElementById('freeProductName');
            var freeProductIdInput = document.getElementById('bogoFreeProductId');

            if (select && select.value) {
                var selectedOption = select.options[select.selectedIndex];
                var name = selectedOption.getAttribute('data-name');

                if (preview) preview.style.display = 'block';
                if (nameSpan) nameSpan.textContent = name;
                if (freeProductIdInput) freeProductIdInput.value = select.value;
            } else {
                if (preview) preview.style.display = 'none';
                if (freeProductIdInput) freeProductIdInput.value = '';
            }
        }

        function calculateBogoQuantity() {
            if (!bogoEnabled) {
                $('#bogoMessage').html('');
                return;
            }

            var currentQty = parseInt($('#quantityInput').val()) || 1;
            var sets = Math.floor(currentQty / bogoBuyQty);
            var freeItems = sets * bogoFreeQty;
            var totalItems = currentQty + freeItems;

            if (freeItems > 0) {
                $('#bogoMessage').html(
                    '<span style="color: #28a745; font-size: 13px; font-weight: 600;">' +
                    '🎁 You will get <strong>' + freeItems + ' FREE</strong> suit(s)! ' +
                    'Total: <strong>' + totalItems + '</strong> suits in bag' +
                    '</span>'
                );
            } else {
                var needed = bogoBuyQty - currentQty;
                $('#bogoMessage').html(
                    '<span style="color: #c62828; font-size: 13px; font-weight: 600;">' +
                    'Add <strong>' + needed + ' more</strong> suit(s) to get <strong>' + bogoFreeQty + ' FREE</strong>!' +
                    '</span>'
                );
            }
        }

        // ==================== MAIN IMAGE UPDATE ====================
        function updateMainImage(url) {
            var mainImg = document.getElementById('mainProductImage');
            if (!mainImg) {
                console.error('❌ mainProductImage not found!');
                return;
            }
            console.log('🖼️ Main image ->', url);
            mainImg.src = url;
            if (window.innerWidth > 768) setTimeout(initHoverZoom, 50);
        }

        // ==================== HOVER ZOOM ====================
        function initHoverZoom() {
            var container = document.getElementById('mainImageContainer');
            if (!container || window.innerWidth <= 768) return;

            var mainImg = document.getElementById('mainProductImage');
            if (!mainImg) return;

            var newContainer = container.cloneNode(true);
            container.parentNode.replaceChild(newContainer, container);
            container = newContainer;
            mainImg = container.querySelector('img');

            mainImg.style.transformOrigin = '0 0';
            mainImg.style.transition = 'transform 0.1s ease';

            container.addEventListener('mouseenter', function() {
                mainImg.style.transform = 'scale(2)';
            });

            container.addEventListener('mousemove', function(e) {
                var rect = container.getBoundingClientRect();
                var x = e.clientX - rect.left;
                var y = e.clientY - rect.top;
                mainImg.style.transformOrigin = (x / rect.width * 100) + '% ' + (y / rect.height * 100) + '%';
            });

            container.addEventListener('mouseleave', function() {
                mainImg.style.transform = 'scale(1)';
            });
        }

        // ==================== THUMBNAIL ACTIVE STATE ====================
        function updateMainThumbnailActive(index) {
            document.querySelectorAll('#thumbnailTrack .thumbnail-item').forEach(function(item) {
                item.classList.remove('active');
            });
            var active = document.querySelector('#thumbnailTrack .thumbnail-item[data-index="' + index + '"]');
            if (active) active.classList.add('active');
        }

        function updateColorThumbActive(colorId, index) {
            var gallery = document.getElementById('colorGalleryThumbs_' + colorId);
            if (!gallery) return;
            gallery.querySelectorAll('.color-gallery-thumb').forEach(function(t) {
                t.classList.remove('active');
            });
            var active = gallery.querySelector('.color-gallery-thumb:nth-child(' + (index + 1) + ')');
            if (active) active.classList.add('active');
        }

        // ==================== IMAGE SWITCHING ====================

        // Main gallery click
        function switchImage(index, type) {
            console.log('🔄 Main gallery switch to index:', index);
            currentImageSet = allImages.slice();
            if (index >= 0 && index < currentImageSet.length) {
                currentImageIndex = index;
                mobileCurrentSlide = index;
                updateMainImage(currentImageSet[index]);
                updateMainThumbnailActive(index);
                updateMobileGallery();
            }
        }

        // Color gallery click - receives colorId and index (integers)
        function switchColorImage(colorId, index) {
            console.log('🎨 switchColorImage - colorId:', colorId, 'index:', index);

            colorId = parseInt(colorId);
            if (isNaN(colorId)) return;

            currentColorId = colorId;
            var imgs = colorImagesMap[colorId] || [];
            if (imgs.length === 0 || index < 0 || index >= imgs.length) {
                console.error('❌ Invalid color image index');
                return;
            }

            currentImageSet = imgs.slice();
            currentImageIndex = index;
            mobileCurrentSlide = index;

            var correctUrl = imgs[index];
            console.log('🖼️ Setting main image to:', correctUrl);
            updateMainImage(correctUrl);
            updateColorThumbActive(colorId, index);

            // Scroll into view
            var activeThumb = document.querySelector('#colorGalleryThumbs_' + colorId + ' .color-gallery-thumb:nth-child(' + (index + 1) + ')');
            if (activeThumb) {
                activeThumb.scrollIntoView({
                    behavior: 'smooth',
                    inline: 'center',
                    block: 'nearest'
                });
            }

            updateMobileGallery();
        }

        // ==================== MOBILE GALLERY ====================
        function updateMobileGallery() {
            var track = document.getElementById('mobileGalleryTrack');
            var dotsContainer = document.getElementById('mobileGalleryDots');
            if (!track || !dotsContainer) return;

            var slidesHtml = '';
            currentImageSet.forEach(function(img) {
                slidesHtml += '<div class="mobile-gallery-slide"><img src="' + img + '" alt="Product"></div>';
            });
            track.innerHTML = slidesHtml;

            var dotsHtml = '';
            currentImageSet.forEach(function(img, i) {
                dotsHtml += '<span class="dot' + (i === mobileCurrentSlide ? ' active' : '') + '" onclick="goToMobileSlide(' + i + ')"></span>';
            });
            dotsContainer.innerHTML = dotsHtml;

            goToMobileSlide(Math.min(mobileCurrentSlide, currentImageSet.length - 1));
        }

        function goToMobileSlide(index) {
            if (index < 0 || index >= currentImageSet.length) return;
            mobileCurrentSlide = index;
            currentImageIndex = index;

            var track = document.getElementById('mobileGalleryTrack');
            if (track) track.style.transform = 'translateX(' + (-index * 100) + '%)';

            document.querySelectorAll('#mobileGalleryDots .dot').forEach(function(dot, i) {
                dot.classList.toggle('active', i === index);
            });

            if (currentImageSet[index]) {
                updateMainImage(currentImageSet[index]);
                if (currentColorId) {
                    updateColorThumbActive(currentColorId, index);
                } else {
                    updateMainThumbnailActive(index);
                }
            }
        }

        function slideMobile(direction) {
            var total = currentImageSet.length;
            if (total === 0) return;
            goToMobileSlide((mobileCurrentSlide + direction + total) % total);
        }

        // Swipe support
        (function() {
            var wrapper = document.getElementById('mobileGalleryWrapper');
            if (!wrapper) return;
            var startX = 0,
                startY = 0,
                isSwiping = false;
            var threshold = 50;

            wrapper.addEventListener('touchstart', function(e) {
                if (e.touches.length === 1) {
                    startX = e.touches[0].clientX;
                    startY = e.touches[0].clientY;
                    isSwiping = true;
                }
            }, {
                passive: true
            });

            wrapper.addEventListener('touchend', function(e) {
                if (!isSwiping) return;
                var endX = e.changedTouches[0].clientX;
                var endY = e.changedTouches[0].clientY;
                if (Math.abs(endX - startX) > Math.abs(endY - startY) && Math.abs(endX - startX) > threshold) {
                    slideMobile(endX < startX ? 1 : -1);
                }
                isSwiping = false;
            });
        })();

        // ==================== ZOOM MODAL ====================
        function openZoomModal() {
            zoomModalIndex = mobileCurrentSlide;
            if (currentImageSet[zoomModalIndex]) {
                document.getElementById('zoomModalImage').src = currentImageSet[zoomModalIndex];
            }
            document.getElementById('zoomModalOverlay').classList.add('active');
            document.body.style.overflow = 'hidden';
            isZoomModalOpen = true;
            updateZoomModalCounter();
        }

        function closeZoomModal() {
            document.getElementById('zoomModalOverlay').classList.remove('active');
            document.body.style.overflow = '';
            isZoomModalOpen = false;
        }

        function zoomModalNavigate(dir) {
            var total = currentImageSet.length;
            zoomModalIndex = (zoomModalIndex + dir + total) % total;
            document.getElementById('zoomModalImage').src = currentImageSet[zoomModalIndex];
            updateZoomModalCounter();
        }

        function updateZoomModalCounter() {
            document.getElementById('zoomModalCounter').textContent = (zoomModalIndex + 1) + ' / ' + currentImageSet.length;
        }

        // ==================== READ MORE TOGGLE ====================
        function toggleReadMore(btn) {
            var container = $(btn).closest('.product-description');
            container.find('.short-text, .full-text').toggle();
            $(btn).text($(btn).text() === 'Read More' ? 'Read Less' : 'Read More');
        }

        // ==================== ACCORDION ====================
        function toggleAccordion(el) {
            $(el).toggleClass('open').next('.accordion-content').toggleClass('show');
        }

        function scrollThumbs(direction) {
            var track = document.getElementById('thumbnailTrack');
            if (track) track.scrollBy({
                left: direction * 85,
                behavior: 'smooth'
            });
        }

        // ==================== COLOR SELECTION ====================
        function handleColorSelect(el, id, name) {
            console.log('🎨 COLOR SELECT - id:', id, 'name:', name);

            // Remove error validation states if any
            $('#colorSelectionBlock').removeClass('validation-error');
            $('#colorPromptMsg').hide();

            $('.color-option-item').removeClass('selected');
            $(el).addClass('selected');

            selColorId = id;
            selColorName = name;
            currentColorId = id;

            $('#selectedColorId').val(id);
            $('#selectedColorName').val(name);
            $('#selectedColorLabel').text(name);

            $('#thumbnailSlider').hide();
            $('.color-gallery-panel').removeClass('active');
            $('#colorGalleryPanel_' + id).addClass('active');

            var imgs = colorImagesMap[id] || [];
            currentImageSet = imgs.slice();
            currentImageIndex = 0;
            mobileCurrentSlide = 0;

            if (imgs.length > 0) {
                updateMainImage(imgs[0]);
                updateColorThumbActive(id, 0);
            }

            updateMobileGallery();
            resetSizeData();
            $('#sizeOptionsContainer').html('<p style="font-size:13px;color:#666;"><i class="fas fa-spinner fa-spin"></i> Loading sizes...</p>');
            loadSizes(id);
            updateDisplayPrice();
        }

        function clearColorSelection() {
            selColorId = '';
            selColorName = '';
            currentColorId = null;
            currentImageSet = allImages.slice();
            currentImageIndex = 0;
            mobileCurrentSlide = 0;

            $('#selectedColorId').val('');
            $('#selectedColorName').val('');
            $('#selectedColorLabel').text('Select Color');
            $('.color-option-item').removeClass('selected');

            $('#thumbnailSlider').show();
            $('.color-gallery-panel').removeClass('active');

            // Re-show helper guide prompt text
            $('#colorPromptMsg').show();

            if (allImages.length > 0) {
                updateMainImage(allImages[0]);
                updateMainThumbnailActive(0);
            }

            updateMobileGallery();
            $('#sizeOptionsContainer').html('<p style="font-size:13px;color:#999;">Please select a color first</p>');
            $('#selectedSizeLabel').text('Select Size');
            resetSizeData();
            updateDisplayPrice();
        }

        function loadSizes(colorId) {
            $.ajax({
                url: "{{ route('get.size.stock') }}",
                type: 'GET',
                data: {
                    product_id: {
                        {
                            $product - > id
                        }
                    },
                    color_id: colorId
                },
                success: function(r) {
                    if (r.success && r.sizes && r.sizes.length) {
                        var html = '';
                        r.sizes.forEach(function(s) {
                            var stock = parseInt(s.stock) || 0;
                            var disabled = stock <= 0 ? ' disabled' : '';
                            var extraPrice = parseFloat(s.extra_price) || 0;
                            var extraText = extraPrice > 0 ? ' (+₹' + extraPrice.toFixed(2) + ')' : '';
                            html += '<div class="size-option-item' + disabled + '" onclick="handleSizeSelect(this, \'' + s.size + '\', ' + s.id + ', ' + extraPrice + ', ' + stock + ')">' + s.size + extraText + '<span class="stock-info">' + (stock <= 0 ? 'Out of Stock' : stock + ' left') + '</span></div>';
                        });
                        $('#sizeOptionsContainer').html(html);
                    } else {
                        $('#sizeOptionsContainer').html('<p style="font-size:13px;color:#dc3545;">No sizes available</p>');
                    }
                },
                error: function() {
                    $('#sizeOptionsContainer').html('<p style="font-size:13px;color:#dc3545;">Error loading sizes</p>');
                }
            });
        }

        function handleSizeSelect(el, name, id, price, stock) {
            if (parseInt(stock) <= 0) return;

            // Remove size block error borders
            $('#sizeSelectionBlock').removeClass('validation-error');

            $('.size-option-item').removeClass('selected');
            $(el).addClass('selected');
            selSizeName = name;
            selSizeId = id;
            selSizePrice = price;
            selSizeStock = stock;
            $('#selectedSizeLabel').text(name + (price > 0 ? ' (+₹' + price.toFixed(2) + ')' : ''));
            $('#selectedSizeId').val(id);
            $('#selectedSizeName').val(name);
            $('#selectedSizePrice').val(price);
            $('#quantityInput').attr('max', stock);
            if (parseInt($('#quantityInput').val()) > stock) $('#quantityInput').val(stock);
            updateDisplayPrice();
            calculateBogoQuantity();
        }

        function resetSizeData() {
            selSizeName = '';
            selSizeId = '';
            selSizePrice = 0;
            selSizeStock = 0;
            $('#selectedSizeId').val('');
            $('#selectedSizeName').val('');
            $('#selectedSizePrice').val('0');
            $('#quantityInput').attr('max', '99').val(1);
        }

        function clearSizeSelection() {
            resetSizeData();
            $('.size-option-item').removeClass('selected');
            $('#selectedSizeLabel').text('Select Size');
            updateDisplayPrice();
            calculateBogoQuantity();
        }

        function updateDisplayPrice() {
            var total = (parseFloat($('#basePrice').val()) + selSizePrice).toFixed(2);
            $('#displayPrice').text('₹' + total);
        }

        function decreaseQty() {
            var v = parseInt($('#quantityInput').val()) || 1;
            if (v > 1) $('#quantityInput').val(v - 1);
            calculateBogoQuantity();
        }

        function increaseQty() {
            var v = parseInt($('#quantityInput').val()) || 1;
            var max = parseInt($('#quantityInput').attr('max')) || 99;
            if (v < max) $('#quantityInput').val(v + 1);
            calculateBogoQuantity();
        }

        // ==================== ADD TO CART ====================
        function addToCart() {
            // 1. Clear previous error validation visual artifacts
            $('#colorSelectionBlock, #sizeSelectionBlock').removeClass('validation-error');

            // 2. STRIKT VALIDATION: Check if color is picked
            if (!selColorId || selColorName === '') {
                showToast('Please select a Color circle first!', 'error');
                $('#colorSelectionBlock').addClass('validation-error');
                $('html, body').animate({
                    scrollTop: $("#colorSelectionBlock").offset().top - 150
                }, 400);
                return; // Stop processing further code
            }

            // 3. STRIKT VALIDATION: Check if size is picked
            if (!selSizeId || selSizeName === '') {
                showToast('Please select a Size option!', 'error');
                $('#sizeSelectionBlock').addClass('validation-error');
                $('html, body').animate({
                    scrollTop: $("#sizeSelectionBlock").offset().top - 150
                }, 400);
                return; // Stop processing further code
            }

            var btn = $('#addToCartBtn');
            var origHtml = btn.html();
            btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Adding...');

            var qty = parseInt($('#quantityInput').val()) || 1;
            var bogoFreeProductId = $('#bogoFreeProductId').val() || '';

            $.ajax({
                url: "{{ url('cart/add') }}/{{ $product->id }}",
                type: "POST",
                dataType: "json",
                data: {
                    quantity: qty,
                    color: selColorName,
                    color_id: selColorId,
                    size: selSizeName,
                    size_id: selSizeId,
                    extra_price: selSizePrice,
                    bogo_free_product_id: bogoFreeProductId,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.success) {
                        if (response.cart_count !== undefined) {
                            var cartCountEl = $('.cart-count');
                            if (cartCountEl.length) {
                                cartCountEl.text(response.cart_count).addClass('cart-bounce');
                                setTimeout(function() {
                                    cartCountEl.removeClass('cart-bounce');
                                }, 300);
                            }
                        }
                        showToast(response.message || 'Added to bag!', 'success');
                        showCartPopup(response);
                    } else {
                        showToast(response.message || 'Failed to add', 'error');
                    }
                },
                error: function(xhr) {
                    var msg = 'Something went wrong';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        msg = xhr.responseJSON.message;
                    } else if (xhr.status === 419) {
                        msg = 'Session expired, please refresh the page.';
                    }
                    showToast(msg, 'error');
                },
                complete: function() {
                    btn.prop('disabled', false).html(origHtml);
                }
            });
        }

        function showCartPopup(response) {
            var img = currentImageSet[currentImageIndex] || allImages[0];
            var price = (parseFloat($('#basePrice').val()) + selSizePrice).toFixed(2);
            var qty = parseInt($('#quantityInput').val()) || 1;
            var details = '';
            if (selColorName) details += '<small style="color:#666;">Color: ' + selColorName + '</small><br>';
            if (selSizeName) details += '<small style="color:#666;">Size: ' + selSizeName + '</small><br>';

            var popupHtml =
                '<div class="popup-product">' +
                '<img src="' + img + '" alt="{{ $product->name }}">' +
                '<div class="popup-product-info">' +
                '<h5>{{ $product->name }}</h5>' +
                '<p class="popup-price">₹' + price + '</p>' +
                '<small style="color:#666;">Qty: ' + qty + '</small><br>' +
                details +
                '</div>' +
                '</div>' +
                '<div class="popup-summary">' +
                '<p><span>Cart Total:</span> <strong>' + (response.cart_total || 'N/A') + '</strong></p>' +
                '<p><span>Items in Bag:</span> <strong>' + (response.cart_count || 0) + '</strong></p>' +
                '</div>';

            $('#popupMiddleContent').html(popupHtml);
            $('#cartPopup').css('display', 'flex');
            $('body').css('overflow', 'hidden');
            clearTimeout(window.cartPopupTimer);
            window.cartPopupTimer = setTimeout(closeCartPopup, 3000);
        }

        function closeCartPopup() {
            $('#cartPopup').css('display', 'none');
            $('body').css('overflow', '');
        }

        function showToast(msg, type) {
            var t = $('#toastNotify');
            $('#toastMsg').text(msg);

            if (type === 'success') {
                $('#toastTitle').text('Success!');
                $('#toastIcon').css('background', '#28a745').html('<i class="fas fa-check"></i>');
            } else {
                $('#toastTitle').text('Required Selection!');
                $('#toastIcon').css('background', '#dc3545').html('<i class="fas fa-exclamation-triangle"></i>');
            }

            t.addClass('show');
            clearTimeout(window.toastTimer);
            window.toastTimer = setTimeout(function() {
                t.removeClass('show');
            }, 3000);
        }

        function toggleWishlist() {
            $('#wishlistBtn').toggleClass('active');
            var icon = $('#wishlistBtn i');
            if ($('#wishlistBtn').hasClass('active')) {
                icon.removeClass('far fa-heart').addClass('fas fa-heart');
                showToast('Added to Wishlist!', 'success');
            } else {
                icon.removeClass('fas fa-heart').addClass('far fa-heart');
            }
        }

        // ==================== INIT ====================
        $(document).ready(function() {
            console.log('🚀 PAGE INIT');

            if (allImages.length > 0) {
                updateMainImage(allImages[0]);
                currentImageSet = allImages.slice();
                currentImageIndex = 0;
                mobileCurrentSlide = 0;
                updateMainThumbnailActive(0);
            }

            updateMobileGallery();

            if (window.innerWidth > 768) initHoverZoom();

            calculateBogoQuantity();

            function handleResize() {
                if (window.innerWidth <= 768) {
                    $('#mainImageContainer').hide();
                    $('#thumbnailSlider').hide();
                    $('#mobileGalleryWrapper').show();
                } else {
                    $('#mainImageContainer').show();
                    $('#thumbnailSlider').show();
                    $('#mobileGalleryWrapper').hide();
                    initHoverZoom();
                }
            }
            $(window).on('resize', handleResize);
            handleResize();

            $('#cartPopup').on('click', function(e) {
                if (e.target === this) closeCartPopup();
            });

            $('#zoomModalOverlay').on('click', function(e) {
                if (e.target === this) closeZoomModal();
            });

            $(document).on('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeCartPopup();
                    if (isZoomModalOpen) closeZoomModal();
                }
            });

            console.log('¼ô READY');
        });
    </script>
</body>

</html>