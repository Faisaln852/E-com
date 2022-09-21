@extends('layouts.frontendmaster')
@section('title','Welcome')
@section('content')

<div class="my-5">
    <div class="container">
        <div class="row">
            <h2>Featured Products</h2>
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach($featured_products as $product)
                <a href="{{url('category/'.$product->category->slug.'/'.$product->slug)}}" class="nav-link">
                    <div class="item">
                        <div class="card mt-3 align-items-center p-2 text-center ">
                            <div class="index-product-img-container">
                                <img src="{{asset('assets/uploads/products/'.$product->image)}}" class="featured-image-css" alt="Product Image">
                            </div>
                            <div class="card-body">
                                <div class="mt-3">
                                    <h5>{{$product->name}}</h5>
                                    <p>{{$product->description}}</p>
                                </div>
                                <spane class="float-start">{{$product->selling_price}}</spane>
                                <spane class="float-end"><s>{{$product->original_price}}</s></spane>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

        <div class="row">
            <h2>Trending Category</h2>
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach($trending_category as $category)
                <a href="{{url('view_category/'.$category->slug)}}" class="nav-link">
                    <div class="item">
                        <div class="card mt-3 align-items-center p-2 text-center ">
                            <div class="index-product-img-container">
                                <img src="{{asset('assets/uploads/category/'.$category->image)}}" class="featured-image-css" alt="Category Image">
                            </div>
                            <div class="card-body">
                                <div class="mt-3">
                                    <h5>{{$category->name}}</h5>
                                    <p>{{$category->small_description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>

</div>


@endsection
@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 5
            },
            1000: {
                items: 4
            },
        }
    })
</script>
@endsection