@extends('admin.layout.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Manage Website Policies</h3>
            <p class="text-muted mb-0">Update your company privacy, terms, shipping, and return legal copies clean and safe.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('admin.policy.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label fw-semibold">Privacy Policy</label>
                    <textarea class="tinymce-editor" name="privacy_policy">{{ old('privacy_policy', $policy->privacy_policy ?? '') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Terms of Service</label>
                    <textarea class="tinymce-editor" name="terms_of_service">{{ old('terms_of_service', $policy->terms_of_service ?? '') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Shipping Policy</label>
                    <textarea class="tinymce-editor" name="shipping_policy">{{ old('shipping_policy', $policy->shipping_policy ?? '') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Return & Exchange Policy</label>
                    <textarea class="tinymce-editor" name="return_exchange_policy">{{ old('return_exchange_policy', $policy->return_exchange_policy ?? '') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Return & Exchange Request Instructions</label>
                    <textarea class="tinymce-editor" name="return_exchange_request">{{ old('return_exchange_request', $policy->return_exchange_request ?? '') }}</textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-5 py-2 fw-semibold rounded-3 shadow-sm">
                        Save Policies
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/tinymce@6.8.2/tinymce.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        tinymce.init({
            selector: 'textarea.tinymce-editor',
            height: 280,
            menubar: false,
            plugins: 'lists link image table code help wordcount',
            toolbar: 'undo redo | blocks | bold italic underline | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table link image | code removeformat',
            branding: false, // TinyMCE ka logo hide karne ke liye
            promotion: false // Upgrade button hide karne ke liye
        });
    });
</script>
@endsection