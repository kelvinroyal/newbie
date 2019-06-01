<?php

use Illuminate\Database\Seeder;

class Slide2Seeder extends Seeder
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
        		'photo_slide2'=>'1.jpg'
        	],
        ];
        DB::table('slide2')->insert($data);
    }
}
