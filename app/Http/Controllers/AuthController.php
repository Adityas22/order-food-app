<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['Email atau password salah']
            ], 404);
        }
        // hapus token lama, mencegah dua req dengan token berbeda, 1 user = 1 token
        $user->tokens()->delete();

        $token = $user->createToken('user login')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ]);
    }

    // public function register(Request $request) {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);
    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password)
    //     ]);
    //     $token = $user->createToken('user login')->plainTextToken;
    //     return response([
    //         'user' => $user,
    //         'token' => $token
    //     ]);
    // }

    // public function logout(Request $request) {
    //     $request->user()->tokens()->delete();
    //     return response([
    //         'message' => 'Logout success'
    //     ]);
    // }

    public function me(Request $request) {
        return response ([
            'user' => $request->user()
        ]);
    }
}