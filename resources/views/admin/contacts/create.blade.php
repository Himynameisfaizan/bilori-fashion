@extends('admin.layout.app')

@section('title', 'Add Company Information')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <!-- <h1 class="h3 mb-0 text-gray-800">Add Company Information</h1> -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 mt-2">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.contacts.index') }}">Company Info</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </nav>
            </div>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.contacts.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <!-- Basic Information -->
                        <div class="col-md-6">
                            <h5 class="mb-3 text-primary">Basic Information</h5>

                            <div class="mb-3">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                    id="company_name" name="company_name" value="{{ old('company_name') }}">
                                @error('company_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Contact Person Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address 1</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email2" class="form-label">Email Address 2</label>
                                <input type="email" class="form-control @error('email2') is-invalid @enderror" id="email2"
                                    name="email2" value="{{ old('email2') }}">
                                @error('email2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                    name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="wp_number" class="form-label">WhatsApp Number</label>
                                <input type="text" class="form-control @error('wp_number') is-invalid @enderror"
                                    id="wp_number" name="wp_number" value="{{ old('wp_number') }}">
                                @error('wp_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="telephone" class="form-label">Telephone</label>
                                <input type="text" class="form-control @error('telephone') is-invalid @enderror"
                                    id="telephone" name="telephone" value="{{ old('telephone') }}">
                                @error('telephone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="working_hours" class="form-label">Working Hours</label>
                                <input type="text" class="form-control @error('working_hours') is-invalid @enderror"
                                    id="working_hours" name="working_hours" value="{{ old('working_hours') }}"
                                    placeholder="e.g., Mon-Fri: 9AM-6PM">
                                @error('working_hours')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="copyright" class="form-label">Copyright Text</label>
                                <input type="text" class="form-control @error('copyright') is-invalid @enderror"
                                    id="copyright" name="copyright" value="{{ old('copyright') }}">
                                @error('copyright')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Address & Social Media -->
                        <div class="col-md-6">
                            <h5 class="mb-3 text-success">Address Information</h5>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address Line 1</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                                    name="address" value="{{ old('address') }}">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address2" class="form-label">Address Line 2</label>
                                <textarea class="form-control @error('address2') is-invalid @enderror" id="address2"
                                    name="address2" rows="3">{{ old('address2') }}</textarea>
                                @error('address2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="map" class="form-label">Google Map Embed URL</label>
                                <input type="text" class="form-control @error('map') is-invalid @enderror" id="map"
                                    name="map" value="{{ old('map') }}" placeholder="https://maps.google.com/...">
                                <small class="text-muted">Paste the Google Maps embed URL here</small>
                                @error('map')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <h5 class="mb-3 mt-4 text-info">Social Media Links</h5>

                            <div class="mb-3">
                                <label for="facebook" class="form-label">
                                    <i class="fab fa-facebook text-primary"></i> Facebook
                                </label>
                                <input type="url" class="form-control @error('facebook') is-invalid @enderror" id="facebook"
                                    name="facebook" value="{{ old('facebook') }}"
                                    placeholder="https://facebook.com/yourpage">
                                @error('facebook')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="instagram" class="form-label">
                                    <i class="fab fa-instagram text-danger"></i> Instagram
                                </label>
                                <input type="url" class="form-control @error('instagram') is-invalid @enderror"
                                    id="instagram" name="instagram" value="{{ old('instagram') }}"
                                    placeholder="https://instagram.com/yourprofile">
                                @error('instagram')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="twitter" class="form-label">
                                    <i class="fab fa-twitter text-info"></i> Twitter
                                </label>
                                <input type="url" class="form-control @error('twitter') is-invalid @enderror" id="twitter"
                                    name="twitter" value="{{ old('twitter') }}"
                                    placeholder="https://twitter.com/yourhandle">
                                @error('twitter')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="linkdin" class="form-label">
                                    <i class="fab fa-linkedin text-primary"></i> LinkedIn
                                </label>
                                <input type="url" class="form-control @error('linkdin') is-invalid @enderror" id="linkdin"
                                    name="linkdin" value="{{ old('linkdin') }}"
                                    placeholder="https://linkedin.com/company/yourcompany">
                                @error('linkdin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Save Information
                        </button>
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-1"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection