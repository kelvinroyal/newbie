<?php

use Illuminate\Database\Seeder;

class SlideSeeder extends Seeder
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
        		'photo_slide'=>'slide-1.jpg'
        	],
        ];
        DB::table('slide')->insert($data);
    }
}
