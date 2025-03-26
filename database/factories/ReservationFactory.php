<?php

namespace Database\Factories;

use App\Models\Table;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->randomElement(User::all()->pluck('id')->toArray()),
            'table_id' => fake()->randomElement(Table::all()->pluck('id')->toArray()),
            'appointment_time' => $this->faker->dateTimeBetween('now', '+1 day'),
            'status' => $this->faker->randomElement(['PENDING', 'CONFIRMED', 'CANCELLED', 'NOT_ARRIVED', 'ARRIVED']),
        ];
    }
}
