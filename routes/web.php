<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'index']);

Route::resource('usuarios', 'App\Http\Controllers\UserController');

Route::resource('/notas/todas', 'App\Http\Controllers\NotasController');
Route::get('/notas/favoritas', [App\Http\Controllers\NotasController::class, 'favoritas']);
Route::get('/notas/archivadas', [App\Http\Controllers\NotasController::class, 'archivadas']);




//Route::resource('usuarios', 'App\Http\Controllers\UserController')->middleware('auth');
