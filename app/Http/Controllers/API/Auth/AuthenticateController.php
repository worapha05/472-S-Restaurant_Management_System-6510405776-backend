<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticateController extends Controller
{
    public function login(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ])->setStatusCode(404);
        }
        if (Hash::check($password, $user->password)) {
            return response()->json([
                'token' => $user->createToken('token')->plainTextToken,
                'user' => $user
            ]);
        }
        return response()->json([
            'message' => 'Invalid credentials'
        ])->setStatusCode(401);
    }

    public function revoke(Request $request) {
        $request->user()->tokens()->delete();
        return response()->json([
            'success' => true,
            'message' => 'Token revoked'
        ]);
    }
}
