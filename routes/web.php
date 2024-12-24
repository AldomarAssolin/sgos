<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Cliente\ClienteController;
use App\Http\Controllers\Dashboard\Servicos\ServicoController;
use App\Http\Controllers\Dashboard\Ordens\OrdemServicoController;

Route::get('/', function () {
    return view('site');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');


Route::get('/home', [HomeController::class, 'index'])->name('site');

Route::resource('clientes', ClienteController::class);
Route::resource('servicos', ServicoController::class);
Route::resource('ordens-servico', OrdemServicoController::class);



//Auth::routes();

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');

Route::get('/reset-password', function () {
    return view('reset-password');
})->name('reset-password');


