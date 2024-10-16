<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'movil',
        'fijo',
        'email',
        'password',
        'role_id',
    ];
    
    //un usuario tiene un rol
    public function role()
    {   
        return $this->newBelongsTo(Role::class);
    }
    
    //user->order un usario tiene muchos pedidos
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    //un usuario tiene muchos pagos
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
