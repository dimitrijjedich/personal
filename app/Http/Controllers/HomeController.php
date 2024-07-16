<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    public function __invoke()
    {
        $users = User::all();
        return view('home', ['users' => $users]);
    }
}
