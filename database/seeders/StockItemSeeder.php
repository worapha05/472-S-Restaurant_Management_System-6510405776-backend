<?php

namespace Database\Seeders;

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
            StockItem::create([
                "name" => $item['name'],
                "description" => $item['description'],
                "current_stock" => $item['current_stock'],
                "unit" => $item['unit'],
            ]);
        }
    }
}
