@extends('admin.layout.app')

@section('title', 'Company Contact Information')@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <!-- <h1 class="h3 mb-0 text-gray-800">Company Contact Information</h1> -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 mt-2">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Company Info</li>
                    </ol>
                </nav>
            </div>
            <div>
                @if($companyInfo)
                    <a href="{{ route('admin.contacts.edit', $companyInfo->id) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-1"></i> Edit Information
                    </a>
                @else
                    <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i> Add Information
                    </a>
                @endif
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($companyInfo)
            <div class="row">
                <!-- Basic Information -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-building me-2"></i> Basic Information</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="35%">Company Name</th>
                                    <td>{{ $companyInfo->company_name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Contact Name</th>
                                    <td>{{ $companyInfo->name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Email 1</th>
                                    <td>{{ $companyInfo->email ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Email 2</th>
                                    <td>{{ $companyInfo->email2 ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $companyInfo->phone ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>WhatsApp Number</th>
                                    <td>{{ $companyInfo->wp_number ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Telephone</th>
                                    <td>{{ $companyInfo->telephone ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Working Hours</th>
                                    <td>{{ $companyInfo->working_hours ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Copyright</th>
                                    <td>{{ $companyInfo->copyright ?? 'N/A' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Address Information -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0"><i class="fas fa-location-dot me-2"></i> Address Information</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="35%">Address Line 1</th>
                                    <td>{{ $companyInfo->address ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Address Line 2</th>
                                    <td>{{ $companyInfo->address2 ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Google Map</th>
                                    <td>
                                        @if($companyInfo->map)
                                            <a href="{{ $companyInfo->map }}" target="_blank" class="btn btn-sm btn-info">
                                                <i class="fas fa-map-marker-alt"></i> View Map
                                            </a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Social Media Links -->
                <div class="col-md-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0"><i class="fas fa-share-alt me-2"></i> Social Media Links</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <i class="fab fa-facebook fa-2x text-primary mb-2"></i>
                                        <p class="mb-1"><strong>Facebook</strong></p>
                                        @if($companyInfo->facebook)
                                            <a href="{{ $companyInfo->facebook }}" target="_blank"
                                                class="btn btn-sm btn-outline-primary">
                                                Visit Page
                                            </a>
                                        @else
                                            <span class="text-muted">Not set</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <i class="fab fa-instagram fa-2x text-danger mb-2"></i>
                                        <p class="mb-1"><strong>Instagram</strong></p>
                                        @if($companyInfo->instagram)
                                            <a href="{{ $companyInfo->instagram }}" target="_blank"
                                                class="btn btn-sm btn-outline-danger">
                                                Visit Page
                                            </a>
                                        @else
                                            <span class="text-muted">Not set</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <i class="fab fa-twitter fa-2x text-info mb-2"></i>
                                        <p class="mb-1"><strong>Twitter</strong></p>
                                        @if($companyInfo->twitter)
                                            <a href="{{ $companyInfo->twitter }}" target="_blank"
                                                class="btn btn-sm btn-outline-info">
                                                Visit Page
                                            </a>
                                        @else
                                            <span class="text-muted">Not set</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="text-center">
                                        <i class="fab fa-linkedin fa-2x text-primary mb-2"></i>
                                        <p class="mb-1"><strong>LinkedIn</strong></p>
                                        @if($companyInfo->linkdin)
                                            <a href="{{ $companyInfo->linkdin }}" target="_blank"
                                                class="btn btn-sm btn-outline-primary">
                                                Visit Page
                                            </a>
                                        @else
                                            <span class="text-muted">Not set</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Last Updated -->
                <div class="col-md-12">
                    <div class="alert alert-secondary">
                        <i class="fas fa-clock me-2"></i>
                        Last Updated:
                        {{ $companyInfo->updated_at ? \Carbon\Carbon::parse($companyInfo->updated_at)->format('F d, Y h:i A') : $companyInfo->created_at->format('F d, Y h:i A') }}
                    </div>
                </div>
            </div>
        @else
            <div class="card shadow-sm">
                <div class="card-body text-center py-5">
                    <i class="fas fa-building fa-4x text-muted mb-3"></i>
                    <h5>No Company Information Found</h5>
                    <p class="text-muted">Click the "Add Information" button to add your company contact details.</p>
                    <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i> Add Information
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('styles')
    <style>
        .table-bordered th {
            background-color: #f8f9fa;
        }

        .card {
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }
    </style>
@endpush