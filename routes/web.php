<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/from/one/hello',[HomeController::class, 'index']);
Route::post('/from/ones',[HomeController::class, 'store'])->name('from.one');
Route::get('/table/one',[HomeController::class, 'show']);
Route::get('/table/one/{id}',[HomeController::class, 'edit'])->name('from.edit');
Route::post('/from/update/{id}',[HomeController::class, 'update'])->name('from.update');
Route::get('/delete/{id}',[HomeController::class, 'destroy'])->name('from.delete');

Route::get('registration',[LoginController::class, 'index']);
Route::post('user/data',[LoginController::class, 'create'])->name('registration');
Route::get('login',[LoginController::class, 'login'])->name('login');
Route::post('login/from', [LoginController::class, 'loginStore'])->name('login.from');


