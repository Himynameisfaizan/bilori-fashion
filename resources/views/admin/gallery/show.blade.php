@extends('admin.layout.app')

@section('title', 'View Image')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Image Details</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 mt-2">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.gallery.index') }}">Gallery</a></li>
                        <li class="breadcrumb-item active">View Image</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="{{ route('admin.gallery.edit', $image->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit me-1"></i> Edit Image
                </a>
                <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Back to Gallery
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body p-4 text-center">
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->image_name }}"
                            class="img-fluid rounded mb-4" style="max-height: 500px;">

                        <h4>{{ $image->image_name }}</h4>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="border rounded-3 p-3">
                                    <small class="text-muted d-block">Image ID</small>
                                    <strong>#{{ $image->id }}</strong>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="border rounded-3 p-3">
                                    <small class="text-muted d-block">Created At</small>
                                    <strong>{{ $image->created_at->format('F d, Y h:i A') }}</strong>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="border rounded-3 p-3">
                                    <small class="text-muted d-block">Last Updated</small>
                                    <strong>{{ $image->updated_at->format('F d, Y h:i A') }}</strong>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="border rounded-3 p-3">
                                    <small class="text-muted d-block">Image Path</small>
                                    <strong class="small">{{ $image->image_path }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="button" class="btn btn-danger delete-btn" data-id="{{ $image->id }}"
                                data-name="{{ $image->image_name }}">
                                <i class="fas fa-trash me-1"></i> Delete Image
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
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
                    <p class="text-danger small mb-0">This action cannot be undone!</p>
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
            const deleteModal = document.getElementById('deleteModal');
            const deleteBtn = document.querySelector('.delete-btn');
            const deleteImageName = document.getElementById('deleteImageName');
            const deleteForm = document.getElementById('deleteForm');

            if (deleteBtn) {
                deleteBtn.addEventListener('click', function () {
                    const imageId = this.dataset.id;
                    const imageName = this.dataset.name;
                    deleteImageName.textContent = imageName;
                    deleteForm.action = `/admin/gallery/${imageId}`;
                    new bootstrap.Modal(deleteModal).show();
                });
            }
        </script>
    @endpush
@endsection