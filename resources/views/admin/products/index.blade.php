@extends('admin.layout.app')

@section('title', 'Products Management')

@section('content')
    <div class="container-fluid px-4 py-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1 text-dark"><i class="fas fa-box-open text-primary me-2"></i>Products Management</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </nav>
            </div>

            <a href="{{ route('admin.products.create') }}" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm rounded-pill">
                <i class="fas fa-plus me-1"></i> Add New Product
            </a>
        </div>

        <!-- Premium Card -->
        <div class="card premium-card border-0 rounded-4">
            <div class="card-header bg-white border-bottom p-4 d-flex justify-content-between align-items-center rounded-top-4">

                <div>
                    <h5 class="mb-0 fw-bold text-dark">All Products</h5>
                    <small class="text-muted">Manage your inventory and product catalogs</small>
                </div>

                <div class="d-flex gap-3 align-items-center">

                    <!-- Filter Dropdown -->
                    <div class="dropdown">
                        <button class="btn btn-light border btn-sm px-3 py-2 dropdown-toggle fw-medium" data-bs-toggle="dropdown">
                            <i class="fas fa-filter text-muted me-1"></i> Filter
                        </button>
                        <ul class="dropdown-menu shadow border-0 rounded-3">
                            <li><a class="dropdown-item" href="{{ route('admin.products.index') }}">All Products</a></li>
                            <li><a class="dropdown-item" href="?is_active=1"><i class="fas fa-circle text-success me-2" style="font-size:8px;"></i>Active</a></li>
                            <li><a class="dropdown-item" href="?is_active=0"><i class="fas fa-circle text-danger me-2" style="font-size:8px;"></i>Inactive</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="?featured=1"><i class="fas fa-star text-warning me-2"></i>Featured</a></li>
                            <li><a class="dropdown-item" href="?trending=1"><i class="fas fa-fire text-danger me-2"></i>Trending</a></li>
                            <li><a class="dropdown-item" href="?new=1"><i class="fas fa-bolt text-info me-2"></i>New Arrival</a></li>
                        </ul>
                    </div>

                    <!-- Search Input -->
                    <div class="position-relative">
                        <i class="fas fa-search position-absolute text-muted" style="top: 50%; left: 12px; transform: translateY(-50%);"></i>
                        <input type="text" id="searchInput" class="form-control form-control-sm px-4 py-2 border rounded-pill bg-light" placeholder="Search products..." style="width: 250px;">
                    </div>

                    <!-- Reload Button -->
                    <button onclick="location.reload()" class="btn btn-light border btn-sm py-2 px-3 rounded-pill text-muted" title="Refresh">
                        <i class="fas fa-sync-alt"></i>
                    </button>

                </div>
            </div>

            <div class="table-responsive">
                <table class="table custom-table align-middle mb-0" id="productsTable">
                    <thead class="bg-light text-muted">
                        <tr>
                            <th class="ps-4" style="width: 40px;"><input type="checkbox" id="selectAll" class="form-check-input cursor-pointer"></th>
                            <th style="width: 80px;">Image</th>
                            <th>Product Details</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Added On</th>
                            <th class="text-center pe-4">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($products as $product)
                            <tr class="table-row-hover">
                                <!-- Checkbox -->
                                <td class="ps-4">
                                    <input type="checkbox" class="form-check-input checkbox cursor-pointer" value="{{ $product->id }}">
                                </td>

                                <!-- Image -->
                                <td>
                                    <div class="product-img-box">
                                        @if($product->image && file_exists(public_path($product->image)))
                                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                        @else
                                            <img src="{{ asset('assets/images/no-image.png') }}" alt="No Image" style="opacity:0.3;">
                                        @endif
                                    </div>
                                </td>

                                <!-- Name & Badges -->
                                <td>
                                    <div class="fw-bold text-dark mb-1 product-title-text" title="{{ $product->name }}">{{ $product->name }}</div>
                                    <div class="text-muted small mb-2">SKU: {{ $product->sku ?? 'N/A' }}</div>
                                    <div class="d-flex gap-1 flex-wrap">
                                        @if($product->is_featured)
                                            <span class="soft-badge bg-primary-soft text-primary"><i class="fas fa-star me-1"></i>Featured</span>
                                        @endif
                                        @if($product->is_trending)
                                            <span class="soft-badge bg-warning-soft text-warning-dark"><i class="fas fa-fire me-1"></i>Trending</span>
                                        @endif
                                        @if($product->is_new_arrival)
                                            <span class="soft-badge bg-info-soft text-info-dark"><i class="fas fa-bolt me-1"></i>New</span>
                                        @endif
                                    </div>
                                </td>

                                <!-- Price -->
                                <td>
                                    @if($product->sale_price)
                                        <div class="text-muted text-decoration-line-through small">₹{{ number_format($product->price, 2) }}</div>
                                        <div class="fw-bold text-danger">₹{{ number_format($product->sale_price, 2) }}</div>
                                    @else
                                        <div class="fw-bold text-dark">₹{{ number_format($product->price, 2) }}</div>
                                    @endif
                                </td>

                                <!-- Stock -->
                                <td>
                                    @if($product->stock_quantity <= 0)
                                        <span class="soft-badge bg-danger-soft text-danger fw-bold px-2 py-1"><i class="fas fa-times-circle me-1"></i>Out</span>
                                    @elseif($product->stock_quantity <= 10)
                                        <span class="soft-badge bg-warning-soft text-warning-dark fw-bold px-2 py-1">{{ $product->stock_quantity }} Left</span>
                                    @else
                                        <span class="soft-badge bg-success-soft text-success fw-bold px-2 py-1">{{ $product->stock_quantity }} in stock</span>
                                    @endif
                                </td>

                                <!-- Category -->
                                <td>
                                    <span class="text-secondary fw-medium">{{ $product->category->name ?? 'N/A' }}</span>
                                </td>

                                <!-- Status -->
                                <td>
                                    @if($product->is_active)
                                        <span class="badge bg-success rounded-pill px-3 py-2 fw-medium"><i class="fas fa-check-circle me-1"></i> Active</span>
                                    @else
                                        <span class="badge bg-secondary rounded-pill px-3 py-2 fw-medium"><i class="fas fa-ban me-1"></i> Inactive</span>
                                    @endif
                                </td>

                                <!-- Created -->
                                <td>
                                    <div class="text-dark fw-medium small">{{ $product->created_at->format('d M, Y') }}</div>
                                    <div class="text-muted small" style="font-size:11px;">{{ $product->created_at->format('h:i A') }}</div>
                                </td>

                                <!-- Action Buttons -->
                                <td class="text-center pe-4">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.products.show', $product->id) }}" class="action-btn view-btn" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="action-btn edit-btn" title="Edit Product">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <button class="action-btn delete-btn deleteBtn" data-id="{{ $product->id }}" data-name="{{ $product->name }}" title="Delete Product">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-5">
                                    <div class="text-muted my-4">
                                        <i class="fas fa-box-open fs-1 mb-3 opacity-50"></i>
                                        <h5>No Products Found</h5>
                                        <p>You haven't added any products yet or the search returned no results.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Footer Pagination (FIXED THE GIANT ARROW BUG HERE) -->
            <div class="card-footer bg-white border-top p-4 d-flex justify-content-center justify-content-md-end rounded-bottom-4 custom-pagination">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>


    <!-- DELETE MODAL -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" id="deleteForm">
                @csrf
                @method('DELETE')

                <div class="modal-content border-0 shadow-lg rounded-4">
                    <div class="modal-header bg-danger text-white border-0 rounded-top-4">
                        <h5 class="modal-title fw-bold"><i class="fas fa-exclamation-triangle me-2"></i> Confirm Delete</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4 text-center">
                        <div class="text-danger mb-3" style="font-size: 50px;">
                            <i class="fas fa-trash-alt"></i>
                        </div>
                        <h5 class="text-dark">Are you sure you want to delete this product?</h5>
                        <p class="text-danger fw-bold mb-1" id="productName"></p>
                        <small class="text-muted">This action will permanently remove the product and its images. It cannot be undone.</small>
                    </div>
                    <div class="modal-footer border-0 justify-content-center pb-4">
                        <button type="button" class="btn btn-light px-4 py-2 rounded-pill fw-medium border" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger px-4 py-2 rounded-pill fw-bold shadow-sm">Yes, Delete Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('styles')
