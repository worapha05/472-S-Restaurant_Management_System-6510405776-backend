<?php

namespace Database\Seeders;

use App\Models\InventoryLog;
use App\Models\StockEntry;
use App\Models\StockItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class StockEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $content = Storage::json('stockEntry.json');

        foreach ($content as $item) {

            StockEntry::create([
                "stock_item_id" => $item["stock_item_id"],
                "inventory_log_id" => $item["inventory_log_id"],
                "cost" => $item["cost"],
                "cost_per_unit" => $item["cost_per_unit"],
                "quantity" => $item["quantity"],
            ]);

//            $type = InventoryLog::where("id", $item["inventory_log_id"])->pluck('type')->first();
//            $entry = StockItem::where("id", $item["stock_item_id"])->first();
//            if ($type == "EXPORT" && $entry) {
//                $entry->update(["current_stock" => $entry->current_stock - $item["quantity"]]);
//            } elseif ($type == "IMPORT" && $entry) {
//                $entry->update(["current_stock" => $entry->current_stock + $item["quantity"]]);
//            }
        }
    }
}
