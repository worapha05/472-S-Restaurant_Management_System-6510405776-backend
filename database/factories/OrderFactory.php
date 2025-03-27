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
            'user_id' => fake()->randomElement(User::all()->pluck('id')->toArray()),
            'table_id' => fake()->randomElement(Table::all()->pluck('id')->toArray()),
            'address' => $this->faker->address(),
            'accept' => $this->faker->optional()->dateTime(),
            'status' => $this->faker->randomElement(['PENDING', 'IN_PROGRESS', 'COMPLETED', 'CANCELLED']),
            'type' => $this->faker->randomElement(['DELIVERY', 'TAKEAWAY', 'DINE_IN']),
            'payment_method' => 'CASH',
            'sum_price' => 0, // Initial value, will be updated after order lists are created
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Configure the model factory.
     */
    public function configure()
    {
        return $this->afterCreating(function (Order $order) {
            // Create between 1 and 5 order list items for this order
            $orderLists = \App\Models\OrderList::factory()
                ->count($this->faker->numberBetween(1, 5))
                ->for($order)
                ->create();

            // Calculate the sum of prices
            $sumPrice = $orderLists->sum(function ($orderList) {
                return $orderList->price * $orderList->quantity;
            });

            // Update the order with the calculated sum price
            $order->update(['sum_price' => $sumPrice]);
        });
    }
}
