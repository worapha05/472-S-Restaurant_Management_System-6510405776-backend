<?php

namespace App\Http\Resources;

use App\Models\Reservation;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    protected $userRepo;

    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->userRepo = new UserRepository();
    }

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'table_id' => $this->table_id,
            'appointment_time' => $this->appointment_time,
            'status' => $this->status,
            'user_name' => $this->userRepo->getById($this->user_id)->name,
            'created_at' => $this->created_at,
            'deleted_at' => $this->deleted_at,
            'updated_at' => $this->updated_at
        ];
    }
}
