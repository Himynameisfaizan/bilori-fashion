@extends('admin.layout.app')

@section('title', 'Coupons Management')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3 class="card-title">Coupons</h3>

            <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Coupon
            </a>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Code</th>
                        <th>Discount Value</th>
                        <th>Type</th>
                        <th>Applicable For</th> <th>Valid From - Till</th>
                        <th>Usage</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($coupons as $key => $coupon)
                        <tr>
                            <td>{{ $coupons->firstItem() + $key }}</td>

                            <td>
                                <strong>{{ $coupon->code }}</strong>
                                @if($coupon->description)
                                    <br><small class="text-muted">{{ Str::limit($coupon->description, 30) }}</small>
                                @endif
                            </td>

                            <td>
                                {{ $coupon->type == 'percentage' ? rtrim(rtrim($coupon->value, '0'), '.') . '%' : '₹' . rtrim(rtrim($coupon->value, '0'), '.') }}
                            </td>

                            <td>
                                <span class="badge badge-info">{{ ucfirst($coupon->type) }}</span>
                            </td>

                            <td>
                                @if($coupon->category_id && $coupon->category) 
                                    {{-- Dhyan rahe: Iske liye Coupon model me category() relationship hona zaroori hai --}}
                                    <span class="badge badge-primary">{{ $coupon->category->name }}</span>
                                @else
                                    <span class="badge badge-secondary">Global (All)</span>
                                @endif
                            </td>

                            <td style="font-size: 0.85em;">
                                <strong>Start:</strong> {{ $coupon->start_date ? $coupon->start_date->format('d M, Y h:i A') : 'Forever' }}<br>
                                <strong>End:</strong> {{ $coupon->end_date ? $coupon->end_date->format('d M, Y h:i A') : 'Forever' }}
                            </td>

                            <td>
                                {{ $coupon->used_count }} / {{ $coupon->usage_limit ? $coupon->usage_limit : 'Unlimited' }}
                            </td>

                            <td>
                                <span class="badge badge-{{ $coupon->status == 'active' ? 'success' : 'danger' }}">
                                    {{ ucfirst($coupon->status) }}
                                </span>
                            </td>

                            <td>
                                <a href="{{ route('admin.coupons.edit', $coupon->id) }}"
                                   class="btn btn-sm btn-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.coupons.destroy', $coupon->id) }}"
                                      method="POST"
                                      style="display:inline-block">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Delete this coupon?')" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">No coupons found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $coupons->links() }}
        </div>
    </div>

</div>
@endsection