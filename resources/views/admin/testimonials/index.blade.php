@extends('admin.layout.app')

@section('title', 'Testimonials Management')

@section('content')

    <div class="container-fluid px-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <nav aria-label="breadcrumb">

                    <ol class="breadcrumb mb-0 mt-2">

                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}"
                                class="text-decoration-none">

                                Dashboard
                            </a>
                        </li>

                        <li class="breadcrumb-item active"
                            aria-current="page">

                            Testimonials
                        </li>

                    </ol>

                </nav>

            </div>

            <div>

                <a href="{{ route('admin.testimonials.create') }}"
                    class="btn btn-sm btn-primary">

                    <i class="fas fa-plus me-1"></i>
                    Create New Testimonial

                </a>

            </div>

        </div>


        <!-- Stats -->
        <div class="row mb-4">

            <div class="col-lg-4 col-6">

                <div class="small-box bg-info">

                    <div class="inner">

                        <h3>{{ $stats['total'] }}</h3>

                        <p>Total Testimonials</p>

                    </div>

                    <div class="icon">
                        <i class="fas fa-comments"></i>
                    </div>

                </div>

            </div>

            <div class="col-lg-4 col-6">

                <div class="small-box bg-success">

                    <div class="inner">

                        <h3>{{ $stats['active'] }}</h3>

                        <p>Active Testimonials</p>

                    </div>

                    <div class="icon">
                        <i class="fas fa-check-circle"></i>
                    </div>

                </div>

            </div>

            <div class="col-lg-4 col-12">

                <div class="small-box bg-danger">

                    <div class="inner">

                        <h3>{{ $stats['inactive'] }}</h3>

                        <p>Inactive Testimonials</p>

                    </div>

                    <div class="icon">
                        <i class="fas fa-times-circle"></i>
                    </div>

                </div>

            </div>

        </div>


        <!-- Table -->
        <div class="card shadow-sm border-0 rounded-3">

            <div class="card-header bg-white border-bottom-0 pt-4 px-4">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                    <div>

                        <h5 class="card-title mb-0 fw-semibold">
                            All Testimonials
                        </h5>

                        <p class="text-muted small mb-0">
                            Manage customer testimonials and reviews
                        </p>

                    </div>

                    <div class="d-flex gap-2">

                        <div class="input-group input-group-sm"
                            style="width:250px;">

                            <span class="input-group-text bg-light border-end-0">

                                <i class="fas fa-search text-muted"></i>

                            </span>

                            <input type="text"
                                id="searchInput"
                                class="form-control border-start-0"
                                placeholder="Search testimonials...">

                        </div>

                        <button type="button"
                            id="refreshBtn"
                            class="btn btn-sm btn-outline-secondary">

                            <i class="fas fa-sync-alt"></i>

                        </button>

                    </div>

                </div>

            </div>


            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0"
                        id="testimonialsTable">

                        <thead class="bg-light">

                            <tr>

                                <th width="5%">#</th>

                                <th width="15%">Photo</th>

                                <th width="20%">Name</th>

                                <th width="25%">Description</th>

                                <th width="10%">Review</th>

                                <th width="10%">Status</th>

                                <th width="15%" class="text-center">
                                    Actions
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($testimonials as $key => $testimonial)

                                <tr>

                                    <td>
                                        {{ $testimonials->firstItem() + $key }}
                                    </td>

                                    <td>

                                        <img src="{{ $testimonial->photo ? asset($testimonial->photo) : asset('assets/images/no-image.png') }}"
    alt="{{ $testimonial->name }}"
    class="rounded-circle border"
    style="width:70px;height:70px;object-fit:cover;">

                                    </td>

                                    <td>

                                        <strong>
                                            {{ $testimonial->name }}
                                        </strong>

                                    </td>

                                    <td>

                                        <small class="text-muted">
                                            {{ Str::limit($testimonial->description, 80) }}
                                        </small>

                                    </td>

                                    <td>

                                        @for($i = 1; $i <= $testimonial->review; $i++)

                                            <i class="fas fa-star text-warning"></i>

                                        @endfor

                                    </td>

                                    <td>

                                        @if($testimonial->status == 'active')

                                            <span class="badge bg-success">
                                                Active
                                            </span>

                                        @else

                                            <span class="badge bg-danger">
                                                Inactive
                                            </span>

                                        @endif

                                    </td>

                                    <td>

                                        <div class="d-flex justify-content-center gap-2">

                                            <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}"
                                                class="btn btn-sm btn-primary"
                                                data-bs-toggle="tooltip"
                                                title="Edit Testimonial">

                                                <i class="fas fa-edit"></i>

                                            </a>

                                            <button type="button"
                                                class="btn btn-sm btn-danger delete-btn"
                                                data-id="{{ $testimonial->id }}"
                                                data-name="{{ $testimonial->name }}"
                                                data-bs-toggle="tooltip"
                                                title="Delete Testimonial">

                                                <i class="fas fa-trash"></i>

                                            </button>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="7"
                                        class="text-center py-5">

                                        <div class="text-center">

                                            <i class="fas fa-comments fa-4x text-muted mb-3"></i>

                                            <h6 class="text-muted">
                                                No testimonials found
                                            </h6>

                                            <p class="text-muted small">
                                                Click the button below to add your first testimonial.
                                            </p>

                                            <a href="{{ route('admin.testimonials.create') }}"
                                                class="btn btn-primary btn-sm mt-2">

                                                <i class="fas fa-plus me-1"></i>
                                                Create Testimonial

                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>


            <!-- Footer -->
            <div class="card-footer bg-white border-top-0 px-4 py-3">

                <div class="d-flex justify-content-between align-items-center">

                    <small class="text-muted">

                        Showing {{ $testimonials->firstItem() }}
                        to {{ $testimonials->lastItem() }}
                        of {{ $testimonials->total() }} testimonials

                    </small>

                    {{ $testimonials->links() }}

                </div>

            </div>

        </div>

    </div>


    <!-- Delete Modal -->
    <div class="modal fade"
        id="deleteModal"
        tabindex="-1"
        aria-labelledby="deleteModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header bg-danger text-white">

                    <h5 class="modal-title"
                        id="deleteModalLabel">

                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Confirm Delete

                    </h5>

                    <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>

                </div>

                <div class="modal-body">

                    <p>

                        Are you sure you want to delete
                        <strong id="deleteTestimonialName"></strong> ?

                    </p>

                    <p class="text-danger small mb-0">

                        <i class="fas fa-info-circle me-1"></i>

                        This action cannot be undone.

                    </p>

                </div>

                <div class="modal-footer">

                    <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                        Cancel

                    </button>

                    <form id="deleteForm"
                        action=""
                        method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            class="btn btn-danger">

                            Delete Testimonial

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection


