<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Khoa,ThongBao,ThanhVien};
use App\Http\Requests\AddKhoaRequest;
use DB,Auth;

class KhoaController extends Controller
{
	public function getKhoa(){
		$data['lh'] = ThanhVien::where('quyen',1)->get();
		$data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		$data['khoalist'] = DB::table('khoa')->paginate(5);
		return view('layout.qlkhoa',$data);
	}
	public function postKhoa(AddKhoaRequest $request){
		$khoa = new Khoa;
		$khoa->ten_khoa = $request->ten_khoa;
		$khoa->save();
		return back();
	}

	public function getEdit($id){
		$data['lh'] = ThanhVien::where('quyen',1)->get();
		$data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		$data['khoa'] = Khoa::find($id);
		return view('layout.editkhoa',$data);
	}
	public function postEdit(Request $request,$id){
		$khoa = new Khoa;
		$arr['ten_khoa'] = $request->ten_khoa;
		$khoa::where('id_khoa',$id)->update($arr);
		return redirect('khoa');
	}

	public function getDelete($id){
		Khoa::destroy($id);
		return back();
	}
}