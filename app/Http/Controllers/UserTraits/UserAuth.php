<?php

namespace App\Http\Controllers\UserTraits;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

trait UserAuth
{
    public function signupForm() {
        return view('auth.signup');
    }

    public function loginForm(Request $request) {
        return view('auth.login');
    }

    public function userAuth(Request $request) {
        if ($request->has('submit-signup')) {
            return $this->signup($request);
        }

        if ($request->has('submit-login')) {
            return $this->login($request);
        }

        if ($request->has('submit-logout')) {
            return $this->logout();
        }
    }

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
        
        setToast('success', 'Sign up succesful. Please log in..');
        return redirect('/')->with('success', 'Registration successful! Please log in.');
    }
    
    public function login(Request $request) {
        $request->validate([
            'login_id' => 'required',
            'login_pass' => 'required',
        ]);
    
        $loginField = filter_var($request->input('login_id'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username'; 
    
        $credentials = [
            $loginField => $request->login_id,
            'password' => $request->login_pass
        ];
    
        if (Auth::attempt($credentials)) {
            toast('success', 'Heyy there, wlcm back..');
            return redirect()->back()->with('message', 'Login successful.');
        } else {
            // echo 'login err: '.$loginField.' | '.$request->login_id.' | '.$request->login_pass;
            toast('warn', 'Invalid credentials..');
            return redirect()->back()->withErrors(['message' => 'Invalid credentials. Please try again.']);
        }
    }
    
    public function logout() {
        Auth::logout();
        toast('success', 'See ya, bye byee..');
        return redirect()->back()->with('message', 'Logout successful.');
    }
    
    private function genUsername($baseUsername) {
        $username = $baseUsername;
        $count = 1;
    
        // Check for uniqueness
        while (User::where('username', $username)->exists()) {
            $username = $baseUsername . $count; // Append a number to the username
            $count++;
        }
    
        return $username;
    }
}
