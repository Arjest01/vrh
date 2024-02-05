<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    public function showRegistationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request){
        $validated = $request->validate([
            'name' => ['required', 'string','between:5,60'],
            'email' => ['required','email','unique:users'],
            'password' => ['required','string','min:8', 'confirmed'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('home')->withStatus('Inscription reussi');
    }
}
