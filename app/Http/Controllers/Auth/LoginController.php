<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
<<<<<<< HEAD
    // Affiche le formulaire de login
=======
>>>>>>> d656bf2 (final commit)
    public function showLoginForm()
    {
        return view('auth.login');
    }

<<<<<<< HEAD
    // Gère la tentative de connexion
=======
>>>>>>> d656bf2 (final commit)
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Identifiants incorrects.',
        ])->onlyInput('email');
    }

<<<<<<< HEAD
    // Déconnexion
=======
>>>>>>> d656bf2 (final commit)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
