<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Mail\UsuarioRegistrado;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function register()
    {
        #Validate the request data
        $validatedData = request()->validate([ 
            'name' => 'required|string|max:255', 
            'email' => 'required|string|email|max:255|unique:users', 
            'password' => 'required|string|min:8|confirmed', 
            'password_confirmation' => 'required|string|min:8',
        ]);

        #Create the user
        $user = \App\Models\User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'user_name'  => $validatedData['email'],
            'user_type' => 'user',
        ]);

        #Log the user in
        auth()->login($user);
        #Redirect to the home page

        Mail::to($user->email)->send(new UsuarioRegistrado($user));

        return redirect()->route('home');
    }

    public function login()
    {
        #Validate the request data
        $validatedData = request()->validate([ 
            'email' => 'required|string|email|max:255', 
            'password' => 'required|string|min:8', 
        ]);

        #Attempt to log the user in
        if (auth()->attempt($validatedData)) {
            #Redirect to the home page
            return redirect()->route('home');
        }

        #If the login attempt was unsuccessful, redirect back with an error message
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son correctas.',
            ]);
    }   

    public function logout()
        {
            auth()->logout();
            return redirect()->route('login');
        }
}
