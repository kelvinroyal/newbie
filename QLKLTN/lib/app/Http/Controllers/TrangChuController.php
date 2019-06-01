<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{KhoaLuan,ThanhVien,ThongBao,Khoa};
use Auth,DB;

class TrangChuController extends Controller
{
	public function getTrangChu(){
		$data['kl'] = KhoaLuan::count();
		$data['tv'] = ThanhVien::where('quyen',3)->count();
		$data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$data['l'] = date('Y-m-d');
		$data['kla'] = KhoaLuan::with(['thanhvien','khoa'])->get();
		$date=date_create(date('Y-m-d'));
		date_modify($date, "+1 days");
		$data['r'] = date_format($date, "Y-m-d");
		$data['tk'] = KhoaLuan::all();
		$data['lh'] = ThanhVien::where('quyen',1)->get();
		return view('layout.trang-chu',$data);
	}

	public function getLogout(){
		Auth::logout();
		return redirect()->intended('login');
	}

	public function getSearch(Request $request){
		$lh = ThanhVien::where('quyen',1)->get();
		$tb = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		$result = $request->result;
		$keyword = $result;
		$result = str_replace(' ', '%', $result);
		$items = DB::table('khoaluan')->join('thanhvien','khoaluan.thanhvien_khoaluan','=','id')->where('ten_thanhvien','like','%'.$result.'%')->orwhere('lop','like','%'.$result.'%')->orwhere('ma_thanhvien','like','%'.$result.'%')->paginate(10);
		$tv = ThanhVien::all();
		return view('layout.timkiem',compact('items','keyword','tv','tb','lh'));
	}

}