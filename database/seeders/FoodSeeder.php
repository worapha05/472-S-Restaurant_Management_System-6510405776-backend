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
                'description' => 'Savor the perfection of fresh salmon, expertly grilled to achieve a crispy golden crust while keeping the inside tender and juicy.',
                'image_url' => 'http://localhost:9000/images/2025_03_9951db28-1b40-41cd-a4b4-661c50447db7.webp',
            ],
            [
                'name' => 'Lime Iced Tea',
                'price' => 115,
                'status' => 'AVAILABLE',
                'category' => 'BEVERAGE',
                'description' => 'A refreshing blend of freshly brewed black tea and zesty lime juice, served chilled with a hint of sweetness.',
                'image_url' => 'http://localhost:9000/images/2025_03_03353b6a-9c0e-4947-91fe-a76b6ae49381.jpeg',
            ],
            [
                'name' => 'Caramel Cake',
                'price' => 289,
                'status' => 'AVAILABLE',
                'category' => 'DESSERT',
                'description' => 'A decadent and moist cake drizzled with rich, golden caramel syrup. Each bite offers a perfect balance of sweetness and buttery flavor, with a velvety texture that melts in your mouth.',
                'image_url' => 'http://localhost:9000/images/2025_03_5b726c1f-79ba-471a-a35d-7131d831464a.jpeg',
            ],
        ];

        foreach ($foods as $food) {
            Food::create($food);
        }
    }
}
