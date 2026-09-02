@extends('admin.layout.app')

@section('title', 'Create Banner')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <!-- <h1 class="h3 mb-0 text-gray-800">Create New Banner</h1> -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 mt-2">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.banners.index') }}">Banners</a></li>
                        <li class="breadcrumb-item active">Create Banner</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                        <h5 class="card-title fw-semibold">Banner Information</h5>
                        <p class="text-muted small mb-0">Fill in the details below to create a new banner</p>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-3">
                                <!-- Title -->
                                <div class="col-12">
                                    <label for="title" class="form-label fw-semibold">Banner Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="title" id="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        placeholder="Enter banner title" value="{{ old('title') }}" >
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Subtitle -->
                                <div class="col-12">
                                    <label for="subtitle" class="form-label fw-semibold">Subtitle</label>
                                    <textarea name="subtitle" id="subtitle"
                                        class="form-control @error('subtitle') is-invalid @enderror" rows="2"
                                        placeholder="Enter banner subtitle">{{ old('subtitle') }}</textarea>
                                    @error('subtitle')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Banner Image -->
                                <div class="col-12">
                                    <label for="image" class="form-label fw-semibold">Banner Image <span
                                            class="text-danger">*</span></label>
                                    <input type="file" name="image" id="image"
                                        class="form-control @error('image') is-invalid @enderror" accept="image/*" required>
                                    <div id="imagePreview" class="mt-2"></div>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Recommended size: 1920x600px. Supported formats: JPG, PNG,
                                        GIF, WEBP</small>
                                </div>

                                <!-- Link & Button -->
                                <div class="col-md-6">
                                    <label for="link" class="form-label fw-semibold">Banner Link (URL)</label>
                                    <input type="url" name="link" id="link"
                                        class="form-control @error('link') is-invalid @enderror"
                                        placeholder="https://example.com" value="{{ old('link') }}">
                                    @error('link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="button_text" class="form-label fw-semibold">Button Text</label>
                                    <input type="text" name="button_text" id="button_text"
                                        class="form-control @error('button_text') is-invalid @enderror"
                                        placeholder="Shop Now" value="{{ old('button_text') }}">
                                    @error('button_text')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Position & Order -->
                                <div class="col-md-6">
                                    <label for="position" class="form-label fw-semibold">Banner Position <span
                                            class="text-danger">*</span></label>
                                    <select name="position" id="position"
                                        class="form-select @error('position') is-invalid @enderror" required>
                                        <option value="">Select Position</option>
                                        @foreach($positions as $position)
                                            <option value="{{ $position }}" {{ old('position') == $position ? 'selected' : '' }}>
                                                {{ ucfirst(str_replace('_', ' ', $position)) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('position')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="order" class="form-label fw-semibold">Display Order</label>
                                    <input type="number" name="order" id="order"
                                        class="form-control @error('order') is-invalid @enderror" placeholder="0"
                                        value="{{ old('order', 0) }}">
                                    @error('order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Lower numbers appear first</small>
                                </div>

                                <!-- Link Target -->
                                <div class="col-md-6">
                                    <label for="target" class="form-label fw-semibold">Open Link In</label>
                                    <select name="target" id="target" class="form-select">
                                        <option value="_self" {{ old('target') == '_self' ? 'selected' : '' }}>Same Window
                                        </option>
                                        <option value="_blank" {{ old('target') == '_blank' ? 'selected' : '' }}>New Window
                                        </option>
                                    </select>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label for="status" class="form-label fw-semibold">Status <span
                                            class="text-danger">*</span></label>
                                    <select name="status" id="status"
    class="form-select @error('status') is-invalid @enderror" required>

    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
        Active
    </option>

    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
        Inactive
    </option>
</select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6">
    <label for="device_type" class="form-label fw-semibold">
        Device Type <span class="text-danger">*</span>
    </label>

    <select name="device_type" id="device_type"
        class="form-select @error('device_type') is-invalid @enderror" required>

        <option value="">Select Device</option>

        <option value="mobile" {{ old('device_type') == 'mobile' ? 'selected' : '' }}>
            Mobile
        </option>

        <option value="laptop" {{ old('device_type') == 'laptop' ? 'selected' : '' }}>
            Laptop
        </option>

    </select>

    @error('device_type')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

                                <!-- Schedule Dates -->
                                <div class="col-md-6">
                                    <label for="start_date" class="form-label fw-semibold">Start Date</label>
                                    <input type="datetime-local" name="start_date" id="start_date"
                                        class="form-control @error('start_date') is-invalid @enderror"
                                        value="{{ old('start_date') }}">
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="end_date" class="form-label fw-semibold">End Date</label>
                                    <input type="datetime-local" name="end_date" id="end_date"
                                        class="form-control @error('end_date') is-invalid @enderror"
                                        value="{{ old('end_date') }}">
                                    @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Color Settings -->
                                <div class="col-12">
                                    <hr>
                                    <h6 class="fw-semibold">Color Settings (Optional)</h6>
                                </div>

                                <div class="col-md-4">
                                    <label for="background_color" class="form-label">Background Color</label>
                                    <input type="color" name="background_color" id="background_color"
                                        class="form-control form-control-color"
                                        value="{{ old('background_color', '#000000') }}">
                                </div>

                                <div class="col-md-4">
                                    <label for="text_color" class="form-label">Text Color</label>
                                    <input type="color" name="text_color" id="text_color"
                                        class="form-control form-control-color" value="{{ old('text_color', '#ffffff') }}">
                                </div>

                                <div class="col-md-4">
                                    <label for="button_color" class="form-label">Button Color</label>
                                    <input type="color" name="button_color" id="button_color"
                                        class="form-control form-control-color"
                                        value="{{ old('button_color', '#007bff') }}">
                                </div>
                            </div>

                            <div class="mt-4 pt-3 border-top">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i> Create Banner
                                </button>
                                <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times me-1"></i> Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body p-4">
                        <h6 class="fw-semibold mb-3">
                            <i class="fas fa-info-circle me-2"></i> Banner Tips
                        </h6>
                        <ul class="list-unstyled small">
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Use high-quality images for better engagement
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Keep text short and impactful
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Add clear call-to-action buttons
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Schedule banners for promotions and holidays
                            </li>
                            <li>
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Use order numbers to control display sequence
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Preview Card -->
                <div class="card shadow-sm border-0 rounded-3 mt-3">
                    <div class="card-body p-4">
                        <h6 class="fw-semibold mb-3">
                            <i class="fas fa-eye me-2"></i> Live Preview
                        </h6>
                        <div id="livePreview" class="border rounded-3 p-3 text-center" style="background: #f8f9fa;">
                            <div id="previewContent">
                                <i class="fas fa-image fa-3x text-muted mb-2"></i>
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
            // Image preview
            document.getElementById('image').addEventListener('change', function (e) {
                const preview = document.getElementById('imagePreview');
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        preview.innerHTML = `<img src="${e.target.result}" class="img-fluid rounded" style="max-height: 200px;">`;
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            // Live preview update
            function updatePreview() {
                const title = document.getElementById('title').value || 'Banner Title';
                const subtitle = document.getElementById('subtitle').value;
                const buttonText = document.getElementById('button_text').value;
                const bgColor = document.getElementById('background_color').value;
                const textColor = document.getElementById('text_color').value;
                const btnColor = document.getElementById('button_color').value;

                const preview = document.getElementById('previewContent');
                preview.innerHTML = `
                                    <div style="background: ${bgColor}; color: ${textColor}; padding: 20px; border-radius: 8px;">
                                        <h4>${title}</h4>
                                        ${subtitle ? `<p>${subtitle}</p>` : ''}
                                        ${buttonText ? `<button class="btn" style="background: ${btnColor}; color: white; border: none; padding: 8px 16px; border-radius: 4px;">${buttonText}</button>` : ''}
                                        <div class="mt-2">
                                            <small>Banner preview (actual appearance may vary)</small>
                                        </div>
                                    </div>
                                `;
            }

            document.getElementById('title').addEventListener('input', updatePreview);
            document.getElementById('subtitle').addEventListener('input', updatePreview);
            document.getElementById('button_text').addEventListener('input', updatePreview);
            document.getElementById('background_color').addEventListener('input', updatePreview);
            document.getElementById('text_color').addEventListener('input', updatePreview);
            document.getElementById('button_color').addEventListener('input', updatePreview);
        </script>
    @endpush
@endsection