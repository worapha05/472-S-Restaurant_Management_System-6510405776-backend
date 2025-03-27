<?php

namespace App\Http\Resources;

use App\Repositories\StockEntryRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InventoryLogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $userRepository = app(UserRepository::class);
        $username = $userRepository->getNameById($this->user_id);
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'username' => $username,
            'note' => $this->note,
            'type' => $this->type,
            'total_cost' => $this->total_cost,
            'source' => $this->source,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "deleted_at" => $this->deleted_at,
        ];
    }
}
