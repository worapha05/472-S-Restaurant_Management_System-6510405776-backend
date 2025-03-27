<?php

namespace Database\Factories;

use App\Models\Food;
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
        $food = Food::inRandomOrder()->first();

        return [
            'order_id' => Order::factory(), // Create a relationship with Order but allow overriding
            'food_id' => $food->id,
            'description' => $this->faker->sentence(),
            'price' => $food->price,
            'quantity' => $this->faker->numberBetween(1, 5),
            'status' => $this->faker->randomElement(['IN_PROGRESS', 'COMPLETED', 'CANCELLED']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
