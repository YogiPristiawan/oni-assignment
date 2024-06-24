<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Filters\DataTableFilter;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function index(Request $request)
	{
		$req = $request->all();

		$dtRequest = [
			'dt_request' => [
				'draw' => $req['draw'],
				'columns' => $req['columns'],
				'order' => $req['order'],
				'start' => (int)$req['start'],
				'length' => (int)$req['length'],
				'search' => $req['search']
			]
		];

		$users = User::filter(new DataTableFilter($dtRequest))->orderBy('id', 'asc')->get();
		// TODO: we can use windown function instead
		$total = User::count();

		return response()->json([
			'message' => 'success',
			'data' => $users,
			'recordsFiltered' => $total,
			'draw' => (int)$dtRequest['dt_request']['draw'],
			'recordsTotal' => $total
		], 200);
	}
}
