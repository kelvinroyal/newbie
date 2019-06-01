<?php

use Illuminate\Database\Seeder;

class NamSeeder extends Seeder
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
        		'so_nam' => 2018
        	],
        	[
        		'so_nam' => 2019
        	],
        ];
        DB::table('nam')->insert($data);
    }
}
