@extends('admin.layout.app')

@section('title', 'Banners Management')

@section('content')
    <div class="container-fluid px-4">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <!-- <h1 class="h3 mb-0 text-gray-800">Banners Management</h1> -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 mt-2">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Banners</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="{{ route('admin.banners.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus me-1"></i> Create New Banner
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $stats['total'] }}</h3>
                        <p>Total Banners</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-images"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $stats['active'] }}</h3>
                        <p>Active Banners</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $stats['inactive'] }}</h3>
                        <p>Inactive Banners</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-times-circle"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $stats['expired'] }}</h3>
                        <p>Expired Banners</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-calendar-times"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Banners Table -->
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <div>
                        <h5 class="card-title mb-0 fw-semibold">All Banners</h5>
                        <p class="text-muted small mb-0">Manage your website banners and promotions</p>
                    </div>
                    <div class="d-flex gap-2">
                        <div class="input-group input-group-sm" style="width: 250px;">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                            <input type="text" id="searchInput" class="form-control border-start-0"
                                placeholder="Search banners...">
                        </div>
                        <button type="button" id="refreshBtn" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" id="bannersTable">
                        <thead class="bg-light">
                            <tr>
                                <th width="5%">#</th>
                                <th width="15%">Banner Image</th>
                                <th width="20%">Title</th>
                                <th width="15%">Position</th>
                                <th width="10%">Order</th>
                                <th width="10%">Status</th>
                                <th width="10%">Schedule</th>
                                <th width="15%" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($banners as $key => $banner)
                                <tr>
                                    <td>{{ $banners->firstItem() + $key }}</td>
                                    <td>
                                        <img src="{{ asset($banner->image) }}" alt="{{ $banner->title }}"
    class="rounded-3"
    style="width: 80px; height: 60px; object-fit: cover;">
                                    </td>
                                    <td>
                                        <strong>{{ $banner->title }}</strong>
                                        @if($banner->subtitle)
                                            <br>
                                            <small class="text-muted">{{ Str::limit($banner->subtitle, 50) }}</small>
                                        @endif
                                        @if($banner->button_text)
                                            <br>
                                            <span class="badge bg-info mt-1">{{ $banner->button_text }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">
                                            {{ str_replace('_', ' ', ucfirst($banner->position)) }}
                                        </span>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm order-input"
                                            data-id="{{ $banner->id }}" value="{{ $banner->order ?? 0 }}" style="width: 70px;">
                                    </td>
                                    <td>
                                        @if($banner->isActive())
                                            <span class="badge bg-success">Active</span>
                                        @elseif($banner->status == 'active' && $banner->end_date && $banner->end_date < now())
                                            <span class="badge bg-warning">Expired</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($banner->start_date)
                                            <small>From: {{ $banner->start_date->format('M d, Y') }}</small><br>
                                        @endif
                                        @if($banner->end_date)
                                            <small>To: {{ $banner->end_date->format('M d, Y') }}</small>
                                        @endif
                                        @if(!$banner->start_date && !$banner->end_date)
                                            <small class="text-muted">Always active</small>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('admin.banners.edit', $banner->id) }}"
                                                class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="Edit Banner">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger delete-btn"
                                                data-id="{{ $banner->id }}" data-name="{{ $banner->title }}"
                                                data-bs-toggle="tooltip" title="Delete Banner">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-5">
                                        <div class="text-center">
                                            <i class="fas fa-images fa-4x text-muted mb-3"></i>
                                            <h6 class="text-muted">No banners found</h6>
                                            <p class="text-muted small">Click the "Create New Banner" button to add your first
                                                banner.</p>
                                            <a href="{{ route('admin.banners.create') }}" class="btn btn-primary btn-sm mt-2">
                                                <i class="fas fa-plus me-1"></i> Create Banner
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer bg-white border-top-0 px-4 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        Showing {{ $banners->firstItem() }} to {{ $banners->lastItem() }} of {{ $banners->total() }} banners
                    </small>
                    {{ $banners->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel">
                        <i class="fas fa-exclamation-triangle me-2"></i> Confirm Delete
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete the banner <strong id="deleteBannerName"></strong>?</p>
                    <p class="text-danger small mb-0">
                        <i class="fas fa-info-circle me-1"></i>
                        This action cannot be undone. The banner image will also be deleted.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete Banner</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Search functionality
        document.getElementById('searchInput')?.addEventListener('keyup', function () {
            let searchText = this.value.toLowerCase();
            let tableRows = document.querySelectorAll('#bannersTable tbody tr');

            tableRows.forEach(row => {
                let text = row.textContent.toLowerCase();
                if (text.includes(searchText)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Refresh button
        document.getElementById('refreshBtn')?.addEventListener('click', function () {
            window.location.reload();
        });

        // Update order via AJAX
        const orderInputs = document.querySelectorAll('.order-input');
        orderInputs.forEach(input => {
            let timeout;
            input.addEventListener('change', function () {
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    const id = this.dataset.id;
                    const order = this.value;

                    fetch('{{ route("admin.banners.update-order") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ id: id, order: order })
                    }).then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                toastr.success('Order updated successfully');
                            }
                        });
                }, 500);
            });
        });

        // Delete confirmation
        const deleteModal = document.getElementById('deleteModal');
        if (deleteModal) {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            const deleteBannerName = document.getElementById('deleteBannerName');
            const deleteForm = document.getElementById('deleteForm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const bannerId = this.getAttribute('data-id');
                    const bannerName = this.getAttribute('data-name');

                    deleteBannerName.textContent = bannerName;
                   deleteForm.action = "{{ url('admin/banners') }}/" + bannerId;

                    const modal = new bootstrap.Modal(deleteModal);
                    modal.show();
                });
            });
        }

        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    </script>
@endpush