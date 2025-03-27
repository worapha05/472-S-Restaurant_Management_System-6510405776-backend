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
                'name' => 'Grilled Salmon Delight',
                'price' => 259,
                'status' => 'AVAILABLE',
                'category' => 'MAIN COURSE',
                'description' => 'ลิ้มรสแซลมอนสดๆ ที่ย่างจนกรอบและมีเนื้อในที่นุ่มชุ่มฉ่ำ รสชาติสมบูรณ์แบบ.',
                'image_url' => 'images/2025_03_9951db28-1b40-41cd-a4b4-661c50447db7.webp',
            ],
            [
                'name' => 'Chicken Parmesan',
                'price' => 199,
                'status' => 'UNAVAILABLE',
                'category' => 'MAIN COURSE',
                'description' => 'จานไก่ทอดกรอบราดด้วยซอสมารินาราและชีสมอซซาเรลลาหอมๆ เสิร์ฟบนเส้นสปาเก็ตตี้.',
                'image_url' => 'images/2025_03_9951db28-1b40-41cd-a4b4-661c50447db7.webp',
            ],
            [
                'name' => 'Grilled Steak',
                'price' => 349,
                'status' => 'AVAILABLE',
                'category' => 'MAIN COURSE',
                'description' => 'สเต็กเนื้อนุ่มย่างจนได้ที่ ราดด้วยซอสเนยกระเทียม เสิร์ฟพร้อมผักย่าง.',
                'image_url' => 'images/2025_03_9951db28-1b40-41cd-a4b4-661c50447db7.webp',
            ],
            [
                'name' => 'Spaghetti Carbonara',
                'price' => 179,
                'status' => 'UNAVAILABLE',
                'category' => 'MAIN COURSE',
                'description' => 'พาสต้าอิตาเลียนในซอสครีมไข่ ผสมกับแพนเชตต้าและชีสพาร์มีซาน.',
                'image_url' => 'images/2025_03_9951db28-1b40-41cd-a4b4-661c50447db7.webp',
            ],
            [
                'name' => 'Shrimp Scampi',
                'price' => 229,
                'status' => 'AVAILABLE',
                'category' => 'MAIN COURSE',
                'description' => 'กุ้งสดผัดกับซอสเนยกระเทียมและมะนาว เสิร์ฟพร้อมพาสต้า.',
                'image_url' => 'images/2025_03_9951db28-1b40-41cd-a4b4-661c50447db7.webp',
            ],
            [
                'name' => 'Beef Wellington',
                'price' => 499,
                'status' => 'UNAVAILABLE',
                'category' => 'MAIN COURSE',
                'description' => 'เนื้อวัวชิ้นหนาหุ้มด้วยแป้งพัฟและมะกอกดูเซลล์ พร้อมกับแพทé.',
                'image_url' => 'images/2025_03_9951db28-1b40-41cd-a4b4-661c50447db7.webp',
            ],
            // Dessert
            [
                'name' => 'Caramel Cake',
                'price' => 289,
                'status' => 'AVAILABLE',
                'category' => 'DESSERT',
                'description' => 'เค้กเนื้อนุ่มราดด้วยน้ำเชื่อมคาราเมลทองคำ หวานมันและละมุนละไม.',
                'image_url' => 'images/2025_03_5b726c1f-79ba-471a-a35d-7131d831464a.jpeg',
            ],
            [
                'name' => 'Tiramisu',
                'price' => 250,
                'status' => 'AVAILABLE',
                'category' => 'DESSERT',
                'description' => 'ขนมหวานสไตล์อิตาเลียนประกอบด้วยเลดี้ฟิงเกอร์แช่กาแฟ, มาสคาร์โปเน และผงโกโก้.',
                'image_url' => 'images/2025_03_5b726c1f-79ba-471a-a35d-7131d831464a.jpeg',
            ],
            [
                'name' => 'Cheesecake',
                'price' => 299,
                'status' => 'AVAILABLE',
                'category' => 'DESSERT',
                'description' => 'ชีสเค้กเนื้อนุ่มมาพร้อมกับครัสต์แคร็กเกอร์กรอบๆ และผลไม้สดหรือซอสเบอร์รี่.',
                'image_url' => 'images/2025_03_5b726c1f-79ba-471a-a35d-7131d831464a.jpeg',
            ],
            [
                'name' => 'Panna Cotta',
                'price' => 180,
                'status' => 'UNAVAILABLE',
                'category' => 'DESSERT',
                'description' => 'ขนมหวานครีมเนียนนุ่มเสิร์ฟพร้อมซอสผลไม้เปรี้ยวๆ และรสชาติของวานิลลา.',
                'image_url' => 'images/2025_03_5b726c1f-79ba-471a-a35d-7131d831464a.jpeg',
            ],
            [
                'name' => 'Fruit Tart',
                'price' => 220,
                'status' => 'AVAILABLE',
                'category' => 'DESSERT',
                'description' => 'ทาร์ตแป้งกรอบๆ ที่เต็มไปด้วยคัสตาร์ดครีม และผลไม้ตามฤดูกาลหลากสีสัน.',
                'image_url' => 'images/2025_03_5b726c1f-79ba-471a-a35d-7131d831464a.jpeg',
            ],
            [
                'name' => 'Chocolate Lava Cake',
                'price' => 320,
                'status' => 'UNAVAILABLE',
                'category' => 'DESSERT',
                'description' => 'เค้กช็อคโกแลตอุ่นๆ ที่มีเนื้อช็อคโกแลตละลายด้านใน เสิร์ฟพร้อมไอศกรีมวานิลลา.',
                'image_url' => 'images/2025_03_5b726c1f-79ba-471a-a35d-7131d831464a.jpeg',
            ],
            // Beverage
            [
                'name' => 'Lime Iced Tea',
                'price' => 115,
                'status' => 'AVAILABLE',
                'category' => 'BEVERAGE',
                'description' => 'เครื่องดื่มชาดำเย็นผสมกับน้ำมะนาวสด หวานเปรี้ยว สดชื่น.',
                'image_url' => 'images/2025_03_03353b6a-9c0e-4947-91fe-a76b6ae49381.jpeg',
            ],
            [
                'name' => 'Strawberry Smoothie',
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
