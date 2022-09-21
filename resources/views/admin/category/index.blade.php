@extends('layouts.master')
@section('title','Category')
@section('content')

<div class="container category-parent ">
    <div class="card mb-5 ">
        <div class="card-body table-responsive-lg ">
            <table class="table table-striped">
                <thead>
                    <th>Category Name</th>
                    <th>Category Status</th>
                    <th>Category Description</th>
                    <th>Category Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach($category as $category)
                    <tr class="category-data">
                        <td>{{$category->name}}</td>
                        <td>{{$category->status=='0'?'Visible':'Hidden'}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                            <div class="category-img-container">
                                <img src="{{'assets/uploads/category/'.$category->image}}">
                            </div>
                        </td>
                        <td>
                            <a href="{{url('edit_category/'.$category->id)}}" class="btn btn-success">Edit</a>
                        </td>
                        <input type="hidden" class="category-id" value="{{$category->id}}">
                        <td>
                            <button class="btn btn-danger delete-category-item ">Delete</button>
                            <!--    <a href="{{url('delete_category/'.$category->id)}}" class="btn btn-danger">Delete</a>-->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection