@extends('layouts.master')
@section('title','Products')
@section('content')
<div class="container product-parent">
    <div class="card mb-5  ">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>Product Name</th>
                    <th>Product Status</th>
                    <th>Product Description</th>
                    <th>Product Price</th>
                    <th>Product Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @foreach($product as $product)
                    <tr class="product_data">
                        <td>{{$product->name}}</td>
                        <td>{{$product->status=='0'?'Visible':'Hidden'}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->selling_price}}</td>
                        <input type="hidden" class="prod_id" value="{{$product->id}}" />
                        <!--change-->

                        <td><img src="{{'assets/uploads/products/'.$product->image}}" width="100px"></td>
                        <td>
                            <a href="{{url('edit_product/'.$product->id)}}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <button class="btn btn-danger delete-product-item">Delete</button>
                            <!--  <a href="{{url('delete_product/'.$product->id)}}" class="btn btn-danger delete-test-product">Delete</a> -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection