<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$data = [];

		for ($i = 0; $i < 500; $i++) {
			array_push($data, [
				'name' => 'user_' . $i,
				'picture' => '',
				'created_at' => DB::raw('CURRENT_TIMESTAMP'),
				'updated_at' => DB::raw('CURRENT_TIMESTAMP')
			]);
		}

		DB::table('users')->insert($data);
	}
}
