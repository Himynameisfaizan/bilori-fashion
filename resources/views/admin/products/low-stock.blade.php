@extends('admin.layout.app')

@section('title', 'Low Stock Products')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Low Stock Products</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left"></i> Back to Products
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="products-table">
                                <thead>
                                    <tr>
                                        <th width="50">ID</th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>SKU</th>
                                        <th>Price</th>
                                        <th>Current Stock</th>
                                        <th>Status</th>
                                        <th width="150">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>
                                                @if($product->image)
                                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                                        width="50" height="50" style="object-fit: cover;">
                                                @else
                                                    <img src="{{ asset('images/no-image.png') }}" alt="No Image" width="50"
                                                        height="50" style="object-fit: cover;">
                                                @endif
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->sku ?? 'N/A' }}</td>
                                            <td>${{ number_format($product->price, 2) }}</td>
                                            <td>
                                                @if($product->stock_quantity <= 0)
                                                    <span class="badge badge-danger">Out of Stock
                                                        ({{ $product->stock_quantity }})</span>
                                                @elseif($product->stock_quantity <= 5)
                                                    <span class="badge badge-warning">Critical
                                                        ({{ $product->stock_quantity }})</span>
                                                @else
                                                    <span class="badge badge-info">Low ({{ $product->stock_quantity }})</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($product->status == 'active')
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <button type="button" class="btn btn-success btn-sm"
                                                    onclick="updateStock({{ $product->id }})">
                                                    <i class="fas fa-plus"></i> Add Stock
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">
                                                No low stock products found.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Stock Modal -->
    <div class="modal fade" id="addStockModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Stock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addStockForm" action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="quantity">Quantity to Add</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
                            <small class="form-text text-muted">Enter the number of units to add to current stock.</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Stock</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function updateStock(productId) {
            const modal = $('#addStockModal');
            const form = $('#addStockForm');
            form.attr('action', '/admin/products/' + productId + '/add-stock');
            modal.modal('show');
        }

        // Handle form submission via AJAX (optional)
        $('#addStockForm').on('submit', function (e) {
            e.preventDefault();
            const form = $(this);
            const url = form.attr('action');
            const data = form.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function (response) {
                    if (response.success) {
                        $('#addStockModal').modal('hide');
                        location.reload();
                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function (xhr) {
                    alert('An error occurred. Please try again.');
                }
            });
        });
    </script>
@endpush