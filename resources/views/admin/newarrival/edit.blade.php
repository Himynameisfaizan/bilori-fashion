@extends('admin.layout.app')

@section('title', 'Edit Banner')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Edit Banner</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 mt-2">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.banners.index') }}">Banners</a></li>
                        <li class="breadcrumb-item active">Edit Banner</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="{{ route('admin.banners.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Back to Banners
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-3">
                                <i class="fas fa-image text-primary"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-0 fw-semibold">Edit Banner Information</h5>
                                <p class="text-muted small mb-0">Update the banner details below</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <!-- Title -->
                                <div class="col-12">
                                    <label for="title" class="form-label fw-semibold">
                                        Banner Title <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-heading text-muted"></i>
                                        </span>
                                        <input type="text" name="title" id="title"
                                            class="form-control border-start-0 @error('title') is-invalid @enderror"
                                            placeholder="Enter banner title" value="{{ old('title', $banner->title) }}"
                                            required>
                                    </div>
                                    @error('title')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Subtitle -->
                                <div class="col-12">
                                    <label for="subtitle" class="form-label fw-semibold">Subtitle</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-align-left text-muted"></i>
                                        </span>
                                        <textarea name="subtitle" id="subtitle"
                                            class="form-control border-start-0 @error('subtitle') is-invalid @enderror"
                                            rows="2"
                                            placeholder="Enter banner subtitle">{{ old('subtitle', $banner->subtitle) }}</textarea>
                                    </div>
                                    @error('subtitle')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Current Image Display -->
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Current Banner Image</label>
                                    <div class="border rounded-3 p-3 bg-light">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('storage/' . $banner->image) }}"
                                                    alt="{{ $banner->title }}" class="rounded-3"
                                                    style="width: 150px; height: 100px; object-fit: cover;">
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remove_image"
                                                        id="remove_image" value="1">
                                                    <label class="form-check-label text-danger" for="remove_image">
                                                        <i class="fas fa-trash-alt me-1"></i> Remove current image
                                                    </label>
                                                </div>
                                                <small class="text-muted">Current image will be replaced if you upload a new
                                                    one</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- New Banner Image -->
                                <div class="col-12">
                                    <label for="image" class="form-label fw-semibold">Upload New Image (Optional)</label>
                                    <input type="file" name="image" id="image"
                                        class="form-control @error('image') is-invalid @enderror" accept="image/*">
                                    <div id="imagePreview" class="mt-2"></div>
                                    @error('image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Recommended size: 1920x600px. Supported formats: JPG, PNG,
                                        GIF, WEBP (Max: 2MB)</small>
                                </div>

                                <!-- Link & Button -->
                                <div class="col-md-6">
                                    <label for="link" class="form-label fw-semibold">Banner Link (URL)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-link text-muted"></i>
                                        </span>
                                        <input type="url" name="link" id="link"
                                            class="form-control border-start-0 @error('link') is-invalid @enderror"
                                            placeholder="https://example.com" value="{{ old('link', $banner->link) }}">
                                    </div>
                                    @error('link')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="button_text" class="form-label fw-semibold">Button Text</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-mouse-pointer text-muted"></i>
                                        </span>
                                        <input type="text" name="button_text" id="button_text"
                                            class="form-control border-start-0 @error('button_text') is-invalid @enderror"
                                            placeholder="Shop Now" value="{{ old('button_text', $banner->button_text) }}">
                                    </div>
                                    @error('button_text')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Position & Order -->
                                <div class="col-md-6">
                                    <label for="position" class="form-label fw-semibold">
                                        Banner Position <span class="text-danger">*</span>
                                    </label>
                                    <select name="position" id="position"
                                        class="form-select @error('position') is-invalid @enderror" required>
                                        <option value="">Select Position</option>
                                        @foreach($positions as $position)
                                            <option value="{{ $position }}" {{ old('position', $banner->position) == $position ? 'selected' : '' }}>
                                                {{ ucfirst(str_replace('_', ' ', $position)) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('position')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="order" class="form-label fw-semibold">Display Order</label>
                                    <input type="number" name="order" id="order"
                                        class="form-control @error('order') is-invalid @enderror" placeholder="0"
                                        value="{{ old('order', $banner->order) }}">
                                    @error('order')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Lower numbers appear first</small>
                                </div>

                                <!-- Link Target -->
                                <div class="col-md-6">
                                    <label for="target" class="form-label fw-semibold">Open Link In</label>
                                    <select name="target" id="target" class="form-select">
                                        <option value="_self" {{ old('target', $banner->target) == '_self' ? 'selected' : '' }}>
                                            Same Window
                                        </option>
                                        <option value="_blank" {{ old('target', $banner->target) == '_blank' ? 'selected' : '' }}>
                                            New Window
                                        </option>
                                    </select>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label for="status" class="form-label fw-semibold">
                                        Status <span class="text-danger">*</span>
                                    </label>
                                    <select name="status" id="status"
                                        class="form-select @error('status') is-invalid @enderror" required>
                                        <option value="active" {{ old('status', $banner->status) == 'active' ? 'selected' : '' }}>
                                            Active
                                        </option>
                                        <option value="inactive" {{ old('status', $banner->status) == 'inactive' ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Schedule Dates -->
                                <div class="col-md-6">
                                    <label for="start_date" class="form-label fw-semibold">Start Date</label>
                                    <input type="datetime-local" name="start_date" id="start_date"
                                        class="form-control @error('start_date') is-invalid @enderror"
                                        value="{{ old('start_date', $banner->start_date ? date('Y-m-d\TH:i', strtotime($banner->start_date)) : '') }}">
                                    @error('start_date')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Leave empty for immediate start</small>
                                </div>

                                <div class="col-md-6">
                                    <label for="end_date" class="form-label fw-semibold">End Date</label>
                                    <input type="datetime-local" name="end_date" id="end_date"
                                        class="form-control @error('end_date') is-invalid @enderror"
                                        value="{{ old('end_date', $banner->end_date ? date('Y-m-d\TH:i', strtotime($banner->end_date)) : '') }}">
                                    @error('end_date')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Leave empty for no end date</small>
                                </div>

                                <!-- Color Settings -->
                                <div class="col-12">
                                    <hr>
                                    <h6 class="fw-semibold">Color Settings (Optional)</h6>
                                    <p class="text-muted small">Customize the banner appearance</p>
                                </div>

                                <div class="col-md-4">
                                    <label for="background_color" class="form-label fw-semibold">Background Color</label>
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="color" name="background_color" id="background_color"
                                            class="form-control form-control-color" style="width: 60px; height: 38px;"
                                            value="{{ old('background_color', $banner->background_color ?? '#000000') }}">
                                        <input type="text" class="form-control"
                                            value="{{ old('background_color', $banner->background_color ?? '#000000') }}"
                                            id="background_color_text" placeholder="#000000">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="text_color" class="form-label fw-semibold">Text Color</label>
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="color" name="text_color" id="text_color"
                                            class="form-control form-control-color" style="width: 60px; height: 38px;"
                                            value="{{ old('text_color', $banner->text_color ?? '#ffffff') }}">
                                        <input type="text" class="form-control"
                                            value="{{ old('text_color', $banner->text_color ?? '#ffffff') }}"
                                            id="text_color_text" placeholder="#ffffff">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="button_color" class="form-label fw-semibold">Button Color</label>
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="color" name="button_color" id="button_color"
                                            class="form-control form-control-color" style="width: 60px; height: 38px;"
                                            value="{{ old('button_color', $banner->button_color ?? '#007bff') }}">
                                        <input type="text" class="form-control"
                                            value="{{ old('button_color', $banner->button_color ?? '#007bff') }}"
                                            id="button_color_text" placeholder="#007bff">
                                    </div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="mt-4 pt-3 border-top">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> Update Banner
                                    </button>
                                    <button type="reset" class="btn btn-outline-secondary">
                                        <i class="fas fa-undo-alt me-1"></i> Reset
                                    </button>
                                    <a href="{{ route('admin.banners.index') }}" class="btn btn-light">
                                        <i class="fas fa-times me-1"></i> Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Banner Info Card -->
                <div class="card shadow-sm border-0 rounded-3 mb-4">
                    <div class="card-body p-4">
                        <h6 class="fw-semibold mb-3">
                            <i class="fas fa-info-circle me-2"></i> Banner Information
                        </h6>
                        <div class="mb-3">
                            <small class="text-muted d-block">Created</small>
                            <strong>{{ $banner->created_at->format('M d, Y h:i A') }}</strong>
                            <br>
                            <small class="text-muted">{{ $banner->created_at->diffForHumans() }}</small>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted d-block">Last Updated</small>
                            <strong>{{ $banner->updated_at->format('M d, Y h:i A') }}</strong>
                            <br>
                            <small class="text-muted">{{ $banner->updated_at->diffForHumans() }}</small>
                        </div>
                        <div>
                            <small class="text-muted d-block">Banner ID</small>
                            <strong>#{{ $banner->id }}</strong>
                        </div>
                    </div>
                </div>

                <!-- Tips Card -->
                <div class="card shadow-sm border-0 rounded-3 mb-4 bg-primary bg-opacity-5">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-3">
                                <i class="fas fa-lightbulb text-primary"></i>
                            </div>
                            <h6 class="card-title fw-semibold mb-0">Banner Tips</h6>
                        </div>
                        <ul class="list-unstyled small mb-0">
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

                <!-- Live Preview Card -->
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body p-4">
                        <h6 class="fw-semibold mb-3">
                            <i class="fas fa-eye me-2"></i> Live Preview
                        </h6>
                        <div id="livePreview" class="border rounded-3 p-3 text-center" style="background: #f8f9fa;">
                            <div id="previewContent">
                                <div
                                    style="background: {{ $banner->background_color ?? '#000000' }}; color: {{ $banner->text_color ?? '#ffffff' }}; padding: 20px; border-radius: 8px;">
                                    <h4>{{ $banner->title }}</h4>
                                    @if($banner->subtitle)
                                        <p>{{ $banner->subtitle }}</p>
                                    @endif
                                    @if($banner->button_text)
                                        <button class="btn"
                                            style="background: {{ $banner->button_color ?? '#007bff' }}; color: white; border: none; padding: 8px 16px; border-radius: 4px;">
                                            {{ $banner->button_text }}
                                        </button>
                                    @endif
                                    <div class="mt-2">
                                        <small>Banner preview (actual appearance may vary)</small>
                                    </div>
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
            // Color picker sync with text inputs
            const bgColor = document.getElementById('background_color');
            const bgColorText = document.getElementById('background_color_text');
            const textColor = document.getElementById('text_color');
            const textColorText = document.getElementById('text_color_text');
            const btnColor = document.getElementById('button_color');
            const btnColorText = document.getElementById('button_color_text');

            bgColor.addEventListener('input', () => bgColorText.value = bgColor.value);
            bgColorText.addEventListener('input', () => bgColor.value = bgColorText.value);

            textColor.addEventListener('input', () => textColorText.value = textColor.value);
            textColorText.addEventListener('input', () => textColor.value = textColorText.value);

            btnColor.addEventListener('input', () => btnColorText.value = btnColor.value);
            btnColorText.addEventListener('input', () => btnColor.value = btnColorText.value);

            // New image preview
            document.getElementById('image').addEventListener('change', function (e) {
                const preview = document.getElementById('imagePreview');
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        preview.innerHTML = `<img src="${e.target.result}" class="img-fluid rounded mt-2" style="max-height: 200px;">`;
                    }
                    reader.readAsDataURL(this.files[0]);
                } else {
                    preview.innerHTML = '';
                }
            });

            // Remove image checkbox - clear preview
            document.getElementById('remove_image').addEventListener('change', function (e) {
                if (this.checked) {
                    const preview = document.getElementById('imagePreview');
                    preview.innerHTML = '<div class="alert alert-info mt-2">Current image will be removed on update</div>';
                    document.getElementById('image').value = '';
                } else {
                    document.getElementById('imagePreview').innerHTML = '';
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
                        <h4>${escapeHtml(title)}</h4>
                        ${subtitle ? `<p>${escapeHtml(subtitle)}</p>` : ''}
                        ${buttonText ? `<button class="btn" style="background: ${btnColor}; color: white; border: none; padding: 8px 16px; border-radius: 4px;">${escapeHtml(buttonText)}</button>` : ''}
                        <div class="mt-2">
                            <small>Banner preview (actual appearance may vary)</small>
                        </div>
                    </div>
                `;
            }

            // Helper function to escape HTML
            function escapeHtml(text) {
                const div = document.createElement('div');
                div.textContent = text;
                return div.innerHTML;
            }

            // Add event listeners for live preview
            document.getElementById('title').addEventListener('input', updatePreview);
            document.getElementById('subtitle').addEventListener('input', updatePreview);
            document.getElementById('button_text').addEventListener('input', updatePreview);
            document.getElementById('background_color').addEventListener('input', updatePreview);
            document.getElementById('text_color').addEventListener('input', updatePreview);
            document.getElementById('button_color').addEventListener('input', updatePreview);
            document.getElementById('background_color_text').addEventListener('input', updatePreview);
            document.getElementById('text_color_text').addEventListener('input', updatePreview);
            document.getElementById('button_color_text').addEventListener('input', updatePreview);

            // Form validation
            document.querySelector('form').addEventListener('submit', function (e) {
                const title = document.getElementById('title').value;
                const position = document.getElementById('position').value;

                if (!title) {
                    e.preventDefault();
                    alert('Please enter banner title');
                    return false;
                }

                if (!position) {
                    e.preventDefault();
                    alert('Please select banner position');
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

            .form-control-color {
                padding: 0.25rem;
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