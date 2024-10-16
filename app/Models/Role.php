<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'role',
        'description',
    ];

    //relacion con usuarios, un rol tiene muchos usuarios
    public function users()
    {
        return $this->hasMany(user::class);
    }

}
