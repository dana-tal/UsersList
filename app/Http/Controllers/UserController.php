<?php

namespace App\Http\Controllers;

use App\Models\User;

use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{

    public function create()
    {
        return Inertia::render('Auth/Login');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/home');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function display_registration_form()
     {
        return Inertia::render('Auth/Register');
     }

     public function store_registration_info(Request $request)
     {
        $userAttributes = $request->validate([
            'first_name' => ['required'],
            'last_name'=>['required'],
            'username' => ['required'],
            'password' => ['required', Password::min(6)],
        ]);

        $user = User::create($userAttributes);
        Auth::login($user);
        return redirect('/home');
     }


}
