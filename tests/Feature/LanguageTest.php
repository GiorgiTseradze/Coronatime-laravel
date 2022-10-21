<?php

namespace Tests\Feature;

use Tests\TestCase;

class LanguageTest extends TestCase
{
	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */
	public function test_change_language_to_ka()
	{
		$response = $this->get('/change-locale/ka');
		$response->assertRedirect('/');
		$response->assertStatus(302);
	}

	public function test_change_language_to_en()
	{
		$response = $this->get(route('locale.change', 'fr'));
		$response = $this->get(route('login'));
		$response->assertSee('Welcome Back!');
		$response->assertSuccessful();
	}
}
