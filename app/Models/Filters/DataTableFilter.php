<?php

namespace App\Models\Filters;

use App\Models\Concerns\QueryFilter;

class DataTableFilter extends QueryFilter
{
	public function __construct(array $filters)
	{
		parent::__construct($filters);
	}

	public function dt_request($dt)
	{
		$columnsSearching = array_filter($dt['columns'], function ($column) {
			return $column['searchable'] == 'true';
		});
		if (!empty($columnsSearching))
			$this->dtColumnSearching($columnsSearching, $dt['search']['value']);

		$columnsOrdering = array_filter($dt['columns'], function ($column) {
			return $column['orderable'] == 'true';
		});
		if (!empty($columnsOrdering))
			$this->dtColumnOrdering($columnsOrdering, $dt['order']);

		$this->dtRowLimit($dt['start'], $dt['length']);

		return $this->builder;
	}

	private function dtColumnSearching($columns, $searchValue)
	{
		return $this->builder->where(function ($query) use ($columns, $searchValue) {
			foreach ($columns as $column) {
				$query = $query->orWhereRaw("LOWER(" . $column['name'] . ") LIKE '%" . strtolower($searchValue) . "%'");
			}
		});
	}

	private function dtColumnOrdering($columns, $orders)
	{
		foreach ($columns as $column) {
			foreach ($orders as $order) {
				$this->builder->orderBy($column['name'], $order['dir']);
			}
		}

		return $this->builder;
	}

	private function dtRowLimit($start, $length)
	{
		return $this->builder->skip($start)->take($length);
	}
}
