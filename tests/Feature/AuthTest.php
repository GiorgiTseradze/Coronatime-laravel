<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class AuthTest extends TestCase
{
	use RefreshDatabase;

	protected function setUp(): void
	{
		parent::setUp();
		$this->user = User::factory()->create();
	}

	public function test_login_page_is_accessible()
	{
		$response = $this->get('/login');
		$response->assertSuccessful();
		$response->assertSee(value: 'Welcome Back!');
		$response->assertViewIs(value: 'auth.create');
	}

	public function test_auth_should_give_us_errors_if_input_is_not_provided()
	{
		$response = $this->post('/login');
		$response->assertSessionHasErrors(
			[
				'username',
				'password',
			]
		);
	}

	public function test_auth_should_give_us_error_if_email_input_is_not_provided()
	{
		$response = $this->post('login', [
			'password' => 'password',
		]);

		$response->assertSessionHasErrors(
			[
				'username',
			]
		);
	}

	public function test_auth_should_give_us_error_if_password_input_is_not_provided()
	{
		$response = $this->post('login', [
			'email' => 'test@redberry.ge',
		]);

		$response->assertSessionHasErrors(
			[
				'password',
			]
		);

		$response->assertSessionDoesntHaveErrors(['email']);
	}

	public function test_auth_should_give_us_error_if_email_is_not_correct()
	{
		$response = $this->post('login', [
			'email' => 'testredberry.ge',
		]);

		$response->assertSessionHasErrors(
			[
				'username',
			]
		);
	}

	public function test_auth_should_give_us_error_if_user_with_respective_credentials_does_not_exist()
	{
		$response = $this->post('login', [
			'username'    => 'juj',
			'password'    => 'password',
		]);

		$response->assertSessionHasErrors(
			[
				'username' => 'Invalid username',
			]
		);
	}

	public function test_auth_should_redirect_to_landing_page_after_successful_login()
	{
		$username = 'test';
		$email = 'test@redberry.ge';
		$password = 'password';

		User::create(
			[
				'username' => $username,
				'email'    => $email,
				'password' => bcrypt($password),
			]
		);

		$response = $this->post('/login', [
			'username' => $username,
			'password' => $password,
		]);

		$response->assertRedirect('/');
	}

	public function test_forgot_password_should_give_us_error_if_email_is_incorrect()
	{
		$response = $this->post('forgot-password', [
			'email' => 'test@redberry.ge',
		]);

		$response->assertSessionHasErrors(
			[
				'email',
			]
		);
	}

	public function test_forgot_password_should_redirect_us_to_email_sent_blade_if_email_exists()
	{
		User::create([
			'username' => 'test',
			'email'    => 'test@redberry.ge',
			'password' => bcrypt('password'),
		]);

		$response = $this->post('forgot-password', [
			'email' => 'test@redberry.ge',
		]);

		$response->assertRedirect('/email/verify');
	}

	public function test_reset_password_form_should_give_errors_if_new_password_is_not_provided()
	{
		$response = $this->post('/reset-password', [
			'password'              => '',
			'password_confirmation' => '',
		]);

		$response->assertSessionHasErrors(
			[
				'password',
			]
		);
	}

	public function test_password_reset_request_should_change_users_password()
	{
		$user = $this->user;
		$response = $this->post(route('password.email'), [
			'email' => $user->email,
		]);
		$response->assertSessionDoesntHaveErrors(['email']);
		$token = Password::createToken($user);
		$response = $this->post(route('password.update'), [
			'email'                 => $user->email,
			'password'              => 'newpassword',
			'password_confirmation' => 'newpassword',
			'token'                 => $token,
		]);
		$response->assertRedirect(route('login'));
	}

	public function test_should_redirect_to_login_after_log_out()
	{
		$username = 'test';
		$email = 'test@redberry.ge';
		$password = 'password';

		User::create(
			[
				'username' => $username,
				'email'    => $email,
				'password' => bcrypt($password),
			]
		);

		$response = $this->post('/login', [
			'username' => $username,
			'password' => $password,
		]);

		$response = $this->post('/logout');
		$response->assertRedirect('/login');
	}
}
