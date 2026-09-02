@extends('admin.layout.app')

@section('title', 'Create Testimonial')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 mt-2">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.testimonials.index') }}">Testimonials</a>
                        </li>
                        <li class="breadcrumb-item active">Create Testimonial</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                        <h5 class="card-title fw-semibold">Testimonial Information</h5>
                        <p class="text-muted small mb-0">
                            Fill in the details below to create a new testimonial
                        </p>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('admin.testimonials.store') }}"
                            method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row g-3">

                                <!-- Name -->
                                <div class="col-12">
                                    <label for="name" class="form-label fw-semibold">
                                        Name <span class="text-danger">*</span>
                                    </label>

                                    <input type="text"
                                        name="name"
                                        id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter customer name"
                                        value="{{ old('name') }}"
                                        required>

                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
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
                                        <option value="1" {{ old('review') == '1' ? 'selected' : '' }}>1 Star</option>
                                        <option value="2" {{ old('review') == '2' ? 'selected' : '' }}>2 Stars</option>
                                        <option value="3" {{ old('review') == '3' ? 'selected' : '' }}>3 Stars</option>
                                        <option value="4" {{ old('review') == '4' ? 'selected' : '' }}>4 Stars</option>
                                        <option value="5" {{ old('review') == '5' ? 'selected' : '' }}>5 Stars</option>
                                    </select>

                                    @error('review')
                                        <div class="invalid-feedback">{{ $message }}</div>
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
                                            {{ old('status') == 'active' ? 'selected' : '' }}>
                                            Active
                                        </option>

                                        <option value="inactive"
                                            {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                    </select>

                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
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
                                        required>{{ old('description') }}</textarea>

                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Photo -->
                                <div class="col-12">
                                    <label for="photo" class="form-label fw-semibold">
                                        Customer Photo <span class="text-danger">*</span>
                                    </label>

                                    <input type="file"
                                        name="photo"
                                        id="photo"
                                        class="form-control @error('photo') is-invalid @enderror"
                                        accept="image/*"
                                        required>

                                    <div id="imagePreview" class="mt-3"></div>

                                    @error('photo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    <small class="text-muted">
                                        Supported formats: JPG, PNG, WEBP
                                    </small>
                                </div>
                            </div>

                            <div class="mt-4 pt-3 border-top">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i>
                                    Create Testimonial
                                </button>

                                <a href="{{ route('admin.testimonials.index') }}"
                                    class="btn btn-secondary">
                                    <i class="fas fa-times me-1"></i>
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">

                <!-- Tips -->
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body p-4">
                        <h6 class="fw-semibold mb-3">
                            <i class="fas fa-info-circle me-2"></i>
                            Testimonial Tips
                        </h6>

                        <ul class="list-unstyled small">
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Use genuine customer feedback
                            </li>

                            <li class="mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Add a professional customer image
                            </li>

                            <li class="mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Keep testimonials short and impactful
                            </li>

                            <li>
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Highlight customer satisfaction clearly
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Preview -->
                <div class="card shadow-sm border-0 rounded-3 mt-3">
                    <div class="card-body p-4">
                        <h6 class="fw-semibold mb-3">
                            <i class="fas fa-eye me-2"></i>
                            Live Preview
                        </h6>

                        <div id="livePreview"
                            class="border rounded-3 p-4 text-center bg-light">

                            <div id="previewContent">
                                <i class="fas fa-user-circle fa-3x text-muted mb-2"></i>
                                <p class="mb-0">Preview will appear here</p>
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
                                class="img-fluid rounded-circle border"
                                style="width:120px;height:120px;object-fit:cover;">
                        `;
                    }

                    reader.readAsDataURL(this.files[0]);
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

                const preview = document.getElementById('previewContent');

                preview.innerHTML = `
                    <div>
                        <div class="mb-3">
                            <i class="fas fa-user-circle fa-4x text-secondary"></i>
                        </div>

                        <h5 class="fw-bold">${name}</h5>

                        <div class="mb-2">
                            ${stars}
                        </div>

                        <p class="text-muted small">
                            ${description}
                        </p>
                    </div>
                `;
            }

            document.getElementById('name').addEventListener('input', updatePreview);

            document.getElementById('description').addEventListener('input', updatePreview);

            document.getElementById('review').addEventListener('change', updatePreview);

        </script>
    @endpush

@endsection