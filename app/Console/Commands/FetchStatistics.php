<?php

namespace App\Console\Commands;

use App\Models\Stats;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchStatistics extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'fetch:statistics';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$response = Http::withHeaders([
			'accept' => 'application/json',
		])->get('https://devtest.ge/countries');
		$countries = $response->json();

		foreach ($countries as $country)
		{
			$statistics = Http::withHeaders([
				'accept'       => 'application/json',
				'Content-Type' => 'application/json',
			])->post('https://devtest.ge/get-country-statistics', ['code' => $country['code']]);

			$stats = $statistics->json();

			Stats::create([
				'code'      => $stats['code'],
				'country'   => $stats['country'],
				'recovered' => $stats['recovered'],
				'death'     => $stats['deaths'],
				'cases'     => $stats['confirmed'],
			]);
		}
	}
}
