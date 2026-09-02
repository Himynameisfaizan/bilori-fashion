@extends('admin.layout.app')

@section('title', 'Shipping Dashboard - iThink Logistics')

@section('content')
<div class="container-fluid">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-0">
                <i class="fas fa-shipping-fast me-2"></i> Shipping Dashboard
            </h3>
            <p class="text-muted mb-0">iThink Logistics - LIVE | Sync orders for shipping</p>
        </div>
        <div>
            <a href="{{ route('admin.shipping.bulk.page') }}" class="btn btn-dark">
                <i class="fas fa-boxes me-1"></i> Bulk Sync (Max 25)
            </a>
        </div>
    </div>

    <!-- Stats -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 style="font-size:12px;">PENDING SYNC</h6>
                            <h2 class="mb-0">{{ $pendingShipments ?? 0 }}</h2>
                        </div>
                        <i class="fas fa-clock fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 style="font-size:12px;">IN TRANSIT</h6>
                            <h2 class="mb-0">{{ $inTransit ?? 0 }}</h2>
                        </div>
                        <i class="fas fa-truck fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 style="font-size:12px;">DELIVERED TODAY</h6>
                            <h2 class="mb-0">{{ $deliveredToday ?? 0 }}</h2>
                        </div>
                        <i class="fas fa-check-circle fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-dark text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 style="font-size:12px;">TOTAL SYNCED</h6>
                            <h2 class="mb-0">{{ $totalShipments ?? 0 }}</h2>
                        </div>
                        <i class="fas fa-box fa-3x opacity-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Orders -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">
                Pending Orders 
                <span class="badge bg-warning ms-2">{{ $orders->count() ?? 0 }}</span>
            </h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Order #</th>
                            <th>Customer</th>
                            <th>City</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders ?? [] as $order)
                        <tr>
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="text-decoration-none fw-semibold">
                                    {{ $order->order_number }}
                                </a>
                            </td>
                            <td>
                                <div>{{ $order->name }}</div>
                                <small class="text-muted">{{ $order->phone }}</small>
                            </td>
                            <td>{{ $order->city }}</td>
                            <td>₹{{ number_format($order->total_amount, 2) }}</td>
                            <td>
                                @if($order->payment_method == 'cash_on_delivery')
                                    <span class="badge bg-warning text-dark">COD</span>
                                @else
                                    <span class="badge bg-info">Prepaid</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-{{ $order->status_badge }}">
                                    {{ $order->status_label }}
                                </span>
                            </td>
                            <td><small>{{ $order->created_at->format('d M Y') }}</small></td>
                            <td>
                                <button class="btn btn-sm btn-success" onclick="syncOrder({{ $order->id }})" title="Sync Order">
                                    <i class="fas fa-sync"></i> Sync
                                </button>
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-outline-dark" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">
                                <i class="fas fa-inbox fa-3x mb-3 d-block"></i>
                                <p>No pending orders to sync</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Recent Synced Orders -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0 fw-bold">Recent Synced Orders</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Order #</th>
                            <th>Customer</th>
                            <th>Ref Number</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentShipments ?? [] as $order)
                        <tr>
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="text-decoration-none fw-semibold">
                                    {{ $order->order_number }}
                                </a>
                            </td>
                            <td>{{ $order->name }}</td>
                            <td>
                                @if($order->awb_number)
                                    <span class="badge bg-light text-dark border">{{ $order->awb_number }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-{{ $order->status_badge }}">{{ $order->status_label }}</span>
                            </td>
                            <td><small>{{ $order->shipped_at ? $order->shipped_at->format('d M Y') : '-' }}</small></td>
                            <td>
                                <div class="btn-group">
                                    @if($order->awb_number)
                                        <button class="btn btn-sm btn-info" onclick="trackOrder('{{ $order->awb_number }}')" title="Track">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    @endif
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-outline-dark" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                <i class="fas fa-box-open fa-3x mb-3 d-block"></i>
                                <p>No synced orders yet</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function syncOrder(orderId) {
    if (!confirm('Sync this order with iThink Logistics?')) return;
    
    const btn = event.target.closest('button');
    const originalHTML = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
    
    fetch(`/admin/shipping/create-shipment/${orderId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            alert('✅ ' + data.message);
            location.reload();
        } else {
            alert('❌ ' + (data.message || 'Sync failed'));
            btn.disabled = false;
            btn.innerHTML = originalHTML;
        }
    })
    .catch(err => {
        alert('Error: ' + err.message);
        btn.disabled = false;
        btn.innerHTML = originalHTML;
    });
}

function trackOrder(awb) {
    if (!awb) return;
    window.open('/admin/shipping/track/' + awb, 'tracking', 'width=800,height=600');
}
</script>
@endpush

@push('styles')
<style>
    .table > thead > tr > th { font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; font-weight: 600; }
    .card { border-radius: 12px; }
    .btn:disabled { opacity: 0.5; cursor: not-allowed; }
</style>
@endpush