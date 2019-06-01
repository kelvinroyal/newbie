<?php

use Illuminate\Database\Seeder;

class ContinentsSeeder extends Seeder
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
        		'name_continents'=>'Asia'
        	],
        	[
        		'name_continents'=>'Europe'
        	],
        ];
        DB::table('continents')->insert($data);
    }
}
