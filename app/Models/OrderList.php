<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderList extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['order_id', 'description', 'price', 'quantity'];
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
