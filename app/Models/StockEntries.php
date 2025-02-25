<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockEntries extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [ 'stock_item_id', 'inventory_logs_id', 'cost_per_unit', 'quantity_added'];

    public function inventory_logs(): BelongsTo
    {
        return $this->belongsTo(InventoryLogs::class);
    }

    public function stock_item(): BelongsTo
    {
        return $this->belongsTo(StockItem::class);
    }
}
