<?php

namespace Database\Factories;

use App\Models\InventoryLog;
use App\Models\StockItem;
use App\Repositories\StockItemRepository;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StockEntry>
 */
class StockEntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id = StockItem::inRandomOrder()->first()->id;
        return [
            'stock_item_id' => $id,
            'inventory_log_id' => InventoryLog::latest()->first()->id,
            'cost' => (InventoryLog::latest()->first()->total_cost) / 4,
            'quantity_added' => app(StockItemRepository::class)->getById($id)->current_stock +
                $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
