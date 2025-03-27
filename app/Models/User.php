<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'phone_number',
        'role',
        'address',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class);
    }

    public function inventory_logs(): HasMany
    {
        return $this->hasMany(InventoryLog::class);
    }

    public function isAdmin(): bool
    {
        return $this->role === 'ADMIN';
    }

    public function isStaff(): bool
    {
        return $this->role === 'STAFF';
    }

    public function isUser(): bool
    {
        return $this->role === 'USER';
    }
}