<style>
    /* PREMIUM UI CSS */
    body { background-color: #f4f7fa; }
    
    .premium-card {
        box-shadow: 0 10px 30px rgba(0,0,0,0.04);
    }
    
    .custom-table th {
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 0.5px;
        font-weight: 600;
        padding-top: 15px;
        padding-bottom: 15px;
        border-bottom: 2px solid #eef2f5;
    }
    
    .custom-table td {
        padding: 15px 10px;
        border-bottom: 1px solid #f4f6f9;
        vertical-align: middle;
    }
    
    .table-row-hover:hover {
        background-color: #f8fafc;
    }

    .product-img-box {
        width: 60px;
        height: 60px;
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid #eef2f5;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .product-img-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-title-text {
        max-width: 250px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Soft Badges */
    .soft-badge {
        font-size: 11px;
        padding: 4px 8px;
        border-radius: 4px;
        font-weight: 600;
    }
    .bg-primary-soft { background-color: #e0f2fe; }
    .bg-warning-soft { background-color: #fef3c7; }
    .text-warning-dark { color: #d97706; }
    .bg-info-soft { background-color: #e0e7ff; }
    .text-info-dark { color: #4338ca; }
    .bg-danger-soft { background-color: #fee2e2; }
    .bg-success-soft { background-color: #dcfce7; }

    /* Sleek Action Buttons */
    .action-btn {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        border: none;
        transition: all 0.2s;
        text-decoration: none;
        font-size: 13px;
    }
    .view-btn { background: #e0f2fe; color: #0284c7; }
    .view-btn:hover { background: #0284c7; color: #fff; }
    
    .edit-btn { background: #f3e8ff; color: #9333ea; }
    .edit-btn:hover { background: #9333ea; color: #fff; }
    
    .delete-btn { background: #fee2e2; color: #dc2626; }
    .delete-btn:hover { background: #dc2626; color: #fff; }

    .cursor-pointer { cursor: pointer; }

    /* BUG FIX FOR GIANT LARAVEL SVG ARROWS */
    .custom-pagination svg {
        width: 20px !important;
        height: 20px !important;
    }
    .custom-pagination nav .hidden {
        display: none !important;
    }
    .custom-pagination p.text-sm {
        margin-bottom: 0;
        margin-top: 10px;
    }
</style>
@endpush

@push('scripts')
<script>
    // Search Functionality
    document.getElementById('searchInput').addEventListener('keyup', function () {
        let val = this.value.toLowerCase();
        document.querySelectorAll('#productsTable tbody tr').forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(val) ? '' : 'none';
        });
    });

    // Delete Modal Setup
    document.querySelectorAll('.deleteBtn').forEach(btn => {
        btn.addEventListener('click', function () {
            let id = this.dataset.id;
            let name = this.dataset.name;

            document.getElementById('productName').innerText = name;
            
            let deleteBaseUrl = "{{ url('admin/products') }}";
            document.getElementById('deleteForm').action = deleteBaseUrl + '/' + id;
            
            let modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            modal.show();
        });
    });

    // Select All Checkboxes
    document.getElementById('selectAll').addEventListener('change', function () {
        document.querySelectorAll('.checkbox').forEach(c => {
            c.checked = this.checked;
        });
    });
</script>
@endpush