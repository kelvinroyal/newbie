<?php

use Illuminate\Database\Seeder;

class ThanhVienSeeder extends Seeder
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
        		'ma_thanhvien' => 'A26052',
        		'ten_thanhvien' => 'Nguyễn Việt Hoàng',
        		'password' => bcrypt('123456'),
        		'anh' => 'hoang.png',
        		'quyen' => 1,
        		'khoa_thanhvien' => 1,
        		'nganh_thanhvien' => 1
        	],
            [
                'ma_thanhvien' => 'B25579',
                'ten_thanhvien' => 'Mai Thúy Nga',
                'password' => bcrypt('123456'),
                'anh' => '',
                'quyen' => 2,
                'khoa_thanhvien' => 1,
                'nganh_thanhvien' => 1
            ],
            [
                'ma_thanhvien' => 'B21335',
                'ten_thanhvien' => 'Nguyễn Đức Dân',
                'password' => bcrypt('123456'),
                'anh' => '',
                'quyen' => 2,
                'khoa_thanhvien' => 1,
                'nganh_thanhvien' => 1
            ],
        ];
        DB::table('thanhvien')->insert($data);
    }
}
