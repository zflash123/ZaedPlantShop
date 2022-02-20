<?php

//use App\Http\Controllers\UserAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::post('/logout', [HomeController::class, 'logout']);

Route::get('/tanaman', [HomeController::class, 'tanaman']);
Route::get('/benih', [HomeController::class, 'benih']);
Route::get('/media', [HomeController::class, 'media']);
Route::get('/order', [HomeController::class, 'order']);
Route::post('/confirm', [HomeController::class, 'confirm']);

Auth::routes();

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'home']);
