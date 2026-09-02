@extends('admin.layout.app')

@section('title', 'Order Details - ' . ($order->order_number ?? 'N/A'))

@section('content')
    <div class="container-fluid">
        
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <a href="{{ route('admin.orders.index') }}" class="text-decoration-none text-muted small">
                    <i class="fas fa-arrow-left me-1"></i> Back to Orders
                </a>
                <h3 class="fw-bold mb-0 mt-1">Order #{{ $order->order_number ?? 'N/A' }}</h3>
                <p class="text-muted mb-0">
                    Placed on {{ $order->created_at ? $order->created_at->format('F d, Y h:i A') : 'N/A' }}
                </p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-dark">
                    <i class="fas fa-edit me-1"></i> Edit Order
                </a>
                @if(!$order->awb_number && $order->payment_status == 'paid' || $order->payment_method == 'cash_on_delivery')
                    <button class="btn btn-success" onclick="createShipment({{ $order->id }})">
                        <i class="fas fa-truck me-1"></i> Ship Order
                    </button>
                @endif
                @if($order->awb_number)
                    <button class="btn btn-info" onclick="trackShipment('{{ $order->awb_number }}')">
                        <i class="fas fa-search-location me-1"></i> Track
                    </button>
                @endif
                <button class="btn btn-outline-secondary" onclick="window.print()">
                    <i class="fas fa-print me-1"></i> Print
                </button>
            </div>
        </div>

        <div class="row g-4">
            <!-- Main Content -->
            <div class="col-lg-8">
                
                <!-- Shipping Dimensions Form -->
                @if(!$order->awb_number)
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0 fw-bold">
                            <i class="fas fa-box me-2"></i> Shipping Dimensions
                        </h5>
                    </div>
                    <div class="card-body">
                        <form id="dimensionsForm">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold">Weight (kg) <span class="text-danger">*</span></label>
                                    <input type="number" name="shipping_weight" id="shipping_weight" 
                                           class="form-control form-control-sm" 
                                           value="{{ $order->shipping_weight ?? 0.5 }}" 
                                           step="0.01" min="0.1" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold">Length (cm) <span class="text-danger">*</span></label>
                                    <input type="number" name="shipping_length" id="shipping_length" 
                                           class="form-control form-control-sm" 
                                           value="{{ $order->shipping_length ?? 10 }}" 
                                           step="0.1" min="1" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold">Width (cm) <span class="text-danger">*</span></label>
                                    <input type="number" name="shipping_width" id="shipping_width" 
                                           class="form-control form-control-sm" 
                                           value="{{ $order->shipping_width ?? 10 }}" 
                                           step="0.1" min="1" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold">Height (cm) <span class="text-danger">*</span></label>
                                    <input type="number" name="shipping_height" id="shipping_height" 
                                           class="form-control form-control-sm" 
                                           value="{{ $order->shipping_height ?? 10 }}" 
                                           step="0.1" min="1" required>
                                </div>
                            </div>
                            <div class="mt-3 d-flex gap-2">
                                <button type="button" class="btn btn-dark" onclick="saveAndShip({{ $order->id }})">
                                    <i class="fas fa-save me-1"></i> Save & Ship
                                </button>
                                <button type="button" class="btn btn-outline-dark" onclick="saveDimensionsOnly({{ $order->id }})">
                                    <i class="fas fa-save me-1"></i> Save Dimensions
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif

                <!-- Order Items Card -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold">
                            <i class="fas fa-box me-2"></i> Order Items
                            <span class="badge bg-dark ms-2">{{ $order->items ? $order->items->count() : 0 }}</span>
                        </h5>
                        @if(($order->bogo_discount ?? 0) > 0 || ($order->coupon_discount ?? 0) > 0)
                            <span class="badge bg-success"><i class="fas fa-tag me-1"></i> Discount Applied</span>
                        @endif
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 40%;">Product</th>
                                        <th>Color/Size</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($order->items as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    @if($item->image && file_exists(public_path($item->image)))
                                                        <img src="{{ asset($item->image) }}" 
                                                             alt="{{ $item->product_name ?? 'Product' }}" 
                                                             class="rounded" style="width:60px;height:70px;object-fit:cover;">
                                                    @else
                                                        <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                                             style="width:60px;height:70px;">
                                                            <i class="fas fa-box text-muted"></i>
                                                        </div>
                                                    @endif
                                                    <div>
                                                        <div class="fw-semibold">{{ $item->product_name ?? 'Product' }}</div>
                                                        @if($item->product_sku)
                                                            <small class="text-muted">SKU: {{ $item->product_sku }}</small>
                                                        @endif
                                                        @if($item->bogo_enabled)
                                                            <span class="badge bg-success" style="font-size:10px;">🎁 BOGO</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                @if($item->color || $item->size)
                                                    @if($item->color)<span class="badge bg-light text-dark border">{{ $item->color }}</span>@endif
                                                    @if($item->size)<span class="badge bg-light text-dark border ms-1">{{ $item->size }}</span>@endif
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                            <td>₹{{ number_format(($item->price ?? 0) + ($item->extra_price ?? 0), 2) }}</td>
                                            <td>{{ $item->quantity ?? 1 }}</td>
                                            <td class="text-end fw-bold">₹{{ number_format($item->total ?? 0, 2) }}</td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="5" class="text-center py-3 text-muted">No items found</td></tr>
                                    @endforelse
                                </tbody>
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="4" class="text-end text-muted">Subtotal</td>
                                        <td class="text-end">₹{{ number_format($order->subtotal ?? 0, 2) }}</td>
                                    </tr>
                                    @if(($order->bogo_discount ?? 0) > 0)
                                        <tr>
                                            <td colspan="4" class="text-end text-success"><i class="fas fa-tag me-1"></i> BOGO Discount</td>
                                            <td class="text-end text-success fw-bold">-₹{{ number_format($order->bogo_discount, 2) }}</td>
                                        </tr>
                                    @endif
                                    @if(($order->coupon_discount ?? 0) > 0)
                                        <tr>
                                            <td colspan="4" class="text-end text-primary"><i class="fas fa-ticket-alt me-1"></i> Coupon ({{ $order->coupon_code ?? 'N/A' }})</td>
                                            <td class="text-end text-primary fw-bold">-₹{{ number_format($order->coupon_discount, 2) }}</td>
                                        </tr>
                                    @endif
                                    @if(($order->shipping_cost ?? 0) > 0)
                                        <tr>
                                            <td colspan="4" class="text-end text-muted"><i class="fas fa-truck me-1"></i> Shipping</td>
                                            <td class="text-end">₹{{ number_format($order->shipping_cost, 2) }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-end text-success"><i class="fas fa-truck me-1"></i> Shipping</td>
                                            <td class="text-end text-success fw-bold">FREE</td>
                                        </tr>
                                    @endif
                                    <tr class="fw-bold">
                                        <td colspan="4" class="text-end" style="font-size:16px;">Total Amount</td>
                                        <td class="text-end" style="font-size:18px;color:#000;">₹{{ number_format($order->total_amount ?? 0, 2) }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Order Timeline -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-history me-2"></i> Order Timeline</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex gap-3 pb-3 border-start border-2 border-success ps-3">
                                <div>
                                    <div class="fw-semibold">Order Placed</div>
                                    <small class="text-muted">{{ $order->created_at ? $order->created_at->format('d M Y, h:i A') : 'N/A' }}</small>
                                </div>
                            </li>
                            @if(($order->payment_status ?? '') == 'paid')
                                <li class="d-flex gap-3 pb-3 border-start border-2 border-success ps-3">
                                    <div>
                                        <div class="fw-semibold">Payment Received</div>
                                        <small class="text-muted">{{ $order->updated_at ? $order->updated_at->format('d M Y, h:i A') : 'N/A' }}</small>
                                        <p class="mb-0 small text-muted">₹{{ number_format($order->total_amount ?? 0, 2) }} via {{ ($order->payment_method ?? '') == 'razorpay' ? 'Online' : 'COD' }}</p>
                                    </div>
                                </li>
                            @endif
                            @if($order->shipped_at)
                                <li class="d-flex gap-3 pb-3 border-start border-2 border-info ps-3">
                                    <div>
                                        <div class="fw-semibold">Shipped</div>
                                        <small class="text-muted">{{ $order->shipped_at->format('d M Y, h:i A') }}</small>
                                        <p class="mb-0 small text-muted">AWB: {{ $order->awb_number ?? 'N/A' }}</p>
                                    </div>
                                </li>
                            @endif
                            @if($order->delivered_at)
                                <li class="d-flex gap-3 border-start border-2 border-success ps-3">
                                    <div>
                                        <div class="fw-semibold">Delivered</div>
                                        <small class="text-muted">{{ $order->delivered_at->format('d M Y, h:i A') }}</small>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Order Status -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-info-circle me-2"></i> Order Status</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="small text-muted d-block">Order Status</label>
                            <span class="badge bg-{{ $order->status_badge }} fs-6">{{ ucfirst($order->status ?? 'N/A') }}</span>
                        </div>
                        <div class="mb-3">
                            <label class="small text-muted d-block">Payment Status</label>
                            <span class="badge bg-{{ $order->payment_status == 'paid' ? 'success' : 'warning' }} fs-6">{{ ucfirst($order->payment_status ?? 'N/A') }}</span>
                        </div>
                        <div>
                            <label class="small text-muted d-block">Payment Method</label>
                            <span class="fw-semibold">
                                @if(($order->payment_method ?? '') == 'razorpay')
                                    <i class="fas fa-credit-card me-1 text-primary"></i> Online Payment
                                @elseif(($order->payment_method ?? '') == 'cash_on_delivery')
                                    <i class="fas fa-money-bill-wave me-1 text-warning"></i> Cash on Delivery
                                @else
                                    {{ ucfirst($order->payment_method ?? 'N/A') }}
                                @endif
                            </span>
                        </div>
                        
                        @if($order->awb_number)
                            <hr>
                            <div class="mb-2">
                                <label class="small text-muted d-block">AWB Number</label>
                                <span class="fw-bold text-primary">{{ $order->awb_number }}</span>
                            </div>
                        @endif

                        @if($order->shipping_weight)
                            <hr>
                            <div class="mb-2">
                                <label class="small text-muted d-block">Weight</label>
                                <span>{{ $order->shipping_weight }} kg</span>
                            </div>
                            <div class="mb-2">
                                <label class="small text-muted d-block">Dimensions (L×W×H)</label>
                                <span>{{ $order->shipping_length }} × {{ $order->shipping_width }} × {{ $order->shipping_height }} cm</span>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer bg-white">
                        <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST" id="statusForm">
                            @csrf
                            <label class="form-label small fw-semibold">Update Status</label>
                            <select name="status" class="form-select form-select-sm mb-2" onchange="this.form.submit()">
                                <option value="pending" {{ ($order->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processing" {{ ($order->status ?? '') == 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="shipped" {{ ($order->status ?? '') == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                <option value="delivered" {{ ($order->status ?? '') == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                <option value="completed" {{ ($order->status ?? '') == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ ($order->status ?? '') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </form>
                        @if(in_array($order->status ?? '', ['shipped', 'processing']))
                            <form action="{{ route('admin.orders.update-tracking', $order->id) }}" method="POST" class="mt-2">
                                @csrf
                                <input type="text" name="tracking_number" class="form-control form-control-sm" 
                                       placeholder="Tracking number" value="{{ $order->tracking_number }}">
                                <button type="submit" class="btn btn-sm btn-dark w-100 mt-2">Update Tracking</button>
                            </form>
                        @endif
                        @if($order->awb_number && !in_array($order->status, ['delivered', 'completed', 'cancelled']))
                            <button class="btn btn-sm btn-danger w-100 mt-2" onclick="cancelShipment({{ $order->id }})">
                                <i class="fas fa-times me-1"></i> Cancel Shipment
                            </button>
                        @endif
                    </div>
                </div>

                <!-- Customer Info -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0 fw-bold"><i class="fas fa-user me-2"></i> Customer Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center" 
                                 style="width:50px;height:50px;font-size:20px;font-weight:600;">
                                {{ strtoupper(substr($order->name ?? 'G', 0, 1)) }}
                            </div>
                            <div>
                                <div class="fw-bold">{{ $order->name ?? 'Guest User' }}</div>
                                <small class="text-muted">{{ $order->email ?? 'No email' }}</small>
                            </div>
                        </div>
                        <div class="mb-2"><label class="small text-muted d-block"><i class="fas fa-phone me-1"></i> Phone</label><span>{{ $order->phone ?? 'N/A' }}</span></div>
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white"><h5 class="mb-0 fw-bold"><i class="fas fa-map-marker-alt me-2"></i> Shipping Address</h5></div>
                    <div class="card-body">
                        <div class="fw-semibold mb-1">{{ $order->name ?? 'N/A' }}</div>
                        <p class="mb-1">{{ $order->address ?? 'N/A' }}</p>
                        <p class="mb-1">{{ $order->city ?? '' }}{{ ($order->city && $order->state) ? ', ' : '' }}{{ $order->state ?? '' }}</p>
                        <p class="mb-0 fw-semibold">{{ $order->pincode ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
// Save Dimensions Only
function saveDimensionsOnly(orderId) {
    const form = document.getElementById('dimensionsForm');
    const formData = new FormData(form);
    
    fetch(`/admin/orders/${orderId}/update-dimensions`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            alert('✅ Dimensions saved successfully!');
            location.reload();
        } else {
            alert('❌ ' + (data.message || 'Failed to save'));
        }
    })
    .catch(err => alert('Error: ' + err.message));
}

// Save Dimensions & Ship
function saveAndShip(orderId) {
    const form = document.getElementById('dimensionsForm');
    const formData = new FormData(form);
    
    // Validate
    const weight = document.getElementById('shipping_weight').value;
    const length = document.getElementById('shipping_length').value;
    const width = document.getElementById('shipping_width').value;
    const height = document.getElementById('shipping_height').value;
    
    if (!weight || !length || !width || !height) {
        alert('Please fill all dimensions');
        return;
    }
    
    if (!confirm('Save dimensions and ship this order?')) return;
    
    fetch(`/admin/orders/${orderId}/update-dimensions`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            // Now ship
            createShipment(orderId);
        } else {
            alert('❌ ' + (data.message || 'Failed to save dimensions'));
        }
    })
    .catch(err => alert('Error: ' + err.message));
}

// Create Shipment
function createShipment(orderId) {
    const btn = event.target;
    if (btn) {
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Shipping...';
    }
    
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
            alert('❌ ' + (data.message || 'Shipping failed'));
            if (btn) {
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-truck me-1"></i> Ship Order';
            }
        }
    })
    .catch(err => {
        alert('Error: ' + err.message);
        if (btn) {
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-truck me-1"></i> Ship Order';
        }
    });
}

// Track Shipment
function trackShipment(awb) {
    if (!awb) return;
    window.open('/admin/shipping/track/' + awb, 'tracking', 'width=800,height=600');
}

// Cancel Shipment
function cancelShipment(orderId) {
    if (!confirm('Cancel this shipment?')) return;
    
    const reason = prompt('Cancellation reason:', 'Cancelled by admin');
    if (!reason) return;
    
    fetch(`/admin/shipping/cancel/${orderId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ reason: reason })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            alert('✅ Shipment cancelled');
            location.reload();
        } else {
            alert('❌ ' + (data.message || 'Cancellation failed'));
        }
    })
    .catch(err => alert('Error: ' + err.message));
}
</script>
@endpush

@push('styles')
<style>
    .table > thead > tr > th { font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; font-weight: 600; }
    .card { border-radius: 12px; }
</style>
@endpush