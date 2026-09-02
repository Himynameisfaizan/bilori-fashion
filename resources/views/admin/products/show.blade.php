@extends('admin.layout.app')

@section('title', 'Product Details')

@section('content')

<div class="container-fluid px-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="mb-1">Product Details</h3>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.products.index') }}">Products</a>
                    </li>

                    <li class="breadcrumb-item active">
                        {{ $product->name }}
                    </li>
                </ol>
            </nav>
        </div>

        <div class="d-flex gap-2">

            <a href="{{ route('admin.products.edit', $product->id) }}"
                class="btn btn-primary">
                <i class="fas fa-edit"></i> Edit
            </a>

            <a href="{{ route('admin.products.index') }}"
                class="btn btn-secondary">
                Back
            </a>

        </div>

    </div>

    <div class="row">

        <!-- LEFT -->
        <div class="col-lg-4">

            <div class="card shadow-sm border-0 mb-4">

                <div class="card-body text-center">

                    @if($product->image && file_exists(public_path($product->image)))

                        <img src="{{ asset($product->image) }}"
                            alt="{{ $product->name }}"
                            class="img-fluid rounded mb-3"
                            style="max-height:350px; object-fit:cover;">

                    @else

                        <img src="{{ asset('assets/images/no-image.png') }}"
                            class="img-fluid rounded mb-3"
                            style="max-height:350px; object-fit:cover; opacity:.6;">

                    @endif

                    <h4 class="fw-bold">
                        {{ $product->name }}
                    </h4>

                    <div class="mt-3">

                        @if($product->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif

                        @if($product->is_featured)
                            <span class="badge bg-primary">Featured</span>
                        @endif

                        @if($product->is_trending)
                            <span class="badge bg-warning text-dark">Trending</span>
                        @endif

                        @if($product->is_new_arrival)
                            <span class="badge bg-info text-dark">New Arrival</span>
                        @endif

                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="col-lg-8">

            <div class="card shadow-sm border-0">

                <div class="card-header bg-white">
                    <h5 class="mb-0">Product Information</h5>
                </div>

                <div class="card-body">

                    <div class="row g-4">

                        <div class="col-md-6">
                            <label class="text-muted">Product Name</label>
                            <h6>{{ $product->name }}</h6>
                        </div>

                        <div class="col-md-6">
                            <label class="text-muted">SKU</label>
                            <h6>{{ $product->sku ?? '-' }}</h6>
                        </div>

                        <div class="col-md-6">
                            <label class="text-muted">Category</label>
                            <h6>{{ $product->category->name ?? 'N/A' }}</h6>
                        </div>

                        <div class="col-md-6">
                            <label class="text-muted">Stock Quantity</label>

                            @if($product->stock_quantity <= 0)

                                <h6 class="text-danger">
                                    Out of Stock
                                </h6>

                            @else

                                <h6 class="text-success">
                                    {{ $product->stock_quantity }} Available
                                </h6>

                            @endif
                        </div>

                        <div class="col-md-6">
                            <label class="text-muted">Regular Price</label>
                            <h5>₹{{ number_format($product->price, 2) }}</h5>
                        </div>

                        <div class="col-md-6">
                            <label class="text-muted">Sale Price</label>

                            @if($product->sale_price)
                                <h5 class="text-danger">
                                    ₹{{ number_format($product->sale_price, 2) }}
                                </h5>
                            @else
                                <h6>-</h6>
                            @endif

                        </div>

                        <div class="col-md-12">
                            <label class="text-muted">Short Description</label>

                            <div class="border rounded p-3 bg-light">
                                {{ $product->short_description ?? 'No short description available' }}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="text-muted">Description</label>

                            <div class="border rounded p-3">
                                {!! $product->description ?? 'No description available' !!}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="text-muted">Created At</label>
                            <h6>{{ $product->created_at->format('d M Y h:i A') }}</h6>
                        </div>

                        <div class="col-md-6">
                            <label class="text-muted">Updated At</label>
                            <h6>{{ $product->updated_at->format('d M Y h:i A') }}</h6>
                        </div>

                    </div>

                </div>

            </div>

            <!-- Gallery -->
            @php
                $images = [];

                if ($product->images) {
                    $images = is_string($product->images)
                        ? json_decode($product->images, true)
                        : $product->images;
                }
            @endphp

            @if(!empty($images))

                <div class="card shadow-sm border-0 mt-4">

                    <div class="card-header bg-white">
                        <h5 class="mb-0">Product Gallery</h5>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            @foreach($images as $img)

                                <div class="col-md-3 mb-3">

                                    <img src="{{ asset($img) }}"
                                        class="img-fluid rounded border"
                                        style="height:120px; width:100%; object-fit:cover;">

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection