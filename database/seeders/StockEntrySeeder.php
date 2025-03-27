<?php

namespace Database\Seeders;

use App\Models\InventoryLog;
use App\Models\StockEntry;
use App\Models\StockItem;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class StockEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 15; $i++) {
            if ($i <= 5 || $i > 10) {
                for ($j = 1; $j <= 5; $j++) {
                    $stockItem = StockItem::inRandomOrder()->first();
                    $quantity = random_int(3, 10);
                    $inventoryLog = InventoryLog::find($i);
                    $stockEntry = new StockEntry();
                    $stockEntry->stock_item_id = $stockItem->id;
                    $stockEntry->inventory_log_id = $i;
                    $stockEntry->cost = $inventoryLog->total_cost / 5;
                    $stockEntry->quantity = $quantity;
                    $stockEntry->cost_per_unit = round($stockEntry->cost / $quantity, 2);;
                    $stockEntry->save();
                    $stockItem->current_stock += $quantity;
                    $stockItem->save();
                }
            } else {
                for ($j = 1; $j <= 3; $j++) {
                    $stockItem = StockItem::where('current_stock', '>', 1)->inRandomOrder()->first();
                    $quantity = random_int(1, $stockItem->current_stock - 1);
                    $stockEntry = new StockEntry();
                    $stockEntry->stock_item_id = $stockItem->id;
                    $stockEntry->inventory_log_id = $i;
                    $stockEntry->cost = 0;
                    $stockEntry->quantity = $quantity;
                    $stockEntry->cost_per_unit = 0;
                    $stockEntry->save();
                    $stockItem->current_stock -= $quantity;
                    $stockItem->save();
                }
            }
        }
    }
}
