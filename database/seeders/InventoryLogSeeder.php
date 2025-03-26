<?php

namespace Database\Seeders;

use App\Models\Enums\InventoryLogType;
use App\Models\InventoryLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class InventoryLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $content = Storage::json('inventoryLog.json');

        foreach ($content as $item) {

            $type = $item['type'];
            if ($type == "นำเข้า") {
                $type = InventoryLogType::IMPORT;
            } else {
                $type = InventoryLogType::EXPORT;
            }

            InventoryLog::create([
                "user_id" => $item["user_id"],
                "note" => $item["note"],
                "type" => $type,
                "total_cost" => $item["total_cost"],
                "source" => $item["source"],
            ]);
        }
    }
}
