<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Concerns\QueryFilter;

trait Filterable
{
	public function scopeFilter(Builder $query, QueryFilter $queryFilters)
	{
		$queryFilters->apply($query);
	}
}
