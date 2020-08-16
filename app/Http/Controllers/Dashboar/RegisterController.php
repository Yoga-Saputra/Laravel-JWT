<?php

namespace App\Http\Controllers\Dashboar;

use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_lengkap' => 'required|string|max:20',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|max:6'
        ]);

        $user = User::create([
            'name'      => $request->nama_lengkap,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);
        if ($user) {
            return response()->json([
                'success' => true, 
                'message' => 'Register account successfully'
            ], 201);
        }else{
            return response()->json([
                'success' => false, 
                'message' => 'Register account failed'
            ], 400);
        }
    }
}
