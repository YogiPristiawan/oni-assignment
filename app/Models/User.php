<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Concerns\Filterable;

class User extends Model
{
	use SoftDeletes, Filterable;

	protected $table = 'users';
	public $incrementing = true;

	protected $fillable = [
		'id',
		'name',
		'picture'
	];
	public $timestamps = true;
}
