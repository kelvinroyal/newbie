<?php

use Illuminate\Database\Seeder;

class ThietLapSeeder extends Seeder
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
        		'ky' => 1,
        		'nhom' => 1,
        		'nam_thietlap' => 2,
        		'hoidong_thietlap' => 5
        	],
        ];
        DB::table('thietlap')->insert($data);
    }
}
