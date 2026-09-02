@extends('admin.layout.app')

@section('content')
    <div class="container py-5">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">Create Blog</h3>
                <p class="text-muted mb-0">Add a new blog post</p>
            </div>

            <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">
                ← Back
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-4">

                        <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Title -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Blog Title</label>
                                <input type="text" name="title" id="title" class="form-control custom-input"
                                    placeholder="Enter blog title">
                            </div>

                            <!-- Slug -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control custom-input"
                                    placeholder="auto-generated">
                            </div>

                            <!-- Short Description -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Short Description</label>
                                <textarea name="short_description" class="form-control custom-input" rows="2"
                                    placeholder="Short description..."></textarea>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Description</label>
                                <textarea name="description" class="form-control custom-input" rows="5"
                                    placeholder="Full blog content..."></textarea>
                            </div>

                            <!-- Image Upload -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Blog Image</label>

                                <div class="upload-box text-center" onclick="document.getElementById('image').click()">
                                    <div id="previewBox">
                                        <i class="bi bi-cloud-upload fs-2 text-muted"></i>
                                        <p class="text-muted small mt-2">Click to upload image</p>
                                    </div>
                                    <input type="file" name="image" id="image" hidden>
                                </div>
                            </div>

                            <!-- META TITLE -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control custom-input"
                                    value="{{ $blog->meta_title ?? '' }}" placeholder="SEO Title">
                            </div>

                            <!-- META DESCRIPTION -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Meta Description</label>
                                <textarea name="meta_description" class="form-control custom-input" rows="3"
                                    placeholder="SEO Description">{{ $blog->meta_description ?? '' }}</textarea>
                            </div>

                            <!-- META KEYWORDS -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Meta Keywords</label>
                                <input type="text" name="meta_keywords" class="form-control custom-input"
                                    value="{{ $blog->meta_keywords ?? '' }}" placeholder="keyword1, keyword2, keyword3">
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <button type="reset" class="btn btn-light">Reset</button>
                                <button type="submit" class="btn btn-primary px-4">Save Blog</button>
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

        .card {
            border-radius: 16px;
        }

        .custom-input {
            border-radius: 10px;
            border: 1px solid #e5e9f2;
            padding: 10px 14px;
        }

        .custom-input:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.1);
        }

        .upload-box {
            border: 2px dashed #dee2e6;
            padding: 30px;
            border-radius: 12px;
            cursor: pointer;
            transition: 0.3s;
            background: #fafbff;
        }

        .upload-box:hover {
            border-color: #0d6efd;
            background: #f1f5ff;
        }
    </style>
@endpush


@push('scripts')
    <script>
        // Slug auto generate
        document.getElementById('title').addEventListener('input', function () {
            document.getElementById('slug').value =
                this.value.toLowerCase().replace(/[^a-z0-9]+/g, '-');
        });

        // Image preview
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