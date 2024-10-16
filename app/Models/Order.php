<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'status',
        'payment_id',
        'shipping_address_id'
    ];

    //una orden puede tener muchas categorias
    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    //relacion con payment, una order tiene un pago
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    //relacion con la direccion de envio
    public function shippingAddress()
    {
        return $this->newBelongsTo(ShippingAddress::class);
    }

    //relacion con los items del pedido
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
