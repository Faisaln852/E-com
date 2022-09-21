@extends('layouts.master')
@section('title','Category')
@section('content')

<div class="card">
    <div class="card-header bg-primary">
        <h2 class="text-white">Add Category</h2>
    </div>
    <div class="card-body">
        <form action="{{url('insert_category')}}" method="Post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 my-3">
                    <label class="mb-2">Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="col-md-6 my-3">
                    <label class="mb-2">Slug</label>
                    <input type="text" class="form-control" name="slug" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="mb-2">Description</label>
                    <textarea type="text" class="form-control" row="3" name="description" required></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="mb-2">status</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="mb-2">papular</label>
                    <input type="checkbox" name="papular">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="mb-2">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="mb-2">Meta Keywords</label>
                    <textarea class="form-control" row="3" name="meta_keywords" required></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="mb-2">Meta Description</label>
                    <textarea class="form-control" row="3" name="meta_description" required></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <input type="file" name="image" class="form-control" required>
                </div>
                <div class="col-md-12 mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-primary px-5">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection