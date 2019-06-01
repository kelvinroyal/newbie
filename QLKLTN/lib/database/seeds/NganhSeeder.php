<?php

use Illuminate\Database\Seeder;

class NganhSeeder extends Seeder
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
        		'ten_nganh' => 'Khoa học máy tính',
        		'khoa_nganh' => 1
        	],
        	[
        		'ten_nganh' => 'Quản trị mạng',
        		'khoa_nganh' => 1
        	],
        	[
        		'ten_nganh' => 'Toán ứng dụng',
        		'khoa_nganh' => 1
        	],
        ];
        DB::table('nganh')->insert($data);
    }
}
