<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\SignupEmail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

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

			$data = [
				'name'              => $request->username,
				'verification_code' => 'ASDASD',
			];

			Mail::to($request->email)->send(new SignupEmail($data));

			auth()->login($user);

			return redirect('/');
		}
	}
}
