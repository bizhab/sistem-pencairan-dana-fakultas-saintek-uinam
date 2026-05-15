<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function login(array $data)
    {
        // Validasi input
        if (
            empty($data['email']) ||
            empty($data['password'])
        ) {
            return [
                'success' => false,
                'message' => 'Email dan password wajib diisi'
            ];
        }

        // Validasi domain email UIN
        if (!str_ends_with($data['email'], '@uin-alauddin.ac.id')) {
            return [
                'success' => false,
                'message' => 'Gunakan email resmi UIN Alauddin Makassar'
            ];
        }

        // Cari user
        $user = User::where('email', $data['email'])->first();

        // Validasi user dan password
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return [
                'success' => false,
                'message' => 'Email atau password salah'
            ];
        }

        // Hapus token lama
        $user->tokens()->delete();

        // Generate token baru
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'success' => true,
            'message' => 'Login berhasil',
            'user' => $user,
            'token' => $token
        ];
    }
}