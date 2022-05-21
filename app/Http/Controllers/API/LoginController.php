<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (auth()->attempt($request->only(['email', 'password']))) {
            return auth()->user()->createToken('token-name', ['server:update'])->plainTextToken;
        }
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return response()->json('success');
    }
}
