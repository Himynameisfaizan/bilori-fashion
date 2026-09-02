@extends('admin.layout.app')

@section('title', 'Track Shipment')

@section('content')
<div class="container-fluid">
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <a href="{{ route('admin.shipping.index') }}" class="text-decoration-none text-muted small">
                <i class="fas fa-arrow-left me-1"></i> Back to Shipping
            </a>
            <h3 class="fw-bold mb-0 mt-1">Track Shipment</h3>
        </div>
    </div>

    <!-- Search Form -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('admin.shipping.track.search') }}" method="POST" class="row g-2">
                @csrf
                <div class="col-md-4">
                    <input type="text" name="awb_number" class="form-control" 
                           placeholder="Enter AWB Number" value="{{ $awb ?? '' }}" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search me-1"></i> Track
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tracking Result -->
    @if(isset($tracking))
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    Tracking Details 
                    @if($awb)
                        <span class="badge bg-primary ms-2">AWB: {{ $awb }}</span>
                    @endif
                </h5>
            </div>
            <div class="card-body">
                @if(isset($tracking['status']) && $tracking['status'] == true)
                    @php $data = $tracking['data'] ?? $tracking; @endphp
                    
                    <div class="mb-3">
                        <strong>Status:</strong> 
                        <span class="badge bg-info">{{ $data['status'] ?? 'N/A' }}</span>
                    </div>
                    
                    <pre class="bg-light p-3 rounded">{{ json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
                @else
                    <div class="alert alert-warning">
                        {{ $tracking['message'] ?? 'No tracking information found' }}
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
@endsection