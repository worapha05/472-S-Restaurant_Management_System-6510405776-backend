<?php

namespace App\Repositories;

use App\Models\OrderList;
use App\Repositories\Traits\SimpleCRUD;
use Illuminate\Database\Eloquent\Collection;

class OrderListRepository
{
    use SimpleCRUD;

    private string $model = OrderList::class;

    public function findByOrderId(int $orderId): Collection
    {
        return $this->model::where('order_id', $orderId)->orderBy('created_at', 'desc')->get();
    }


}
