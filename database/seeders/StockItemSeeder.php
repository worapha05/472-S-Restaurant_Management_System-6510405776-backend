<?php

namespace Database\Seeders;

use App\Models\Enums\StockItemCategory;
use App\Models\StockItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class StockItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $content = Storage::json('stockItem.json');

        foreach ($content as $item) {

            $category = StockItemCategory::fromThai($item['category'])->value;

            StockItem::create([
                "name" => $item['name'],
                "category" => $category,
                "current_stock" => $item['current_stock'],
                "unit" => $item['unit'],
            ]);
        }
    }
}
