<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //'
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'table_number' => 'required|numeric'
        ]);

        $data = $request->only(['name', 'table_number']);

        $data['order_time'] = now()->toDateTimeString();
        $data['status'] = 'pending';
        $data['total_price'] = 0;

        $data['waiter_id'] =  $request->user()->id;
        // $data['cashier_id'] = null;

        // return $data;
        $order = Order::create($data);

        return response(['order' => $order], 201);
    }
}