<?php

namespace App\Http\Controllers\UserTraits;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

trait UserAuth
{
    // Show the signup form
    public function signupForm() {
        return view('auth.signup');
    }

    // Show the login form
    public function loginForm() {
        return view('auth.login');
    }

    // Handle authentication actions (login, signup, logout)
    public function handleAuth(Request $request) {
        if ($request->has('submit-signup')) {
            return $this->signup($request);
        } elseif ($request->has('submit-login')) {
            return $this->login($request);
        } elseif ($request->has('submit-logout')) {
            return $this->logout($request);
        }
        
        return redirect()->back()->withErrors(['message' => 'Invalid action.']);
    }

    // Sign up a new user
    public function signup(Request $request) {
        $request->validate([
            'signup_name' => 'required',
            'signup_email' => 'required|email|unique:users',
            'signup_pass' => 'required|min:6',
        ]);
        
        $signup_username = $this->genUsername(strtok($request->signup_email, '@'));
        echo 'signup success: '.$signup_username.' | '.$request->signup_name.' | '.$request->signup_email.' | '.$request->signup_pass;
    
        User::create([
            'username'  => $signup_username,
            'name'      => $request->signup_name,
            'email'     => $request->signup_email,
            'password'  => Hash::make($request->signup_pass),
        ]);
        
        toast('success', 'Sign up succesful. Please log in');
        return redirect()->back()->with('success', 'Registration successful! Please log in.');
    }

    // Log in the user
    public function login(Request $request) {
        // Validate user input
        $validated = $request->validate([
            'login_id' => 'required',
            'login_pass' => 'required',
        ]);

        // Determine if the login ID is an email or username
        $loginField = filter_var($validated['login_id'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $loginField => $validated['login_id'],
            'password'  => $validated['login_pass'],
        ];

        // Attempt to log in
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            toast('success', 'Logged in as @<b>' . Auth::user()->username . '</b> ');
            return redirect()->back()->with('message', 'Logged in as @' . htmlspecialchars(Auth::user()->username));
        } else {
            toast('warning', 'Invalid credentials!! Please try again');
            return redirect()->back()->withInput($request->only('login_id'))->withErrors([
                'login_id' => 'Invalid credentials',
            ]);
        }
    }

    // Log out the user
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        toast('success', 'Logged out successfully..');
        return redirect()->back()->with('message', 'You have been logged out.');
    }

    // Generate a unique username
    private function genUsername($baseUsername) {
        $username = $baseUsername;
        $count = 1;

        // Check if the username exists, append a number if it does
        while (User::where('username', $username)->exists()) {
            $username = $baseUsername . $count;
            $count++;
        }

        return $username;
    }
}
