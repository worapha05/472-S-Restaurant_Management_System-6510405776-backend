<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\ReservationCollection;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use App\Repositories\ReservationRepository;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(
        private ReservationRepository $reservationRepository
    ) {}

    public function index()
    {
        $reservations = $this->reservationRepository->getAll();
        return new ReservationCollection($reservations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reservation = $this->reservationRepository->create([
            'user_id' => $request->get('user_id'),
            'table_id' => $request->get('table_id'),
            'appointment_time' => $request->get('appointment_time'),
            'status' => 'PENDING',
        ]);

        return new ReservationResource($reservation);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return new ReservationResource($reservation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $this->reservationRepository->update([
            'status' => $request->get('status')
        ], $reservation->id);

        return new ReservationResource($reservation->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
