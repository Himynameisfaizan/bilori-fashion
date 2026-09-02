@extends('admin.layout.app')

@section('content')
    <div class="container py-5">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">Blogs</h3>
                <p class="text-muted mb-0">Manage all blog posts</p>
            </div>

            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
                + Add Blog
            </a>
        </div>

        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table align-middle mb-0">

                        <thead class="table-light">
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($blogs as $blog)

                                <tr>

                                    <!-- ✅ Updated Image Display -->
                                    <td>
                                        @if($blog->image && file_exists(public_path($blog->image)))
                                            <img src="{{ asset($blog->image) }}" class="rounded" width="70" height="60"
                                                style="object-fit:cover;">
                                        @else
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                                style="width:70px; height:60px;">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>

                                    <!-- Title -->
                                    <td>
                                        <strong>{{ $blog->title }}</strong>
                                        @if($blog->short_description)
                                            <br>
                                            <small class="text-muted">{{ Str::limit($blog->short_description, 50) }}</small>
                                        @endif
                                    </td>

                                    <!-- Slug -->
                                    <td>
                                        <small class="text-muted">{{ $blog->slug }}</small>
                                    </td>

                                    <!-- Status -->
                                    <td>
                                        @if($blog->status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>

                                    <!-- Action -->
                                    <td class="text-end">

                                        <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        <button class="btn btn-sm btn-danger"
                                            onclick="deleteBlog({{ $blog->id }}, '{{ $blog->title }}')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>

                                        <form id="deleteForm{{ $blog->id }}"
                                            action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">
                                        <div class="mb-2">
                                            <i class="fas fa-blog fa-3x"></i>
                                        </div>
                                        <p>No blogs found</p>
                                        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary btn-sm">
                                            Create First Blog
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
@endsection

@push('scripts')
    <script>
        // Sweet confirmation for delete
        function deleteBlog(id, title) {
            if (confirm('Are you sure you want to delete "' + title + '"?')) {
                document.getElementById('deleteForm' + id).submit();
            }
        }
    </script>
@endpush

@push('styles')
    <style>
        body {
            background: #f6f8fb;
        }

        .card {
            border-radius: 16px;
        }

        table th {
            font-weight: 600;
            font-size: 14px;
        }

        table td {
            vertical-align: middle;
        }
    </style>
@endpush