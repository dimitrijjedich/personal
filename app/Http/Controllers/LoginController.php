<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function handleLogin(Request $request)
    {
        $request->validate([
            'name' => ['required','alpha'],
            'email' => ['required','email'],
            'password' => 'required',
        ], [
            'name.required' => 'Der Username darf nicht leer sein.',
            'name.alpha' => 'Der Username darf nur aus Buchstaben bestehen.',
            'email.required' => 'Der Email darf nicht leer sein.',
        ]);

        return $request->all();
    }
}
