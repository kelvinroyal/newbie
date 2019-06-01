<?php

use Illuminate\Database\Seeder;

class DeTaiSeeder extends Seeder
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
        		'ten_detai' => 'Ứng dụng điểm danh',
        		'thanhvien_detai' => 1
        	],
        ];
        DB::table('detai')->insert($data);
    }
}
