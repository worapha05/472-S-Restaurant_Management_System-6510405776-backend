<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Table;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'user_id' => fake()->randomElement(User::all()->pluck('id')->toArray()), // Creates a new User if needed
            'table_id' => fake()->randomElement(Table::all()->pluck('id')->toArray()),
            'address' => $this->faker->address(),
            'accept' => $this->faker->optional()->dateTime(),
            'status' => $this->faker->randomElement(['PENDING', 'IN_PROGRESS', 'COMPLETED', 'CANCELLED']),
            'type' => $this->faker->randomElement(['DELIVERY', 'TAKEAWAY', 'DINE_IN']),
            'payment_method' => $this->faker->randomElement(['CASH', 'CREDIT_CARD', 'QRCODE']),
            'sum_price' => $this->faker->randomFloat(2, 10, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
