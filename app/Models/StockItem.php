<?php

namespace App\Models;

use App\Models\Enums\StockItemCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockItem extends Model
{
    use HasFactory, SoftDeletes;
    protected $casts = [
        'category' => StockItemCategory::class,
    ];
    protected $fillable = [ 'name', 'current_stock', 'unit'];

    public function stock_entries(): HasMany
    {
        return $this->hasMany(StockEntry::class);
    }
}
