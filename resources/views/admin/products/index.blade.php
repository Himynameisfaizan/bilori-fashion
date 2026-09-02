@extends('admin.layout.app')

@section('title', 'Products Management')

@section('content')
    <div class="container-fluid px-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 mt-2">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </nav>

            <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Create Product
            </a>
        </div>

        <!-- Card -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white d-flex justify-content-between">

                <div>
                    <h5 class="mb-0">All Products</h5>
                    <small class="text-muted">Manage your products</small>
                </div>

                <div class="d-flex gap-2">

                    <!-- Filter -->
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                            Filter
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('admin.products.index') }}">All</a></li>
                            <li><a class="dropdown-item" href="?is_active=1">Active</a></li>
                            <li><a class="dropdown-item" href="?is_active=0">Inactive</a></li>
                            <li>
                                <hr>
                            </li>
                            <li><a class="dropdown-item" href="?featured=1">Featured</a></li>
                            <li><a class="dropdown-item" href="?trending=1">Trending</a></li>
                            <li><a class="dropdown-item" href="?new=1">New Arrival</a></li>
                        </ul>
                    </div>

                    <!-- Search -->
                    <input type="text" id="searchInput" class="form-control form-control-sm" placeholder="Search...">

                    <button onclick="location.reload()" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-sync"></i>
                    </button>

                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle" id="productsTable">
                    <thead class="bg-light">
                        <tr>
                            <th><input type="checkbox" id="selectAll"></th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($products as $product)
                            <tr>

                                <!-- Checkbox -->
                                <td>
                                    <input type="checkbox" class="checkbox" value="{{ $product->id }}">
                                </td>

                                <!-- Image -->
                                <!-- Image -->
                                <td>
                                    @if($product->image && file_exists(public_path($product->image)))
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                            style="width:50px; height:50px; object-fit:cover; border-radius:5px;">
                                    @else
                                        <img src="{{ asset('assets/images/no-image.png') }}" alt="No Image"
                                            style="width:50px; height:50px; object-fit:cover; border-radius:5px; opacity:0.5;">
                                    @endif
                                </td>

                                <!-- Name -->
                                <td>
                                    <strong>{{ $product->name }}</strong>

                                    <div class="mt-1">
                                        @if($product->is_featured)
                                            <span class="badge bg-primary">Featured</span>
                                        @endif
                                        @if($product->is_trending)
                                            <span class="badge bg-warning text-dark">Trending</span>
                                        @endif
                                        @if($product->is_new_arrival)
                                            <span class="badge bg-success">New</span>
                                        @endif
                                    </div>
                                </td>

                                <!-- SKU -->
                                <td>{{ $product->sku ?? '-' }}</td>

                                <!-- Price -->
                                <td>
                                    @if($product->sale_price)
                                        <del>₹{{ $product->price }}</del><br>
                                        <strong class="text-danger">₹{{ $product->sale_price }}</strong>
                                    @else
                                        ₹{{ $product->price }}
                                    @endif
                                </td>

                                <!-- Stock -->
                                <td>
                                    @if($product->stock_quantity <= 0)
                                        <span class="badge bg-danger">Out</span>
                                    @elseif($product->stock_quantity <= 10)
                                        <span class="badge bg-warning">{{ $product->stock_quantity }}</span>
                                    @else
                                        <span class="badge bg-success">{{ $product->stock_quantity }}</span>
                                    @endif
                                </td>

                                <!-- Category -->
                                <td>
                                    {{ $product->category->name ?? 'N/A' }}
                                </td>

                                <!-- Status -->
                                <td>
                                    @if($product->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>

                                <!-- Created -->
                                <td>
                                    <small>{{ $product->created_at->format('d M Y') }}</small>
                                </td>

                                <!-- Action -->
                                <td class="text-center">

                                    <a href="{{ route('admin.products.show', $product->id) }}"
                                        class="btn btn-info btn-sm text-white">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <button class="btn btn-danger btn-sm deleteBtn" data-id="{{ $product->id }}"
                                        data-name="{{ $product->name }}">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center py-5">
                                    No Products Found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Footer -->
            <div class="card-footer">
                {{ $products->links() }}
            </div>

        </div>
    </div>


    <!-- DELETE MODAL -->
    <!-- DELETE MODAL -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" id="deleteForm">
            @csrf
            @method('DELETE')

            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete <strong id="productName"></strong>?</p>
                    <small class="text-muted">This action cannot be undone.</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // Search
    document.getElementById('searchInput').addEventListener('keyup', function () {
        let val = this.value.toLowerCase();
        document.querySelectorAll('#productsTable tbody tr').forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(val) ? '' : 'none';
        });
    });

    
    document.querySelectorAll('.deleteBtn').forEach(btn => {
        btn.addEventListener('click', function () {
            let id = this.dataset.id;
            let name = this.dataset.name;

            document.getElementById('productName').innerText = name;
            
             let deleteBaseUrl = "{{ url('admin/products') }}";
            // Direct URL - Most reliable
      document.getElementById('deleteForm').action = deleteBaseUrl + '/' + id;
            
            // Show modal
            let modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            modal.show();
        });
    });

    // Select all
    document.getElementById('selectAll').addEventListener('change', function () {
        document.querySelectorAll('.checkbox').forEach(c => {
            c.checked = this.checked;
        });
    });
</script>

@endsection


  


