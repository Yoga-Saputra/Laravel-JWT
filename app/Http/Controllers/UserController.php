<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Http\Resources\User as UserResource;
use Exception;
use Illuminate\Support\Facades\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth as FacadesJWTAuth;

class UserController extends Controller

{
    public function user()
    {
        try {

            if (! $user = FacadesJWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['error' => 'Token Expired' ], 400);
        } catch (TokenInvalidException $e) {
            return response()->json(['error' => 'Token Invalid'], 400);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Token Not Found' ], 401);
        }
        return new UserResource($user);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
