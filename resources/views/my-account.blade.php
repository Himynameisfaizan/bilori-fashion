<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <title>My Account | Beroli</title>
    <meta name="description" content="Manage your orders and account" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />

    <link rel="stylesheet" href="{{ asset('css/plugins/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/plugins/glightbox.min.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
        .my__account--section { background: #f8f9fa; padding: 60px 0; min-height: 80vh; }
        .account__welcome--text {
            font-size: 16px; color: #666; margin-bottom: 30px;
            padding: 15px 20px; background: #fff; border-radius: 10px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        .account__welcome--text strong { color: #000; }
        .my__account--section__inner {
            background: #fff; border-radius: 16px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.06); overflow: hidden;
            display: flex; min-height: 500px;
        }
        .account__left--sidebar {
            width: 280px; background: #fafafa; padding: 30px 20px;
            border-right: 1px solid #e9e9ed; flex-shrink: 0;
        }
        .account__content--title { font-size: 18px; font-weight: 700; margin-bottom: 20px; color: #000; }
        .account__menu { list-style: none; padding: 0; margin: 0; }
        .account__menu--list { margin-bottom: 5px; }
        .account__menu--list a {
            display: flex; align-items: center; gap: 10px;
            padding: 12px 15px; border-radius: 8px; color: #555;
            text-decoration: none; font-weight: 500; font-size: 14px;
            transition: all 0.2s ease; cursor: pointer;
        }
        .account__menu--list a i { width: 20px; text-align: center; font-size: 14px; }
        .account__menu--list a:hover { background: #e9e9ed; color: #000; }
        .account__menu--list.active a { background: #000; color: #fff; }
        .account__menu--list.logout a {
            color: #dc3545; margin-top: 20px;
            border-top: 1px solid #e9e9ed; padding-top: 20px;
        }
        .account__menu--list.logout a:hover { background: #fff5f5; }
        .account__wrapper { flex: 1; padding: 30px; }

        .account-stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin-bottom: 30px; }
        .account-stat-card {
            background: #fafafa; border-radius: 12px; padding: 20px;
            text-align: center; transition: all 0.2s ease;
        }
        .account-stat-card:hover { background: #f0f0f0; }
        .account-stat-card .stat-icon { font-size: 24px; margin-bottom: 8px; }
        .account-stat-card .stat-value { font-size: 22px; font-weight: 700; color: #000; }
        .account-stat-card .stat-label { font-size: 12px; color: #888; text-transform: uppercase; letter-spacing: 0.5px; }

        .account__table--area { overflow-x: auto; }
        .account__table { width: 100%; border-collapse: collapse; }
        .account__table thead th {
            background: #fafafa; padding: 12px 15px; font-size: 12px;
            text-transform: uppercase; letter-spacing: 0.5px; color: #666;
            font-weight: 600; text-align: left; border-bottom: 2px solid #e9e9ed; white-space: nowrap;
        }
        .account__table tbody td {
            padding: 14px 15px; font-size: 14px;
            border-bottom: 1px solid #f0f0f0; vertical-align: middle;
        }
        .account__table tbody tr:hover { background: #fafafa; }
        .account__table .order-number { font-weight: 600; color: #000; text-decoration: none; }
        .account__table .order-number:hover { color: #c62828; }
        .status-badge { display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-processing { background: #cce5ff; color: #004085; }
        .status-shipped { background: #d4edda; color: #155724; }
        .status-delivered { background: #d1e7dd; color: #0f5132; }
        .status-completed { background: #d1e7dd; color: #0f5132; }
        .status-cancelled { background: #f8d7da; color: #721c24; }
        .payment-paid { background: #d4edda; color: #155724; }
        .payment-pending { background: #fff3cd; color: #856404; }
        .payment-failed { background: #f8d7da; color: #721c24; }

        .form-input {
            width: 100%; padding: 12px 16px; border: 1.5px solid #e9e9ed;
            border-radius: 8px; font-size: 14px; transition: 0.2s;
        }
        .form-input:focus { outline: none; border-color: #000; box-shadow: 0 0 0 3px rgba(0,0,0,0.05); }
        .form-label { font-size: 13px; font-weight: 600; color: #333; margin-bottom: 6px; display: block; }
        .btn-save {
            padding: 12px 30px; background: #000; color: #fff;
            border: none; border-radius: 25px; font-weight: 600; cursor: pointer; transition: 0.3s;
        }
        .btn-save:hover { background: #333; }

        .no-data { text-align: center; padding: 60px 20px; }
        .no-data i { font-size: 50px; color: #ccc; margin-bottom: 15px; display: block; }
        .no-data h4 { color: #666; margin-bottom: 8px; }
        .no-data p { color: #999; margin-bottom: 20px; }
        .btn-shop {
            display: inline-block; padding: 12px 30px; background: #000;
            color: #fff; border-radius: 25px; text-decoration: none; font-weight: 600; transition: 0.3s;
        }
        .btn-shop:hover { background: #333; color: #fff; }
        .alert-msg { padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; font-weight: 500; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .tab-content { display: none; }
        .tab-content.active { display: block; }

        .wishlist-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 15px; }
        .wishlist-item {
            background: #fff; border: 1px solid #e9e9ed; border-radius: 12px;
            overflow: hidden; transition: 0.2s; position: relative;
        }
        .wishlist-item:hover { box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .wishlist-item img { width: 100%; height: 220px; object-fit: cover; }
        .wishlist-item-info { padding: 12px; }
        .wishlist-item-info h6 { font-size: 13px; font-weight: 600; margin-bottom: 5px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        .wishlist-item-info .price { font-weight: 700; color: #000; }
        .wishlist-remove {
            position: absolute; top: 8px; right: 8px;
            width: 28px; height: 28px; background: #fff; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; border: 1px solid #e9e9ed; font-size: 12px; transition: 0.2s;
        }
        .wishlist-remove:hover { background: #dc3545; color: #fff; border-color: #dc3545; }

        @media (max-width: 768px) {
            .my__account--section__inner { flex-direction: column; }
            .account__left--sidebar { width: 100%; border-right: none; border-bottom: 1px solid #e9e9ed; padding: 20px; }
            .account__menu { display: flex; flex-wrap: wrap; gap: 5px; }
            .account__menu--list { margin-bottom: 0; }
            .account__menu--list a { padding: 8px 12px; font-size: 12px; }
            .account__wrapper { padding: 20px; }
            .account-stats { grid-template-columns: repeat(2, 1fr); }
            .wishlist-grid { grid-template-columns: repeat(2, 1fr); }
        }
    </style>
</head>

<body>
    @include('partials.header')

    <main class="main__content_wrapper">

        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25">My Account</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">My Account</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="my__account--section">
            <div class="container">
                
                <p class="account__welcome--text">
                    👋 Hello, <strong>{{ Auth::user()->name }}</strong>! Welcome to your dashboard.
                </p>

                <div class="my__account--section__inner">
                    
                    <div class="account__left--sidebar">
                        <h2 class="account__content--title">My Profile</h2>
                        <ul class="account__menu">
                            <li class="account__menu--list active" data-tab="dashboard">
                                <a onclick="switchTab('dashboard')"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                            </li>
                            <li class="account__menu--list" data-tab="orders">
                                <a onclick="switchTab('orders')"><i class="fas fa-shopping-bag"></i> My Orders</a>
                            </li>
                            <li class="account__menu--list" data-tab="wishlist">
                                <a onclick="switchTab('wishlist')"><i class="fas fa-heart"></i> Wishlist</a>
                            </li>
                            <li class="account__menu--list" data-tab="profile">
                                <a onclick="switchTab('profile')"><i class="fas fa-user-edit"></i> Edit Profile</a>
                            </li>
                            <li class="account__menu--list" data-tab="password">
                                <a onclick="switchTab('password')"><i class="fas fa-lock"></i> Change Password</a>
                            </li>
                            <li class="account__menu--list logout">
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Log Out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                            </li>
                        </ul>
                    </div>

                    <div class="account__wrapper">
                        
                        @if(session('success'))
                            <div class="alert-msg alert-success">{{ session('success') }}</div>
                        @endif
                        @if(session('error'))
                            <div class="alert-msg alert-error">{{ session('error') }}</div>
                        @endif

                        @php
                            $activeTab = request('tab', 'dashboard');
                            $userId = Auth::id();
                            $orders = \App\Models\Order::where('user_id', $userId)->orderBy('created_at', 'desc')->take(10)->get();
                            $allOrders = \App\Models\Order::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
                            $totalOrders = \App\Models\Order::where('user_id', $userId)->count();
                            $totalSpent = \App\Models\Order::where('user_id', $userId)->where('payment_status', 'paid')->sum('total_amount');
                            $pendingOrders = \App\Models\Order::where('user_id', $userId)->whereIn('status', ['pending', 'processing'])->count();
                            $wishlistItems = \App\Models\Wishlist::where('user_id', $userId)->with('product')->get();
                        @endphp

                        {{-- Dashboard Tab --}}
                        <div class="tab-content {{ $activeTab == 'dashboard' ? 'active' : '' }}" id="tab-dashboard">
                            <h2 class="account__content--title">Dashboard</h2>
                            <div class="account-stats">
                                <div class="account-stat-card"><div class="stat-icon">📦</div><div class="stat-value">{{ $totalOrders }}</div><div class="stat-label">Total Orders</div></div>
                                <div class="account-stat-card"><div class="stat-icon">⏳</div><div class="stat-value">{{ $pendingOrders }}</div><div class="stat-label">Active Orders</div></div>
                                <div class="account-stat-card"><div class="stat-icon">💰</div><div class="stat-value">₹{{ number_format($totalSpent ?? 0, 0) }}</div><div class="stat-label">Total Spent</div></div>
                            </div>
                            <h5 class="fw-bold mb-3">Recent Orders</h5>
                            @if($orders->count() > 0)
                                <div class="account__table--area">
                                    <table class="account__table">
                                        <thead><tr><th>Order #</th><th>Date</th><th>Items</th><th>Total</th><th>Payment</th><th>Status</th><th>Action</th></tr></thead>
                                        <tbody>
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td><a href="{{ route('order.detail', $order->id) }}" class="order-number">#{{ $order->order_number ?? 'N/A' }}</a></td>
                                                    <td>{{ $order->created_at ? $order->created_at->format('d M Y') : 'N/A' }}</td>
                                                    <td>{{ $order->items ? $order->items->count() : 0 }} items</td>
                                                    <td><strong>₹{{ number_format($order->total_amount ?? 0, 2) }}</strong></td>
                                                    <td><span class="status-badge payment-{{ $order->payment_status ?? 'pending' }}">{{ ucfirst($order->payment_status ?? 'N/A') }}</span></td>
                                                    <td><span class="status-badge status-{{ $order->status ?? 'pending' }}">{{ ucfirst($order->status ?? 'N/A') }}</span></td>
                                                    <td><a href="{{ route('order.detail', $order->id) }}" class="btn btn-sm btn-outline-dark">View</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="no-data"><i class="fas fa-shopping-bag"></i><h4>No Orders Yet</h4><p>Start shopping now!</p><a href="{{ route('shop') }}" class="btn-shop">Start Shopping</a></div>
                            @endif
                        </div>

                        {{-- Orders Tab --}}
                        <div class="tab-content {{ $activeTab == 'orders' ? 'active' : '' }}" id="tab-orders">
                            <h2 class="account__content--title">All Orders</h2>
                            @if($allOrders->count() > 0)
                                <div class="account__table--area">
                                    <table class="account__table">
                                        <thead><tr><th>Order #</th><th>Date</th><th>Items</th><th>Total</th><th>Payment</th><th>Status</th><th>Action</th></tr></thead>
                                        <tbody>
                                            @foreach($allOrders as $order)
                                                <tr>
                                                    <td><a href="{{ route('order.detail', $order->id) }}" class="order-number">#{{ $order->order_number ?? 'N/A' }}</a></td>
                                                    <td>{{ $order->created_at ? $order->created_at->format('d M Y') : 'N/A' }}</td>
                                                    <td>{{ $order->items ? $order->items->count() : 0 }} items</td>
                                                    <td><strong>₹{{ number_format($order->total_amount ?? 0, 2) }}</strong></td>
                                                    <td><span class="status-badge payment-{{ $order->payment_status ?? 'pending' }}">{{ ucfirst($order->payment_status ?? 'N/A') }}</span></td>
                                                    <td><span class="status-badge status-{{ $order->status ?? 'pending' }}">{{ ucfirst($order->status ?? 'N/A') }}</span></td>
                                                    <td><a href="{{ route('order.detail', $order->id) }}" class="btn btn-sm btn-outline-dark">View</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="no-data"><i class="fas fa-shopping-bag"></i><h4>No Orders Yet</h4><p>Start shopping now!</p><a href="{{ route('shop') }}" class="btn-shop">Start Shopping</a></div>
                            @endif
                        </div>

                        {{-- Wishlist Tab --}}
                        <div class="tab-content {{ $activeTab == 'wishlist' ? 'active' : '' }}" id="tab-wishlist">
                            <h2 class="account__content--title">My Wishlist</h2>
                            @if($wishlistItems->count() > 0)
                                <div class="wishlist-grid">
                                    @foreach($wishlistItems as $item)
                                        <div class="wishlist-item">
                                            <button class="wishlist-remove" onclick="removeFromWishlist({{ $item->id }})" title="Remove"><i class="fas fa-times"></i></button>
                                            <a href="{{ $item->product ? url('product/'.$item->product->slug) : '#' }}">
                                                <img src="{{ $item->product ? asset($item->product->image_url ?? 'assets/images/no-image.png') : asset('assets/images/no-image.png') }}" alt="{{ $item->product->name ?? 'Product' }}">
                                            </a>
                                            <div class="wishlist-item-info">
                                                <h6>{{ $item->product->name ?? 'Product' }}</h6>
                                                <div class="price">₹{{ $item->product ? number_format($item->product->final_price ?? 0, 2) : '0.00' }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="no-data"><i class="fas fa-heart"></i><h4>No Items in Wishlist</h4><p>Save your favorite items!</p><a href="{{ route('shop') }}" class="btn-shop">Browse Products</a></div>
                            @endif
                        </div>

                        {{-- Edit Profile Tab --}}
                        <div class="tab-content {{ $activeTab == 'profile' ? 'active' : '' }}" id="tab-profile">
                            <h2 class="account__content--title">Edit Profile</h2>
                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-12"><label class="form-label">Full Name</label><input type="text" name="name" class="form-input" value="{{ Auth::user()->name }}" required></div>
                                    <div class="col-md-12"><label class="form-label">Email</label><input type="email" name="email" class="form-input" value="{{ Auth::user()->email }}" required></div>
                                    <div class="col-md-12"><label class="form-label">Phone</label><input type="text" name="phone" class="form-input" value="{{ Auth::user()->phone ?? '' }}"></div>
                                    <div class="col-md-12"><button type="submit" class="btn-save"><i class="fas fa-save me-2"></i> Save Changes</button></div>
                                </div>
                            </form>
                        </div>

                        {{-- Change Password Tab --}}
                        <div class="tab-content {{ $activeTab == 'password' ? 'active' : '' }}" id="tab-password">
                            <h2 class="account__content--title">Change Password</h2>
                            <form action="{{ route('password.update') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-12"><label class="form-label">Current Password</label><input type="password" name="current_password" class="form-input" required></div>
                                    <div class="col-md-12"><label class="form-label">New Password</label><input type="password" name="password" class="form-input" required></div>
                                    <div class="col-md-12"><label class="form-label">Confirm New Password</label><input type="password" name="password_confirmation" class="form-input" required></div>
                                    <div class="col-md-12"><button type="submit" class="btn-save"><i class="fas fa-key me-2"></i> Update Password</button></div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('partials.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function switchTab(tab) {
            document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
            document.getElementById('tab-' + tab).classList.add('active');
            document.querySelectorAll('.account__menu--list').forEach(el => el.classList.remove('active'));
            document.querySelector(`[data-tab="${tab}"]`).classList.add('active');
            const url = new URL(window.location);
            url.searchParams.set('tab', tab);
            window.history.pushState({}, '', url);
        }

        const urlParams = new URLSearchParams(window.location.search);
        const activeTab = urlParams.get('tab') || 'dashboard';
        switchTab(activeTab);

        function removeFromWishlist(id) {
            if (confirm('Remove from wishlist?')) {
                $.ajax({
                    url: "{{ route('wishlist.remove') }}",
                    type: "POST",
                    data: { _token: "{{ csrf_token() }}", wishlist_id: id },
                    success: function(response) {
                        if (response.success) location.reload();
                    }
                });
            }
        }
    </script>

</body>
</html>