<?php

use Illuminate\Database\Seeder;

class KhoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
        	[
        		'ten_khoa' => 'Toán Tin'
        	],
        	[
        		'ten_khoa' => 'Điều dưỡng'
        	],
        	[
        		'ten_khoa' => 'Ngân hàng'
        	],
        ];
        DB::table('khoa')->insert($data);
    }
}
