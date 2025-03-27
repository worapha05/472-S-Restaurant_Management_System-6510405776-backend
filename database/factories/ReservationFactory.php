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
        // Generate a random date between today and 7 days from now
        $randomDate = $this->faker->dateTimeBetween('now', '+7 days')->format('Y-m-d');

        // Set a time between 10:00 and 20:00 (restaurant opening hours)
        $hour = $this->faker->numberBetween(10, 20);
        $selectedTime = str_pad($hour, 2, '0', STR_PAD_LEFT) . ':00:00';

        // Combine date and time
        $appointmentTime = $randomDate . ' ' . $selectedTime;

        return [
            'user_id' => fake()->randomElement(User::all()->pluck('id')->toArray()),
            'table_id' => fake()->randomElement(Table::all()->pluck('id')->toArray()),
            'appointment_time' => $appointmentTime,
            'status' => $this->faker->randomElement(['PENDING', 'CONFIRMED', 'CANCELLED']),
        ];
    }
}
