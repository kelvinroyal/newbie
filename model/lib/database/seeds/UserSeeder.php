<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
        		'email'=>'admin@gmail.com',
        		'password'=>bcrypt('123456'),
        		'name_user'=>'Nguyễn Việt Hoàng',
        		'level'=>1,
        		'avatar'=>'hoang.png'
        	],
        	[
        		'email'=>'viethoang@gmail.com',
        		'password'=>bcrypt('123456'),
        		'name_user'=>'Nguyễn Việt Hoàng',
        		'level'=>1,
        		'avatar'=>'hoang.png'
        	],
        ];
        DB::table('user')->insert($data);
    }
}
