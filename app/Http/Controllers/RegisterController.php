<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register', [
            'title' => 'Registrasi'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            "name" => 'required|max:255',
            "email" => 'required|email:dns|unique:users',
            "password" => 'required|min:6|max:20'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);
        return redirect('/')->with('success', 'Registrasi berhasil, silahkan Login!');
    }
}
