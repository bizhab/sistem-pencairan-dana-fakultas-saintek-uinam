<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {

            throw ValidationException::withMessages([
                'email' => ['Email atau password salah.']
            ]);

        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login berhasil',
            'data' => [
                'user' => $user,
                'role' => $user->getRoleNames(),
                'token' => $token
            ]
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout berhasil'
        ]);
    }

    public function me(Request $request)
    {
        return response()->json([
            'success' => true,
            'data' => $request->user()
        ]);
    }

    public function changePassword(Request $request)
{
    $validated = $request->validate([
        'current_password' => ['required'],
        'new_password' => ['required', 'min:8']
    ]);

    $user = $request->user();

    if (!Hash::check($validated['current_password'], $user->password)) {

        return response()->json([
            'success' => false,
            'message' => 'Password lama tidak sesuai'
        ], 422);

    }

    $user->update([
        'password' => Hash::make($validated['new_password'])
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Password berhasil diubah'
    ]);
}
}