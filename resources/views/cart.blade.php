<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <title>Shopping Cart | Beroli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
 <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
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
        /* Cart Page Styles */
        .cart-section {
            padding: 60px 0;
            background: #f8f9fa;
            min-height: 70vh;
        }
        .cart-wrapper {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .cart-header {
            background: #fff;
            padding: 20px 25px;
            border-bottom: 1px solid #eee;
        }
        .cart-header h2 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            color: #222;
        }
        .cart-header p {
            margin: 5px 0 0;
            color: #777;
            font-size: 14px;
        }
        .cart-table {
            width: 100%;
            margin: 0;
        }
        .cart-table thead tr {
            background: #fafafa;
            border-bottom: 1px solid #eee;
        }
        .cart-table th {
            padding: 18px 20px;
            font-weight: 600;
            color: #444;
            font-size: 15px;
            border: none;
        }
        .cart-table td {
            padding: 25px 20px;
            vertical-align: middle;
            border-bottom: 1px solid #f0f0f0;
        }
        .product-cell {
            display: flex;
            align-items: center;
            gap: 18px;
        }
        .product-img {
            width: 85px;
            height: 85px;
            border-radius: 12px;
            overflow: hidden;
            background: #f5f5f5;
            flex-shrink: 0;
        }
        .product-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.3s;
        }
        .product-info h5 {
            font-size: 16px;
            font-weight: 600;
            margin: 0 0 5px;
        }
        .product-info h5 a {
            color: #222;
            text-decoration: none;
        }
        .product-info h5 a:hover {
            color: #ff6b6b;
        }
        .product-info .product-meta {
            font-size: 13px;
            color: #888;
            margin-top: 2px;
        }
        .size-badge {
            display: inline-block;
            background: #f0f0f0;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
        }
        .quantity-selector {
            display: inline-flex;
            align-items: center;
            border: 1px solid #e0e0e0;
            border-radius: 40px;
            background: #fff;
            overflow: hidden;
        }
        .quantity-btn {
            width: 36px;
            height: 36px;
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
            transition: 0.2s;
            color: #666;
        }
        .quantity-btn:hover {
            background: #ff6b6b;
            color: #fff;
        }
        .qty-input {
            width: 50px;
            height: 36px;
            text-align: center;
            border: none;
            border-left: 1px solid #e0e0e0;
            border-right: 1px solid #e0e0e0;
            font-size: 15px;
            background: #fff;
        }
        .qty-input:focus {
            outline: none;
        }
        .price-value, .subtotal-value {
            font-weight: 600;
            font-size: 16px;
            color: #333;
        }
        .remove-btn {
            background: none;
            border: none;
            color: #999;
            font-size: 18px;
            cursor: pointer;
            transition: 0.2s;
            padding: 8px;
        }
        .remove-btn:hover {
            color: #ff4d4d;
            transform: scale(1.1);
        }
        .cart-summary {
            background: #fff;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            position: sticky;
            top: 100px;
        }
        .summary-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            font-size: 16px;
        }
        .summary-row.bogo-discount {
            color: #28a745;
            background: #f0fff4;
            padding: 12px 15px;
            border-radius: 8px;
            margin: 5px 0;
            border: 1px dashed #28a745;
        }
        .summary-row.bogo-discount span:last-child {
            color: #28a745;
            font-weight: 700;
        }

        /* Coupon Section UI New CSS */
        .coupon-wrapper {
            margin: 15px 0;
            padding: 15px 0;
            border-top: 1px solid #f0f0f0;
            border-bottom: 1px solid #f0f0f0;
        }
        .coupon-input-group {
            display: flex;
            gap: 8px;
        }
        .coupon-input {
            flex: 1;
            padding: 8px 15px;
            border: 1px solid #e0e0e0;
            border-radius: 30px;
            font-size: 14px;
            text-transform: uppercase;
        }
        .coupon-input:focus {
            outline: none;
            border-color: #ff6b6b;
        }
        .coupon-btn {
            background: #222;
            color: #fff;
            border: none;
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }
        .coupon-btn:hover {
            background: #ff6b6b;
        }
        .coupon-remove-btn {
            background: none;
            border: none;
            color: #dc3545;
            font-size: 12px;
            text-decoration: underline;
            padding: 0;
            cursor: pointer;
        }
        .summary-row.coupon-discount {
            color: #007bff;
            background: #f0f7ff;
            padding: 10px 15px;
            border-radius: 8px;
            margin: 5px 0;
            border: 1px dashed #007bff;
        }

        .summary-row.total {
            border-top: 2px solid #f0f0f0;
            margin-top: 10px;
            padding-top: 20px;
            font-size: 20px;
            font-weight: 700;
            color: #ff6b6b;
        }
        .checkout-btn {
            display: block;
            width: 100%;
            background: #ff6b6b;
            color: #fff;
            text-align: center;
            padding: 14px;
            border-radius: 40px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            margin-top: 20px;
            border: none;
        }
        .checkout-btn:hover {
            background: #ff5252;
            transform: translateY(-2px);
            color: #fff;
        }
        .continue-shopping {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #888;
            text-decoration: none;
            font-size: 14px;
        }
        .continue-shopping:hover {
            color: #ff6b6b;
        }
        .empty-cart {
            text-align: center;
            padding: 80px 20px;
        }
        .empty-cart i {
            font-size: 80px;
            color: #ddd;
            margin-bottom: 20px;
        }
        .empty-cart h4 {
            font-size: 24px;
            margin-bottom: 15px;
        }
        .bogo-eligible-tag {
            display: inline-block;
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
            border: 1px solid #28a745;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
            margin-top: 5px;
        }
        
        @media (max-width: 768px) {
            .cart-section { padding: 40px 0; }
            .cart-table thead { display: none; }
            .cart-table tbody tr {
                display: block;
                margin-bottom: 20px;
                border: 1px solid #eee;
                border-radius: 16px;
                padding: 15px;
            }
            .cart-table td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 12px;
                border: none;
            }
            .cart-table td::before {
                content: attr(data-label);
                font-weight: 600;
                width: 40%;
                color: #555;
            }
            .product-cell {
                flex-direction: column;
                text-align: center;
                align-items: center;
            }
        }
    </style>
