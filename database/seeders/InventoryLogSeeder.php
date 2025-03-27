<?php

namespace Database\Seeders;

use App\Models\Enums\InventoryLogType;
use App\Models\InventoryLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class InventoryLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sources = ['ตลาดสด', 'ซุปเปอร์มาร์เก็ต', 'ร้านค้าส่ง', 'เกษตรกร', 'ผู้ผลิต', 'ร้านค้าปลีก'];
        $number_im = 1;
        $number_ex = 1;
        for ($i = 1; $i <= 15; $i++) {
            $user_id = 0;
            $note = '';
            $source = null;
            $type = '';
            $total_cost = 0;
            if ($i <= 5 || $i > 10) {
                $type = "IMPORT";
                $note = "บันทึกการนำเข้าวัตถุดิบครั้งที่ {$number_im}";
                $source = Arr::random($sources);
                $total_cost = random_int(100, 240) * 5;
                if ($i % 2 === 0) {
                    $user_id = 3;
                } elseif ($i % 3 === 0) {
                    $user_id = 5;
                } else {
                    $user_id = 1;
                }
                $number_im++;
            } else {
                $type = "EXPORT";
                $note = "บันทึกการนำออกวัตถุดิบครั้งที่ {$number_ex}";
                if ($i % 2 === 0) {
                    $user_id = 3;
                } elseif ($i % 3 === 0) {
                    $user_id = 5;
                } else {
                    $user_id = 1;
                }
                $number_ex++;
            }

            $inventoryLog = new InventoryLog();
            $inventoryLog->user_id = $user_id;
            $inventoryLog->source = $source;
            $inventoryLog->total_cost = $total_cost;
            $inventoryLog->note = $note;
            $inventoryLog->type = $type;
            $inventoryLog->save();
        }
    }
}
