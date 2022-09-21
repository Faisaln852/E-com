@extends('layouts.frontendmaster')

@section('title',$product->name)

@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/add-rating" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rate {{$product->name}} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="rating-css">
                        <div class="star-icon">
                            @if($user_rating)
                            @for($i =1; $i<= $user_rating->stars_rated; $i++)
                                <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                <label for="rating{{$i}}" class="fa-solid fa-star"></label>
                                @endfor
                                @for($j = $user_rating->stars_rated+1; $j<=5; $j++) <input type="radio" value="{{$j}}" name="product_rating" id="rating{{$j}}">
                                    <label for="rating{{$j}}" class="fa-solid fa-star"></label>
                                    @endfor
                                    @else
                                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                                    <label for="rating1" class="fa-solid fa-star"></label>
                                    <input type="radio" value="2" name="product_rating" id="rating2">
                                    <label for="rating2" class="fa-solid fa-star"></label>
                                    <input type="radio" value="3" name="product_rating" id="rating3">
                                    <label for="rating3" class="fa-solid fa-star"></label>
                                    <input type="radio" value="4" name="product_rating" id="rating4">
                                    <label for="rating4" class="fa-solid fa-star"></label>
                                    <input type="radio" value="5" name="product_rating" id="rating5">
                                    <label for="rating5" class="fa-solid fa-star"></label>
                                    @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('category')}}" class="link-dark">Collections</a> /
            <a href="{{url('view_category/'.$product->category->slug)}}" class="link-dark">{{$product->category->name}}</a> /
            <a href="{{url('category/'.$product->category->slug.'/'.$product->slug)}}" class="link-dark">{{$product->name}}</a>
        </h6>
    </div>
</div>

<div class="container my-5 pb-5">
    <div class="card shadow product_data pb-3 px-3">
        <div class="card-body  ">
            <div class="row ">
                <div class="col-md-4 border-right product-img-container ">
                    <img src="{{asset('assets/uploads/products/'.$product->image)}}">
                </div>
                <div class="col-md-8 mt-3">
                    <h2 class="mb-0">
                        {{$product->name}}
                        @if($product->trending == '1')
                        <label style="font-size:16px;" class="float-end badge bg-danger tranding_tag">Trending</label>
                        @endif
                    </h2>
                    <hr>
                    <label class="me-3">Original Price: Rs <s>{{$product->original_price}}</s></label>
                    <label class="fw-bold">Selling Price: Rs {{$product->selling_price}}</label>
                    @php $ratenum = number_format($rating_value)
                    @endphp

                    <div class="rating">
                        @for($i =1 ; $i<=$ratenum; $i++) <i class="fa-solid fa-star checked"></i>
                            @endfor
                            @for($j=$ratenum+1; $j<=5; $j++) <i class="fa-solid fa-star"></i>
                                @endfor
                                <span>
                                    @if($rating->count() >0)
                                    {{$rating->count()}} Ratings
                                    @else
                                    No Ratings
                                    @endif
                                </span>
                    </div>
                    <p class="mt-3">
                        {!!$product->small_description!!}
                    </p>
                    <hr>
                    @if($product->qty > 0)
                    <label class="badge bg-success"> In Stock</label>
                    @else
                    <label class="badge bg-danger">Out of Stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-lg-4  col-md-4 col-sm-4 col-xs-4">
                            <label for="Quantity"> Quantity</label>
                            <div class="input-group mt-3">
                                <input type="hidden" value="{{$product->id}}" class="prod_id">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity" class="form-control qty-input text-center px-2" value="1">
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                        <div class=" col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <br />
                            @if($product->qty > 0)
                            <button type="button" class="btn btn-success me-3 mt-3 addToCartBtn float-start">Add to Cart <i class="fa fa-shopping-cart"></i> </button>
                            @endif
                            <button type="button" class="btn btn-primary me-3 mt-3 addToWishlist float-start ">Add to Wishlist <i class="fa fa-heart"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <h3>Description</h3>
                <p class="mt-3">
                    {!! $product->description!!}
                </p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Rate This Product
                </button>
            </div>
        </div>
    </div>
</div>

@endsection