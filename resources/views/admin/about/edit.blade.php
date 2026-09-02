@extends('admin.layout.app')

@section('content')
    <div class="container py-5">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">Edit About Details</h3>
                <p class="text-muted mb-0">Update your website's about information, images, and SEO configurations.</p>
            </div>
        </div>

        <!-- Success Flash Message Support -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-4">

                        <!-- Action routes changed to match admin.about.update -->
                       <form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <!-- TITLE -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">About Title</label>
                                <input type="text" name="title" class="form-control custom-input @error('title') is-invalid @enderror" 
                                    value="{{ old('title', $about->title ?? '') }}" placeholder="Enter about section title">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- SHORT DESCRIPTION -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Short Subtitle / Hook</label>
                                <textarea name="short_description" class="form-control custom-input @error('short_description') is-invalid @enderror" rows="2"
                                    placeholder="Brief introduction copy...">{{ old('short_description', $about->short_description ?? '') }}</textarea>
                                @error('short_description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- DESCRIPTION -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Main Narrative / Content</label>
                                <textarea name="description" class="form-control custom-input @error('description') is-invalid @enderror" rows="6"
                                    placeholder="Write your main about section backstory here...">{{ old('description', $about->description ?? '') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- CURRENT IMAGE -->
                           @if(!empty($about->image))
    <div class="mb-3">
        <label class="form-label d-block">Current Image:</label>
        <!-- Bina storage/ ke direct asset call karein -->
        <img src="{{ asset($about->image) }}" class="img-thumbnail" width="150" alt="About Image">
    </div>
@endif

                            <!-- NEW IMAGE -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Update Featured Image</label>
                                <input type="file" name="image" class="form-control custom-input @error('image') is-invalid @enderror">
                                <small class="text-muted d-block mt-1">Recommended: high-resolution landscape orientation PNG or JPG.</small>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr class="text-muted my-4 opacity-25">
                            <h5 class="fw-bold mb-3 text-secondary">Search Engine Optimization (SEO)</h5>

                            <!-- META TITLE -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">SEO Meta Title</label>
                                <input type="text" name="meta_title" class="form-control custom-input"
                                    value="{{ old('meta_title', $about->meta_title ?? '') }}" placeholder="Custom browser tab headline title">
                            </div>

                            <!-- META DESCRIPTION -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">SEO Meta Description</label>
                                <textarea name="meta_description" class="form-control custom-input" rows="3"
                                    placeholder="Snippet summaries displayed on Google search results pages.">{{ old('meta_description', $about->meta_description ?? '') }}</textarea>
                            </div>

                            <!-- META KEYWORDS -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">SEO Meta Keywords</label>
                                <input type="text" name="meta_keywords" class="form-control custom-input"
                                    value="{{ old('meta_keywords', $about->meta_keywords ?? '') }}" placeholder="company details, brand story, target market values">
                            </div>

                            <!-- SAVE ACTION -->
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary px-5 py-2 fw-semibold shadow-sm rounded-3">
                                    Save Changes
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