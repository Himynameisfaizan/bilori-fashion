@extends('admin.layout.app')

@section('content')
    <div class="container py-5">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">Edit Category</h3>
                <p class="text-muted mb-0">Update your category details</p>
            </div>
            <a href="{{ route('admin.category.index') }}" class="btn btn-outline-secondary">
                ← Back
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-4">

                        <form action="{{ route('admin.category.update', $category->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Name -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Category Name</label>
                                <input type="text" name="name" id="name" class="form-control custom-input"
                                    value="{{ old('name', $category->name) }}">
                            </div>

                            <!-- Slug -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control custom-input"
                                    value="{{ old('slug', $category->slug) }}">
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Description</label>
                                <textarea name="description" class="form-control custom-input"
                                    rows="3">{{ old('description', $category->description) }}</textarea>
                            </div>

                            <!-- Parent -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Parent Category</label>
                                <select name="parent_id" class="form-select custom-input">
                                    <option value="">Top Level</option>
                                    @foreach($categories ?? [] as $cat)
                                        @if($cat->id != $category->id)
                                            <option value="{{ $cat->id }}" {{ old('parent_id', $category->parent_id) == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <!-- Image -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Category Image</label>

                                <div class="upload-box text-center" onclick="document.getElementById('image').click()">
                                    <div id="previewBox">
                                        @if($category->image)
                                            <img src="{{ asset('storage/' . $category->image) }}" class="img-fluid rounded"
                                                style="max-width:120px;">
                                        @else
                                            <i class="bi bi-cloud-upload fs-2 text-muted"></i>
                                            <p class="text-muted small mt-2">Click to upload</p>
                                        @endif
                                    </div>
                                    <input type="file" name="image" id="image" hidden>
                                </div>

                                @if($category->image)
                                    <div class="form-check mt-2">
                                        <input type="checkbox" name="remove_image" value="1" class="form-check-input">
                                        <label class="form-check-label text-danger">Remove Image</label>
                                    </div>
                                @endif
                            </div>

                            <!-- SEO -->
                            <div class="card border-0 shadow-sm rounded-4 mt-4">
                                <div class="card-body">
                                    <h5 class="fw-bold mb-3">SEO Settings</h5>

                                    <div class="mb-3">
                                        <label class="form-label">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control custom-input"
                                            value="{{ old('meta_title', $category->meta_title) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Meta Keywords</label>
                                        <input type="text" name="meta_key" class="form-control custom-input"
                                            value="{{ old('meta_key', $category->meta_key) }}">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Meta Description</label>
                                        <textarea name="meta_desc" class="form-control custom-input"
                                            rows="3">{{ old('meta_desc', $category->meta_desc) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <button class="btn btn-light">Cancel</button>
                                <button type="submit" class="btn btn-primary px-4">Update</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


@push('styles')
    <style>
        body {
            background: #f6f8fb;
        }

        .custom-input {
            border-radius: 10px;
            border: 1px solid #e5e9f2;
        }

        .custom-input:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.1);
        }

        .upload-box {
            border: 2px dashed #dee2e6;
            padding: 25px;
            border-radius: 12px;
            cursor: pointer;
        }

        .upload-box:hover {
            border-color: #0d6efd;
        }
    </style>
@endpush


@push('scripts')
    <script>
        // slug auto
        document.getElementById('name').addEventListener('input', function () {
            document.getElementById('slug').value =
                this.value.toLowerCase().replace(/[^a-z0-9]+/g, '-');
        });

        // image preview
        document.getElementById('image').addEventListener('change', function () {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('previewBox').innerHTML =
                    `<img src="${e.target.result}" class="img-fluid rounded" style="max-width:120px;">`;
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endpush