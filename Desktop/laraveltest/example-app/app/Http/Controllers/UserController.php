<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    // Show Register/Create Form

    public function create() {
        return view('users.register');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        // Hash Password
        $validated['password'] = bcrypt($validated['password']);

        // Create User
        $user = User::create($validated);

        // Login
        auth()->login($user);

        return redirect('')->with('message', 'User created successfully!');
    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('')->with('message', 'You have been logged out');
    }

    public function login() {
        return view('users.login');
    }

    public function authenticate(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => ['required']
        ]);

        if (auth()->attempt($validated)) {
            $request->session()->regenerate();

            return redirect('')->with('message', 'You are logged in!');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }
}