@push('scripts')

    <script>

        // Search
        document.getElementById('searchInput')?.addEventListener('keyup', function () {

            let searchText = this.value.toLowerCase();

            let rows = document.querySelectorAll('#testimonialsTable tbody tr');

            rows.forEach(row => {

                let text = row.textContent.toLowerCase();

                row.style.display = text.includes(searchText)
                    ? ''
                    : 'none';
            });

        });


        // Refresh
        document.getElementById('refreshBtn')?.addEventListener('click', function () {

            window.location.reload();

        });


        // Delete
        const deleteModal = document.getElementById('deleteModal');

        if (deleteModal) {

            const deleteButtons = document.querySelectorAll('.delete-btn');

            const deleteTestimonialName = document.getElementById('deleteTestimonialName');

            const deleteForm = document.getElementById('deleteForm');

            deleteButtons.forEach(button => {

                button.addEventListener('click', function () {

                    const testimonialId = this.getAttribute('data-id');

                    const testimonialName = this.getAttribute('data-name');

                    deleteTestimonialName.textContent = testimonialName;

                    deleteForm.action =
                        "{{ url('admin/testimonials') }}/" + testimonialId;

                    const modal = new bootstrap.Modal(deleteModal);

                    modal.show();

                });

            });

        }


        // Tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))

        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {

            return new bootstrap.Tooltip(tooltipTriggerEl)

        });

    </script>

@endpush