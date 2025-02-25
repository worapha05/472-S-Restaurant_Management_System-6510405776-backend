<?php

namespace Database\Factories;

use App\Models\InventoryLogs;
use App\Models\StockItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StockEntries>
 */
class StockEntriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'stock_item_id' => StockItem::inRandomOrder()->first()->id,
            'inventory_logs_id' => InventoryLogs::inRandomOrder()->first()->id,
            'cost_per_unit' => $this->faker->randomFloat(2, 1, 100),
            'quantity_added' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
