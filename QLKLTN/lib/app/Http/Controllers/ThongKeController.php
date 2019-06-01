<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Khoa,Nam,ThongBao,ThanhVien};
use Auth;

class ThongKeController extends Controller
{
	public function getThongKe(){
		$data['lh'] = ThanhVien::where('quyen',1)->get();
		$data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		$data['khoalist'] = Khoa::all();
		$data['namlist'] = Nam::all();
		return view('layout.thongke',$data);
	}
}