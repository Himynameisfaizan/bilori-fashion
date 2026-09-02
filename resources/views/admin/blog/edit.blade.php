@extends('admin.layout.app')

@section('content')
    <div class="container py-5">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">Edit Blog</h3>
                <p class="text-muted mb-0">Update blog information</p>
            </div>

            <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">
                ← Back
            </a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-4">

                        <form method="POST" action="{{ route('admin.blogs.update', $blog->id) }}"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <!-- TITLE -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Blog Title</label>
                                <input type="text" name="title" class="form-control custom-input" value="{{ $blog->title }}"
                                    placeholder="Enter blog title">
                            </div>

                            <!-- SHORT DESCRIPTION -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Short Description</label>
                                <textarea name="short_description" class="form-control custom-input" rows="2"
                                    placeholder="Short description...">{{ $blog->short_description }}</textarea>
                            </div>

                            <!-- DESCRIPTION -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Description</label>
                                <textarea name="description" class="form-control custom-input" rows="5"
                                    placeholder="Full description...">{{ $blog->description }}</textarea>
                            </div>

                            <!-- CURRENT IMAGE -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Current Image</label><br>

                                @if($blog->image)
                                    <img src="{{ asset('storage/' . $blog->image) }}" class="rounded shadow-sm" width="120">
                                @else
                                    <p class="text-muted">No image uploaded</p>
                                @endif
                            </div>

                            <!-- NEW IMAGE -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Change Image</label>
                                <input type="file" name="image" class="form-control custom-input">
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

                            <!-- BUTTONS -->
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.blogs.index') }}" class="btn btn-light">
                                    Cancel
                                </a>

                                <button type="submit" class="btn btn-primary px-4">
                                    Update Blog
                                </button>
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
    </style>
@endpush