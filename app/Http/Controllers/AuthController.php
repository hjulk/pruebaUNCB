<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        dd($request);

        $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();

        if ($user && $user->estado) {
            if (Auth::attempt($credentials)) {
                return redirect()->route('users')->with('success', 'Inicio de sesión exitoso.');
            } else {
                return back()->withErrors(['password' => 'Contraseña incorrecta.']);
            }
        } else {
            return back()->withErrors(['email' => 'Este usuario no está activo en el sistema.']);
        }
    }
}
