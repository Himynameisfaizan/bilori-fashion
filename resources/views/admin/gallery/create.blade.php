@extends('admin.layout.app')

@section('title', 'Upload Images to Gallery')

@section('content')
    <div class="container-fluid px-4">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <!-- <h1 class="h3 mb-0 text-gray-800">Upload Images to Gallery</h1> -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 mt-2">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.gallery.index') }}">Gallery</a></li>
                        <li class="breadcrumb-item active">Upload Images</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Back to Gallery
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-3">
                                <i class="fas fa-cloud-upload-alt text-light"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-0 fw-semibold">Upload New Images</h5><br>
                                <p class="text-muted small mb-0">Select one or more images to upload to your gallery</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data"
                            id="uploadForm">
                            @csrf

                            <!-- Image Name -->
                            <div class="mb-4">
                                <label for="image_name" class="form-label fw-semibold">
                                    Image Name <span class="text-muted">(Optional)</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="fas fa-tag text-muted"></i>
                                    </span>
                                    <input type="text" name="image_name" id="image_name"
                                        class="form-control border-start-0 @error('image_name') is-invalid @enderror"
                                        placeholder="Enter a name for the image(s)" value="{{ old('image_name') }}">
                                </div>
                                @error('image_name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">
                                    <i class="fas fa-info-circle me-1"></i>
                                    If left empty, the original filename will be used. For multiple images, this name will
                                    be used as a prefix.
                                </small>
                            </div>

                            <!-- File Input -->
                            <div class="mb-4">
                                <label for="images" class="form-label fw-semibold">
                                    Select Images <span class="text-danger">*</span>
                                </label>
                                <div class="dropzone-area border rounded-3 p-4 text-center bg-light" id="dropzoneArea">
                                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                    <p class="mb-2">Drag & drop images here or click to browse</p>
                                    <small class="text-muted">Supported formats: JPG, PNG, GIF, WEBP (Max: 2MB each)</small>
                                    <input type="file" name="images[]" id="images"
                                        class="form-control mt-3 @error('images.*') is-invalid @enderror" multiple
                                        accept="image/*" style="display: none;" required>
                                    <button type="button" class="btn btn-primary btn-sm mt-3" id="browseBtn">
                                        <i class="fas fa-folder-open me-1"></i> Browse Files
                                    </button>
                                </div>
                                @error('images.*')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                @error('images')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Image Preview Section -->
                            <div id="imagePreviewContainer" style="display: none;">
                                <label class="form-label fw-semibold">Image Preview</label>
                                <div id="imagePreview" class="row g-3 mb-4"></div>
                            </div>

                            <!-- Upload Progress Bar -->
                            <div id="uploadProgress" style="display: none;">
                                <label class="form-label fw-semibold">Upload Progress</label>
                                <div class="progress">
                                    <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated"
                                        role="progressbar" style="width: 0%">0%</div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="mt-4 pt-3 border-top">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary" id="submitBtn">
                                        <i class="fas fa-upload me-1"></i> Upload Images
                                    </button>
                                    <button type="reset" class="btn btn-outline-secondary" id="resetBtn">
                                        <i class="fas fa-undo-alt me-1"></i> Reset
                                    </button>
                                    <a href="{{ route('admin.gallery.index') }}" class="btn btn-light">
                                        <i class="fas fa-times me-1"></i> Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Upload Tips Card -->
                <div class="card shadow-sm border-0 rounded-3 mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3 ml-1">
                            <div class="rounded-circle bg-info bg-opacity-10 p-2 me-3">
                                <i class="fas fa-lightbulb text-light"></i>
                            </div>
                            <h6 class="card-title fw-semibold mb-0">Upload Tips</h6>
                        </div>
                        <ul class="list-unstyled small mb-0">
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Use high-quality images for better display
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Recommended size: 800x800px or larger
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Supported formats: JPG, PNG, GIF, WEBP
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Maximum file size: 2MB per image
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-success me-2"></i>
                                You can upload multiple images at once
                            </li>
                            <li>
                                <i class="fas fa-check-circle text-success me-2"></i>
                                Drag & drop support for easy uploading
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Requirements Card -->
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body p-4">
                        <h6 class="fw-semibold mb-3">
                            <i class="fas fa-info-circle me-2"></i> Image Requirements
                        </h6>
                        <div class="table-responsive">
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <td><i class="fas fa-image text-primary me-2"></i> Format:</td>
                                    <td class="text-end">JPG, PNG, GIF, WEBP</td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-weight-hanging text-primary me-2"></i> Max Size:</td>
                                    <td class="text-end">2 MB per image</td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-expand text-primary me-2"></i> Recommended:</td>
                                    <td class="text-end">800x800px or larger</td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-layer-group text-primary me-2"></i> Max Files:</td>
                                    <td class="text-end">No limit</td>
                                </tr>
                            </table>
                        </div>
                        <hr>
                        <div class="text-center">
                            <i class="fas fa-database fa-2x text-muted mb-2"></i>
                            <p class="small text-muted mb-0">All images are stored securely and optimized for web display
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // DOM Elements
            const fileInput = document.getElementById('images');
            const browseBtn = document.getElementById('browseBtn');
            const dropzoneArea = document.getElementById('dropzoneArea');
            const previewContainer = document.getElementById('imagePreviewContainer');
            const imagePreview = document.getElementById('imagePreview');
            const uploadForm = document.getElementById('uploadForm');
            const submitBtn = document.getElementById('submitBtn');
            const resetBtn = document.getElementById('resetBtn');
            const uploadProgress = document.getElementById('uploadProgress');
            const progressBar = document.getElementById('progressBar');

            // Browse button click
            browseBtn.addEventListener('click', () => {
                fileInput.click();
            });

            // File input change
            fileInput.addEventListener('change', function (e) {
                handleFiles(this.files);
            });

            // Drag & drop functionality
            dropzoneArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropzoneArea.classList.add('border-primary', 'bg-primary', 'bg-opacity-10');
            });

            dropzoneArea.addEventListener('dragleave', (e) => {
                e.preventDefault();
                dropzoneArea.classList.remove('border-primary', 'bg-primary', 'bg-opacity-10');
            });

            dropzoneArea.addEventListener('drop', (e) => {
                e.preventDefault();
                dropzoneArea.classList.remove('border-primary', 'bg-primary', 'bg-opacity-10');
                const files = e.dataTransfer.files;
                fileInput.files = files;
                handleFiles(files);
            });

            // Handle selected files
            function handleFiles(files) {
                if (files.length === 0) return;

                imagePreview.innerHTML = '';

                Array.from(files).forEach((file, index) => {
                    // Validate file type
                    const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                    if (!validTypes.includes(file.type)) {
                        showError(`File "${file.name}" is not a valid image format`);
                        return;
                    }

                    // Validate file size (2MB = 2 * 1024 * 1024 bytes)
                    if (file.size > 2 * 1024 * 1024) {
                        showError(`File "${file.name}" exceeds 2MB limit`);
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const col = document.createElement('div');
                        col.className = 'col-md-4 col-sm-6';
                        col.innerHTML = `
                                                                                                    <div class="card h-100 border-0 shadow-sm">
                                                                                                        <img src="${e.target.result}" class="card-img-top" style="height: 150px; object-fit: cover;">
                                                                                                        <div class="card-body p-2">
                                                                                                            <p class="small text-muted mb-0 text-truncate" title="${file.name}">${file.name}</p>
                                                                                                            <small class="text-muted">${(file.size / 1024).toFixed(2)} KB</small>
                                                                                                            <button type="button" class="btn btn-sm btn-danger float-end remove-image" data-index="${index}">
                                                                                                                <i class="fas fa-times"></i>
                                                                                                            </button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                `;
                        imagePreview.appendChild(col);
                    }
                    reader.readAsDataURL(file);
                });

                previewContainer.style.display = files.length > 0 ? 'block' : 'none';

                // Add remove image functionality
                document.querySelectorAll('.remove-image').forEach(btn => {
                    btn.addEventListener('click', function () {
                        const index = this.dataset.index;
                        removeFile(index);
                    });
                });
            }

            // Remove file from selection
            function removeFile(index) {
                const dt = new DataTransfer();
                const files = Array.from(fileInput.files);
                files.splice(index, 1);
                files.forEach(file => dt.items.add(file));
                fileInput.files = dt.files;
                handleFiles(fileInput.files);
            }

            // Show error message
            function showError(message) {
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-danger alert-dismissible fade show';
                alertDiv.innerHTML = `
                                                                                            ${message}
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                                                        `;
                dropzoneArea.parentNode.insertBefore(alertDiv, dropzoneArea.nextSibling);
                setTimeout(() => alertDiv.remove(), 3000);
            }

            // Show success message
            function showSuccess(message) {
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-success alert-dismissible fade show';
                alertDiv.innerHTML = `
                                                                                            ${message}
                                                                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                                                                        `;
                dropzoneArea.parentNode.insertBefore(alertDiv, dropzoneArea.nextSibling);
                setTimeout(() => alertDiv.remove(), 3000);
            }

            // Form submission with progress
            uploadForm.addEventListener('submit', function (e) {
                if (fileInput.files.length === 0) {
                    e.preventDefault();
                    showError('Please select at least one image to upload');
                    return false;
                }

                // Show progress bar
                uploadProgress.style.display = 'block';
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Uploading...';

                // Simulate progress (actual progress would require AJAX)
                let progress = 0;
                const interval = setInterval(() => {
                    progress += 10;
                    progressBar.style.width = progress + '%';
                    progressBar.textContent = progress + '%';
                    if (progress >= 100) clearInterval(interval);
                }, 200);
            });

            // Reset form
            resetBtn.addEventListener('click', function () {
                fileInput.value = '';
                imagePreview.innerHTML = '';
                previewContainer.style.display = 'none';
                document.getElementById('image_name').value = '';
                uploadProgress.style.display = 'none';
                progressBar.style.width = '0%';
                progressBar.textContent = '0%';
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-upload me-1"></i> Upload Images';
            });

            // Display old values if any (after validation error)
            @if(old('image_name'))
                document.getElementById('image_name').value = '{{ old('image_name') }}';
            @endif
        </script>
    @endpush

    @push('styles')
        <style>
            .dropzone-area {
                transition: all 0.3s ease;
                cursor: pointer;
                border: 2px dashed #dee2e6;
            }

            .dropzone-area:hover {
                border-color: #007bff;
                background-color: #f8f9fa;
            }

            .remove-image {
                position: absolute;
                top: 5px;
                right: 5px;
                width: 25px;
                height: 25px;
                padding: 0;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .card-img-top {
                border-top-left-radius: 8px;
                border-top-right-radius: 8px;
            }

            .progress {
                height: 30px;
                border-radius: 15px;
            }

            .progress-bar {
                font-size: 12px;
                line-height: 30px;
                font-weight: 600;
            }

            .bg-opacity-10 {
                --bs-bg-opacity: 0.1;
            }
        </style>
    @endpush
@endsection