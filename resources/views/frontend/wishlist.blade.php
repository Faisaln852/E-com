@extends('layouts.frontendmaster')

@section('title', 'My Cart')

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}" class="link-dark">Home</a> /
            <a href="{{url('cart')}}" class="link-dark">Cart</a>
        </h6>
    </div>
</div>

<div class="container my-5 cartitems">
    <div class="card shadow ">
        @if($wishlist->count() > 0)
        <div class="card-body">

            @foreach($wishlist as $item)
            <div class="row product_data">
                <div class="col-md-2">
                    <img src="{{asset('assets/uploads/products/'.$item->product->image)}}" height="70px" width="70px" alt="">
                </div>
                <div class="col-md-2 my-auto">
                    <h3>{{$item->product->name}}</h3>
                </div>
                <div class="col-md-2 my-auto">
                    <h3>{{$item->product->selling_price}}</h3>
                </div>
                <div class="col-md-2 my-auto">
                    <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                    @if($item->product->qty >= $item->prod_qty)
                    <label for="Quantity">Quantity</label>
                    <div class="input-group text-center mb-3" style="width:130px;">
                        <button class="input-group-text decrement-btn">-</button>
                        <input type="text" name="quantity" class="form-control qty-input text-center" value="1">
                        <button class="input-group-text increment-btn">+</button>
                    </div>
                    @else
                    <h6>Out of Stock</h6>
                    @endif
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-success addToCartBtn"><i class="fa fa-shopping"></i> Add to Cart</button>
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-danger remove-wishlist-item"><i class="fa fa-trash"></i> Remove</button>
                </div>
            </div>

            @endforeach
        </div>
        @else
        <div class="card-body text-center">
            <h2>There are no Products in Your Wishlist</h2>
        </div>
        @endif
    </div>
</div>
<div>

</div>

@endsection