<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Order Confirmed | Beroli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    
    <style>
        .confirmation-section { padding: 180px 0 80px; background: #f6f7fb; min-height: 100vh; }
        .confirmation-card { border: none; border-radius: 20px; box-shadow: 0 5px 30px rgba(0,0,0,0.08); overflow: hidden; }
        .confirmation-header { background: linear-gradient(135deg, #28a745, #20c997); padding: 40px 30px; text-align: center; color: #fff; }
        .confirmation-header .check-circle {
            width: 80px; height: 80px; background: rgba(255,255,255,0.2); border-radius: 50%;
            display: inline-flex; align-items: center; justify-content: center;
            font-size: 40px; margin-bottom: 15px; border: 3px solid rgba(255,255,255,0.3);
        }
        .confirmation-header h2 { font-size: 28px; font-weight: 700; margin-bottom: 5px; }
        .confirmation-body { padding: 30px; }
        .order-detail-row { display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid #f0f0f0; }
        .order-detail-label { color: #888; font-size: 14px; }
        .order-detail-value { font-weight: 600; font-size: 14px; text-align: right; }
        .btn-continue {
            background: #000; color: #fff; padding: 14px 30px; border-radius: 10px;
            font-weight: 600; text-decoration: none; display: inline-block; transition: 0.3s;
        }
        .btn-continue:hover { background: #333; color: #fff; }
        @media (max-width: 768px) {
            .confirmation-section { padding: 140px 0 40px; }
        }
    </style>
    
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

    <section class="confirmation-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="confirmation-card card">
                        <div class="confirmation-header">
                            <div class="check-circle"><i class="fas fa-check"></i></div>
                            <h2>Order Confirmed! 🎉</h2>
                            <p>Thank you for your purchase</p>
                        </div>
                        <div class="confirmation-body">
                            
                            @if(isset($order))
                                <div class="text-center mb-4">
                                    <h5 class="fw-bold">Order #{{ $order['order_number'] ?? $order->order_number ?? 'N/A' }}</h5>
                                    <p class="text-muted mb-0">We'll send you a confirmation message soon</p>
                                </div>

                                <div class="order-details mt-4">
                                    <h6 class="fw-bold mb-3">Order Details</h6>
                                    <div class="order-detail-row">
                                        <span class="order-detail-label">Order Status</span>
                                        <span class="order-detail-value text-success"><i class="fas fa-check-circle me-1"></i> Confirmed</span>
                                    </div>
                                    <div class="order-detail-row">
                                        <span class="order-detail-label">Payment Method</span>
                                        <span class="order-detail-value">
                                            {{ ($order['payment_method'] ?? $order->payment_method ?? '') == 'razorpay' ? 'Online Payment' : 'Cash on Delivery' }}
                                        </span>
                                    </div>
                                    <div class="order-detail-row">
                                        <span class="order-detail-label">Payment Status</span>
                                        <span class="order-detail-value">
                                            <span class="badge bg-{{ ($order['payment_status'] ?? $order->payment_status ?? '') == 'paid' ? 'success' : 'warning' }}">
                                                {{ ucfirst($order['payment_status'] ?? $order->payment_status ?? 'N/A') }}
                                            </span>
                                        </span>
                                    </div>
                                    <div class="order-detail-row">
                                        <span class="order-detail-label">Grand Total</span>
                                        <span class="order-detail-value fw-bold fs-5">
                                            ₹{{ number_format($order['grand_total'] ?? $order->grand_total ?? $order->total_amount ?? 0, 2) }}
                                        </span>
                                    </div>
                                </div>

                                <div class="delivery-info mt-4">
                                    <h6 class="fw-bold mb-3">Delivery Address</h6>
                                    <p class="mb-1"><strong>{{ $order['name'] ?? $order->name ?? 'N/A' }}</strong></p>
                                    <p class="mb-1">{{ $order['phone'] ?? $order->phone ?? 'N/A' }}</p>
                                    <p class="mb-1">{{ $order['address'] ?? $order->address ?? 'N/A' }}</p>
                                    <p class="mb-0">{{ ($order['city'] ?? $order->city ?? '') }}, {{ ($order['state'] ?? $order->state ?? '') }} - {{ $order['pincode'] ?? $order->pincode ?? '' }}</p>
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <i class="fas fa-exclamation-circle text-warning" style="font-size: 50px;"></i>
                                    <h5 class="mt-3">No order found</h5>
                                    <p class="text-muted">Please contact support if you have any questions.</p>
                                </div>
                            @endif

                            <div class="text-center mt-4">
                                <a href="{{ url('/') }}" class="btn-continue">
                                    <i class="fas fa-shopping-bag me-2"></i> Continue Shopping
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')

</body>
</html>