<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        return User::create([
            'name' => $request->input(key: "name"),
            'email' => $request->input(key: "email"),
            'password' => Hash::make($request->input(key: "password"))
        ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response([
                'message' => 'invalid credentials'
            ], 401);
        };


        $user = Auth::user();

        $token = $user->createToken('token')->plainTextToken;

        $cookie = cookie('jwt', $token, 60 * 24);
        return response([
            'message' => 'user success login',

        ])->withCookie($cookie);
    }


    public function logout()
    {
        $cookie = Cookie::forget('jwt');

        return response([
            'message' => 'you are logout'
        ])->withCookie($cookie);
    }
}
