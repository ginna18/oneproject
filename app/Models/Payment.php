<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'payment_method',
        'payment_status',
        'payment_date'
    ];

    //relacion con model user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //relacion con model orden
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
