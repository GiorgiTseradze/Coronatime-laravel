<?php

namespace App\Http\Controllers;

use App\Models\Stats;
use Illuminate\Contracts\View\View;

class StatsController extends Controller
{
	public function country(): View
	{
		$stats = Stats::all();

		if (request('search'))
		{
			$stats = Stats::where('country', 'like', '' . ucfirst(request('search')) . '%')->get();
		}

		return view('stats', [
			'stats' => $stats,
		]);
	}
}
