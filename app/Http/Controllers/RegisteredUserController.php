<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'], 
            'password' => ['required', Password::min(8), 'confirmed'],
        ]);
    
        try {
            // Create user with hashed password
            $user = User::create([
                'first_name' => $attributes['first_name'],
                'last_name' => $attributes['last_name'],
                'email' => $attributes['email'],
                'password' => bcrypt($attributes['password']),
            ]);
    
            // Log in the user
            Auth::login($user);
    
            // Redirect
            return redirect('/jobs');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Registration failed: ' . $e->getMessage());
            return back()->withErrors(['msg' => 'Registration failed.']);
        }
    }
    
}
