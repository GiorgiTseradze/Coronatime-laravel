<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
	protected $guarded = ['id'];

	use HasFactory;

	protected $fillable = [
		'code',
		'country',
		'death',
		'recovered',
		'cases',
	];
}
