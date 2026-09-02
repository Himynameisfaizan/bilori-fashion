@extends('admin.layout.app')

@section('content')

    <div class="container py-5">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">Categories</h3>
                <p class="text-muted mb-0">Manage all your categories</p>
            </div>
            <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
                + Add Category
            </a>
        </div>

        <!-- Card -->
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">

                <!-- Search -->
                <div class="mb-3">
                    <input type="text" id="searchInput" class="form-control custom-input" placeholder="Search category...">
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr class="text-muted small">
                                <th>#</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Parent</th>
                                <th>Date</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($categories as $key => $category)
                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <!-- Category -->
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            {{-- ✅ Updated Image Display --}}
                                            @if($category->image && file_exists(public_path($category->image)))
                                                <img src="{{ asset($category->image) }}" class="rounded"
                                                    style="width:40px;height:40px;object-fit:cover;">
                                            @else
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                                    style="width:40px;height:40px;">
                                                    <i class="fas fa-folder text-muted"></i>
                                                </div>
                                            @endif

                                            <div>
                                                <strong>{{ $category->name }}</strong>
                                                <div class="small text-muted">
                                                    {{ Str::limit($category->description, 40) }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Slug -->
                                    <td>
                                        <small class="text-muted">{{ $category->slug }}</small>
                                    </td>

                                    <!-- Parent -->
                                    <td>
                                        @if($category->parent_id)
                                            {{ optional($category->parent)->name }}
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>

                                    <!-- Date -->
                                    <td>
                                        <small>{{ $category->created_at->format('d M Y') }}</small>
                                    </td>

                                    <!-- Actions -->
                                    <td class="text-end">
                                        <a href="{{ route('admin.category.edit', $category->id) }}"
                                            class="btn btn-sm btn-light">
                                            Edit
                                        </a>

                                        <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $category->id }}"
                                            data-name="{{ $category->name }}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <p class="text-muted mb-2">No categories found</p>
                                        <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-sm">
                                            Create First Category
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>


    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-4">
                    <h5 class="mb-3">Delete Category?</h5>
                    <p class="text-muted small mb-4">
                        This action cannot be undone
                    </p>

                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            Cancel
                        </button>

                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection



<script>
    // Wait for DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        
        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function () {
            let val = this.value.toLowerCase();
            document.querySelectorAll('tbody tr').forEach(row => {
                let text = row.innerText.toLowerCase();
                row.style.display = text.includes(val) ? '' : 'none';
            });
        });

        // Delete functionality
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                let id = this.dataset.id;
                
                console.log('Delete button clicked for ID:', id); // Debug log
                
                // Create the delete URL using Laravel route
                let deleteUrl = "{{ route('admin.category.destroy', ':id') }}";
                deleteUrl = deleteUrl.replace(':id', id);
                
                console.log('Delete URL:', deleteUrl); // Debug log
                
                // Set form action
                document.getElementById('deleteForm').action = deleteUrl;
                
                // Show modal
                let deleteModalElement = document.getElementById('deleteModal');
                let deleteModal = new bootstrap.Modal(deleteModalElement);
                deleteModal.show();
            });
        });
        
    });
</script>




@push('styles')
    <style>
        body {
            background: #f6f8fb;
        }

        .custom-input {
            border-radius: 10px;
            border: 1px solid #e5e9f2;
        }

        .table tr {
            border-bottom: 1px solid #f1f1f1;
        }

        .table tr:hover {
            background: #fafbff;
        }

        .btn-light {
            border: 1px solid #e5e9f2;
        }
    </style>
@endpush