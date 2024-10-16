<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category_id',
        'imagen'
    ];

    //relacion con categorias 
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    //relaciona con model orderItems
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
