<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') | E-Commerce Dashboard</title>
 <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap4-theme@1.0.0/dist/select2-bootstrap4.min.css">

    <!-- Custom CSS -->
    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* Dashboard Stats Cards */
        .small-box {
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .small-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Table Styles */
        .table-responsive {
            border-radius: 10px;
        }

        /* Custom Badges */
        .badge-status {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 500;
        }

        /* Sidebar Customization */
        .main-sidebar {
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .nav-sidebar .nav-link.active {
            background: linear-gradient(45deg, #007bff, #0056b3);
        }

        /* Loading Spinner */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            z-index: 9999;
            display: none;
            justify-content: center;
            align-items: center;
        }

        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #007bff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Image Preview */
        .image-preview {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }
        
        
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

        /* Responsive Tables */
        @media (max-width: 768px) {
            .table-responsive {
                font-size: 14px;
            }

            .btn-sm {
                padding: 4px 8px;
                font-size: 12px;
            }
        }
    </style>

    @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Loading Overlay -->
        <div class="loading-overlay" id="loadingOverlay">
            <div class="loading-spinner"></div>
        </div>

        <!-- 🔹 Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/') }}" target="_blank" class="nav-link">Visit Store</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-danger navbar-badge" id="notificationCount">0</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="notificationsList">
                        <span class="dropdown-item dropdown-header">Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item text-center">No new notifications</a>
                    </div>
                </li>

                <!-- User Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user-circle"></i>
                        <span class="d-none d-md-inline ml-1">{{ Auth::user()->name ?? 'Admin' }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- <a href="{{ route('admin.profile') }}" class="dropdown-item"> -->
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Profile
                        </a>
                        <a href="{{ route('admin.settings') }}" class="dropdown-item">
                            <i class="fas fa-cog mr-2"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- 🔹 Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('admin.dashboard') }}" class="brand-link">
                <span class="brand-text ">E-Commerce Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <i class="fas fa-user-circle fa-2x text-light"></i>
                    </div>
                    <div class="info">
                        <a href="{{ route('admin.profile') }}" class="d-block">
                            {{ Auth::user()->name ?? 'Administrator' }}
                        </a>
                        <small class="text-muted">Administrator</small>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <!-- Dashboard -->
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}"
                                class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <!-- Products Management -->
                        <li class="nav-header">PRODUCTS MANAGEMENT</li>

                        <li class="nav-item {{ request()->routeIs('admin.category.*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs('admin.category.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>
                                    Categories
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.category.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Categories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.category.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Category</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        


                      

                        <li class="nav-item {{ request()->routeIs('admin.products.*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Products
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.products.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Products</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.products.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Product</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.products.stock') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Stock Management</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Shipping Management -->
<li class="nav-header">SHIPPING MANAGEMENT</li>

<li class="nav-item {{ request()->routeIs('admin.shipping.*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ request()->routeIs('admin.shipping.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-shipping-fast"></i>
        <p>
            Shipping
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.shipping.index') }}" class="nav-link {{ request()->routeIs('admin.shipping.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>All Shipments</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.shipping.index', ['status' => 'pending']) }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pending Shipment</p>
            </a>
        </li>
        <li class="nav-item">
    <a href="{{ route('admin.shipping.bulk.page') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Bulk Ship</p>
    </a>
</li>
        <li class="nav-item">
            <a href="#" onclick="checkServiceability()" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Check Pincode</p>
            </a>
        </li>
    </ul>
</li>


<!-- Orders Management -->
                        <li class="nav-header">ORDERS MANAGEMENT</li>

                        <li class="nav-item {{ request()->routeIs('admin.orders.*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>
                                    Orders
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.orders.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Orders</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.orders.pending') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pending Orders</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.orders.processing') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Processing Orders</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.orders.completed') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Completed Orders</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

  <li class="nav-header">Blog</li>

                        <li class="nav-item {{ request()->routeIs('admin.blog.*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-blog"></i>
                                <p>
                                    Blog
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">

                                <!-- ALL BLOGS -->
                                <li class="nav-item">
                                    <a href="{{ route('admin.blogs.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Blogs</p>
                                    </a>
                                </li>

                                <!-- ADD BLOG -->
                                <li class="nav-item">
                                    <a href="{{ route('admin.blogs.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Blog</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        

                        <!-- Customers Management -->
                        <li class="nav-header">CUSTOMERS MANAGEMENT</li>

                        <li class="nav-item">
                            <a href="{{ route('admin.customers.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>All Customers</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.customers.reviews') }}" class="nav-link">
                                <i class="nav-icon fas fa-star"></i>
                                <p>Product Reviews</p>
                            </a>
                        </li>

                        <!-- Marketing -->
                        <li class="nav-header">MARKETING</li>

                        <li class="nav-item">
                            <a href="{{ route('admin.coupons.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-ticket-alt"></i>
                                <p>Coupons & Discounts</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.banners.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-image"></i>
                                <p>Banners</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.gallery.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-image"></i>
                                <p>Gallery</p>
                            </a>
                        </li>
                        
                         <li class="nav-item">
                            <a href="{{ route('admin.testimonials.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-image"></i>
                                <p>Testimonials</p>
                            </a>
                        </li>
      <li class="nav-item">

    <a href="{{ route('admin.newarrival.index') }}"
       class="nav-link {{ request()->routeIs('admin.newarrival.*') ? 'active' : '' }}">

        <i class="nav-icon fas fa-image"></i>

        <p>New Arrival</p>

    </a>

</li>

                        <li class="nav-item">
                            <a href="{{ route('admin.newsletter.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>Newsletter</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.contacts.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-phone"></i>
                                <p>Contact Details</p>
                            </a>
                        </li>

                        <!-- Reports -->
                        <li class="nav-header">REPORTS & ANALYTICS</li>

                        <li class="nav-item">
                            <a href="{{ route('admin.reports.sales') }}" class="nav-link">
                                <i class="nav-icon fas fa-chart-line"></i>
                                <p>Sales Report</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.reports.products') }}" class="nav-link">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                <p>Product Analytics</p>
                            </a>
                        </li>

                        <!-- Settings -->
                        <li class="nav-header">SYSTEM</li>
                        
    <li class="nav-item">
    <!-- Changed admin.about.index to admin.about -->
    <a href="{{ route('admin.about.index') }}" class="nav-link">
        <i class="nav-icon fas fa-info-circle"></i>
        <p>About</p>
    </a>
</li>

         <li class="nav-item">
    <a href="{{ route('admin.social-media.index') }}" class="nav-link">
        <i class="nav-icon fas fa-share-alt"></i>
        <p>Social Media</p>
    </a>
</li>
                        
                       <li class="nav-item">
    <a href="{{ route('admin.policy.index') }}" class="nav-link">
        <i class="nav-icon fas fa-file-contract"></i> <p>Policy</p>
    </a>
</li>

                        <li class="nav-item">
                            <a href="{{ route('admin.settings') }}" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>General Settings</p>
                            </a>
                        </li>
                        
                        

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-database"></i>
                                <p>Backup</p>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>

        <!-- 🔹 Main Content -->
        <div class="content-wrapper">
            <!-- Page Header -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('title', 'Dashboard')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @yield('breadcrumb')
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Page Content -->
            <section class="content">
                <div class="container-fluid">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle mr-2"></i> Please check the form for errors
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>
            <strong>&copy; {{ date('Y') }} E-Commerce Admin Panel. All rights reserved.</strong>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <!-- Custom Scripts -->
    <script>
        // Global AJAX Setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Show Loading Overlay
        function showLoading() {
            $('#loadingOverlay').fadeIn();
        }

        function hideLoading() {
            $('#loadingOverlay').fadeOut();
        }

        // Global Toastr Configuration
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "3000"
        };

        // Global SweetAlert Configuration
        window.showConfirm = function (title, text, confirmButtonText = 'Yes, delete it!') {
            return Swal.fire({
                title: title,
                text: text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: confirmButtonText,
                cancelButtonText: 'Cancel'
            });
        };

        window.showSuccess = function (message) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: message,
                timer: 2000,
                showConfirmButton: false
            });
        };

        window.showError = function (message) {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: message,
                timer: 3000,
                showConfirmButton: false
            });
        };

        // Auto-hide alerts after 5 seconds
        $(document).ready(function () {
            setTimeout(function () {
                $('.alert').fadeOut('slow');
            }, 5000);

            // Initialize Select2
            $('.select2').select2({
                theme: 'bootstrap4'
            });

            // Initialize DataTables
            $('.datatable').DataTable({
                responsive: true,
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries"
                }
            });
        });

        // Real-time notification polling (every 30 seconds)
        function fetchNotifications() {
            $.ajax({
                url: '{{ route("admin.notifications") }}',
                method: 'GET',
                success: function (response) {
                    if (response.count > 0) {
                        $('#notificationCount').text(response.count);
                        // Update notifications dropdown
                        let html = '<span class="dropdown-header">Notifications (' + response.count + ')</span>';
                        response.notifications.forEach(function (notification) {
                            html += '<div class="dropdown-divider"></div>';
                            html += '<a href="' + notification.url + '" class="dropdown-item">';
                            html += '<i class="' + notification.icon + ' mr-2"></i> ' + notification.message;
                            html += '<span class="float-right text-muted text-sm">' + notification.time + '</span>';
                            html += '</a>';
                        });
                        html += '<div class="dropdown-divider"></div>';
                        html += '<a href="{{ route("admin.notifications.all") }}" class="dropdown-item text-center">View All</a>';
                        $('#notificationsList').html(html);
                    }
                }
            });
        }

        // Poll every 30 seconds
        setInterval(fetchNotifications, 30000);

        // Initial fetch
        fetchNotifications();
    </script>

    @stack('scripts')
</body>

</html>