@extends('layouts.app')

@section('content')
<div class="container py-5">

    <h3 class="mb-4">My Wishlist</h3>

    @if($products->count() > 0)
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="card">

                        <img src="{{ asset($product->image) }}" class="card-img-top" style="height:200px; object-fit:cover;">

                        <div class="card-body text-center">
                            <h6>{{ $product->name }}</h6>
                            <p>₹{{ $product->price }}</p>

                            <button class="btn btn-danger btn-sm remove-wishlist"
                                    data-id="{{ $product->id }}">
                                Remove
                            </button>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No products in wishlist.</p>
    @endif

</div>
@endsection

<script>
document.querySelectorAll('.remove-wishlist').forEach(btn => {
    btn.addEventListener('click', function () {
        let id = this.dataset.id;

        fetch("{{ route('wishlist.remove') }}", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ id: id })
        }).then(res => location.reload());
    });
});
</script>