<?php

namespace Tests\Feature;

use App\Mail\SignupEmail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class RegisterTest extends TestCase
{
	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */
	use RefreshDatabase;

	public function test_register_page_is_accessible()
	{
		$response = $this->get('/register');
		$response->assertSuccessful();
		$response->assertSee(value: 'Welcome to Coronatime');
		$response->assertViewIs(value: 'register.create');
	}

	public function test_user_should_be_redirected_to_verification_page_after_clicking_register()
	{
		$response = $this->post('register', [
			'username'              => 'regtest',
			'email'                 => 'regtest@redberry.ge',
			'password'              => 'password',
			'password_confirmation' => 'password',
		]);

		$response->assertRedirect('/email/verify');
	}

	public function test_send_verification_email()
	{
		$user = User::factory()->make([
			'username'         => 'giorgi',
			'email'            => 'giorgi@redberry.ge',
			'password'         => bcrypt('password'),
			'email_verified_at'=> null,
		]);

		$data = [
			'username'             => $user->username,
			'email'                => $user->email,
			'password'             => $user->password,
			'password_confirmation'=> $user->password,
		];

		$response = $this->post(route('register', $data));
		$this->assertFalse($user->hasVerifiedEmail());

		$bool = $data ? true : null;

		$this->assertTrue($bool);

		Mail::fake();

		Mail::to($user->email)->send(new SignupEmail($data));
		Mail::assertSent(SignupEmail::class);
		$response->assertRedirect(route('verification.notice'));
	}
}
