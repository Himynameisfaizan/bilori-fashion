@extends('admin.layout.app')

@section('title', 'Edit Gallery Image')

@section('content')
<div class="container-fluid px-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="mb-0">Edit Gallery Image</h3>
            <small class="text-muted">Update image details</small>
        </div>

        <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary">
            ← Back
        </a>
    </div>

    <div class="row">
        <div class="col-md-8">

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Image Name -->
                        <div class="mb-3">
                            <label class="form-label">Image Name</label>
                            <input type="text" name="image_name" class="form-control"
                                   value="{{ old('image_name', $gallery->image_name) }}">
                        </div>

                        <!-- Current Image -->
                        <div class="mb-3">
                            <label class="form-label">Current Image</label><br>

                            @if($gallery->image_path)
                                <img src="{{ asset($gallery->image_path) }}"
                                     alt="Image"
                                     style="width: 200px; height: 150px; object-fit: cover; border-radius: 8px;">
                            @else
                                <p class="text-muted">No image found</p>
                            @endif
                        </div>

                        <!-- Upload New Image -->
                        <div class="mb-3">
                            <label class="form-label">Replace Image (Optional)</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <small class="text-muted">Leave empty if you don't want to change image</small>
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="btn btn-primary">
                            Update Image
                        </button>

                    </form>

                </div>
            </div>

        </div>

        <!-- Right Info Box -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h6>Tips</h6>
                    <ul class="small text-muted">
                        <li>Image name optional hai</li>
                        <li>New image upload karne par purani replace ho jayegi</li>
                        <li>Best size: 800x800px</li>
                        <li>Format: JPG, PNG, WEBP</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection