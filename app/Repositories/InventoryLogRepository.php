<?php

namespace App\Repositories;

use App\Models\InventoryLog;
use App\Repositories\Traits\SimpleCRUD;
use Illuminate\Database\Eloquent\Collection;

class InventoryLogRepository
{
    use SimpleCRUD;

    private string $model = InventoryLog::class;

    public function checkTypeIMPORT(int $id): bool
    {
        return $this->model::where('id', $id)
            ->where('type', "IMPORT")
            ->exists();
    }
}
