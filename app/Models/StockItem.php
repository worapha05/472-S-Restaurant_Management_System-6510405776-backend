<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [ 'name', 'description', 'current_stock', 'unit'];

    public function stock_entries(): HasMany
    {
        return $this->hasMany(StockEntry::class);
    }
}
