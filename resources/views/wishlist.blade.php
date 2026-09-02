@extends('layouts.app')

@section('content')
<main class="main__content_wrapper">
    <!-- Start breadcrumb section -->
    <section style="padding-top:150px;" class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title text-white mb-25">Wishlist</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Wishlist</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- cart section start -->
    <section class="cart__section section--padding">
        <div class="container">
            <div class="cart__section--inner">
                <h2 class="cart__title mb-40">My Wishlist</h2>
                <div class="cart__table">
                    @if($products->count() > 0)
                    <table class="cart__table--inner">
                        <thead class="cart__table--header">
                            <tr class="cart__table--header__items">
                                <th class="cart__table--header__list">Product</th>
                                <th class="cart__table--header__list">Price</th>
                                <th class="cart__table--header__list text-center">STOCK STATUS</th>
                                <th class="cart__table--header__list text-right">ADD TO CART</th>
                            </tr>
                        </thead>
                        <tbody class="cart__table--body">
                            @foreach($products as $product)
                            <tr class="cart__table--body__items" id="wishlist-row-{{ $product->id }}">
                                <td class="cart__table--body__list">
                                    <div class="cart__product d-flex align-items-center">
                                        <button class="cart__remove--btn remove-wishlist" 
                                                data-id="{{ $product->id }}" 
                                                aria-label="remove button" type="button">
                                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16px" height="16px">
                                                <path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"/>
                                            </svg>
                                        </button>
                                        <div class="cart__thumbnail">
                                            <a href="{{ route('product.details', $product->id) }}">
                                                <img class="border-radius-5" src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="width: 80px; height: 80px; object-fit: cover;">
                                            </a>
                                        </div>
                                        <div class="cart__content">
                                            <h4 class="cart__content--title">
                                                <a href="{{ route('product.details', $product->id) }}">{{ $product->name }}</a>
                                            </h4>
                                            {{-- Optional: Add variants if available --}}
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__table--body__list">
                                    <span class="cart__price">₹{{ number_format($product->price, 2) }}</span>
                                </td>
                                <td class="cart__table--body__list text-center">
                                    <span class="in__stock text__secondary">In Stock</span>
                                </td>
                                <td class="cart__table--body__list text-right">
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="wishlist__cart--btn primary__btn">Add To Cart</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="text-center py-5">
                        <h4>Your wishlist is empty!</h4>
                        <a href="{{ url('/shop') }}" class="primary__btn mt-3">Continue Shopping</a>
                    </div>
                    @endif

                    <div class="continue__shopping d-flex justify-content-between mt-4">
                        <a class="continue__shopping--link" href="{{ url('/') }}">Continue shopping</a>
                        <a class="continue__shopping--clear" href="{{ url('/shop') }}">View All Products</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    document.querySelectorAll('.remove-wishlist').forEach(btn => {
        btn.addEventListener('click', function () {
            if(!confirm('Are you sure you want to remove this item?')) return;
            
            let id = this.dataset.id;
            let row = document.getElementById('wishlist-row-' + id);

            fetch("{{ route('wishlist.remove') }}", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ id: id })
            })
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    row.remove();
                    // Check if table is empty to show empty message
                    if(document.querySelectorAll('.cart__table--body__items').length === 0) {
                        location.reload(); 
                    }
                }
            });
        });
    });
</script>
@endsection