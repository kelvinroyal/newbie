<?php

use Illuminate\Database\Seeder;

class NationSeeder extends Seeder
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
        		'name_nation'=>'Vietnam',
        		'continents_nation'=>1
        	],
        	[
        		'name_nation'=>'Thailand',
        		'continents_nation'=>1
        	],
        ];
        DB::table('nation')->insert($data);
    }
}
