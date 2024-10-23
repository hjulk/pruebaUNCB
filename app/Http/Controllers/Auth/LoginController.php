<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Verificar si el usuario con ese email existe
        $user = User::where('email', $request->email)->first();

        if ($user) {

            // Verificar si el usuario está activo
            if (!$user->estado) {
                return redirect()->back()->withErrors(['email' => 'Su cuenta está inactiva.']);
            }
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('users.index')->with('success', 'Inicio de sesión exitoso.');
            } else {
                return redirect()->back()->withErrors(['password' => 'La contraseña no es válida.']);
            }
        } else {
            return redirect()->back()->withErrors(['email' => 'No existe una cuenta asociada a este email.']);
        }
    }
}
