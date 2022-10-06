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
			$stats = Stats::where('country->en', 'like', '' . ucfirst(request('search')) . '%')
			->orwhere('country->ka', 'like', '' . ucfirst(request('search')) . '%')->get();
		}

		if (request('column'))
		{
			$stats = Stats::where('country->en', 'like', '' . ucfirst(request('search')) . '%')
			->orwhere('country->ka', 'like', '' . ucfirst(request('search')) . '%')
			->orderBy(request('column') === 'country' ? request('column') . '->en' : request('column'), request('order'))
			->get();
		}

		return view('stats', [
			'stats' => $stats,
		]);
	}
}
