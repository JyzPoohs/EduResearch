<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('session.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'age' => ['required', 'numeric'],
            'phone' => ['required', 'numeric'],
            'role' => ['required'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:20'],
        ]);
        $request['password'] = bcrypt($request['password']);

        session()->flash('success', 'Your account has been created.');
        $user = User::create([
            'name' => $request['name'],
            'age' => $request['age'],
            'phone' => $request['phone'],
            'role' => $request['role'],
            'email' => $request['email'],
            'password' => $request['password'],
        ]);
        Auth::login($user);
        return redirect('/home');
    }
}
