<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Traits\SimpleCRUD;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository
{
    use SimpleCRUD;

    private string $model = Order::class;

    public function getAllByDesc(): Collection
    {
        return $this->model::orderByDesc('created_at')->get();
    }

    public function findByUserId(int $id): Collection
    {
        return $this->model::where('user_id', $id)->orderBy('created_at', 'desc')->get();
    }
}
