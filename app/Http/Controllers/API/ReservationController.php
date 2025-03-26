<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\ReservationCollection;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use App\Repositories\ReservationRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(
        private ReservationRepository $reservationRepository,
        private UserRepository $userRepository,
    ) {}

    public function index()
    {
        Gate::authorize('viewAny', Reservation::class);
        $reservations = $this->reservationRepository->getAll();
        return new ReservationCollection($reservations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Reservation::class);
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
        Gate::authorize('view', $reservation);
        return new ReservationResource($reservation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        Gate::authorize('update', $reservation);
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

    public function getReservationsByUser($userId)
    {
        try {
            // Validate that the user exists
            $user = $this->userRepository->isExists($userId);

            if($user == null) {
                return response()->json(['message' => 'User not found'], 404);
            }

            // Get orders for the user
            $reservations = $this->reservationRepository->findByUserId($userId);

            foreach ($reservations as $reservation) {
                Gate::authorize('view', $reservation);
            }

            return new ReservationCollection($reservations);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
