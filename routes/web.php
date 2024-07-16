<?php

use App\Http\Controllers\HomeController;
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
    return view('about');
})->name('about');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::get('contact/{id}', function ($id) {
    return view('contact-named', ['id' => $id]);
})->name('contact-named');

Route::get('home', HomeController::class);

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
