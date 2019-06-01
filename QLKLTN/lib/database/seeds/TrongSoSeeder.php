<?php

use Illuminate\Database\Seeder;

class TrongSoSeeder extends Seeder
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
        		'trong_so' => '15%',
        		'hoidong_trongso' => 5
        	],
        ];
        DB::table('trongso')->insert($data);
    }
}
