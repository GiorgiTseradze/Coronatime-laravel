<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LanguageController;
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

Route::view('/login', 'auth.create')->name('auth.create');

Route::view('/forgot', 'auth.forgot')->middleware('guest')->name('password.request');
Route::get('/reset-password/{token}', fn ($token) => view('auth.reset-password', ['token' => $token]))->middleware('guest')->name('password.reset');
Route::view('/reset-success', 'auth.reset-success')->middleware('guest')->name('auth.reset-success');

Route::view('/register', 'register.create')->middleware('guest')->name('register.create');
Route::view('/email/verify', 'auth.verify-email')->middleware('guest')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [RegisterController::class, 'verify'])->middleware(['auth'])->name('verification.verify');
Route::view('/register-success', 'register.success')->middleware('auth')->name('register.success');
Route::post('register', [RegisterController::class, 'register'])->name('register');

Route::controller(Authcontroller::class)
->group(function () {
	Route::post('forgot-password', 'forgot')->middleware('guest')->name('password.email');
	Route::post('reset-password', 'reset')->middleware('guest')->name('password.update');
	Route::post('login', 'login')->name('login');
	Route::post('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth', 'verified')
->group(function () {
	Route::get('/', fn () => view('landing', ['stats' => WorldwideStats::all()]))->name('landing');
	Route::get('stats', [StatsController::class, 'country'])->name('stats');
});

Route::get('/change-locale/{locale}', [LanguageController::class, 'change'])->name('locale.change');
