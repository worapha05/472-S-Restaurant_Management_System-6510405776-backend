<?php

namespace App\Repositories;

use App\Models\Reservation;
use App\Repositories\Traits\SimpleCRUD;
use Illuminate\Database\Eloquent\Collection;

class ReservationRepository
{
    use SimpleCRUD;

    private string $model = Reservation::class;

    public function findByUserId(int $id): Collection
    {
        return $this->model::where('user_id', $id)->orderBy('created_at', 'desc')->get();
    }
}
