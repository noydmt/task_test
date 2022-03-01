<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ShopSeeder extends Seeder
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
                'shop_name' => '高級食パン店',
                'area_id' => 1,
            ],
            [
                'id' => 2,
                'shop_name' => '高級食パン店',
                'area_id' => 1,
            ],
            [
                'id' => 3,
                'shop_name' => '高級食パン店',
                'area_id' => 2,
            ],
            [
                'id' => 4,
                'shop_name' => '高級食パン店',
                'area_id' => 3,
            ],
            [
                'id' => 5,
                'shop_name' => '高級食パン店',
                'area_id' => 2,
            ],
        ];

        $now = Carbon::now();
        foreach ($params as $param) {
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('shops')->insert($param);
        }
    }
}
