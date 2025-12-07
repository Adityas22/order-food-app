<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'table_number',
        'order_time',
        'status',
        'total_price',
        'waiter_id',
        // 'cashier_id',
    ];

    public function orderDetails()
    {
        // return $this->hasMany(OrderDetail::class);
    }
}