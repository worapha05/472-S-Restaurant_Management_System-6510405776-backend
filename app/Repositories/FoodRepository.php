<?php

namespace App\Repositories;

use App\Models\Food;
use App\Repositories\Traits\SimpleCRUD;
use Illuminate\Database\Eloquent\Collection;

class FoodRepository
{
    use SimpleCRUD;

    private string $model = Food::class;

    public function findByFoodId(int $id): Collection
    {
        return $this->model::where('id', $id)->get();
    }

    public function findByName(string $name): Collection
    {
        return $this->model::where('name', $name)->get();
    }
}