</head>

<body>

@include('partials.header')

<main style="padding-top:180px;" class="cart-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="cart-wrapper">
                    <div class="cart-header d-flex justify-content-between align-items-center">
                        <div>
                            <h2>Shopping Cart</h2>
                            <p>Review and modify your items</p>
                        </div>
                        @if(session('cart') && count(session('cart')) > 0)
                            <button class="btn btn-outline-danger btn-sm" onclick="clearCart()">
                                <i class="fas fa-trash"></i> Clear All
                            </button>
                        @endif
                    </div>

                    @php 
                        $total = 0; 
                        $totalItems = 0;
                        $cartBogoDiscount = session('bogo_discount', 0); 
                        $couponDiscount = session('coupon_discount', 0);
                        $couponCode = session('coupon_code', null);
                    @endphp

                    @if(session('cart') && count(session('cart')) > 0)
                        <div class="table-responsive">
                            <table class="cart-table" id="cartTable">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="cartBody">
                                    @foreach(session('cart') as $id => $item)
                                        @php 
                                            $itemPrice = ($item['price'] ?? 0) + ($item['extra_price'] ?? 0);
                                            $subtotal = $itemPrice * ($item['qty'] ?? 1);
                                            
                                            $total += $subtotal;
                                            $totalItems += $item['qty'];
                                        @endphp
                                        <tr data-id="{{ $id }}" data-price="{{ $itemPrice }}">
                                            
                                            <td data-label="Product">
                                                <div class="product-cell">
                                                    <div class="product-img">
                                                        @if(!empty($item['image']))
                                                            <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] ?? 'Product' }}">
                                                        @else
                                                            <img src="{{ asset('assets/images/no-image.png') }}" alt="No Image">
                                                        @endif
                                                    </div>
                                                    <div class="product-info">
                                                        <h5>
                                                            <a href="{{ url('product/' . ($item['slug'] ?? '')) }}">
                                                                {{ $item['name'] ?? 'N/A' }}
                                                            </a>
                                                        </h5>
                                                        
                                                        @if(!empty($item['color']))
                                                            <div class="product-meta">
                                                                <strong>Color:</strong> {{ $item['color'] }}
                                                            </div>
                                                        @endif
                                                        
                                                        @if(!empty($item['size']))
                                                            <div class="product-meta">
                                                                <strong>Size:</strong> <span class="size-badge">{{ $item['size'] }}</span>
                                                            </div>
                                                        @endif

                                                        @if(isset($item['bogo_enabled']) && $item['bogo_enabled'])
                                                            <div class="bogo-eligible-tag">
                                                                <i class="fas fa-tags me-1"></i> Mix-and-Match Suit Offer Item
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            
                                            <td data-label="Price">
                                                <span class="price-value">₹{{ number_format($itemPrice, 2) }}</span>
                                            </td>
                                            
                                            <td data-label="Quantity">
                                                <div class="quantity-selector">
                                                    <button class="quantity-btn decrease-btn">−</button>
                                                    <input type="number" class="qty-input" value="{{ $item['qty'] ?? 1 }}" 
                                                           min="1" max="{{ $item['max_qty'] ?? 99 }}" data-id="{{ $id }}">
                                                    <button class="quantity-btn increase-btn">+</button>
                                                </div>
                                            </td>
                                            
                                            <td data-label="Subtotal">
                                                <span class="subtotal-value">₹{{ number_format($subtotal, 2) }}</span>
                                            </td>
                                            
                                            <td data-label="Action">
                                                <button class="remove-btn" data-id="{{ $id }}" title="Remove item">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty-cart">
                            <i class="fas fa-shopping-cart"></i>
                            <h4>Your cart is empty</h4>
                            <p>Looks like you haven't added any items yet.</p>
                            <a href="{{ route('shop') }}" class="btn btn-dark mt-3">Continue Shopping</a>
                        </div>
                    @endif
                </div>
            </div>

           <div class="col-lg-4">
    <div class="cart-summary">
        <h3 class="summary-title">Order Summary</h3>
        
        <div class="summary-row">
            <span>Subtotal</span>
            <span id="subtotalAmount">₹{{ number_format($total, 2) }}</span>
        </div>
        
        {{-- Mix-and-Match Combo Discount --}}
        @if($cartBogoDiscount > 0)
        <div class="summary-row bogo-discount">
            <span>🎁 Mix-and-Match Combo Discount</span>
            <span id="bogoDiscountAmount">-₹{{ number_format($cartBogoDiscount, 2) }}</span>
        </div>
        @endif

        {{-- Coupon Input / Active Status HTML Block --}}
        @if(session('cart') && count(session('cart')) > 0)
        <div class="coupon-wrapper">
            
            {{-- 1. APPLIED COUPON STATUS --}}
            @if($couponCode)
                <div class="d-flex justify-content-between align-items-center mb-3 p-3" style="background: #e6f4ea; border: 1px solid #34a853; border-radius: 4px;">
                    <div>
                        <small class="text-muted d-block">Applied Coupon</small>
                        <strong class="text-success" style="font-size: 16px;"><i class="fas fa-ticket-alt me-1"></i> {{ $couponCode }}</strong>
                    </div>
                    <button type="button" class="coupon-remove-btn btn btn-sm btn-danger" id="removeCouponBtn">Remove</button>
                </div>
            @endif

            {{-- 2. DYNAMIC AVAILABLE COUPONS LIST --}}
            @if(isset($availableCoupons) && $availableCoupons->count() > 0)
            <div class="mb-3 p-3 rounded text-start" style="background: #f9f9f9; border: 1px dashed #ccc; max-height: 220px; overflow-y: auto;">
                <small class="text-muted d-block fw-bold mb-2">
                    <i class="fas fa-tags text-success"></i> Available Offers & Coupons
                </small>
                
                @foreach($availableCoupons as $coupon)
                <div class="d-flex justify-content-between align-items-center mb-2 pb-2 @if(!$loop->last) border-bottom @endif" style="border-bottom-style: dashed !important;">
                    <div>
                        <span class="badge bg-success" style="font-size: 12px; letter-spacing: 1px; text-transform: uppercase; padding: 4px 8px;">{{ $coupon->code }}</span>
                        
                        <div class="text-muted" style="font-size: 12px; margin-top: 4px;">
                            @if($coupon->type == 'fixed')
                                Get ₹{{ number_format($coupon->value, 0) }} off
                            @else
                                Get {{ number_format($coupon->value, 0) }}% off
                            @endif
                            
                            @if($coupon->min_order_amount)
                                on min order of ₹{{ number_format($coupon->min_order_amount, 0) }}
                            @endif
                        </div>

                        @if($coupon->description)
                            <div class="text-muted small italic" style="font-size: 11px;">{{ $coupon->description }}</div>
                        @endif
                    </div>

                    @if($couponCode == $coupon->code)
                        <button type="button" class="btn btn-sm btn-secondary" disabled style="font-size: 12px;">
                            Applied
                        </button>
                    @else
                        <button type="button" class="btn btn-sm text-white dynamic-apply-coupon" style="background: #222; font-size: 12px;" data-code="{{ $coupon->code }}">
                            Apply
                        </button>
                    @endif
                </div>
                @endforeach
            </div>
            @else
            <div class="mb-3 text-muted small"><i class="fas fa-info-circle"></i> No other offers available right now.</div>
            @endif

            {{-- 3. MANUAL COUPON INPUT FIELD --}}
            @if(!$couponCode)
                <div class="coupon-input-group mt-2">
                    <input type="text" id="couponCodeInput" class="coupon-input" placeholder="Enter Coupon Code" autocomplete="off">
                    <button type="button" class="coupon-btn" id="applyCouponBtn">Apply</button>
                </div>
                <div id="couponMessage" class="small mt-1 d-none"></div>
            @endif

        </div>
        @endif

        {{-- Active Coupon Discount Row Line --}}
        @if($couponDiscount > 0)
        <div class="summary-row coupon-discount">
            <span><i class="fas fa-percentage me-1"></i> Coupon Discount</span>
            <span id="couponDiscountAmount">-₹{{ number_format($couponDiscount, 2) }}</span>
        </div>
        @endif
        
        <div class="summary-row">
            <span>Shipping</span>
            @php $totalAfterDiscounts = $total - $cartBogoDiscount - $couponDiscount; @endphp
            <span id="shippingInfo" style="color: {{ (session('cart') && count(session('cart')) > 0 && $totalAfterDiscounts >= 999) ? '#28a745' : '#333' }};">
                @if(session('cart') && count(session('cart')) > 0)
                    {{ $totalAfterDiscounts >= 999 ? 'Free Shipping 🚚' : '₹99.00' }}
                @else
                    ₹0.00
                @endif
            </span>
        </div>
        
        <div class="summary-row">
            <span>Total Items</span>
            <span id="totalItems">{{ $totalItems }}</span>
        </div>
        
        <div class="summary-row total">
            <span>Total</span>
            <span id="totalAmount">
                @if(session('cart') && count(session('cart')) > 0)
                    ₹{{ number_format($totalAfterDiscounts >= 999 ? $totalAfterDiscounts : $totalAfterDiscounts + 99, 2) }}
                @else
                    ₹0.00
                @endif
            </span>
        </div>
        
        @if(session('cart') && count(session('cart')) > 0)
            <a href="{{ route('checkout.index') }}" class="checkout-btn">
                Proceed to Checkout <i class="fas fa-arrow-right"></i>
            </a>
        @endif
        <a href="{{ route('shop') }}" class="continue-shopping">
            <i class="fas fa-arrow-left"></i> Continue Shopping
        </a>
    </div>
