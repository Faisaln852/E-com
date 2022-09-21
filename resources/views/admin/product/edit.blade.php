@extends('layouts.master')
@section('title','Edit Product')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Update Product</h4>
    </div>
    <div class="card-body">
        <form action="{{url('update_product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select name="category_id" class="form-control">
                        @foreach($category as $category)
                        <option value="{{$category->id}}" {{$product->cate_id== $category->id ?'selected':''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{$product->name}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Slug</label>
                    <input type="text" class="form-control" name="slug" value="{{$product->slug}}">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Small Description</label>
                    <textarea type="text" class="form-control" row="3" name="small_description">{{$product->small_description}}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label>Description</label>
                    <textarea type="text" class="form-control" row="3" name="description">{{$product->description}}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Original Price</label>
                    <input type="number" class="form-control" name="original_price" value="{{$product->original_price}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Selling Price</label>
                    <input type="number" class="form-control" name="selling_price" value="{{$product->selling_price}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Quantity</label>
                    <input type="number" class="form-control" name="qty" value="{{$product->qty}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Tax</label>
                    <input type="number" class="form-control" name="tax" value="{{$product->tax}}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>status</label>
                    <input type="checkbox" name="status" {{$product->status =="1"? 'checked':''}}>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Trending</label>
                    <input type="checkbox" name="trending" {{$product->trending =="1"? 'checked':''}}>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" value="{{$product->meta_title}}">
                </div>
                <div class="col-md-12 mb-3">
                    <label>Meta Keywords</label>
                    <textarea class="form-control" row="3" name="meta_keywords">{{$product->meta_keywords}}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label>Meta Description</label>
                    <textarea class="form-control" row="3" name="meta_description">{{$product->meta_description}}</textarea>
                </div>
                @if($product->image)
                <div class="col-md-12 mb-3">
                    <img src="{{asset('assets/uploads/products/'.$product->image)}}">
                </div>
                @endif
                <div class="col-md-12 mb-3">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-12 mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>


        </form>
    </div>

</div>


@endsection