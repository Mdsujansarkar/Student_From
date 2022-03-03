<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/from/one/hello',[HomeController::class, 'index']);
Route::post('/from/ones',[HomeController::class, 'store'])->name('from.one');
