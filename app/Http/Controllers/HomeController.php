<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
	public function index()
	{
		return view("user.index", [
			'title' => 'user'
		]);
	}

	public function edit(Request $request, $userId)
	{
		$user = User::where('id', $userId)->first();

		return view('user.edit', [
			'title' => 'Edit user',
			'user' => $user
		]);
	}

	public function update(Request $req, $userId)
	{
		$user = User::where('id', $userId)->first();

		if (empty($user)) return response()->json([
			'message' => 'user not found',
			'data' => null
		]);

		$user->name = $req->name;

		$user->save();

		return redirect('/');
	}
}
