<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'table_id', 'address', 'status', 'type', 'payment_method', 'sum_price'];

    public function orderLists(): HasMany
    {
        return $this->hasMany(OrderList::class);
    }
    public function table(): BelongsTo
    {
        return $this->belongsTo(Table::class);
    }
}
