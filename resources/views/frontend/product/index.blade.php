@extends('layouts.frontendmaster')
@section('title')
{{$category->name}}
@endsection
@section('content')
<div class="py-5 my-5">
    <div class="container">
        <div class="row">
            <h2>{{$category->name}}</h2>
            @foreach($products as $product)
            <div class="col-md-3  ">
                <div class="card my-3 product-cards-height card-transition">
                    <a href="{{url('category/'.$category->slug.'/'.$product->slug)}}" class="nav-link">
                        <div class="products-img-container">
                            <img src="{{asset('assets/uploads/products/'.$product->image)}}">
                        </div>
                        <div class="card-body">
                            <div class="mt-3">
                                <h5>{{$product->name}}</h5>
                                <p> {{ \Illuminate\Support\Str::limit($product->description, 70,'...Read more') }}</p>
                            </div>
                            <div class="">
                                <spane class=" btn btn-success footer-position1">{{$product->selling_price}}</spane>
                                <spane class=" btn btn-danger footer-position2"><s>{{$product->original_price}}</s></spane>
                            </div>
                        </div>
                </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>

</div>


@endsection