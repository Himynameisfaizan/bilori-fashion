@extends('admin.layout.app')

@section('title', 'Sales Report')

@section('content')
<div class="container-fluid">

    <!-- Stats -->
    <div class="row mb-3">
        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $stats['total_orders'] }}</h3>
                    <p>Total Orders</p>
                </div>
                <div class="icon"><i class="fas fa-shopping-cart"></i></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>${{ $stats['total_revenue'] }} ✅</h3>
                    <p>Total Sales</p>
                </div>
                <div class="icon"><i class="fas fa-dollar-sign"></i></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>${{ $stats['avg_order_value'] }} ✅</h3>
                    <p>Avg Order Value</p>
                </div>
                <div class="icon"><i class="fas fa-chart-line"></i></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $stats['total_customers'] }}</h3>
                    <p>Total Customers</p>
                </div>
                <div class="icon"><i class="fas fa-users"></i></div>
            </div>
        </div>
    </div>

    <!-- Monthly Sales Table -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Monthly Sales</h3>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>Month</th>
                        <th>Orders</th>
                        <th>Total Sales</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($monthly_sales as $row)
                        <tr>
                            <td>{{ $row->year }}</td>
                            <td>{{ \Carbon\Carbon::create()->month($row->month)->format('F') }}</td>
                            <td>{{ $row->orders_count }}</td>
                            <td>${{ number_format($row->total_sales, 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No data found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection