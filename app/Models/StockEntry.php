<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockEntry extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [ 'stock_item_id', 'inventory_log_id', 'cost', 'cost_per_unit', 'quantity'];

    public function inventory_logs(): BelongsTo
    {
        return $this->belongsTo(InventoryLog::class);
    }

    public function stock_item(): BelongsTo
    {
        return $this->belongsTo(StockItem::class);
    }
}
