<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetail;
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
        $data['total_price'] = 15000;

        $data['waiter_id'] =  $request->user()->id;
        // $data['cashier_id'] = null;
        $data['items'] = $request->items;

        // return $data;
        $order = Order::create($data);

        collect($data['items'])->map(function($item)use ($order){
            $foodDrink = Item::where('id', $item)->first();
            OrderDetail::create([
                'order_id' => $order->id,
                'item_id' => $item,
                'price' => $foodDrink->price
            ]);
        });

        return response([
            'order' => $order,
            'items' => $data['items']
        ], 201);
    }
}