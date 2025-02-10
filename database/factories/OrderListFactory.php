<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderList;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<OrderList>
 */
class OrderListFactory extends Factory
{
    protected $model = OrderList::class;

    public function definition(): array
    {
        return [
            'order_id' => fake()->randomElement(Order::all()->pluck('id')->toArray()), // Creates a new Order if needed
            'description' => $this->faker->sentence(),
//            'food_id' => Food::factory(), // Uncomment if you have a Food model
            'price' => $this->faker->randomFloat(2, 5, 100),
            'quantity' => $this->faker->numberBetween(1, 10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
