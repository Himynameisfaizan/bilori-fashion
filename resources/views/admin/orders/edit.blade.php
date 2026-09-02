@extends('admin.layout.app')

@section('content')
<div class="container-fluid">
    <h3>Edit Order #{{ $order->order_number }}</h3>

    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="pending">Pending</option>
                <option value="processing">Processing</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            Update Order
        </button>
    </form>
</div>
@endsection