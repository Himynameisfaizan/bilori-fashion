@extends('admin.layout.app')

@section('title', 'Orders Management')

@section('content')
    <div class="container-fluid">
        
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <!--<div>-->
            <!--    <h3 class="fw-bold mb-1">Orders Management</h3>-->
            <!--    <p class="text-muted mb-0">Manage all customer orders</p>-->
            <!--</div>-->
            <div>
                <a href="{{ route('admin.orders.export') ?? '#' }}" class="btn btn-outline-secondary me-2">
                    <i class="fas fa-download me-1"></i> Export
                </a>
                <button class="btn btn-dark" onclick="window.location.reload()">
                    <i class="fas fa-sync-alt me-1"></i> Refresh
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-3 mb-4">
            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="icon-circle bg-info bg-opacity-10 text-info mx-auto mb-3" style="width:50px;height:50px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:20px;">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <h3 class="fw-bold mb-0">{{ $stats['total'] ?? 0 }}</h3>
                        <p class="text-muted mb-0 small">Total Orders</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="icon-circle bg-warning bg-opacity-10 text-warning mx-auto mb-3" style="width:50px;height:50px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:20px;">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3 class="fw-bold mb-0">{{ $stats['pending'] ?? 0 }}</h3>
                        <p class="text-muted mb-0 small">Pending</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="icon-circle bg-primary bg-opacity-10 text-primary mx-auto mb-3" style="width:50px;height:50px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:20px;">
                            <i class="fas fa-spinner"></i>
                        </div>
                        <h3 class="fw-bold mb-0">{{ $stats['processing'] ?? 0 }}</h3>
                        <p class="text-muted mb-0 small">Processing</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="icon-circle bg-success bg-opacity-10 text-success mx-auto mb-3" style="width:50px;height:50px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:20px;">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h3 class="fw-bold mb-0">{{ $stats['completed'] ?? 0 }}</h3>
                        <p class="text-muted mb-0 small">Completed</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="icon-circle bg-danger bg-opacity-10 text-danger mx-auto mb-3" style="width:50px;height:50px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:20px;">
                            <i class="fas fa-times-circle"></i>
                        </div>
                        <h3 class="fw-bold mb-0">{{ $stats['cancelled'] ?? 0 }}</h3>
                        <p class="text-muted mb-0 small">Cancelled</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="icon-circle bg-dark bg-opacity-10 text-dark mx-auto mb-3" style="width:50px;height:50px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:20px;">
                            <i class="fas fa-rupee-sign"></i>
                        </div>
                        <h3 class="fw-bold mb-0">₹{{ number_format($stats['revenue'] ?? 0, 0) }}</h3>
                        <p class="text-muted mb-0 small">Revenue</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Bar -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <form action="{{ route('admin.orders.index') }}" method="GET" class="row g-2 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label small fw-semibold">Search</label>
                        <input type="text" name="search" class="form-control" placeholder="Order # or Customer name" value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label small fw-semibold">Status</label>
                        <select name="status" class="form-select">
                            <option value="">All Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="shipped" {{ request('status') == 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label small fw-semibold">Payment</label>
                        <select name="payment_status" class="form-select">
                            <option value="">All Payments</option>
                            <option value="paid" {{ request('payment_status') == 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="pending" {{ request('payment_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="failed" {{ request('payment_status') == 'failed' ? 'selected' : '' }}>Failed</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label small fw-semibold">From Date</label>
                        <input type="date" name="from_date" class="form-control" value="{{ request('from_date') }}">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label small fw-semibold">To Date</label>
                        <input type="date" name="to_date" class="form-control" value="{{ request('to_date') }}">
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-dark w-100">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Orders Table -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">
                    <i class="fas fa-list me-2"></i> All Orders
                    <span class="badge bg-dark ms-2">{{ $orders->total() ?? 0 }}</span>
                </h5>
                <div class="btn-group btn-group-sm">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary {{ !request('status') ? 'active' : '' }}">All</a>
                    <a href="{{ route('admin.orders.index', ['status' => 'pending']) }}" class="btn btn-outline-warning {{ request('status') == 'pending' ? 'active' : '' }}">Pending</a>
                    <a href="{{ route('admin.orders.index', ['status' => 'processing']) }}" class="btn btn-outline-primary {{ request('status') == 'processing' ? 'active' : '' }}">Processing</a>
                    <a href="{{ route('admin.orders.index', ['status' => 'completed']) }}" class="btn btn-outline-success {{ request('status') == 'completed' ? 'active' : '' }}">Completed</a>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 130px;">Order #</th>
                                <th>Customer</th>
                                <th>Items</th>
                                <th>Total</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th class="text-end" style="width: 150px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.orders.show', $order->id) }}" class="fw-bold text-decoration-none text-dark">
                                            #{{ $order->order_number }}
                                        </a>
                                        @if($order->bogo_discount > 0)
                                            <br>
                                            <span class="badge bg-success" style="font-size:10px;">🎁 BOGO</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-circle bg-secondary bg-opacity-10 text-secondary" style="width:35px;height:35px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0;">
                                                {{ strtoupper(substr($order->name ?? 'G', 0, 1)) }}
                                            </div>
                                            <div>
                                                <div class="fw-semibold">{{ $order->name ?? 'Guest User' }}</div>
                                                <small class="text-muted">{{ $order->phone ?? 'N/A' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="fw-semibold">{{ $order->items->count() }}</span>
                                        <small class="text-muted"> items</small>
                                    </td>
                                    <td>
                                        <span class="fw-bold">₹{{ number_format($order->total_amount, 2) }}</span>
                                        @if($order->bogo_discount > 0 || $order->coupon_discount > 0)
                                            <br>
                                            <small class="text-success">Saved ₹{{ number_format(($order->bogo_discount ?? 0) + ($order->coupon_discount ?? 0), 2) }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $paymentBadge = [
                                                'paid' => 'success',
                                                'pending' => 'warning',
                                                'failed' => 'danger',
                                            ];
                                            $badge = $paymentBadge[$order->payment_status] ?? 'secondary';
                                        @endphp
                                        <span class="badge bg-{{ $badge }} bg-opacity-75">
                                            {{ ucfirst($order->payment_status) }}
                                        </span>
                                        @if($order->payment_method)
                                            <br>
                                            <small class="text-muted">
                                                {{ $order->payment_method == 'razorpay' ? 'Online' : 'COD' }}
                                            </small>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $statusBadge = [
                                                'pending' => 'warning',
                                                'processing' => 'info',
                                                'shipped' => 'primary',
                                                'delivered' => 'success',
                                                'completed' => 'success',
                                                'cancelled' => 'danger',
                                                'failed' => 'danger',
                                            ];
                                            $badge = $statusBadge[$order->status] ?? 'secondary';
                                        @endphp
                                        <span class="badge bg-{{ $badge }} bg-opacity-75">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td>
                                       <div>{{ $order->created_at ? $order->created_at->format('d M Y') : 'N/A' }}</div>
<small class="text-muted">{{ $order->created_at ? $order->created_at->format('h:i A') : '' }}</small>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1 justify-content-end">
                                            <a href="{{ route('admin.orders.show', $order->id) }}" 
                                               class="btn btn-sm btn-outline-info" 
                                               title="View Details"
                                               data-bs-toggle="tooltip">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.orders.edit', $order->id) }}" 
                                               class="btn btn-sm btn-outline-primary" 
                                               title="Edit Order"
                                               data-bs-toggle="tooltip">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-sm btn-outline-secondary" 
                                                    title="Download Invoice"
                                                    data-bs-toggle="tooltip"
                                                    onclick="window.open('{{ route('admin.orders.invoice', $order->id) }}', '_blank')">
                                                <i class="fas fa-file-invoice"></i>
                                            </button>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-dark dropdown-toggle" 
                                                        data-bs-toggle="dropdown" 
                                                        title="More Actions">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="status" value="processing">
                                                            <button type="submit" class="dropdown-item">
                                                                <i class="fas fa-spinner me-2 text-info"></i> Mark Processing
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="status" value="completed">
                                                            <button type="submit" class="dropdown-item">
                                                                <i class="fas fa-check me-2 text-success"></i> Mark Completed
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li>
                                                        <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST"
                                                              onsubmit="return confirm('Cancel this order?')">
                                                            @csrf
                                                            <input type="hidden" name="status" value="cancelled">
                                                            <button type="submit" class="dropdown-item text-danger">
                                                                <i class="fas fa-times me-2"></i> Cancel Order
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-5">
                                        <div class="py-4">
                                            <i class="fas fa-inbox fa-4x text-muted mb-3 d-block"></i>
                                            <h5 class="text-muted">No Orders Found</h5>
                                            <p class="text-muted small">Orders will appear here once customers place them.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @if($orders->hasPages())
                <div class="card-footer bg-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            Showing {{ $orders->firstItem() ?? 0 }} to {{ $orders->lastItem() ?? 0 }} of {{ $orders->total() }} orders
                        </small>
                        {{ $orders->appends(request()->query())->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('styles')
<style>
    .avatar-circle {
        font-weight: 600;
    }
    .badge {
        font-weight: 500;
        padding: 5px 10px;
    }
    .dropdown-toggle::after {
        display: none;
    }
    .table > thead > tr > th {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
    }
    .table > tbody > tr > td {
        font-size: 13px;
        vertical-align: middle;
    }
    .card {
        border-radius: 12px;
    }
    .btn-group-sm .btn {
        font-size: 12px;
        padding: 5px 12px;
    }
</style>
@endpush

@push('scripts')
<script>
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
</script>
@endpush