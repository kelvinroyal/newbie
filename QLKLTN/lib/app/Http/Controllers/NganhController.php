<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Nganh,Khoa,ThongBao,ThanhVien};
use App\Http\Requests\AddNganhRequest;
use DB,Auth;

class NganhController extends Controller
{
	public function getNganh(){
		$data['lh'] = ThanhVien::where('quyen',1)->get();
		$data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		$data['khoalist'] = Khoa::all();
		$data['nganhlist'] = DB::table('nganh')->join('khoa','nganh.khoa_nganh','=','id_khoa')->orderBy('id_nganh','desc')->paginate(5);
		return view('layout.qlnganh',$data);
	}
	public function postNganh(AddNganhRequest $request){
		if($request->khoa_nganh=='unselect'){
			return back()->withInput()->with('error','Thêm ngành không thành công');
		}else{
			$nganh = new Nganh;
			$nganh->ten_nganh = $request->ten_nganh;
			$nganh->khoa_nganh = $request->khoa_nganh;
			$nganh->save();
			return back();
		}
	}

	public function getEdit($id){
		$data['lh'] = ThanhVien::where('quyen',1)->get();
		$data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		$data['nganh'] = Nganh::find($id);
		$data['khoalist'] = Khoa::all();
		return view('layout.editnganh',$data);
	}
	public function postEdit(Request $request,$id){
		$nganh = new Nganh;
		$arr['ten_nganh'] = $request->ten_nganh;
		$arr['khoa_nganh'] = $request->khoa_nganh;
		$nganh::where('id_nganh',$id)->update($arr);
		return redirect('nganh');
	}

	public function getDelete($id){
		Nganh::destroy($id);
		return back();
	}
}