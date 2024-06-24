<?php

namespace App\Models\Concerns;

class QueryFilter
{
	protected $filters;
	protected $builder;

	public function __construct(array $filters)
	{
		$this->filters = $filters;
	}

	public function apply($query)
	{
		$this->builder = $query;
		foreach ($this->filters as $name => $value) {

			$validateValue = true;

			switch (true) {
				case gettype($value) == 'array':
					if (empty($value)) $validateValue = false;
					break;
				case gettype($value) == 'string':
					if (!strlen($value)) $validateValue = false;
					break;
			}
			if (!method_exists($this, $name) || !$validateValue) {
				continue;
			} else {
				$this->{$name}($value);
			}
		}

		return $this->builder;
	}
}
