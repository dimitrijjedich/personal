<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return '<h1>About Page</h1>';
})->name('about');

Route::get('contact', function () {
    return '<h1>Contact Page</h1>';
})->name('contact');

Route::get('contact/{id}', function ($id) {
    return $id;
})->name('contact-named');

Route::get('home', function () {
    return '
    <a href="' . route('about') . '">About</a>
    <a href="' . route('contact') . '">Contact</a>
    <a href="' . route('contact-named', ['id' => 123]) . '">Contact Named</a>
    ';
});

Route::group(['prefix' => 'customer'], function () {
    Route::get('/', function () {
        return '<h1>Customer List</h1>';
    });

    Route::get('/create', function () {
        return '<h1>Customer Created</h1>';
    });

    Route::get('/edit/{id}', function ($id) {
        return '<h1>Customer ' . $id . ' edited</h1>';
    });
});

Route::fallback(function () {
    return '<h1>404 Not Found</h1>';
});
