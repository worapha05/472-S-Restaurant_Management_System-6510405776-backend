<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'price', 'description', 'status', 'category', 'image_url'];

    public function orderLists() : HasMany
    {
        return $this->hasMany(OrderList::class);
    }
}
