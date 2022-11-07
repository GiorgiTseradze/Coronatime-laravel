<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			'username'        => 'required|min:3|unique:users,username',
			'email'           => 'required|min:3|unique:users,email',
			'password'        => 'required|min:3|confirmed',
		];
	}
}
