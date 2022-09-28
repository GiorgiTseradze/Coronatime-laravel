<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class AuthController extends Controller
{
	public function login(LoginRequest $request): RedirectResponse
	{
		$field = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		$request->merge([$field => $request->input('username')]);

		if (!auth()->attempt($request->only($field, 'password'), $request->remember)
		) {
			throw ValidationException::withMessages([
				'password' => 'invalid password',
			]);
		}
		session()->regenerate();
		return redirect()->route('landing');
	}

	public function forgot(ForgotPasswordRequest $request)
	{
		$status = Password::sendResetLink(
			$request->only('email')
		);

		return $status === Password::RESET_LINK_SENT
					? redirect()->route('auth.reset-confirm')
					: back()->withErrors(['email' => __($status)]);
	}

	public function reset(ResetPasswordRequest $request)
	{
		$status = Password::reset(
			$request->only('email', 'password', 'password_confirmation', 'token'),
			function ($user, $password) {
				$user->forceFill([
					'password' => Hash::make($password),
				])->setRememberToken(Str::random(60));

				$user->save();

				event(new PasswordReset($user));
			}
		);

		return $status === Password::PASSWORD_RESET
					? redirect()->route('login')->with('status', __($status))
					: back()->withErrors(['email' => [__($status)]]);
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();

		return redirect('/');
	}
}
