@extends('admin.layout.app')

@section('content')
    <div class="container py-5">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">Edit About Details</h3>
                <p class="text-muted mb-0">Update your website's about information, masonry images, artisan vision, and SEO configurations.</p>
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
            <div class="col-lg-9">

                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-4">

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

                            <!-- SUBTITLE -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Subtitle / Brand Tagline</label>
                                <input type="text" name="subtitle" class="form-control custom-input @error('subtitle') is-invalid @enderror" 
                                    value="{{ old('subtitle', $about->subtitle ?? '') }}" placeholder="e.g. AT HOUSE OF KARI...">
                                @error('subtitle')
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

                            <!-- CURRENT MAIN IMAGE -->
                            @if(!empty($about->image))
                                <div class="mb-3">
                                    <label class="form-label d-block">Current Featured Image:</label>
                                    <img src="{{ asset($about->image) }}" class="img-thumbnail" width="150" alt="About Image">
                                </div>
                            @endif

                            <!-- NEW MAIN IMAGE -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Update Featured Image</label>
                                <input type="file" name="image" class="form-control custom-input @error('image') is-invalid @enderror">
                                <small class="text-muted d-block mt-1">Recommended: high-resolution landscape orientation PNG or JPG.</small>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr class="text-muted my-4 opacity-25">
                            <h5 class="fw-bold mb-3 text-secondary">Masonry Image Grid (Gallery)</h5>

                            <!-- CURRENT GALLERY IMAGES -->
                       @if(!empty($about->gallery_images) && is_array($about->gallery_images))
                                <div class="mb-3">
                                    <label class="form-label d-block">Current Grid Images (Check to Delete):</label>
                                    <div class="d-flex flex-wrap gap-3">
                                        @foreach($about->gallery_images as $index => $gImg)
                                            <div class="position-relative text-center border p-2 rounded">
                                                <img src="{{ asset($gImg) }}" class="img-thumbnail d-block mb-2" width="100" height="100" style="object-fit: cover;" alt="Grid Image">
                                                <input type="checkbox" name="remove_gallery[]" value="{{ $index }}" id="rg_{{ $index }}" class="form-check-input border-danger">
                                                <label for="rg_{{ $index }}" class="text-danger small fw-bold">Remove</label>
                                                <input type="hidden" name="existing_gallery[{{ $index }}]" value="{{ $gImg }}">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <!-- UPLOAD GALLERY IMAGES -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Upload Masonry Gallery Images (Multiple)</label>
                                <input type="file" name="gallery_images[]" class="form-control custom-input" multiple>
                                <small class="text-muted">Select multiple images to display in the asymmetric photo grid.</small>
                            </div>

                            <hr class="text-muted my-4 opacity-25">
                            <h5 class="fw-bold mb-3 text-secondary">Vision & Artisan Section</h5>

                            <!-- VISION TITLE -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Vision Section Heading</label>
                                <input type="text" name="vision_title" class="form-control custom-input" 
                                    value="{{ old('vision_title', $about->vision_title ?? '') }}" placeholder="Enter vision block title">
                            </div>

                            <!-- VISION DESCRIPTION -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Vision Section Content</label>
                                <textarea name="vision_description" class="form-control custom-input" rows="4"
                                    placeholder="Write details about artisans and commitments...">{{ old('vision_description', $about->vision_description ?? '') }}</textarea>
                            </div>

                            <!-- CURRENT VISION IMAGES -->
                       @if(!empty($about->vision_images) && is_array($about->vision_images))
                                <div class="mb-3">
                                    <label class="form-label d-block">Current Vision Split Images (Check to Delete):</label>
                                    <div class="d-flex flex-wrap gap-3">
                                        @foreach($about->vision_images as $index => $vImg)
                                            <div class="position-relative text-center border p-2 rounded">
                                                <img src="{{ asset($vImg) }}" class="img-thumbnail d-block mb-2" width="100" height="100" style="object-fit: cover;" alt="Vision Image">
                                                <input type="checkbox" name="remove_vision[]" value="{{ $index }}" id="rv_{{ $index }}" class="form-check-input border-danger">
                                                <label for="rv_{{ $index }}" class="text-danger small fw-bold">Remove</label>
                                                <input type="hidden" name="existing_vision[{{ $index }}]" value="{{ $vImg }}">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <!-- UPLOAD VISION IMAGES -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Upload Vision Split Images (Multiple)</label>
                                <input type="file" name="vision_images[]" class="form-control custom-input" multiple>
                                <small class="text-muted">Upload side-by-side artisan photos for the rustic block.</small>
                            </div>

                            <hr class="text-muted my-4 opacity-25">
                            <h5 class="fw-bold mb-3 text-secondary">Brand Stats / Milestones</h5>
                            <p class="text-muted small mb-4">Add your brand's numerical achievements (e.g. 50+, 80K+). This is SEO optimized and does not use JS counters.</p>

                            @php
                                $stats = !empty($about->brand_stats) ? $about->brand_stats : [
                                    ['title' => '', 'value' => ''],
                                    ['title' => '', 'value' => ''],
                                    ['title' => '', 'value' => ''],
                                    ['title' => '', 'value' => '']
                                ];
                            @endphp

                            <div class="row">
                                @for($i = 0; $i < 4; $i++)
                                <div class="col-md-6 mb-4 p-3 border rounded">
                                    <h6 class="fw-semibold">Stat Block {{ $i + 1 }}</h6>
                                    <div class="mb-2">
                                        <label class="form-label small">Number / Value (e.g. 50+)</label>
                                        <input type="text" name="brand_stats[{{ $i }}][value]" class="form-control custom-input" 
                                            value="{{ $stats[$i]['value'] ?? '' }}" placeholder="e.g. 100K+">
                                    </div>
                                    <div>
                                        <label class="form-label small">Label / Title</label>
                                        <input type="text" name="brand_stats[{{ $i }}][title]" class="form-control custom-input" 
                                            value="{{ $stats[$i]['title'] ?? '' }}" placeholder="e.g. Happy Customers">
                                    </div>
                                </div>
                                @endfor
                            </div>  

                            <hr class="text-muted my-4 opacity-25">
                            <h5 class="fw-bold mb-3 text-secondary">Feature / Promise Section</h5>

                            <!-- FEATURE TITLE -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Feature Heading Banner Text</label>
                                <input type="text" name="feature_title" class="form-control custom-input" 
                                    value="{{ old('feature_title', $about->feature_title ?? '') }}" placeholder="BECAUSE AT BILORI, YOU’RE NOT JUST WEARING FASHION —">
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