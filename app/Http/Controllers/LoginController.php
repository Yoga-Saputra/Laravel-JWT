<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as UserResource;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (!$token = Auth::attempt($credentials)){
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return (new UserResource($request->user()))
            ->additional(['meta' => [
                'token' => $token,
                'messagge' => 'Login successful'
        ]]);
    }
}
