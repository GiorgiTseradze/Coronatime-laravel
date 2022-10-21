<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class StatsTest extends TestCase
{
	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */
	use RefreshDatabase;

	protected function setUp(): void
	{
		parent::setUp();
		$this->user = User::factory()->create();
	}

	public function test_should_fetch_covid_statistics()
	{
		Http::fake([
			'https://devtest.ge/countries' => Http::response(json_encode([
				[
					'code' => 'GE',
					'name' => [
						'ka' => 'საქართველო',
						'en' => 'Georgia',
					],
				],
			])),
			'https://devtest.ge/get-country-statistics' => Http::response(json_encode([
				'id'        => 1,
				'country'   => 'Georgia',
				'code'      => 'GE',
				'confirmed' => 300,
				'deaths'    => 10,
				'recovered' => 40,
			]), 200, ['HEADERS']),
		]);

		$this->artisan('fetch:statistics')->assertSuccessful();
	}

	public function test_when_user_sorts_in_english_it_should_return_results()
	{
		$order = 'asc';
		$searchValue = 'z';
		$column = 'name';
		$response = $this->actingAs($this->user)
		->get(route('stats', '&column=' . $column . '&search=' . $searchValue . '&order=' . $order));
		$response->assertSuccessful();
	}

	public function test_when_user_sorts_in_georgian_it_should_return_results()
	{
		$order = 'asc';
		$searchValue = 'ზ';
		$column = 'name';
		$this->actingAs($this->user)->get('language/ka');
		$response = $this->actingAs($this->user)
		->get(route('stats', '&column=' . $column . '&search=' . $searchValue . '&order=' . $order));
		$response->assertSuccessful();
	}
}
