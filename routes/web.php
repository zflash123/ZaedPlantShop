<?php

//use App\Http\Controllers\UserAuth;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::post('/logout', [HomeController::class, 'logout']);

Route::get('/tanaman', [HomeController::class, 'tanaman']);
Route::get('/benih', [HomeController::class, 'benih']);
Route::get('/media', [HomeController::class, 'media']);
Route::get('/cart', [HomeController::class, 'cart']);
Route::get('/helpdesk', [HomeController::class, 'helpdesk']);
Route::post('/confirm', [HomeController::class, 'confirm']);

Auth::routes();

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'home']);
