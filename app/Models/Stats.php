<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Stats extends Model
{
	protected $guarded = ['id'];

	use HasTranslations;

	public $translatable = ['country'];

	use HasFactory;
}
