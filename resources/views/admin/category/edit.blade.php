@extends('layouts.master')
@section('title','Edit Category')

@section('content')
<div class="container">

    <form action="{{url('update_category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6 my-3">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{$category->name}}">
            </div>
            <div class="col-md-6 my-3">
                <label>Slug</label>
                <input type="text" class="form-control" name="slug" value="{{$category->slug}}">
            </div>
            <div class="col-md-12 mb-3">
                <label>Description</label>
                <textarea type="text" class="form-control" row="3" name="description">{{$category->description}}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label>status</label>
                <input type="checkbox" name="status" {{$category->status=='1'?'checked':''}}>
            </div>
            <div class="col-md-6 mb-3">
                <label>papular</label>
                <input type="checkbox" name="papular" {{$category->papular=='1'?'checked':''}}>
            </div>
            <div class="col-md-6 mb-3">
                <label>Meta Title</label>
                <input type="text" class="form-control" name="meta_title" value="{{$category->meta_title}}">
            </div>
            <div class="col-md-12 mb-3">
                <label>Meta Keywords</label>
                <textarea class="form-control" row="3" name="meta_keywords">{{$category->meta_keywords}}</textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label>Meta Description</label>
                <textarea class="form-control" row="3" name="meta_description">{{$category->meta_description}}</textarea>
            </div>
            @if($category->image)
            <div class="col-md-6 mb-3">
                <label>Image</label>
                <img src="{{asset('assets/uploads/category/'.$category->image)}}" width="100px">
            </div>
            @endif
            <div class="col-md-12 mb-3">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-12 mb-3 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary ">Submit</button>
            </div>
        </div>
    </form>


</div>
@endsection