@extends('admin.layout.app')

@section('title', 'Customer Reviews')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Customer Reviews</h3>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Product</th>
                        <th>Rating</th>
                        <th>Review</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($reviews as $key => $review)
                        <tr>
                            <td>{{ $key + 1 }}</td>

                            <td>
                                {{ $review->user->name ?? 'N/A' }}
                            </td>

                            <td>
                                {{ $review->product->name ?? 'N/A' }}
                            </td>

                            <td>
                                ⭐ {{ $review->rating }}/5
                            </td>

                            <td>
                                {{ $review->review }}
                            </td>

                            <td>
                                {{ $review->created_at->format('d M Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No reviews found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $reviews->links() }}
        </div>
    </div>

</div>
@endsection