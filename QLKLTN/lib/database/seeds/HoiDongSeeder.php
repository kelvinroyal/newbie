<?php

use Illuminate\Database\Seeder;

class HoiDongSeeder extends Seeder
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
        		'chuc_vu' => 1,
        		'ky' => 1,
        		'nhom' => 1,
        		'thanhvien_hoidong' => 2,
        		'nam_hoidong' => 2
        	],
        	[
        		'chuc_vu' => 2,
        		'ky' => 1,
        		'nhom' => 1,
        		'thanhvien_hoidong' => 3,
        		'nam_hoidong' => 2
        	],
        ];
        DB::table('hoidong')->insert($data);
    }
}
