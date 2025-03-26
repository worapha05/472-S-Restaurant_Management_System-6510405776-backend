<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\ReservationResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ReservationCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => ReservationResource::collection($this->collection),  // Use ReservationResource to transform each item
        ];
    }
}
