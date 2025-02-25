<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InventoryLogs>
 */
class InventoryLogsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'note' => $this->faker->word(),
            'total_cost' => $this->faker->randomFloat(2, 10),
            'source' => $this->faker->address(),
        ];
    }
}
