@extends('admin.layout.app')

@section('content')
<div class="container mt-4">

    <h2>Site Settings</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Site Name</label>
            <input type="text" name="site_name" class="form-control"
                   value="{{ $settings['site_name'] ?? '' }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control"
                   value="{{ $settings['email'] ?? '' }}">
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control"
                   value="{{ $settings['phone'] ?? '' }}">
        </div>

        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control">{{ $settings['address'] ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label>Logo</label>
            <input type="file" name="logo" class="form-control">

            @if(!empty($settings['logo']))
                <img src="{{ asset('uploads/'.$settings['logo']) }}" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>
</div>
@endsection