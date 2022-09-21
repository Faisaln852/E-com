@extends('layouts.frontendmaster')
@section('title','Category')
@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>All Categories</h2>
                <div class="row">
                    @foreach($category as $category)
                    <div class="col-md-4 mb-3">
                        <a href="{{url('view_category/'.$category->slug)}}" class="nav-link">
                            <div class="card mt-3 align-items-center p-2 text-center">
                                <div class="category-product-img-container">
                                    <img src="{{asset('assets/uploads/category/'.$category->image)}}" class="img-fluid" alt="Product Image">
                                </div>
                                <div class="card-body">
                                    <div class="mt-3">
                                        <h5>{{$category->name}}</h5>
                                        <p>{{$category->description}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection