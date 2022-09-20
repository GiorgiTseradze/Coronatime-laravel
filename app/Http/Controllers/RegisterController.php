<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
	public function register(RegisterRequest $request): RedirectResponse
	{
		{
			$user = User::create($request->validated() + [
				'password' => bcrypt($request['password']),
			]);

			auth()->login($user);

			return redirect('/');
		}
	}
}
