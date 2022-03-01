<?php

use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$params = [
			[
				'id' => 1,
				'name' => '東京都',
				'sort_no' => 1,
			],
			[
				'id' => 2,
				'name' => '大阪府',
				'sort_no' => 2,
			],
			[
				'id' => 3,
				'name' => '福岡県',
				'sort_no' => 3,
			]
		];

		$now = Carbon::now();
		foreach ($params as $param) {
			$param['created_at'] = $now;
			$param['updated_at'] = $now;
			DB::table('areas')->insert($param);
		};
	}
}
