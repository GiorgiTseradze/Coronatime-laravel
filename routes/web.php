<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Models\Stats;
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

Route::get('reset', fn () => view('auth.reset'))->name('auth.reset');
Route::get('reset-password', fn () => view('auth.reset-password'))->name('auth.reset-password');
Route::get('reset-confirm', fn () => view('auth.reset-confirm'))->name('auth.reset-confirm');
Route::get('reset-success', fn () => view('auth.reset-success'))->name('auth.reset-success');

Route::get('register', fn () => view('register.create'))->name('register.create');
Route::post('register', [RegisterController::class, 'register'])->name('register');

Route::get('login', fn () => view('auth.create'))->name('auth.create');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('stats', fn () => view('stats', ['stats' => Stats::all()]))->name('stats');

Route::get('/', fn () => view('landing'))->name('landing');
