<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class RegisterController extends Controller
{
	public function register(RegisterRequest $request): RedirectResponse
	{
		{
			$user = User::create([
				'username' => $request->username,
				'email'    => $request->email,
				'password' => bcrypt($request->password),
			]);

			event(new Registered($user));

			auth()->login($user);

			return redirect()->route('verification.notice');
		}
	}

	public function verify(EmailVerificationRequest $request): RedirectResponse
	{
		$request->fulfill();

		return redirect()->route('register.success');
	}
}
