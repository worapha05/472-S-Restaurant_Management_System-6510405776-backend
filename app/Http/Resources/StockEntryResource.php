<?php

namespace App\Http\Resources;

use App\Repositories\InventoryLogRepository;
use App\Repositories\StockItemRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StockEntryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $inventoryLogRepository = app(InventoryLogRepository::class);
        $inventory = $inventoryLogRepository->getById($this->inventory_log_id);
        $userRepository = app(UserRepository::class);
        $username = $userRepository->getNameById($inventory->user_id);
        $stockItemRepository = app(StockItemRepository::class);
        $stockItem = $stockItemRepository->getById($this->stock_item_id);
        return [
            'id' => $this->id,
            'stock_item_id' => $this->stock_item_id,
            'stock_item_name' => $stockItem->name,
            'inventory_log_id' => $this->inventory_log_id,
            'username' => $username,
            'cost' => $this->cost,
            'cost_per_unit' => $this->cost_per_unit,
            'type' => $inventory->type,
            'source' => $inventory->source,
            'note' => $inventory->note,
            'quantity' => $this->quantity,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "deleted_at" => $this->deleted_at,
        ];
    }
}
