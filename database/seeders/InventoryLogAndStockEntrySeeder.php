<?php

namespace Database\Seeders;

use App\Models\InventoryLog;
use App\Models\StockEntry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventoryLogAndStockEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 10) as $index) {
            InventoryLog::factory()->count(1)->create();
            StockEntry::factory()->count(4)->create();
        }
    }
}
