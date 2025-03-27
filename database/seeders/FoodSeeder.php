<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Food;

class FoodSeeder extends Seeder
{
    public function run()
    {
        $foods = [
            [
                'name' => 'แซลมอนย่างสุดพิเศษ',
                'price' => 259,
                'status' => 'AVAILABLE',
                'category' => 'MAIN COURSE',
                'description' => 'ลิ้มรสแซลมอนสดๆ ที่ย่างจนกรอบและมีเนื้อในที่นุ่มชุ่มฉ่ำ รสชาติสมบูรณ์แบบ.',
                'image_url' => 'images/2025_03_9951db28-1b40-41cd-a4b4-661c50447db7.webp',
            ],
            [
                'name' => 'ไก่พาร์เมซาน',
                'price' => 199,
                'status' => 'UNAVAILABLE',
                'category' => 'MAIN COURSE',
                'description' => 'จานไก่ทอดกรอบราดด้วยซอสมารินาราและชีสมอซซาเรลลาหอมๆ เสิร์ฟบนเส้นสปาเก็ตตี้.',
                'image_url' => 'images/2025_03_9951db28-1b40-41cd-a4b4-661c50447db7.webp',
            ],
            [
                'name' => 'สเต็กเนื้อติดมันย่าง',
                'price' => 349,
                'status' => 'AVAILABLE',
                'category' => 'MAIN COURSE',
                'description' => 'สเต็กเนื้อนุ่มย่างจนได้ที่ ราดด้วยซอสเนยกระเทียม เสิร์ฟพร้อมผักย่าง.',
                'image_url' => 'images/2025_03_9951db28-1b40-41cd-a4b4-661c50447db7.webp',
            ],
            [
                'name' => 'สปาเก็ตตี้คาโบนาร่า',
                'price' => 179,
                'status' => 'UNAVAILABLE',
                'category' => 'MAIN COURSE',
                'description' => 'พาสต้าอิตาเลียนในซอสครีมไข่ ผสมกับแพนเชตต้าและชีสพาร์มีซาน.',
                'image_url' => 'images/2025_03_9951db28-1b40-41cd-a4b4-661c50447db7.webp',
            ],
            [
                'name' => 'กุ้งสแคมปี้',
                'price' => 229,
                'status' => 'AVAILABLE',
                'category' => 'MAIN COURSE',
                'description' => 'กุ้งสดผัดกับซอสเนยกระเทียมและมะนาว เสิร์ฟพร้อมพาสต้า.',
                'image_url' => 'images/2025_03_9951db28-1b40-41cd-a4b4-661c50447db7.webp',
            ],
            [
                'name' => 'บีฟเวลลิงตัน',
                'price' => 499,
                'status' => 'UNAVAILABLE',
                'category' => 'MAIN COURSE',
                'description' => 'เนื้อวัวชิ้นหนาหุ้มด้วยแป้งพัฟและมะกอกดูเซลล์ พร้อมกับแพทé.',
                'image_url' => 'images/2025_03_9951db28-1b40-41cd-a4b4-661c50447db7.webp',
            ],
            // ขนมหวาน
            [
                'name' => 'เค้กคาราเมล',
                'price' => 289,
                'status' => 'AVAILABLE',
                'category' => 'DESSERT',
                'description' => 'เค้กเนื้อนุ่มราดด้วยน้ำเชื่อมคาราเมลทองคำ หวานมันและละมุนละไม.',
                'image_url' => 'images/2025_03_5b726c1f-79ba-471a-a35d-7131d831464a.jpeg',
            ],
            [
                'name' => 'ทีรามิสุ',
                'price' => 250,
                'status' => 'AVAILABLE',
                'category' => 'DESSERT',
                'description' => 'ขนมหวานสไตล์อิตาเลียนประกอบด้วยเลดี้ฟิงเกอร์แช่กาแฟ, มาสคาร์โปเน และผงโกโก้.',
                'image_url' => 'images/2025_03_5b726c1f-79ba-471a-a35d-7131d831464a.jpeg',
            ],
            [
                'name' => 'ชีสเค้ก',
                'price' => 299,
                'status' => 'AVAILABLE',
                'category' => 'DESSERT',
                'description' => 'ชีสเค้กเนื้อนุ่มมาพร้อมกับครัสต์แคร็กเกอร์กรอบๆ และผลไม้สดหรือซอสเบอร์รี่.',
                'image_url' => 'images/2025_03_5b726c1f-79ba-471a-a35d-7131d831464a.jpeg',
            ],
            [
                'name' => 'พานนาคอตต้า',
                'price' => 180,
                'status' => 'UNAVAILABLE',
                'category' => 'DESSERT',
                'description' => 'ขนมหวานครีมเนียนนุ่มเสิร์ฟพร้อมซอสผลไม้เปรี้ยวๆ และรสชาติของวานิลลา.',
                'image_url' => 'images/2025_03_5b726c1f-79ba-471a-a35d-7131d831464a.jpeg',
            ],
            [
                'name' => 'ทาร์ตผลไม้',
                'price' => 220,
                'status' => 'AVAILABLE',
                'category' => 'DESSERT',
                'description' => 'ทาร์ตแป้งกรอบๆ ที่เต็มไปด้วยคัสตาร์ดครีม และผลไม้ตามฤดูกาลหลากสีสัน.',
                'image_url' => 'images/2025_03_5b726c1f-79ba-471a-a35d-7131d831464a.jpeg',
            ],
            [
                'name' => 'เค้กช็อคโกแลตลาวา',
                'price' => 320,
                'status' => 'UNAVAILABLE',
                'category' => 'DESSERT',
                'description' => 'เค้กช็อคโกแลตอุ่นๆ ที่มีเนื้อช็อคโกแลตละลายด้านใน เสิร์ฟพร้อมไอศกรีมวานิลลา.',
                'image_url' => 'images/2025_03_5b726c1f-79ba-471a-a35d-7131d831464a.jpeg',
            ],
            // เครื่องดื่ม
            [
                'name' => 'น้ำชามะนาวเย็น',
                'price' => 115,
                'status' => 'AVAILABLE',
                'category' => 'BEVERAGE',
                'description' => 'เครื่องดื่มชาดำเย็นผสมกับน้ำมะนาวสด หวานเปรี้ยว สดชื่น.',
                'image_url' => 'images/2025_03_03353b6a-9c0e-4947-91fe-a76b6ae49381.jpeg',
            ],
            [
                'name' => 'สมูทตี้สตรอเบอรี่',
                'price' => 160,
                'status' => 'UNAVAILABLE',
                'category' => 'BEVERAGE',
                'description' => 'สมูทตี้สตรอเบอรี่หวานๆ ทำจากสตรอเบอรี่สด, โยเกิร์ต และน้ำผึ้ง.',
                'image_url' => 'images/2025_03_03353b6a-9c0e-4947-91fe-a76b6ae49381.jpeg',
            ],
        ];

        foreach ($foods as $food) {
            Food::create($food);
        }
    }
}
