@extends('admin.layout.app')

@section('title', 'Check Pincode Serviceability')

@section('content')
<div class="container-fluid">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <a href="{{ route('admin.shipping.index') }}" class="text-decoration-none text-muted small">
                <i class="fas fa-arrow-left me-1"></i> Back to Shipping
            </a>
            <h3 class="fw-bold mb-0 mt-1">Check Pincode Serviceability</h3>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <form id="serviceabilityForm" class="row g-3">
                @csrf
                <div class="col-md-4">
                    <label class="form-label">Enter Pincode</label>
                    <input type="text" name="pincode" id="pincode" class="form-control" 
                           placeholder="Enter 6-digit pincode" maxlength="6" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">&nbsp;</label>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search me-1"></i> Check
                    </button>
                </div>
            </form>
            
            <div id="result" class="mt-4"></div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('serviceabilityForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const pincode = document.getElementById('pincode').value;
    const resultDiv = document.getElementById('result');
    
    if (!pincode || pincode.length !== 6) {
        alert('Please enter a valid 6-digit pincode');
        return;
    }
    
    resultDiv.innerHTML = '<div class="text-center"><div class="spinner-border"></div><p>Checking...</p></div>';
    
    fetch('{{ route("admin.shipping.serviceability") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ pincode: pincode })
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === true) {
            resultDiv.innerHTML = `
                <div class="alert alert-success">
                    <h5>✅ Pincode ${pincode} is serviceable!</h5>
                    <pre class="mb-0 mt-2">${JSON.stringify(data.data || data, null, 2)}</pre>
                </div>
            `;
        } else {
            resultDiv.innerHTML = `
                <div class="alert alert-danger">
                    <h5>❌ Not Serviceable</h5>
                    <p class="mb-0">${data.message || 'Delivery not available for this pincode'}</p>
                </div>
            `;
        }
    })
    .catch(error => {
        resultDiv.innerHTML = `<div class="alert alert-danger">Error: ${error.message}</div>`;
    });
});
</script>
@endpush