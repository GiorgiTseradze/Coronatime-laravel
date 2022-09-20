<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
	public function login(LoginRequest $request): RedirectResponse
	{
		dd($request->validated());
		if (auth()->attempt([
			'email'    => $request->email,
			'password' => $request->password,
		])
		) {
			return redirect('/');
		}
	}

	public function logout(): RedirectResponse
	{
		dd('mzia');
		auth()->logout();

		return redirect('/');
	}
}
