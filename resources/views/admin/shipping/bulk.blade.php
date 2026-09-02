@extends('admin.layout.app')

@section('title', 'Bulk Sync Orders')

@section('content')
<div class="container-fluid">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <a href="{{ route('admin.shipping.index') }}" class="text-decoration-none text-muted small">
                <i class="fas fa-arrow-left me-1"></i> Back to Shipping
            </a>
            <h3 class="fw-bold mb-0 mt-1">Bulk Sync Orders (Max 25)</h3>
        </div>
        <button id="bulkSyncBtn" class="btn btn-success" onclick="processBulkSync()" disabled>
            <i class="fas fa-sync me-1"></i> Sync Selected Orders
        </button>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold">
                Pending Orders 
                <span class="badge bg-warning ms-2">{{ $orders->count() }}</span>
            </h5>
            <div>
                <input type="checkbox" id="selectAll" onchange="toggleAll(this)">
                <label for="selectAll" class="ms-1">Select All</label>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="50">Select</th>
                            <th>Order #</th>
                            <th>Customer</th>
                            <th>City</th>
                            <th>Pincode</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td>
                                <input type="checkbox" class="order-checkbox" value="{{ $order->id }}" onchange="updateButton()">
                            </td>
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
                            <td><span class="badge bg-light text-dark">{{ $order->pincode }}</span></td>
                            <td>₹{{ number_format($order->total_amount, 2) }}</td>
                            <td>
                                @if($order->payment_method == 'cash_on_delivery')
                                    <span class="badge bg-warning text-dark">COD</span>
                                @else
                                    <span class="badge bg-info">Prepaid</span>
                                @endif
                            </td>
                            <td><small>{{ $order->created_at->format('d M Y') }}</small></td>
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

    <!-- Results Modal -->
    <div class="modal fade" id="resultModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bulk Sync Results</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="resultBody"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function toggleAll(source) {
    document.querySelectorAll('.order-checkbox').forEach(cb => cb.checked = source.checked);
    updateButton();
}

function updateButton() {
    const checked = document.querySelectorAll('.order-checkbox:checked').length;
    const btn = document.getElementById('bulkSyncBtn');
    btn.disabled = checked === 0;
    btn.innerHTML = `<i class="fas fa-sync me-1"></i> Sync ${checked} Orders`;
}

function processBulkSync() {
    const checkboxes = document.querySelectorAll('.order-checkbox:checked');
    const orderIds = Array.from(checkboxes).map(cb => cb.value);
    
    if (orderIds.length === 0) {
        alert('Please select orders to sync');
        return;
    }
    
    if (orderIds.length > 25) {
        alert('Maximum 25 orders allowed per sync');
        return;
    }
    
    if (!confirm(`Sync ${orderIds.length} orders with iThink Logistics?`)) return;
    
    const btn = document.getElementById('bulkSyncBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Syncing...';
    
    fetch('{{ route("admin.shipping.bulk") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ order_ids: orderIds })
    })
    .then(res => res.json())
    .then(data => {
        let html = `<div class="alert alert-info">${data.message}</div>`;
        
        if (data.results) {
            html += '<ul class="list-group">';
            data.results.forEach(result => {
                html += `<li class="list-group-item">${result}</li>`;
            });
            html += '</ul>';
        }
        
        document.getElementById('resultBody').innerHTML = html;
        new bootstrap.Modal(document.getElementById('resultModal')).show();
        
        setTimeout(() => location.reload(), 3000);
    })
    .catch(err => {
        alert('Error: ' + err.message);
        btn.disabled = false;
        updateButton();
    });
}
</script>
@endpush