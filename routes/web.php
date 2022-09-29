<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StatsController;
use App\Models\WorldwideStats;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('forgot', fn () => view('auth.forgot'))->name('password.request');
Route::get('reset-confirm', fn () => view('auth.reset-confirm'))->name('auth.reset-confirm');
Route::get('reset-success', fn () => view('auth.reset-success'))->name('auth.reset-success');

Route::get('reset-password/{token}', fn ($token) => view('auth.reset-password', ['token' => $token]))->middleware('guest')->name('password.reset');

Route::post('forgot-password', [AuthController::class, 'forgot'])->middleware('guest')->name('password.email');
Route::post('reset-password', [AuthController::class, 'reset'])->middleware('guest')->name('password.update');

Route::get('register', fn () => view('register.create'))->middleware('guest')->name('register.create');
Route::post('register', [RegisterController::class, 'register'])->name('register');

Route::get('login', fn () => view('auth.create'))->name('auth.create');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/', fn () => view('landing', ['stats' => WorldwideStats::all()]))->middleware('auth')->name('landing');

Route::get('stats', [StatsController::class, 'country'])->middleware('auth')->name('stats');

Route::get('mail', fn () => view('mail.signup'));
