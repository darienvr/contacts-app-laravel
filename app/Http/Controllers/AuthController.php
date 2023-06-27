<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showRegistrationForm()
{
    return view('auth.register');
}

public function register(Request $request)
{
    
    // Validar los datos del formulario de registro
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ]);

    if ($validator->fails()) {
        // La validación ha fallado
        return redirect()->route('register')->withErrors($validator)->withInput();
    }

    // Crear un nuevo usuario
    $user = new User();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = bcrypt($request->input('password'));
    $user->save();
    
    // Iniciar sesión automáticamente después del registro
    Auth::login($user);

    // Redirigir a la página de inicio o a la ruta deseada
    return redirect()->route('contacts');
}

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validar los datos del formulario de inicio de sesión
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Intentar autenticar al usuario
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            return redirect()->route('contacts');
        } else {
            // Autenticación fallida
            return redirect()->route('login')->withErrors(['error' => 'Credenciales inválidas. Inténtalo de nuevo.']);
        }
    }

    public function logout()
    {
        Auth::logout();

        // Redirigir a la página de inicio o a la ruta deseada después de cerrar sesión
        return redirect()->route('login');
    }
}
