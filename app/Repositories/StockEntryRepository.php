<?php

namespace App\Repositories;

use App\Models\StockEntry;
use App\Repositories\Traits\SimpleCRUD;
use Illuminate\Database\Eloquent\Collection;

class StockEntryRepository
{
    use SimpleCRUD;

    private string $model = StockEntry::class;

    public function findByInventoryLogId(int $id): Collection
    {
        return $this->model::where('inventory_log_id', $id)->orderBy('created_at', 'desc')->get();
    }
}
