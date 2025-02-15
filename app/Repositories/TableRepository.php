<?php

namespace App\Repositories;

use App\Models\Table;
use App\Repositories\Traits\SimpleCRUD;

class TableRepository
{
    use SimpleCRUD;

    private string $model = Table::class;



}
