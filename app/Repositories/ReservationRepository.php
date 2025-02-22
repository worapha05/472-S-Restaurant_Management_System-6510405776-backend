<?php

namespace App\Repositories;

use App\Models\Reservation;
use App\Repositories\Traits\SimpleCRUD;

class ReservationRepository
{
    use SimpleCRUD;

    private string $model = Reservation::class;
}
