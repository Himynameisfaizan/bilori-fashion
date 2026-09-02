@extends('admin.layout.app')

@section('title', 'Gallery Management')

@section('content')
    <div class="container-fluid px-4">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <!-- <h1 class="h3 mb-0 text-gray-800">Gallery Management</h1> -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 mt-2">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Gallery</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i> Upload Images
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-lg-6 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $stats['total'] }}</h3>
                        <p>Total Images</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-images"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $stats['recent'] }}</h3>
                        <p>Uploaded Last 7 Days</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar-week"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <div>
                        <h5 class="card-title mb-0 fw-semibold">All Images</h5><br>
                        <p class="text-muted small mb-0">Manage your gallery images</p>
                    </div>
                    <div class="d-flex gap-2">
                        <div class="input-group input-group-sm" style="width: 250px;">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" id="searchInput" class="form-control border-start-0"
                                placeholder="Search images...">
                        </div>
                        <button type="button" id="refreshBtn" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                        <button type="button" id="bulkDeleteBtn" class="btn btn-sm btn-danger" style="display: none;">
                            <i class="fas fa-trash"></i> Delete Selected
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body p-4">
                @if($images->count() > 0)
                    <div class="row g-4" id="galleryGrid">
                        @foreach($images as $image)
                            <div class="col-md-3 col-sm-6 gallery-item" data-name="{{ $image->image_name }}">
                                <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                                    <div class="position-relative">
                                        <input type="checkbox" class="image-checkbox position-absolute top-0 start-0 m-2 z-1"
                                            style="width: 20px; height: 20px; display: none;" data-id="{{ $image->id }}">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->image_name }}"
                                            class="card-img-top" style="height: 200px; object-fit: cover; cursor: pointer;"
                                            data-bs-toggle="modal" data-bs-target="#imageModal"
                                            data-image="{{ asset('storage/' . $image->image_path) }}"
                                            data-name="{{ $image->image_name }}" data-id="{{ $image->id }}">
                                        <div class="position-absolute bottom-0 end-0 m-2">
                                            <span class="badge bg-dark bg-opacity-75">
                                                <i class="fas fa-calendar-alt me-1"></i> {{ $image->created_at->format('M d, Y') }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <h6 class="card-title mb-1 text-truncate">{{ $image->image_name }}</h6>
                                        <div class="btn-group w-100 mt-2" role="group">
                                            <a href="{{ route('admin.gallery.edit', $image->id) }}"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <button type="button" class="btn btn-sm btn-outline-danger delete-btn"
                                                data-id="{{ $image->id }}" data-name="{{ $image->image_name }}">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-4">
                        {{ $images->links() }}
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-images fa-4x text-muted mb-3"></i>
                        <h6 class="text-muted">No images found in gallery</h6>
                        <p class="text-muted small">Click the "Upload Images" button to add your first image.</p>
                        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary btn-sm mt-2">
                            <i class="fas fa-plus me-1"></i> Upload Images
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalImageName">Image Preview</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center p-4">
                    <img id="modalImage" src="" alt="" class="img-fluid rounded" style="max-height: 500px;">
                    <div class="mt-3">
                        <p class="mb-1"><strong>Image Name:</strong> <span id="modalImageNameText"></span></p>
                        <p class="mb-0"><strong>Image ID:</strong> <span id="modalImageId"></span></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" id="editImageBtn" class="btn btn-primary">Edit Image</a>
                    <button type="button" id="deleteFromModalBtn" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-exclamation-triangle me-2"></i> Confirm Delete
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete the image <strong id="deleteImageName"></strong>?</p>
                    <p class="text-danger small mb-0">
                        <i class="fas fa-info-circle me-1"></i>
                        This action cannot be undone. The image file will be permanently removed.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Image</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Search functionality
            document.getElementById('searchInput')?.addEventListener('keyup', function () {
                let searchText = this.value.toLowerCase();
                let galleryItems = document.querySelectorAll('.gallery-item');

                galleryItems.forEach(item => {
                    let imageName = item.getAttribute('data-name').toLowerCase();
                    if (imageName.includes(searchText)) {
                        item.style.display = '';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });

            // Refresh button
            document.getElementById('refreshBtn')?.addEventListener('click', function () {
                window.location.reload();
            });

            // Image Modal
            const imageModal = document.getElementById('imageModal');
            if (imageModal) {
                const modalImage = document.getElementById('modalImage');
                const modalImageName = document.getElementById('modalImageName');
                const modalImageNameText = document.getElementById('modalImageNameText');
                const modalImageId = document.getElementById('modalImageId');
                const editImageBtn = document.getElementById('editImageBtn');
                const deleteFromModalBtn = document.getElementById('deleteFromModalBtn');

                document.querySelectorAll('[data-bs-toggle="modal"]').forEach(img => {
                    img.addEventListener('click', function () {
                        const imageUrl = this.dataset.image;
                        const imageName = this.dataset.name;
                        const imageId = this.dataset.id;

                        modalImage.src = imageUrl;
                        modalImageName.textContent = imageName;
                        modalImageNameText.textContent = imageName;
                        modalImageId.textContent = '#' + imageId;
                        editImageBtn.href = `/admin/gallery/${imageId}/edit`;

                        deleteFromModalBtn.onclick = () => {
                            const deleteForm = document.getElementById('deleteForm');
                            deleteForm.action = `/admin/gallery/${imageId}`;
                            const modal = bootstrap.Modal.getInstance(imageModal);
                            modal.hide();
                            new bootstrap.Modal(document.getElementById('deleteModal')).show();
                        };
                    });
                });
            }

            // Single Delete confirmation
            const deleteModal = document.getElementById('deleteModal');
            if (deleteModal) {
                const deleteButtons = document.querySelectorAll('.delete-btn');
                const deleteImageName = document.getElementById('deleteImageName');
                const deleteForm = document.getElementById('deleteForm');

                deleteButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        const imageId = this.getAttribute('data-id');
                        const imageName = this.getAttribute('data-name');

                        deleteImageName.textContent = imageName;
                        deleteForm.action = `/admin/gallery/${imageId}`;

                        const modal = new bootstrap.Modal(deleteModal);
                        modal.show();
                    });
                });
            }

            // Bulk delete functionality
            const checkboxes = document.querySelectorAll('.image-checkbox');
            const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');

            function updateBulkDeleteButton() {
                const checkedCount = document.querySelectorAll('.image-checkbox:checked').length;
                if (checkedCount > 0) {
                    bulkDeleteBtn.style.display = 'block';
                    bulkDeleteBtn.innerHTML = `<i class="fas fa-trash"></i> Delete Selected (${checkedCount})`;
                } else {
                    bulkDeleteBtn.style.display = 'none';
                }
            }

            // Enable selection mode
            let selectionMode = false;
            document.addEventListener('keydown', (e) => {
                if (e.ctrlKey && e.key === 'a') {
                    e.preventDefault();
                    selectionMode = !selectionMode;
                    checkboxes.forEach(checkbox => {
                        checkbox.style.display = selectionMode ? 'block' : 'none';
                        if (!selectionMode) checkbox.checked = false;
                    });
                    updateBulkDeleteButton();
                }
            });

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateBulkDeleteButton);
            });

            if (bulkDeleteBtn) {
                bulkDeleteBtn.addEventListener('click', function () {
                    const selectedIds = [];
                    document.querySelectorAll('.image-checkbox:checked').forEach(checkbox => {
                        selectedIds.push(checkbox.dataset.id);
                    });

                    if (selectedIds.length > 0 && confirm(`Are you sure you want to delete ${selectedIds.length} image(s)?`)) {
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = '/admin/gallery/bulk-delete';
                        form.innerHTML = `
                                                                                                            @csrf
                                                                                                            @method('DELETE')
                                                                                                            <input type="hidden" name="image_ids" value='${JSON.stringify(selectedIds)}'>
                                                                                                        `;
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            }

            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        </script>
    @endpush

    @push('styles')
        <style>
            .gallery-item {
                transition: transform 0.2s ease;
            }

            .gallery-item:hover {
                transform: translateY(-5px);
            }

            .card-img-top {
                transition: transform 0.3s ease;
            }

            .card-img-top:hover {
                transform: scale(1.05);
            }

            .small-box {
                border-radius: 10px;
                transition: transform 0.3s ease;
            }

            .small-box:hover {
                transform: translateY(-5px);
            }
        </style>
    @endpush
@endsection