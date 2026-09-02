<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <title>Order #{{ $order->order_number ?? 'N/A' }} |  Bilori</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />

    <link rel="stylesheet" href="{{ asset('css/plugins/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/plugins/glightbox.min.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
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
        .order-detail-section { padding: 160px 0 60px; background: #f8f9fa; min-height: 100vh; }
        .order-detail-card { background: #fff; border-radius: 16px; box-shadow: 0 2px 15px rgba(0,0,0,0.06); overflow: hidden; margin-bottom: 20px; }
        .order-header { padding: 20px 30px; border-bottom: 1px solid #e9e9ed; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px; }
        .order-header h4 { font-weight: 700; margin: 0; }
        .order-body { padding: 30px; }
        .status-badge { display: inline-block; padding: 6px 16px; border-radius: 20px; font-size: 13px; font-weight: 600; }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-processing { background: #cce5ff; color: #004085; }
        .status-shipped { background: #d4edda; color: #155724; }
        .status-delivered,.status-completed { background: #d1e7dd; color: #0f5132; }
        .status-cancelled { background: #f8d7da; color: #721c24; }
        .payment-paid { background: #d4edda; color: #155724; }
        .payment-pending { background: #fff3cd; color: #856404; }
        .payment-failed { background: #f8d7da; color: #721c24; }
        .info-row { display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #f5f5f5; }
        .info-row:last-child { border-bottom: none; }
        .info-label { color: #888; font-size: 14px; }
        .info-value { font-weight: 600; font-size: 14px; text-align: right; }
        .order-item-row { display: flex; align-items: center; gap: 15px; padding: 15px 0; border-bottom: 1px solid #f0f0f0; }
        .order-item-row:last-child { border-bottom: none; }
        .order-item-img { width: 70px; height: 85px; border-radius: 8px; overflow: hidden; flex-shrink: 0; background: #f5f5f5; }
        .order-item-img img { width: 100%; height: 100%; object-fit: cover; }
        .order-item-info { flex: 1; }
        .order-item-info h6 { margin: 0 0 4px; font-weight: 600; font-size: 15px; }
        .order-item-meta { font-size: 12px; color: #888; }
        .order-item-meta span { background: #f0f0f0; padding: 2px 8px; border-radius: 4px; margin-right: 5px; }
        .btn-back { display: inline-block; padding: 10px 24px; background: #000; color: #fff; border-radius: 25px; text-decoration: none; font-weight: 600; transition: 0.3s; }
        .btn-back:hover { background: #333; color: #fff; }
        .btn-cancel { padding: 8px 20px; background: #dc3545; color: #fff; border: none; border-radius: 20px; font-size: 13px; font-weight: 600; cursor: pointer; transition: 0.3s; }
        .btn-cancel:hover { background: #c82333; }
        .btn-cancel:disabled { background: #ccc; cursor: not-allowed; }
        @media (max-width: 768px) {
            .order-detail-section { padding: 140px 0 40px; }
            .order-header { flex-direction: column; align-items: flex-start; }
            .order-body { padding: 20px 15px; }
        }
    </style>
</head>

<body>

    @include('partials.header')

    <section class="order-detail-section">
        <div class="container">
            
            <a href="{{ route('account') }}" class="btn-back mb-4">
                <i class="fas fa-arrow-left me-2"></i> Back to My Account
            </a>

            <div class="order-detail-card">
                <div class="order-header">
                    <div>
                        <h4>Order #{{ $order->order_number ?? 'N/A' }}</h4>
                        <small class="text-muted">
                            Placed on {{ $order->created_at ? $order->created_at->format('F d, Y h:i A') : 'N/A' }}
                        </small>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <span class="status-badge status-{{ $order->status ?? 'pending' }}">
                            {{ ucfirst($order->status ?? 'N/A') }}
                        </span>
                        <span class="status-badge payment-{{ $order->payment_status ?? 'pending' }}">
                            {{ ucfirst($order->payment_status ?? 'N/A') }}
                        </span>
                    </div>
                </div>

                <div class="order-body">
                    <div class="row g-4">
                        <div class="col-lg-8">
                            <h6 class="fw-bold mb-3">Items Ordered</h6>
                            @if($order->items && $order->items->count() > 0)
                                @foreach($order->items as $item)
                                    <div class="order-item-row">
                                        <div class="order-item-img">
                                            @if($item->image && file_exists(public_path($item->image)))
                                                <img src="{{ asset($item->image) }}" alt="{{ $item->product_name }}">
                                            @else
                                                <div class="d-flex align-items-center justify-content-center h-100 bg-light">
                                                    <i class="fas fa-box text-muted"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="order-item-info">
                                            <h6>{{ $item->product_name ?? 'Product' }}</h6>
                                            <div class="order-item-meta">
                                                @if($item->color)<span>Color: {{ $item->color }}</span>@endif
                                                @if($item->size)<span>Size: {{ $item->size }}</span>@endif
                                                <span>Qty: {{ $item->quantity ?? 1 }}</span>
                                            </div>
                                            @if($item->bogo_enabled)
                                                <span class="badge bg-success mt-1" style="font-size:10px;">🎁 BOGO</span>
                                            @endif
                                        </div>
                                        <div class="text-end">
                                            <div class="fw-bold">₹{{ number_format($item->total ?? 0, 2) }}</div>
                                            <small class="text-muted">₹{{ number_format(($item->price ?? 0) + ($item->extra_price ?? 0), 2) }} each</small>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-muted">No items found.</p>
                            @endif
                        </div>

                        <div class="col-lg-4">
                            <h6 class="fw-bold mb-3">Order Summary</h6>
                            <div class="info-row">
                                <span class="info-label">Subtotal</span>
                                <span class="info-value">₹{{ number_format($order->subtotal ?? 0, 2) }}</span>
                            </div>
                            @if(($order->bogo_discount ?? 0) > 0)
                                <div class="info-row">
                                    <span class="info-label text-success">🎁 BOGO Discount</span>
                                    <span class="info-value text-success">-₹{{ number_format($order->bogo_discount, 2) }}</span>
                                </div>
                            @endif
                            @if(($order->coupon_discount ?? 0) > 0)
                                <div class="info-row">
                                    <span class="info-label text-primary">🎫 Coupon Discount</span>
                                    <span class="info-value text-primary">-₹{{ number_format($order->coupon_discount, 2) }}</span>
                                </div>
                            @endif
                            <div class="info-row">
                                <span class="info-label">Shipping</span>
                                <span class="info-value {{ ($order->shipping_cost ?? 0) == 0 ? 'text-success' : '' }}">
                                    {{ ($order->shipping_cost ?? 0) == 0 ? 'FREE' : '₹'.number_format($order->shipping_cost, 2) }}
                                </span>
                            </div>
                            @if(($order->tax ?? 0) > 0)
                                <div class="info-row">
                                    <span class="info-label">GST (5%)</span>
                                    <span class="info-value">₹{{ number_format($order->tax, 2) }}</span>
                                </div>
                            @endif
                            <div class="info-row" style="border-top:2px solid #e9e9ed;padding-top:15px;margin-top:5px;">
                                <span class="info-label fw-bold" style="font-size:16px;">Total</span>
                                <span class="info-value fw-bold" style="font-size:18px;">₹{{ number_format($order->total_amount ?? 0, 2) }}</span>
                            </div>
                            @if(($order->bogo_discount ?? 0) > 0 || ($order->coupon_discount ?? 0) > 0)
                                <div class="text-center mt-2">
                                    <small class="text-success fw-bold">🎉 You saved ₹{{ number_format(($order->bogo_discount ?? 0) + ($order->coupon_discount ?? 0), 2) }}!</small>
                                </div>
                            @endif
                            @if(in_array($order->status ?? '', ['pending', 'processing']))
                                <form action="{{ route('order.cancel', $order->id) }}" method="POST" class="mt-3" onsubmit="return confirm('Cancel this order?')">
                                    @csrf
                                    <button type="submit" class="btn-cancel w-100"><i class="fas fa-times me-1"></i> Cancel Order</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="order-detail-card">
                <div class="order-body">
                    <h6 class="fw-bold mb-3">Shipping Address</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="mb-1"><strong>{{ $order->name ?? 'N/A' }}</strong></p>
                            <p class="mb-1">{{ $order->address ?? $order->shipping_address ?? 'N/A' }}</p>
                            <p class="mb-1">{{ $order->city ?? '' }}{{ ($order->city && $order->state) ? ', ' : '' }}{{ $order->state ?? '' }} - {{ $order->pincode ?? '' }}</p>
                            <p class="mb-0">Phone: {{ $order->phone ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1"><strong>Payment Method:</strong> {{ ($order->payment_method ?? '') == 'razorpay' ? 'Online Payment' : 'Cash on Delivery' }}</p>
                            @if($order->tracking_number)
                                <p class="mb-0"><strong>Tracking #:</strong> {{ $order->tracking_number }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @if($order->notes)
                <div class="order-detail-card">
                    <div class="order-body">
                        <h6 class="fw-bold mb-2">Order Notes</h6>
                        <p class="mb-0 text-muted">{{ $order->notes }}</p>
                    </div>
                </div>
            @endif

        </div>
    </section>

    @include('partials.footer')

</body>
</html>