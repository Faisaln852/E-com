<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class frontendcontroller extends Controller
{
    public function index()
    {
        $orders = Order::where('status', '0')->get();
        return view('admin.index', compact('orders'));
    }
    public function view($id)
    {
        $orders = Order::where('id', $id)->first();
        return view('admin.orders.view', compact('orders'));
    }

    public function updateorder(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('/dashboard')->with('status', "Order Updated Successfully");
    }

    public function orderhistory()
    {
        $orders = Order::where('status', '1')->get();
        return view('admin.orders.orderhistory', compact('orders'));
    }
}
