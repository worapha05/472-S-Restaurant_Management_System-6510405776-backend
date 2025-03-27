<?php

namespace Database\Seeders;

use App\Models\Enums\StockItemCategory;
use App\Models\StockItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $stockItems = [

            ['name' => 'อกไก่', 'category' => 'เนื้อสัตว์', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'สันในวัว', 'category' => 'เนื้อสัตว์', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'หมูสับ', 'category' => 'เนื้อสัตว์', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'ปลาแซลมอน', 'category' => 'เนื้อสัตว์', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'กุ้งขาว', 'category' => 'เนื้อสัตว์', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'เป็ดย่าง', 'category' => 'เนื้อสัตว์', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],

            ['name' => 'ไข่ไก่', 'category' => 'ไข่ & นม', 'current_stock' => 0, 'unit' => 'ฟอง'],
            ['name' => 'นมสด', 'category' => 'ไข่ & นม', 'current_stock' => 0, 'unit' => 'ลิตร'],
            ['name' => 'เนยแข็ง', 'category' => 'ไข่ & นม', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'ไข่แดง', 'category' => 'ไข่ & นม', 'current_stock' => 0, 'unit' => 'ฟอง'],
            ['name' => 'โยเกิร์ต', 'category' => 'ไข่ & นม', 'current_stock' => 0, 'unit' => 'ลิตร'],
            ['name' => 'ครีมสด', 'category' => 'ไข่ & นม', 'current_stock' => 0, 'unit' => 'ลิตร'],

            ['name' => 'แครอท', 'category' => 'ผัก', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'หอมใหญ่', 'category' => 'ผัก', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'กระเทียม', 'category' => 'ผัก', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'ผักกาดขาว', 'category' => 'ผัก', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'ต้นหอม', 'category' => 'ผัก', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'พริกหวาน', 'category' => 'ผัก', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],

            ['name' => 'แอปเปิ้ล', 'category' => 'ผลไม้', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'กล้วย', 'category' => 'ผลไม้', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'ส้ม', 'category' => 'ผลไม้', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'มะม่วง', 'category' => 'ผลไม้', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'สับปะรด', 'category' => 'ผลไม้', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'มะนาว', 'category' => 'ผลไม้', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],

            ['name' => 'ข้าวขาว', 'category' => 'ธัญพืช & แป้ง', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'แป้งสาลี', 'category' => 'ธัญพืช & แป้ง', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'เส้นก๋วยเตี๋ยว', 'category' => 'ธัญพืช & แป้ง', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'บะหมี่', 'category' => 'ธัญพืช & แป้ง', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'ขนมปัง', 'category' => 'ธัญพืช & แป้ง', 'current_stock' => 0, 'unit' => 'ก้อน'],
            ['name' => 'แป้งข้าวเจ้า', 'category' => 'ธัญพืช & แป้ง', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],

            ['name' => 'เกลือ', 'category' => 'เครื่องปรุง', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'น้ำปลา', 'category' => 'เครื่องปรุง', 'current_stock' => 0, 'unit' => 'ลิตร'],
            ['name' => 'ซอสหอย', 'category' => 'เครื่องปรุง', 'current_stock' => 0, 'unit' => 'ลิตร'],
            ['name' => 'น้ำส้มสายชู', 'category' => 'เครื่องปรุง', 'current_stock' => 0, 'unit' => 'ลิตร'],
            ['name' => 'ซอสมะเขือเทศ', 'category' => 'เครื่องปรุง', 'current_stock' => 0, 'unit' => 'ลิตร'],
            ['name' => 'พริกไทย', 'category' => 'เครื่องปรุง', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],

            ['name' => 'น้ำมันพืช', 'category' => 'น้ำมัน & ไขมัน', 'current_stock' => 0, 'unit' => 'ลิตร'],
            ['name' => 'เนย', 'category' => 'น้ำมัน & ไขมัน', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'น้ำมันมะพร้าว', 'category' => 'น้ำมัน & ไขมัน', 'current_stock' => 0, 'unit' => 'ลิตร'],
            ['name' => 'น้ำมันงา', 'category' => 'น้ำมัน & ไขมัน', 'current_stock' => 0, 'unit' => 'ลิตร'],
            ['name' => 'น้ำมันหอย', 'category' => 'น้ำมัน & ไขมัน', 'current_stock' => 0, 'unit' => 'ลิตร'],
            ['name' => 'มาการีน', 'category' => 'น้ำมัน & ไขมัน', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],

            ['name' => 'เส้นก๋วยเตี๋ยวแห้ง', 'category' => 'อื่น ๆ', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'ซุปก้อน', 'category' => 'อื่น ๆ', 'current_stock' => 0, 'unit' => 'ก้อน'],
            ['name' => 'ผงชูรส', 'category' => 'อื่น ๆ', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'วุ้นเส้น', 'category' => 'อื่น ๆ', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'ขนมจีน', 'category' => 'อื่น ๆ', 'current_stock' => 0, 'unit' => 'กิโลกรัม'],
            ['name' => 'เส้นหมี่', 'category' => 'อื่น ๆ', 'current_stock' => 0, 'unit' => 'กิโลกรัม']
        ];

        foreach ($stockItems as $item) {
            $category = StockItemCategory::fromThai($item['category']);

            $stockItem = new StockItem();
            $stockItem->name = $item['name'];
            $stockItem->category = $category;
            $stockItem->unit = $item['unit'];
            $stockItem->current_stock = $item['current_stock'];
            $stockItem->save();

        }
    }
}
