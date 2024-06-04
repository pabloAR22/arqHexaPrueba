<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller

{

    protected function generateToken($token)
    {
        return response()->json([
            'access_token' => $token
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return response()->json(['error' => 'Not Authorized'], 401);
        }
        return $this->generateToken($token);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['exito' => 'Cierre de sesión exitoso'], 200);
    }
}
