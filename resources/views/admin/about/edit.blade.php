@extends('admin.layout.app')

@section('content')
    <div class="container py-5">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1 text-dark"><i class="fa-solid fa-pen-to-square text-primary me-2"></i>Edit About Page</h3>
                <p class="text-muted mb-0">Drag and drop images to reorder them. Sections are divided for easier management.</p>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-3 mb-4" role="alert">
                <i class="fa-solid fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <!-- SECTION 1: HERO & INTRO -->
                    <div class="card shadow-sm border-0 rounded-4 mb-4 section-card">
                        <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                            <h5 class="fw-bold text-primary"><i class="fa-solid fa-heading me-2"></i>1. Hero & Introduction</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">About Title</label>
                                    <input type="text" name="title" class="form-control custom-input @error('title') is-invalid @enderror" 
                                        value="{{ old('title', $about->title ?? '') }}" placeholder="Enter about section title">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Subtitle / Brand Tagline</label>
                                    <input type="text" name="subtitle" class="form-control custom-input" 
                                        value="{{ old('subtitle', $about->subtitle ?? '') }}" placeholder="e.g. AT BILORI...">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Short Hook / Subtitle</label>
                                <textarea name="short_description" class="form-control custom-input" rows="2"
                                    placeholder="Brief introduction copy...">{{ old('short_description', $about->short_description ?? '') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Main Narrative / Content</label>
                                <textarea name="description" class="form-control custom-input" rows="5"
                                    placeholder="Write your main about section backstory here...">{{ old('description', $about->description ?? '') }}</textarea>
                            </div>
                            <div class="p-3 bg-light rounded-3 border">
                                <label class="form-label fw-semibold">Hero Background Image</label>
                                @if(!empty($about->image))
                                    <div class="mb-2">
                                        <img src="{{ asset($about->image) }}" class="img-thumbnail rounded" width="120" alt="Hero Image">
                                    </div>
                                @endif
                                <input type="file" name="image" class="form-control custom-input">
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 2: MASONRY GALLERY (DRAG & DROP) -->
                    <div class="card shadow-sm border-0 rounded-4 mb-4 section-card">
                        <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                            <h5 class="fw-bold text-success"><i class="fa-solid fa-images me-2"></i>2. Masonry Gallery Grid</h5>
                            <p class="small text-muted mb-0">Drag the images by the grip icon (<i class="fa-solid fa-grip-vertical"></i>) to reorder them on the website.</p>
                        </div>
                        <div class="card-body p-4">
                            @if(!empty($about->gallery_images) && is_array($about->gallery_images))
                                <div class="d-flex flex-wrap gap-3 mb-4" id="gallery-sortable">
                                    @foreach($about->gallery_images as $index => $gImg)
                                        <div class="gallery-item-card p-2 border rounded bg-white shadow-sm" style="cursor: grab; width: 120px; text-align:center;">
                                            <i class="fa-solid fa-grip-vertical text-muted mb-2 fs-5 handle"></i>
                                            <img src="{{ asset($gImg) }}" class="img-thumbnail d-block mb-2 w-100" style="height: 100px; object-fit: cover;">
                                            <div class="form-check d-flex justify-content-center align-items-center gap-2">
                                                <input type="checkbox" name="remove_gallery[]" value="{{ $gImg }}" id="rg_{{ $index }}" class="form-check-input border-danger m-0">
                                                <label for="rg_{{ $index }}" class="text-danger small fw-bold m-0" style="cursor:pointer;">Trash</label>
                                            </div>
                                            <!-- Hidden input maintains the order based on DOM position -->
                                            <input type="hidden" name="existing_gallery[]" value="{{ $gImg }}">
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <div class="p-3 bg-light rounded-3 border">
                                <label class="form-label fw-semibold">Upload New Gallery Images</label>
                                <input type="file" name="gallery_images[]" class="form-control custom-input" multiple>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 3: VISION & ARTISAN -->
                    <div class="card shadow-sm border-0 rounded-4 mb-4 section-card">
                        <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                            <h5 class="fw-bold text-warning"><i class="fa-solid fa-eye me-2"></i>3. Heritage & Vision</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Vision Heading</label>
                                <input type="text" name="vision_title" class="form-control custom-input" 
                                    value="{{ old('vision_title', $about->vision_title ?? '') }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Vision Content</label>
                                <textarea name="vision_description" class="form-control custom-input" rows="4">{{ old('vision_description', $about->vision_description ?? '') }}</textarea>
                            </div>

                            @if(!empty($about->vision_images) && is_array($about->vision_images))
                                <div class="mb-3">
                                    <label class="form-label fw-semibold d-block">Current Vision Images (Drag to sort):</label>
                                    <div class="d-flex flex-wrap gap-3" id="vision-sortable">
                                        @foreach($about->vision_images as $index => $vImg)
                                            <div class="gallery-item-card p-2 border rounded bg-white shadow-sm" style="cursor: grab; width: 120px; text-align:center;">
                                                <i class="fa-solid fa-grip-vertical text-muted mb-2 fs-5 handle"></i>
                                                <img src="{{ asset($vImg) }}" class="img-thumbnail d-block mb-2 w-100" style="height: 100px; object-fit: cover;">
                                                <div class="form-check d-flex justify-content-center align-items-center gap-2">
                                                    <input type="checkbox" name="remove_vision[]" value="{{ $vImg }}" id="rv_{{ $index }}" class="form-check-input border-danger m-0">
                                                    <label for="rv_{{ $index }}" class="text-danger small fw-bold m-0">Trash</label>
                                                </div>
                                                <input type="hidden" name="existing_vision[]" value="{{ $vImg }}">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <div class="p-3 bg-light rounded-3 border">
                                <label class="form-label fw-semibold">Upload New Vision Images</label>
                                <input type="file" name="vision_images[]" class="form-control custom-input" multiple>
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 4: BRAND STATS -->
                    <div class="card shadow-sm border-0 rounded-4 mb-4 section-card">
                        <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                            <h5 class="fw-bold text-info"><i class="fa-solid fa-chart-line me-2"></i>4. Brand Stats / Milestones</h5>
                        </div>
                        <div class="card-body p-4">
                            @php
                                $stats = !empty($about->brand_stats) ? $about->brand_stats : [
                                    ['title' => '', 'value' => ''], ['title' => '', 'value' => ''],
                                    ['title' => '', 'value' => ''], ['title' => '', 'value' => '']
                                ];
                            @endphp
                            <div class="row">
                                @for($i = 0; $i < 4; $i++)
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 bg-light border rounded">
                                        <h6 class="fw-bold mb-3 text-secondary">Stat Box {{ $i + 1 }}</h6>
                                        <div class="mb-2">
                                            <label class="form-label small">Number (e.g. 50+)</label>
                                            <input type="text" name="brand_stats[{{ $i }}][value]" class="form-control custom-input" value="{{ $stats[$i]['value'] ?? '' }}">
                                        </div>
                                        <div>
                                            <label class="form-label small">Title (e.g. Happy Customers)</label>
                                            <input type="text" name="brand_stats[{{ $i }}][title]" class="form-control custom-input" value="{{ $stats[$i]['title'] ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>
                            <div class="mt-3">
                                <label class="form-label fw-semibold">Feature / Promise Heading</label>
                                <input type="text" name="feature_title" class="form-control custom-input" 
                                    value="{{ old('feature_title', $about->feature_title ?? '') }}" placeholder="BECAUSE AT BILORI...">
                            </div>
                        </div>
                    </div>

                    <!-- SECTION 5: SEO -->
                    <div class="card shadow-sm border-0 rounded-4 mb-4 section-card">
                        <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                            <h5 class="fw-bold text-secondary"><i class="fa-solid fa-magnifying-glass me-2"></i>5. SEO Details</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">SEO Meta Title</label>
                                <input type="text" name="meta_title" class="form-control custom-input" value="{{ old('meta_title', $about->meta_title ?? '') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">SEO Meta Description</label>
                                <textarea name="meta_description" class="form-control custom-input" rows="2">{{ old('meta_description', $about->meta_description ?? '') }}</textarea>
                            </div>
                            <div class="mb-2">
                                <label class="form-label fw-semibold">SEO Meta Keywords</label>
                                <input type="text" name="meta_keywords" class="form-control custom-input" value="{{ old('meta_keywords', $about->meta_keywords ?? '') }}">
                            </div>
                        </div>
                    </div>

                    <!-- FLOATING SAVE BUTTON -->
                    <div class="sticky-bottom bg-white p-3 shadow-lg rounded-top-4 text-end border-top mt-4" style="bottom:0; z-index: 100;">
                        <button type="submit" class="btn btn-primary px-5 py-3 fw-bold shadow rounded-pill fs-5">
                            <i class="fa-solid fa-floppy-disk me-2"></i> Save All Changes
                        </button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <style>
        body { background: #f4f7f6; }
        .custom-input {
            border-radius: 8px;
            border: 1px solid #dee2e6;
            padding: 10px 15px;
            background-color: #f8f9fa;
            transition: all 0.3s;
        }
        .custom-input:focus {
            background-color: #fff;
            border-color: #0d6efd;
            box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.1);
        }
        .section-card {
            border: 1px solid rgba(0,0,0,0.05) !important;
            transition: transform 0.2s;
        }
        .section-card:hover {
            box-shadow: 0 10px 30px rgba(0,0,0,0.08) !important;
        }
        .gallery-item-card {
            transition: border-color 0.2s;
        }
        .gallery-item-card:hover {
            border-color: #0d6efd !important;
        }
        .handle { cursor: grab; }
        .handle:active { cursor: grabbing; }
        .sortable-ghost { opacity: 0.4; background-color: #f8f9fa; }
    </style>
@endpush

@push('scripts')
    <!-- SortableJS Library (For Drag & Drop) -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var galleryEl = document.getElementById('gallery-sortable');
            if(galleryEl) {
                new Sortable(galleryEl, {
                    animation: 150,
                    handle: '.handle', // Only drag by the icon
                    ghostClass: 'sortable-ghost'
                });
            }

            var visionEl = document.getElementById('vision-sortable');
            if(visionEl) {
                new Sortable(visionEl, {
                    animation: 150,
                    handle: '.handle',
                    ghostClass: 'sortable-ghost'
                });
            }
        });
    </script>
@endpush