@extends('admin.layout.app')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Manage Social Media</h3>
            <p class="text-muted mb-0">
                Update your website social media profile links easily.
            </p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">
            </button>
        </div>
    @endif

    <div class="card shadow-sm border-0 rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('admin.social-media.update') }}"
                  method="POST">

                @csrf

                {{-- Facebook --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Facebook URL
                    </label>

                    <input type="url"
                           name="facebook"
                           class="form-control rounded-3"
                           placeholder="https://facebook.com/yourpage"
                           value="{{ old('facebook', $social->facebook ?? '') }}">
                </div>

                {{-- Instagram --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Instagram URL
                    </label>

                    <input type="url"
                           name="instagram"
                           class="form-control rounded-3"
                           placeholder="https://instagram.com/yourpage"
                           value="{{ old('instagram', $social->instagram ?? '') }}">
                </div>

                {{-- Twitter --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Twitter / X URL
                    </label>

                    <input type="url"
                           name="twitter"
                           class="form-control rounded-3"
                           placeholder="https://twitter.com/yourpage"
                           value="{{ old('twitter', $social->twitter ?? '') }}">
                </div>

                {{-- YouTube --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        YouTube URL
                    </label>

                    <input type="url"
                           name="youtube"
                           class="form-control rounded-3"
                           placeholder="https://youtube.com/yourchannel"
                           value="{{ old('youtube', $social->youtube ?? '') }}">
                </div>

                {{-- LinkedIn --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        LinkedIn URL
                    </label>

                    <input type="url"
                           name="linkedin"
                           class="form-control rounded-3"
                           placeholder="https://linkedin.com/company/yourpage"
                           value="{{ old('linkedin', $social->linkedin ?? '') }}">
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit"
                            class="btn btn-primary px-5 py-2 fw-semibold rounded-3 shadow-sm">
                        Save Social Media
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

@endsection