</div>
        </div>
    </div>
</main>

@include('partials.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        
        // --- Core Coupon Application Function ---
        function submitCouponRequest(code) {
            $.ajax({
                url: "{{ route('coupon.apply') }}", // Shared centralized route
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    coupon_code: code
                },
                success: function(res) {
                    if(res.success) {
                        location.reload(); 
                    } else {
                        // Display error in the DOM message container if present, otherwise alert
                        let msgBox = $('#couponMessage');
                        if (msgBox.length > 0) {
                            msgBox.removeClass('d-none text-success').addClass('text-danger').text(res.message || 'Invalid Coupon Code');
                        } else {
                            alert(res.message || 'Invalid Coupon Code');
                        }
                    }
                },
                error: function() {
                    alert('Error processing coupon. Please try again.');
                }
            });
        }

        // --- Manual Coupon Input Button Apply Logic ---
        $(document).on('click', '#applyCouponBtn', function() {
            let code = $('#couponCodeInput').val().trim();
            let msgBox = $('#couponMessage');

            if(!code) {
                msgBox.removeClass('d-none text-success').addClass('text-danger').text('Please enter a coupon code.');
                return;
            }
            submitCouponRequest(code);
        });

        // --- Dynamic Coupon List Se Click Karke Apply Karne Ka Handler ---
        $(document).on('click', '.dynamic-apply-coupon', function() {
            let couponCode = $(this).data('code');
            
            // Centralized trigger: Directly submit the selected coupon value
            submitCouponRequest(couponCode);
        });

        // --- Coupon Remove Logic ---
        $(document).on('click', '#removeCouponBtn', function() {
            $.ajax({
                url: "{{ route('coupon.remove') }}",
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    location.reload();
                },
                error: function() {
                    alert('Something went wrong while removing the coupon.');
                }
            });
        });

        // --- Quantity update AJAX handler ---
        function updateQuantity(itemId, newQty) {
            $.ajax({
                url: "{{ route('cart.update') }}",
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    cart_key: itemId,
                    quantity: newQty
                },
                success: function(res) {
                    if (res.success) {
                        $('.cart-count').text(res.cart_count);
                        location.reload(); 
                    } else {
                        alert(res.message || 'Update failed');
                        location.reload();
                    }
                },
                error: function() {
                    alert('Something went wrong. Please refresh.');
                    location.reload();
                }
            });
        }

        $(document).on('click', '.increase-btn', function() {
            let input = $(this).siblings('.qty-input');
            let newVal = parseInt(input.val()) + 1;
            let max = parseInt(input.attr('max')) || 99;
            if (newVal <= max) {
                input.val(newVal).trigger('change');
            } else {
                alert('Maximum quantity is ' + max);
            }
        });

        $(document).on('click', '.decrease-btn', function() {
            let input = $(this).siblings('.qty-input');
            let newVal = parseInt(input.val()) - 1;
            if (newVal >= 1) {
                input.val(newVal).trigger('change');
            }
        });

        $(document).on('change', '.qty-input', function() {
            let id = $(this).data('id');
            let newQty = parseInt($(this).val());
            let max = parseInt($(this).attr('max')) || 99;
            
            if (isNaN(newQty) || newQty < 1) newQty = 1;
            if (newQty > max) {
                alert('Maximum quantity is ' + max);
                $(this).val(max);
                newQty = max;
            }
            updateQuantity(id, newQty);
        });

        $(document).on('click', '.remove-btn', function() {
            let id = $(this).data('id');
            let row = $(this).closest('tr');

            if (confirm('Are you sure you want to remove this item?')) {
                $.ajax({
                   url: "{{ url('cart/remove') }}/" + id,
                    type: "DELETE",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        cart_key: id
                    },
                    success: function(res) {
                        if (res.success) {
                            row.fadeOut(300, function() {
                                $(this).remove();
                                location.reload(); 
                            });
                        } else {
                            alert(res.message || 'Could not remove item');
                        }
                    },
                    error: function() {
                        alert('Something went wrong. Please refresh.');
                    }
                });
            }
        });
        
        window.clearCart = function() {
            if (confirm('Are you sure you want to clear all items from cart?')) {
                $.ajax({
                    url: "{{ route('cart.clear') }}",
                    type: "DELETE",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        if (res.success) { location.reload(); }
                    },
                    error: function() {
                        alert('Something went wrong. Please refresh.');
                    }
                });
            }
        };
    });
</script>

</body>
</html>