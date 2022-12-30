<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function indexLogin()
    {
        $this->middleware(['guest']);
        return view('auth.login');
    }

    public function indexRegister()
    {
        $this->middleware(['guest']);
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->middleware(['guest']);
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('profile');
    }

    public function login(Request $request)
    {
        $this->middleware(['guest']);
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Invalid login details');
        }


        return view('index')->with('message', 'Succesvol ingelogd');
    }

    public function logout()
    {
        auth()->logout();

        return view('index')->with('message', 'Succesvol uitgelogd');
    }
}
