<?php

namespace App\Repositories;

use App\Models\InventoryLog;
use App\Repositories\Traits\SimpleCRUD;

class InventoryLogRepository
{
    use SimpleCRUD;

    private string $model = InventoryLog::class;
}
