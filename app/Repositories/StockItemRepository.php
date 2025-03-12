<?php

namespace App\Repositories;

use App\Models\StockItem;
use App\Repositories\Traits\SimpleCRUD;

class StockItemRepository
{
    use SimpleCRUD;

    private string $model = StockItem::class;

    public function isEmptyCurrentStock(int $id): bool
    {
        $stockItem = $this->model::where('id', $id)
            ->first();
        return $stockItem ? $stockItem->current_stock == 0 : false;
    }
}
