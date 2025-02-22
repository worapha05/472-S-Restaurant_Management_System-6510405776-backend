<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(
        private UserRepository $userRepository
    ) {}

    public function index()
    {
        $users = $this->userRepository->getAll();
        return new UserCollection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $this->userRepository->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'username' => $request->get('email'),
            'password' => $request->get('password'),
            'address' => $request->get('address'),
            'phone_number' => $request->get('phone_number'),
            'role' => $request->get('role'),
        ]);

        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->userRepository->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'username' => $request->get('email'),
            'password' => $request->get('password'),
            'address' => $request->get('address'),
            'phone_number' => $request->get('phone_number'),
            'role' => $request->get('role'),
        ], $user->id);

        return new UserResource($user->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
