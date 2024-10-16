<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price'
    ];

    //relacion con el modelo de order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    //relacion con model product
    public function product()
    {
        return $this->newBelongsTo(Product::class);
    }
}
