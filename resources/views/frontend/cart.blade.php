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
        @if($cartitems->count() > 0)
        <div class="card-body">
            @php $total =0; @endphp
            @foreach($cartitems as $item)
            <div class="row product_data">
                <div class="col-md-2">
                    <img src="{{asset('assets/uploads/products/'.$item->product->image)}}" height="70px" width="70px" alt="">
                </div>
                <div class="col-md-3 my-auto">
                    <h3>{{$item->product->name}}</h3>
                </div>
                <div class="col-md-2 my-auto">
                    <h3>{{$item->product->selling_price * $item->prod_qty}}</h3>
                </div>
                <div class="col-md-3 my-auto">
                    <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                    @if($item->product->qty >= $item->prod_qty)
                    <label for="Quantity">Quantity</label>
                    <div class="input-group text-center mb-3" style="width:130px;">
                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                        <input type="text" name="quantity" class="form-control qty-input text-center" value="{{$item->prod_qty}}">
                        <button class="input-group-text changeQuantity increment-btn">+</button>
                    </div>
                    @php $total += $item->product->selling_price* $item->prod_qty; @endphp
                    @else
                    <h6>Out of Stock</h6>
                    @endif
                </div>
                <div class="col-md-2 mt-3">
                    <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
                </div>
            </div>

            @endforeach
        </div>
        <div class="card-footer">
            <h6> Total Price: Rs {{$total}}
                <a href="{{url('checkout')}}" class="btn btn-outline-success float-end">Proceed to Checkout</a>
            </h6>
        </div>
        @else
        <div class="card-body text-center">
            <h2>Your <i class="fa fa-shopping-cart"></i> Cart is empty</h2>
            <a href="{{url('category')}}" class="btn btn-outline-primary float-end">Continue Shopping</a>
        </div>
        @endif
    </div>
</div>
<div>

</div>

@endsection