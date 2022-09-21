@extends('layouts.frontendmaster')
@section('title')
My Orders
@endsection
@section('content')

<div class="container py-5">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Order View
                        <a href="{{url('my-orders')}}" class="btn btn-warning text-white float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Shipping Details</h4>
                            <hr>
                            <label> Fist name</label>
                            <div class="border p-2">{{$orders->fname}}</div>
                            <label> Last name</label>
                            <div class="border p-2">{{$orders->lname}}</div>
                            <label>Email</label>
                            <div class="border p-2">{{$orders->email}}</div>
                            <label>Contact</label>
                            <div class="border p-2">{{$orders->phone}}</div>
                            <label>Shipping Address</label>
                            <div class="border p-2">
                                {{$orders->address1}},
                                {{$orders->address2}},
                                {{$orders->city}},
                                {{$orders->state}},
                                {{$orders->country}},
                            </div>
                            <label> Zip Code</label>
                            <div class="border p-2">{{$orders->pincode}}</div>
                        </div>
                        <div class="col-md-6 py-4">
                            <h6>Order Details</h6>
                            <hr>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders->orderitems as $item)
                                    <tr>
                                        <td>{{$item->products->name}}</td>
                                        <td>{{$item->qty}}hh</td>
                                        <td>{{$item->price}}</td>
                                        <td>
                                            <img src="{{asset('assets/uploads/products/'.$item->products->image)}}" width="50px" alt="">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4 class="px-2">Grand Total: <span class="float-end">{{$orders->total_price}}</h4></span>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection