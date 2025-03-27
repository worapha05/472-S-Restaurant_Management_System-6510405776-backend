<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
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
        Gate::authorize('viewAny', User::class);
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
        Gate::authorize('view', $user);
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        Gate::authorize('update', $user);

        // Check if the password matches
        if (!Hash::check($request->get('password'), $user->password)) {
            // Return a 401 Unauthorized response with error message
            return response()->json([
                'message' => 'รหัสผ่านไม่ถูกต้อง กรุณาตรวจสอบและลองใหม่อีกครั้ง',
                'success' => false
            ], 401);
        }

        // If password matches, proceed with the update
        $this->userRepository->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'username' => $request->get('username'), // Fixed to use username not email
            'address' => $request->get('address'),
            'phone_number' => $request->get('phone_number'),
            'role' => $request->get('role'),
        ], $user->id);

        // Update password if new password is provided
        if ($request->get('new_password') != '') {
            $this->userRepository->update([
                'password' => Hash::make($request->get('new_password'))
            ], $user->id);
        }

        // Return the updated user data
        return response()->json([
            'message' => 'ข้อมูลถูกอัพเดทเรียบร้อยแล้ว',
            'success' => true,
            'data' => new UserResource($user->refresh())
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
