@extends('admin.layout.app')

@section('content')
<div class="container mt-4">

    <h2>Create Coupon</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.coupons.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Coupon Code</label>
                <input type="text" name="code" class="form-control" value="{{ old('code') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Coupon Type</label>
                <select name="type" class="form-control" required>
                    <option value="percentage" {{ old('type') == 'percentage' ? 'selected' : '' }}>Percentage (%)</option>
                    <option value="fixed" {{ old('type') == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Value (Discount)</label>
                <input type="number" step="0.01" name="value" class="form-control" value="{{ old('value') }}" required>
            </div>

            <div class="col-md-4 mb-3">
                <label>Min Order Amount</label>
                <input type="number" step="0.01" name="min_order_amount" class="form-control" value="{{ old('min_order_amount') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label>Max Discount Amount</label>
                <input type="number" step="0.01" name="max_discount" class="form-control" value="{{ old('max_discount') }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Start Date</label>
                <input type="datetime-local" name="start_date" class="form-control" value="{{ old('start_date') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label>End Date</label>
                <input type="datetime-local" name="end_date" class="form-control" value="{{ old('end_date') }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Usage Limit</label>
                <input type="number" name="usage_limit" class="form-control" value="{{ old('usage_limit') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label>Applicable Category</label>
                <select name="category_id" class="form-control">
                    <option value="">Global (All Categories)</option>
                    @if(isset($categories) && count($categories) > 0)
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    @endif
                </select>
                <small class="text-muted">Chhodne par ye poore store par apply hoga.</small>
            </div>

            <div class="col-md-4 mb-3">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label>Description (Offers Section me dikhane ke liye)</label>
            <textarea name="description" class="form-control" rows="3" placeholder="E.g., Extra 10% Off on your 1st order above Rs 1599">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save Coupon</button>
        <a href="{{ route('admin.coupons.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

</div>
@endsection