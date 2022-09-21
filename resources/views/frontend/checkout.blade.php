@extends('layouts.frontendmaster')

@section('title', 'Checkout')

@section('content')

<div class="container">
    <form action="{{url('place-order')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-7">
                <div class="card my-5">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row checkout-form">

                            <div class="col-md-6">
                                <label> First Name</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="fname" placeholder="Enter First Name" required>
                            </div>
                            <div class="col-md-6">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="lname" value="{{Auth::user()->lname}}" placeholder="Enter Last Name" required>
                            </div>
                            <div class="col-md-6">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" placeholder="Enter Email" required>
                            </div>
                            <div class="col-md-6">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}" placeholder="Enter Phone Number" required>
                            </div>
                            <div class="col-md-6">
                                <label>Address 1</label>
                                <input type="text" class="form-control" name="address1" value="{{Auth::user()->address1}}" placeholder="Enter Address 1" required>
                            </div>
                            <div class="col-md-6">
                                <label>Address 2</label>
                                <input type="text" class="form-control" name="address2" value="{{Auth::user()->address2}}" placeholder="Enter Address 2" required>
                            </div>
                            <div class="col-md-6">
                                <label>City</label>
                                <input type="text" class="form-control" name="city" value="{{Auth::user()->city}}" placeholder="Enter City" required>
                            </div>
                            <div class="col-md-6">
                                <label>State</label>
                                <input type="text" class="form-control" name="state" value="{{Auth::user()->state}}" placeholder="Enter State" required>
                            </div>
                            <div class="col-md-6">
                                <label>Country</label>
                                <input type="text" class="form-control" name="country" value="{{Auth::user()->country}}" placeholder="Enter Country" required>
                            </div>
                            <div class="col-md-6">
                                <label>Pin Code</label>
                                <input type="text" class="form-control" name="pincode" value="{{Auth::user()->pincode}}" placeholder="Enter Pin Code" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 mt-5">

                <div class="card">

                    <div class="card-body">
                        Order Details
                        <hr>
                        @if($cartitems->count() > 0)
                        <table class="table table-striped table-bordered">

                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Sum Price</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php $total =0; @endphp
                                @foreach($cartitems as $item)
                                <tr>
                                    <td>{{$item->product->name}}</td>
                                    <td>{{$item->prod_qty}}</td>
                                    <td>{{$item->product->selling_price* $item->prod_qty}}</td>
                                </tr>
                                @php $total += $item->product->selling_price* $item->prod_qty @endphp
                                @endforeach
                            </tbody>
                        </table>

                        <h6 class="float-start mt-2">Total Price Rs: <span class="fw-bold"> {{$total}}</span></h6>
                        <br>
                        <button type="sumbit" class="btn btn-outline-primary float-end mt-2 w-100">Place Order | COD</button>
                        <!--   <button type="button" class="btn btn-outline-success float-end mt-2 w-100">Pay with Razorpay</button>-->

                        @else
                        <div class="card-body text-center">
                            <h2>No Product in Cart</i></h2>
                        </div>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </form>
</div>


@endsection