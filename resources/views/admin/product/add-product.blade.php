@extends('layouts.master')
@section('title','Products')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
            <form action="{{url('insert_product')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select" name="cate_id">
                            <option value="">Select a Category</option>
                            @foreach($category as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Slug</label>
                        <input type="text" class="form-control" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Small Description</label>
                        <textarea type="text" class="form-control" row="3" name="small_description"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Description</label>
                        <textarea type="text" class="form-control" row="3" name="description"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Original Price</label>
                        <input type="number" class="form-control" name="original_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Selling Price</label>
                        <input type="number" class="form-control" name="selling_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Quantity</label>
                        <input type="number" class="form-control" name="qty">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Tax</label>
                        <input type="number" class="form-control" name="tax">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>status</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Trending</label>
                        <input type="checkbox" name="trending">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Meta Title</label>
                        <input type="text" class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Meta Keywords</label>
                        <textarea class="form-control" row="3" name="meta_keywords"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Meta Description</label>
                        <textarea class="form-control" row="3" name="meta_description"></textarea>
                    </div>
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
</div>
@endsection