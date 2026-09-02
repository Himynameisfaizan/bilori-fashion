@extends('admin.layout.app')

@section('content')
<div class="container-fluid">

    <h2 class="mb-4">📦 Products Report</h2>

    <!-- 🔥 STATS CARDS (same as orders page) -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card shadow p-3 text-center">
                <h6>Total Products</h6>
                <h4>{{ $total_products ?? 0 }}</h4>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow p-3 text-center">
                <h6>Total Revenue</h6>
                <h4>₹{{ $total_revenue ?? 0 }}</h4>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow p-3 text-center">
                <h6>Top Selling</h6>
                <h4>{{ $topProducts->first()->name ?? '-' }}</h4>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow p-3 text-center">
                <h6>Low Stock</h6>
                <h4>{{ $lowStockProducts->count() ?? 0 }}</h4>
            </div>
        </div>
    </div>


    <!-- 🔥 TOP PRODUCTS TABLE -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5>Top Selling Products</h5>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Sold Qty</th>
                        <th>Revenue</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($topProducts as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>₹{{ $product->price }}</td>
                        <td>{{ $product->total_quantity }}</td>
                        <td>₹{{ $product->total_revenue }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


   
    <!-- 🔥 LOW STOCK PRODUCTS -->
    <div class="card shadow">
        <div class="card-header">
            <h5>Low Stock Products</h5>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lowStockProducts as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td class="text-danger">{{ $product->quantity }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection