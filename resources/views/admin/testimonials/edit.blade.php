@extends('admin.layout.app')

@section('title', 'Edit Testimonial')

@section('content')
    <div class="container-fluid px-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Edit Testimonial</h1>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 mt-2">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.testimonials.index') }}">Testimonials</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Edit Testimonial
                        </li>
                    </ol>
                </nav>
            </div>

            <div>
                <a href="{{ route('admin.testimonials.index') }}"
                    class="btn btn-outline-secondary">

                    <i class="fas fa-arrow-left me-1"></i>
                    Back to Testimonials
                </a>
            </div>
        </div>

        <div class="row">

            <!-- Main Form -->
            <div class="col-lg-8">

                <div class="card shadow-sm border-0 rounded-3">

                    <div class="card-header bg-white border-bottom-0 pt-4 px-4">

                        <div class="d-flex align-items-center">

                            <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-3">
                                <i class="fas fa-user text-primary"></i>
                            </div>

                            <div>
                                <h5 class="card-title mb-0 fw-semibold">
                                    Edit Testimonial Information
                                </h5>

                                <p class="text-muted small mb-0">
                                    Update testimonial details below
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="card-body p-4">

                        <form action="{{ route('admin.testimonials.update', $testimonial->id) }}"
                            method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="row g-3">

                                <!-- Name -->
                                <div class="col-12">

                                    <label for="name" class="form-label fw-semibold">
                                        Name <span class="text-danger">*</span>
                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-user text-muted"></i>
                                        </span>

                                        <input type="text"
                                            name="name"
                                            id="name"
                                            class="form-control border-start-0 @error('name') is-invalid @enderror"
                                            placeholder="Enter customer name"
                                            value="{{ old('name', $testimonial->name) }}"
                                            required>

                                    </div>

                                    @error('name')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Review -->
                                <div class="col-md-6">

                                    <label for="review" class="form-label fw-semibold">
                                        Review Rating
                                    </label>

                                    <select name="review"
                                        id="review"
                                        class="form-select @error('review') is-invalid @enderror">

                                        <option value="">Select Rating</option>

                                        @for($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}"
                                                {{ old('review', $testimonial->review) == $i ? 'selected' : '' }}>
                                                {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                                            </option>
                                        @endfor

                                    </select>

                                    @error('review')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">

                                    <label for="status" class="form-label fw-semibold">
                                        Status <span class="text-danger">*</span>
                                    </label>

                                    <select name="status"
                                        id="status"
                                        class="form-select @error('status') is-invalid @enderror"
                                        required>

                                        <option value="active"
                                            {{ old('status', $testimonial->status) == 'active' ? 'selected' : '' }}>
                                            Active
                                        </option>

                                        <option value="inactive"
                                            {{ old('status', $testimonial->status) == 'inactive' ? 'selected' : '' }}>
                                            Inactive
                                        </option>

                                    </select>

                                    @error('status')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-12">

                                    <label for="description" class="form-label fw-semibold">
                                        Description <span class="text-danger">*</span>
                                    </label>

                                    <textarea name="description"
                                        id="description"
                                        rows="5"
                                        class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Write testimonial here..."
                                        required>{{ old('description', $testimonial->description) }}</textarea>

                                    @error('description')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Current Photo -->
                                <div class="col-12">

                                    <label class="form-label fw-semibold">
                                        Current Photo
                                    </label>

                                    <div class="border rounded-3 p-3 bg-light">

                                        <div class="d-flex align-items-center">

                                            <div class="flex-shrink-0">

                                                <img src="{{ $testimonial->photo ? asset($testimonial->photo) : asset('assets/images/no-image.png') }}"
    alt="{{ $testimonial->name }}"
    class="rounded-circle border"
    style="width:100px;height:100px;object-fit:cover;">

                                            </div>

                                            <div class="flex-grow-1 ms-3">

                                                <div class="form-check">

                                                    <input class="form-check-input"
                                                        type="checkbox"
                                                        name="remove_photo"
                                                        id="remove_photo"
                                                        value="1">

                                                    <label class="form-check-label text-danger"
                                                        for="remove_photo">

                                                        <i class="fas fa-trash-alt me-1"></i>
                                                        Remove current photo
                                                    </label>

                                                </div>

                                                <small class="text-muted">
                                                    Current image will be replaced if you upload a new one
                                                </small>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <!-- Upload New Photo -->
                                <div class="col-12">

                                    <label for="photo" class="form-label fw-semibold">
                                        Upload New Photo (Optional)
                                    </label>

                                    <input type="file"
                                        name="photo"
                                        id="photo"
                                        class="form-control @error('photo') is-invalid @enderror"
                                        accept="image/*">

                                    <div id="imagePreview" class="mt-3"></div>

                                    @error('photo')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <small class="text-muted">
                                        Supported formats: JPG, PNG, WEBP
                                    </small>
                                </div>

                            </div>

                            <!-- Actions -->
                            <div class="mt-4 pt-3 border-top">

                                <div class="d-flex gap-2">

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i>
                                        Update Testimonial
                                    </button>

                                    <button type="reset"
                                        class="btn btn-outline-secondary">

                                        <i class="fas fa-undo-alt me-1"></i>
                                        Reset
                                    </button>

                                    <a href="{{ route('admin.testimonials.index') }}"
                                        class="btn btn-light">

                                        <i class="fas fa-times me-1"></i>
                                        Cancel
                                    </a>

                                </div>

                            </div>

                        </form>

                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">

                <!-- Info Card -->
                <div class="card shadow-sm border-0 rounded-3 mb-4">

                    <div class="card-body p-4">

                        <h6 class="fw-semibold mb-3">
                            <i class="fas fa-info-circle me-2"></i>
                            Testimonial Information
                        </h6>

                        <div class="mb-3">

                            <small class="text-muted d-block">
                                Created
                            </small>

                            <strong>
                                {{ $testimonial->created_at->format('M d, Y h:i A') }}
                            </strong>

                            <br>

                            <small class="text-muted">
                                {{ $testimonial->created_at->diffForHumans() }}
                            </small>
                        </div>

                        <div class="mb-3">

                            <small class="text-muted d-block">
                                Last Updated
                            </small>

                            <strong>
                                {{ $testimonial->updated_at->format('M d, Y h:i A') }}
                            </strong>

                            <br>

                            <small class="text-muted">
                                {{ $testimonial->updated_at->diffForHumans() }}
                            </small>
                        </div>

                        <div>

                            <small class="text-muted d-block">
                                Testimonial ID
                            </small>

                            <strong>
                                #{{ $testimonial->id }}
                            </strong>

                        </div>

                    </div>
                </div>

                <!-- Tips -->
                <div class="card shadow-sm border-0 rounded-3 mb-4 bg-primary bg-opacity-5">

                    <div class="card-body p-4">

                        <div class="d-flex mb-3">

                            <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-3">
                                <i class="fas fa-lightbulb text-primary"></i>
                            </div>

                            <h6 class="card-title fw-semibold mb-0">
                                Testimonial Tips
                            </h6>

                        </div>

                        <ul class="list-unstyled small mb-0">

                            <li class="mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Use real customer reviews
                            </li>

                            <li class="mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Add professional profile photos
                            </li>

                            <li class="mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Keep reviews concise and genuine
                            </li>

                            <li>
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Highlight customer satisfaction
                            </li>

                        </ul>

                    </div>
                </div>

                <!-- Live Preview -->
                <div class="card shadow-sm border-0 rounded-3">

                    <div class="card-body p-4">

                        <h6 class="fw-semibold mb-3">
                            <i class="fas fa-eye me-2"></i>
                            Live Preview
                        </h6>

                        <div id="livePreview"
                            class="border rounded-3 p-4 text-center bg-light">

                            <div id="previewContent">

                                <div>

                                    <div class="mb-3">

                                        <img src="{{ asset('storage/' . $testimonial->photo) }}"
                                            class="rounded-circle border"
                                            style="width:90px;height:90px;object-fit:cover;">

                                    </div>

                                    <h5 class="fw-bold">
                                        {{ $testimonial->name }}
                                    </h5>

                                    <div class="mb-2">

                                        @for($i = 1; $i <= $testimonial->review; $i++)
                                            <i class="fas fa-star text-warning"></i>
                                        @endfor

                                    </div>

                                    <p class="text-muted small">
                                        {{ $testimonial->description }}
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')

        <script>

            // Image Preview
            document.getElementById('photo').addEventListener('change', function () {

                const preview = document.getElementById('imagePreview');

                if (this.files && this.files[0]) {

                    const reader = new FileReader();

                    reader.onload = function (e) {

                        preview.innerHTML = `
                            <img src="${e.target.result}"
                                class="rounded-circle border mt-2"
                                style="width:120px;height:120px;object-fit:cover;">
                        `;
                    }

                    reader.readAsDataURL(this.files[0]);

                } else {

                    preview.innerHTML = '';
                }
            });


            // Remove photo
            document.getElementById('remove_photo').addEventListener('change', function () {

                if (this.checked) {

                    document.getElementById('imagePreview').innerHTML = `
                        <div class="alert alert-info mt-2">
                            Current photo will be removed on update
                        </div>
                    `;

                    document.getElementById('photo').value = '';

                } else {

                    document.getElementById('imagePreview').innerHTML = '';
                }
            });


            // Live Preview
            function updatePreview() {

                const name = document.getElementById('name').value || 'Customer Name';

                const description = document.getElementById('description').value
                    || 'Customer testimonial will appear here';

                const review = document.getElementById('review').value || 5;

                let stars = '';

                for (let i = 1; i <= review; i++) {

                    stars += `<i class="fas fa-star text-warning"></i>`;
                }

                document.getElementById('previewContent').innerHTML = `

                    <div>

                        <div class="mb-3">
                            <i class="fas fa-user-circle fa-4x text-secondary"></i>
                        </div>

                        <h5 class="fw-bold">${escapeHtml(name)}</h5>

                        <div class="mb-2">
                            ${stars}
                        </div>

                        <p class="text-muted small">
                            ${escapeHtml(description)}
                        </p>

                    </div>
                `;
            }


            // Escape HTML
            function escapeHtml(text) {

                const div = document.createElement('div');

                div.textContent = text;

                return div.innerHTML;
            }


            // Event Listeners
            document.getElementById('name').addEventListener('input', updatePreview);

            document.getElementById('description').addEventListener('input', updatePreview);

            document.getElementById('review').addEventListener('change', updatePreview);


            // Validation
            document.querySelector('form').addEventListener('submit', function (e) {

                const name = document.getElementById('name').value;

                if (!name) {

                    e.preventDefault();

                    alert('Please enter customer name');

                    return false;
                }
            });

        </script>

    @endpush


    @push('styles')

        <style>

            .bg-opacity-5 {
                --bs-bg-opacity: 0.05;
            }

            .bg-opacity-10 {
                --bs-bg-opacity: 0.1;
            }

            .card {
                transition: all 0.2s ease;
            }

            .card:hover {
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.08) !important;
            }

        </style>

    @endpush

@endsection