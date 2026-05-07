<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        #Validate the request data
        $validatedData = request()->validate([ 
            'email' => 'required|string|email|max:255', 
            'password' => 'required|string|min:8', 
        ]);

        if(auth()->attempt($validatedData)) {
            $user = auth()->user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return ['token' => $token];
        }

        return ['error' => 'Datos incorrectos.'];
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return ['data' => 'Sesión cerrada.'];
    }
        
}
