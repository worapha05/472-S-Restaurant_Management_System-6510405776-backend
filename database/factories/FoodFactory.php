<?php

namespace Database\Factories;

use App\Models\Food;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    protected $model = Food::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 10, 500),
            'status' => $this->faker->randomElement(['available', 'unavailable']),
            'category' => $this->faker->randomElement(['main course', 'dessert', 'beverage']),
            'description' => $this->faker->sentence(),
            'image_url' => $this->faker->imageUrl(),
        ];
    }
}
