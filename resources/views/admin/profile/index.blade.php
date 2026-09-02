@extends('admin.layout.app')

@section('content')
<div class="container-fluid px-4 py-5" style="background-color: #f8f9fa; min-height: 100vh;">
    
    <div class="row mb-4">
        <div class="col-12">
            <h4 class="fw-bold text-dark mb-1">Account Settings</h4>
            <p class="text-muted small">Update your profile details and manage your password securely.</p>
        </div>
    </div>

    <div class="row g-4">
        
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <div class="card-body">
                    <h5 class="fw-bold text-dark mb-4 pb-2 border-bottom">Profile Information</h5>
                    
                    @if(session('success_profile'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success_profile') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ url('/admin/profile/update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="d-flex align-items-center gap-4 mb-4">
                            <div class="position-relative">
                                <img id="profile-preview" src="{{ Auth::user()->profile_photo_url ?? asset('img/avatar.png') }}" alt="Profile" class="rounded-circle object-fit-cover shadow-sm" style="width: 100px; height: 100px; border: 3px solid #fff;">
                                <label for="profile_image" class="position-absolute bottom-0 end-0 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 32px; height: 32px; cursor: pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                        <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                                    </svg>
                                </label>
                                <input type="file" id="profile_image" name="profile_image" class="d-none" accept="image/*" onchange="previewImage(this)">
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Your Avatar</h6>
                                <p class="text-muted small mb-0">Allowed file types: png, jpg, jpeg. Max size 2MB.</p>
                                @error('profile_image') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-secondary small fw-bold">Full Name</label>
                                <input type="text" class="form-control rounded-3 py-2 @error('name') is-invalid @enderror" name="name" value="{{ old('name', Auth::user()->name) }}" placeholder="John Doe">
                                @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-secondary small fw-bold">Email Address</label>
                                <input type="email" class="form-control rounded-3 py-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email', Auth::user()->email) }}" placeholder="name@example.com">
                                @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="form-label text-secondary small fw-bold">Phone Number</label>
                                <input type="text" class="form-control rounded-3 py-2 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', Auth::user()->phone) }}" placeholder="+91 98765 43210">
                                @error('phone') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-12 mt-4 text-end">
                                <button type="submit" class="btn btn-primary px-4 py-2 rounded-3 fw-bold shadow-sm">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-4 p-3">
                <div class="card-body">
                    <h5 class="fw-bold text-dark mb-4 pb-2 border-bottom">Security Settings</h5>
                    
                    @if(session('success_password'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success_password') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ url('/admin/profile/password') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label text-secondary small fw-bold">Current Password</label>
                            <input type="password" class="form-control rounded-3 py-2 @error('current_password') is-invalid @enderror" name="current_password" placeholder="••••••••">
                            @error('current_password') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary small fw-bold">New Password</label>
                            <input type="password" class="form-control rounded-3 py-2 @error('new_password') is-invalid @enderror" name="new_password" placeholder="••••••••">
                            @error('new_password') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-secondary small fw-bold">Confirm New Password</label>
                            <input type="password" class="form-control rounded-3 py-2" name="new_password_confirmation" placeholder="••••••••">
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-dark px-4 py-2 rounded-3 fw-bold shadow-sm">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profile-preview').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<style>
/* Custom Minimalist Styling to match modern dashboards */
.form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
}
.card {
    background-color: #ffffff;
}
.object-fit-cover {
    object-fit: cover;
}
</style>
@endsection