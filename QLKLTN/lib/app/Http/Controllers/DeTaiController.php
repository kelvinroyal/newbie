<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{DeTai,ThanhVien,Nam,Khoa,KhoaLuan,ThongBao};
use App\Http\Requests\AddDetaiRequest;
use DB,Auth;


class DeTaiController extends Controller
{
	public function getAdd(){
		$data['lh'] = ThanhVien::where('quyen',1)->get();
		$data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		$data['tvlist'] = ThanhVien::all();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
		$data['namlist'] = Nam::where('so_nam','>=',date('Y'))->get();
		return view('layout.adddetai',$data);
	}
	public function postAdd(AddDetaiRequest $request){
		if($request->ky=='unselect' || $request->nhom=='unselect' || $request->nam_detai=='unselect'){
			return back()->withInput()->with('error','Thêm đề tài không thành công');
		}else{
			$detai = new DeTai;
			$detai->ten_detai = $request->ten_detai;
			$detai->ky = $request->ky;
			$detai->nhom = $request->nhom;
			$detai->thanhvien_detai = Auth::user()->id;
			$detai->nam_detai = $request->nam_detai;
			$detai->save();
			return redirect('de-tai/danh-sach');
		}
	}

	public function getEdit($id){
		$data['lh'] = ThanhVien::where('quyen',1)->get();
		$data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		$data['detai'] = DeTai::find($id);
		$data['tvlist'] = ThanhVien::all();
		$data['namlist'] = Nam::all();
		return view('layout.editdetai',$data);
	}
	public function postEdit(Request $request,$id){
		$detai = new DeTai;
		$arr['ten_detai'] = $request->ten_detai;
		$arr['ky'] = $request->ky;
		$arr['nhom'] = $request->nhom;
		$arr['nam_detai'] = $request->nam_detai;
		$detai::where('id_detai',$id)->update($arr);
		return redirect('de-tai/danh-sach');
	}

	public function getDanhSach(){
		$data['lh'] = ThanhVien::where('quyen',1)->get();
		$data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		$data['kllist'] = KhoaLuan::all();
		$data['khoalist'] = Khoa::all();
		$data['namlist'] = Nam::all();
		$data['detailist'] = DeTai::with(['nam', 'thanhvien'])->orderBy('id_detai','desc')->paginate(10);
		return view('layout.dsdetai',$data);
	}

	public function getDelete($id){
		DeTai::destroy($id);
		return back();
	}
}