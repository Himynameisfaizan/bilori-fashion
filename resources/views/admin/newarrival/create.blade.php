@extends('admin.layout.app')

@section('title', 'Manage New Arrival')

@section('content')

<div class="container-fluid px-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 mt-2">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>

                    <li class="breadcrumb-item active">
                        New Arrival
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow-sm border-0 rounded-3">

                <div class="card-header bg-white border-bottom-0 pt-4 px-4">

                    <h5 class="card-title fw-semibold mb-1">
                        New Arrival Information
                    </h5>

                    <p class="text-muted small mb-0">
                        Update new arrival section details
                    </p>

                </div>

                <div class="card-body p-4">

                    <form action="{{ route('admin.newarrival.update', $newarrival->id) }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="row g-3">

                            <!-- Title -->
                            <div class="col-12">

                                <label class="form-label fw-semibold">
                                    Title
                                </label>

                                <input type="text"
                                    name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $newarrival->title) }}"
                                    placeholder="Enter title">

                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <!-- Description -->
                            <div class="col-12">

                                <label class="form-label fw-semibold">
                                    Description
                                </label>

                                <textarea name="description"
                                    rows="4"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Enter description">{{ old('description', $newarrival->description) }}</textarea>

                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <!-- Image -->
                            <div class="col-12">

                                <label class="form-label fw-semibold">
                                    Image
                                </label>

                                <input type="file"
                                    name="image"
                                    id="image"
                                    class="form-control @error('image') is-invalid @enderror"
                                    accept="image/*">

                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <small class="text-muted">
                                    Recommended size: 1000 × 700 px
                                </small>

                                <!-- Preview -->
                                @if($newarrival->image)

                                    <div class="mt-3">
                                        <img src="{{ asset($newarrival->image) }}"
                                            id="previewImage"
                                            class="img-fluid rounded shadow-sm"
                                            style="max-height: 220px;">
                                    </div>

                                @else

                                    <div class="mt-3">
                                        <img src=""
                                            id="previewImage"
                                            class="img-fluid rounded shadow-sm d-none"
                                            style="max-height: 220px;">
                                    </div>

                                @endif

                            </div>

                        </div>

                        <div class="mt-4 pt-3 border-top">

                            <button type="submit"
                                class="btn btn-primary px-4">

                                <i class="fas fa-save me-1"></i>
                                Update New Arrival

                            </button>

                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

</div>

@push('scripts')

<script>

    // Image Preview
    document.getElementById('image').addEventListener('change', function(e){

        const file = e.target.files[0];

        const preview = document.getElementById('previewImage');

        if(file){

            const reader = new FileReader();

            reader.onload = function(event){

                preview.src = event.target.result;

                preview.classList.remove('d-none');
            }

            reader.readAsDataURL(file);
        }

    });

</script>

@endpush

@endsection