<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <title>Checkout | Beroli</title>
    <meta name="description" content="Complete your order" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />

    <link rel="stylesheet" href="{{ asset('css/plugins/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/plugins/glightbox.min.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}" />
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
        .checkout-section { background: #f6f7fb; padding: 60px 0; min-height: 80vh; }
        .checkout-card { border: none; border-radius: 16px; box-shadow: 0 2px 15px rgba(0,0,0,0.06); }
        .checkout-card .card-body { padding: 30px; }
        .product-row { display: flex; align-items: center; gap: 15px; padding: 15px 0; border-bottom: 1px solid #f0f0f0; }
        .product-row:last-child { border-bottom: none; }
        .product-img { width: 65px; height: 65px; border-radius: 10px; object-fit: cover; flex-shrink: 0; }
        .product-info { flex: 1; }
        .product-info h6 { margin: 0 0 3px; font-size: 15px; font-weight: 600; }
        .product-meta { font-size: 12px; color: #888; }
        .size-badge { display: inline-block; background: #f0f0f0; padding: 1px 6px; border-radius: 3px; font-size: 11px; }
        .summary-row { display: flex; justify-content: space-between; padding: 10px 0; }
        .summary-row.total { border-top: 2px solid #e0e0e0; margin-top: 10px; padding-top: 15px; font-size: 20px; font-weight: 700; }
        .btn-place-order { background: #000; color: #fff; padding: 14px; border-radius: 10px; font-weight: 600; font-size: 16px; border: none; width: 100%; cursor: pointer; transition: 0.3s; }
        .btn-place-order:hover { background: #333; }
        .btn-place-order:disabled { background: #ccc; cursor: not-allowed; }
        .form-control-lg { border-radius: 10px; border: 1px solid #e0e0e0; padding: 12px 15px; }
        .form-control-lg:focus { border-color: #000; box-shadow: none; }
        .sticky-top { top: 100px; }
        
        .payment-method-option {
            border: 2px solid #e0e0e0; border-radius: 12px; padding: 15px; margin-bottom: 10px;
            cursor: pointer; transition: all 0.3s ease; display: flex; align-items: center; gap: 12px;
        }
        .payment-method-option:hover { border-color: #000; }
        .payment-method-option.selected { border-color: #000; background: #f8f8f8; }
        .payment-method-option .radio-circle {
            width: 20px; height: 20px; border: 2px solid #ccc; border-radius: 50%;
            display: flex; align-items: center; justify-content: center; flex-shrink: 0;
        }
        .payment-method-option.selected .radio-circle { border-color: #000; }
        .payment-method-option.selected .radio-circle::after {
            content: ''; width: 10px; height: 10px; background: #000; border-radius: 50%;
        }
        .payment-method-option .method-icon { width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; font-size: 20px; }
        .payment-method-option .method-label { flex: 1; }
        .payment-method-option .method-label h6 { margin: 0; font-size: 15px; font-weight: 600; }
        .payment-method-option .method-label p { margin: 2px 0 0; font-size: 12px; color: #888; }
        .payment-method-option .method-badge { background: #000; color: #fff; padding: 3px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; }
        
        .bogo-pool-badge {
            display: inline-block; background: rgba(40, 167, 69, 0.1); color: #28a745;
            border: 1px solid #28a745; padding: 1px 6px; border-radius: 4px; font-size: 11px; font-weight: 600; margin-top: 3px;
        }
        .bogo-discount-row {
            color: #28a745 !important; background: #f0fff4; padding: 10px 15px; border-radius: 8px; margin: 5px 0; border: 1px dashed #28a745;
        }
        .bogo-total-saved {
            background: #d4edda; border: 1px solid #c3e6cb; border-radius: 8px; padding: 12px 15px;
            margin-bottom: 15px; color: #155724; font-weight: 600; font-size: 14px; text-align: center;
        }
        @keyframes bogoPulse {
            0%, 100% { box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.2); }
            50% { box-shadow: 0 0 0 6px rgba(40, 167, 69, 0); }
        }
        .bogo-saving-highlight { animation: bogoPulse 2s infinite; display: inline-block; }
        
        .loading-overlay {
            display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.5); z-index: 99999; justify-content: center; align-items: center;
        }
        .loading-overlay.active { display: flex; }
        .loading-box { background: #fff; padding: 30px; border-radius: 16px; text-align: center; box-shadow: 0 10px 40px rgba(0,0,0,0.2); }
        .loading-spinner {
            width: 50px; height: 50px; border: 4px solid #f3f3f3; border-top: 4px solid #000;
            border-radius: 50%; animation: spin 1s linear infinite; margin: 0 auto 15px;
        }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
        
        .alert-box {
            position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 999999;
            min-width: 300px; padding: 15px 20px; border-radius: 10px; text-align: center;
            font-weight: 600; box-shadow: 0 10px 30px rgba(0,0,0,0.2); display: none;
        }
        .alert-box.error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .alert-box.success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        
        @media (max-width: 768px) {
            .checkout-section { padding: 30px 0; }
            .product-row { flex-wrap: wrap; }
        }
    </style>
</head>

<body>

    @include('partials.header')

    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-box">
            <div class="loading-spinner"></div>
            <h5 class="mb-1">Processing Payment</h5>
            <p class="text-muted mb-0">Please don't close this page...</p>
        </div>
    </div>

    <div class="alert-box" id="alertBox"></div>

    <main class="main__content_wrapper">
        <section style="padding-top:180px;" class="checkout-section">
            <div class="container">

                <div class="mb-4">
                    <h2 class="fw-bold">Checkout</h2>
                    <p class="text-muted">Complete your order details below</p>
                </div>

                <div class="row g-4 align-items-start">
                    <div class="col-lg-7">
                        <div class="checkout-card card">
                            <div class="card-body">
                                <h5 class="mb-3 fw-semibold">Billing Details</h5>

                                <form id="checkoutForm">
                                    @csrf
                                    
                                    <input type="hidden" name="subtotal" id="inputSubtotal" value="{{ $subTotal ?? 0 }}">
                                    <input type="hidden" name="bogo_discount" id="inputBogoDiscount" value="{{ $bogoDiscount ?? 0 }}">
                                    <input type="hidden" name="coupon_discount" id="inputCouponDiscount" value="{{ $couponDiscount ?? 0 }}">
                                    <input type="hidden" name="grand_total" id="inputGrandTotal" value="{{ $totalAfterCoupon ?? $grandTotal ?? 0 }}">
                                    <input type="hidden" name="payment_method" id="selectedPaymentMethod" value="razorpay">

                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="inputName" class="form-control form-control-lg" placeholder="Enter your full name" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                            <input type="text" name="phone" id="inputPhone" class="form-control form-control-lg" placeholder="Enter phone number" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" id="inputEmail" class="form-control form-control-lg" placeholder="Enter email address">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">City <span class="text-danger">*</span></label>
                                            <input type="text" name="city" id="inputCity" class="form-control form-control-lg" placeholder="Enter city" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">State <span class="text-danger">*</span></label>
                                            <input type="text" name="state" id="inputState" class="form-control form-control-lg" placeholder="Enter state" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Pincode <span class="text-danger">*</span></label>
                                            <input type="text" name="pincode" id="inputPincode" class="form-control form-control-lg" placeholder="Enter pincode" required>
                                        </div>
                                        
                                        {{-- ADDED: Landmark Input Field --}}
                                        <div class="col-md-6">
                                            <label class="form-label">Landmark <span class="text-danger">*</span></label>
                                            <input type="text" name="landmark" id="inputLandmark" class="form-control form-control-lg" placeholder="E.g. Near Bus Stand, Beside Temple" required>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label">Payment Method</label>
                                            <div class="payment-method-option selected" data-method="razorpay" onclick="selectPaymentMethod('razorpay', this)">
                                                <div class="radio-circle"></div>
                                                <div class="method-icon"><i class="fas fa-credit-card"></i></div>
                                                <div class="method-label">
                                                    <h6>Pay Online <span class="method-badge">Instant</span></h6>
                                                    <p>UPI, Cards, Net Banking, Wallets</p>
                                                </div>
                                            </div>
                                            <div class="payment-method-option" data-method="cash_on_delivery" onclick="selectPaymentMethod('cash_on_delivery', this)">
                                                <div class="radio-circle"></div>
                                                <div class="method-icon"><i class="fas fa-money-bill-wave"></i></div>
                                                <div class="method-label">
                                                    <h6>Cash on Delivery</h6>
                                                    <p>Pay when you receive your order</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Full Address <span class="text-danger">*</span></label>
                                            <textarea name="address" id="inputAddress" rows="3" class="form-control form-control-lg" placeholder="Enter complete house/building number, street address" required></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Order Notes (optional)</label>
                                            <textarea name="notes" id="inputNotes" rows="2" class="form-control form-control-lg" placeholder="Any special instructions"></textarea>
                                        </div>
                                    </div>

                                    <hr class="my-4">

                                    <button type="button" class="btn-place-order" id="placeOrderBtn" onclick="handlePlaceOrder()">
                                        <i class="fas fa-lock me-2"></i> Place Order
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="checkout-card card sticky-top">
                            <div class="card-body">
                                <h5 class="mb-3 fw-semibold">Order Summary</h5>

                                @php 
                                    $subTotal = 0; 
                                    $bogoDiscount = session('bogo_discount', 0); 
                                    $couponDiscount = session('coupon_discount', 0); 
                                @endphp

                                @if(isset($cart) && count($cart) > 0)
                                    @foreach($cart as $key => $item)
                                        @php 
                                            $itemPrice = ($item['price'] ?? 0) + ($item['extra_price'] ?? 0);
                                            $itemSubtotal = $itemPrice * ($item['qty'] ?? 1);
                                            $subTotal += $itemSubtotal;
                                        @endphp
                                        <div class="product-row">
                                            <img src="{{ !empty($item['image']) && file_exists(public_path($item['image'])) ? asset($item['image']) : asset('assets/images/no-image.png') }}" class="product-img" alt="{{ $item['name'] ?? 'Product' }}">
                                            <div class="product-info">
                                                <h6>{{ $item['name'] ?? 'N/A' }}</h6>
                                                <div class="product-meta">Qty: {{ $item['qty'] ?? 1 }}</div>
                                                @if(!empty($item['color']))
                                                    <div class="product-meta"><strong>Color:</strong> {{ $item['color'] }}</div>
                                                @endif
                                                @if(!empty($item['size']))
                                                    <div class="product-meta"><strong>Size:</strong> <span class="size-badge">{{ $item['size'] }}</span></div>
                                                @endif
                                                @if(isset($item['bogo_enabled']) && $item['bogo_enabled'])
                                                    <div class="bogo-pool-badge"><i class="fas fa-tags me-1"></i> Mix-and-Match Suit Offer</div>
                                                @endif
                                            </div>
                                            <div class="fw-bold text-end">₹{{ number_format($itemSubtotal, 2) }}</div>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-center text-muted py-4">Cart is empty</p>
                                @endif

                                @if($bogoDiscount > 0)
                                    <div class="bogo-total-saved mt-3">
                                        <span class="bogo-saving-highlight">🎉</span> 
                                        Multiple Suit Offer Discount Applied! You saved 
                                        <strong>₹{{ number_format($bogoDiscount, 2) }}</strong>
                                    </div>
                                @endif

                                <div class="mt-3">
                                    <div class="summary-row">
                                        <span class="text-muted">Subtotal</span>
                                        <span>₹{{ number_format($subTotal, 2) }}</span>
                                    </div>

                                    @if($bogoDiscount > 0)
                                        <div class="summary-row bogo-discount-row">
                                            <span>🎁 Combo Discount</span>
                                            <span>-₹{{ number_format($bogoDiscount, 2) }}</span>
                                        </div>
                                    @endif

                                    @php
                                        $totalAfterBogo = $subTotal - $bogoDiscount;
                                        $totalAfterCoupon = max(0, $totalAfterBogo - $couponDiscount);
                                        $grandTotal = $totalAfterCoupon;
                                    @endphp

                                    @if($couponDiscount > 0)
                                        <div class="summary-row" style="color: #0056b3; background: #e6f2ff; padding: 10px 15px; border-radius: 8px; margin: 5px 0; border: 1px dashed #0056b3;">
                                            <span>🎫 Coupon ({{ session('coupon_code') }})</span>
                                            <span class="fw-bold">-₹{{ number_format($couponDiscount, 2) }}</span>
                                        </div>
                                    @endif

                                    <div class="summary-row">
                                        <span class="text-muted">Shipping</span>
                                        <span class="text-success fw-bold">FREE 🚚</span>
                                    </div>

                                    <div class="summary-row total">
                                        <span>Total Amount</span>
                                        <span class="text-danger">₹{{ number_format($grandTotal, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        var razorpayKey = "{{ env('RAZORPAY_KEY', 'rzp_live_SukHFtpJQNHZCx') }}";
        var selectedPaymentMethod = 'razorpay';
        
        document.getElementById('selectedPaymentMethod').value = selectedPaymentMethod;
        
        function showAlert(message, type) {
            var box = $('#alertBox');
            box.removeClass('error success').addClass(type).text(message).fadeIn();
            setTimeout(function() { box.fadeOut(); }, 4000);
        }
        
        function selectPaymentMethod(method, element) {
            document.querySelectorAll('.payment-method-option').forEach(opt => opt.classList.remove('selected'));
            element.classList.add('selected');
            selectedPaymentMethod = method;
            document.getElementById('selectedPaymentMethod').value = method;
        }
        
        function showLoading() { document.getElementById('loadingOverlay').classList.add('active'); }
        function hideLoading() { document.getElementById('loadingOverlay').classList.remove('active'); }
        
        function handlePlaceOrder() {
            var btn = $('#placeOrderBtn');
            var method = selectedPaymentMethod;
            
            var name = $('#inputName').val().trim();
            var phone = $('#inputPhone').val().trim();
            var city = $('#inputCity').val().trim();
            var state = $('#inputState').val().trim();
            var pincode = $('#inputPincode').val().trim();
            var landmark = $('#inputLandmark').val().trim(); // ADDED
            var address = $('#inputAddress').val().trim();
            
            // UPDATED: Added landmark validation
            if (!name || !phone || !city || !state || !pincode || !landmark || !address) {
                showAlert('Please fill all required fields', 'error');
                return false;
            }
            
            btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i> Processing...');
            
            if (method === 'razorpay') {
                showLoading();
                
                var grandTotal = parseFloat($('#inputGrandTotal').val()) || 0;
                var amountInPaise = Math.round(grandTotal * 100);
                
                console.log('💰 Sending to Razorpay: ₹' + grandTotal.toFixed(2) + ' (' + amountInPaise + ' paise)');
                
                $.ajax({
                    url: "{{ route('razorpay.create.order') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        _token: "{{ csrf_token() }}",
                        amount: amountInPaise,
                        name: name,
                        phone: phone
                    },
                    success: function(response) {
                        hideLoading();
                        
                        if (response.success && response.order_id) {
                            console.log('✅ Razorpay Order Created:', response.order_id);
                            
                            var options = {
                                key: razorpayKey,
                                amount: response.amount,
                                currency: 'INR',
                                name: "Beroli",
                                description: "Pay ₹" + grandTotal.toFixed(2),
                                image: "{{ asset('img/favicon.ico') }}",
                                order_id: response.order_id,
                                handler: function(razorpayResponse) {
                                    showLoading();
                                    placeFinalOrder(razorpayResponse);
                                },
                                prefill: {
                                    name: name,
                                    email: $('#inputEmail').val(),
                                    contact: phone,
                                },
                                notes: { address: address, landmark: landmark }, // ADDED landmark inside notes
                                theme: { color: "#000000" },
                                modal: {
                                    ondismiss: function() {
                                        hideLoading();
                                        btn.prop('disabled', false).html('<i class="fas fa-lock me-2"></i> Place Order');
                                    }
                                }
                            };
                            
                            var rzp = new Razorpay(options);
                            
                            rzp.on('payment.failed', function(response) {
                                hideLoading();
                                btn.prop('disabled', false).html('<i class="fas fa-lock me-2"></i> Place Order');
                                showAlert('Payment failed. Try again.', 'error');
                            });
                            
                            rzp.open();
                        } else {
                            btn.prop('disabled', false).html('<i class="fas fa-lock me-2"></i> Place Order');
                            showAlert(response.message || 'Error creating payment.', 'error');
                        }
                    },
                    error: function() {
                        hideLoading();
                        btn.prop('disabled', false).html('<i class="fas fa-lock me-2"></i> Place Order');
                        showAlert('Network error. Please try again.', 'error');
                    }
                });
            } else if (method === 'cash_on_delivery') {
                showLoading();
                placeFinalOrder(null);
            }
        }
        
        function placeFinalOrder(razorpayResponse) {
            var formData = {
                _token: "{{ csrf_token() }}",
                name: $('#inputName').val().trim(),
                phone: $('#inputPhone').val().trim(),
                email: $('#inputEmail').val().trim(),
                city: $('#inputCity').val().trim(),
                state: $('#inputState').val().trim(),
                pincode: $('#inputPincode').val().trim(),
                landmark: $('#inputLandmark').val().trim(), // ADDED
                address: $('#inputAddress').val().trim(),
                notes: $('#inputNotes').val().trim(),
                payment_method: selectedPaymentMethod,
                subtotal: $('#inputSubtotal').val(),
                bogo_discount: $('#inputBogoDiscount').val(),
                coupon_discount: $('#inputCouponDiscount').val(),
                grand_total: $('#inputGrandTotal').val(),
            };
            
            if (razorpayResponse) {
                formData.razorpay_payment_id = razorpayResponse.razorpay_payment_id;
                formData.razorpay_order_id = razorpayResponse.razorpay_order_id;
                formData.razorpay_signature = razorpayResponse.razorpay_signature;
                formData.payment_status = 'paid';
            } else {
                formData.payment_status = 'pending';
            }
            
            $.ajax({
                url: "{{ route('checkout.place') }}",
                type: "POST",
                dataType: "json",
                data: formData,
                success: function(response) {
                    hideLoading();
                    if (response.success) {
                        window.location.href = response.redirect_url || "{{ route('order.confirmation') }}";
                    } else {
                        $('#placeOrderBtn').prop('disabled', false).html('<i class="fas fa-lock me-2"></i> Place Order');
                        showAlert(response.message || 'Error placing order.', 'error');
                    }
                },
                error: function(xhr) {
                    hideLoading();
                    $('#placeOrderBtn').prop('disabled', false).html('<i class="fas fa-lock me-2"></i> Place Order');
                    showAlert('Error placing order. Please try again.', 'error');
                }
            });
        }
        
        $(document).ready(function() {
            var correctTotal = "{{ $totalAfterCoupon ?? $grandTotal ?? 0 }}";
            $('#inputGrandTotal').val(correctTotal);
            console.log('✅ Checkout Ready - Total: ₹' + parseFloat(correctTotal).toFixed(2));
            console.log('✅ No Tax | Free Shipping');
        });
    </script>
</body>
</html>