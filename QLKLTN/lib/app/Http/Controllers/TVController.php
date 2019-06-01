<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{ThanhVien,Khoa,Nganh,ThongBao};
use App\Http\Requests\AddTVRequest;
use DB,Excel,Auth;

class TVController extends Controller
{
	public function getAdd(){
		$data['lh'] = ThanhVien::where('quyen',1)->get();
		$data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		$data['khoalist'] = Khoa::all();
		return view('layout.addtv',$data);
	}
	public function postAdd(AddTVRequest $request){
		if($request->khoa_thanhvien=='unselect' || $request->nganh_thanhvien==0 || $request->quyen=='unselect'){
			return back()->withInput()->with('error','Thêm thành viên không thành công');
		}else{
			$tv = new ThanhVien;
			if ($request->hasFile('anh')) {
				$filename = $request->anh->getClientOriginalName();
				$tv->anh = $filename;
				$request->anh->storeAs('avatar',$filename);
			}
			$tv->ma_thanhvien = $request->ma_thanhvien;
			$tv->ten_thanhvien = $request->ten_thanhvien;
			$tv->password = bcrypt($request->password);
			$tv->quyen = $request->quyen;
			$tv->khoa_thanhvien = $request->khoa_thanhvien;
			$tv->nganh_thanhvien = $request->nganh_thanhvien;
			$tv->lop = $request->lop;
			$tv->email = $request->email;
			$tv->save();
			return back();
		}
	}

	public function getEdit($id){
		$data['lh'] = ThanhVien::where('quyen',1)->get();
		$data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		$data['tv'] = ThanhVien::find($id);
		$data['khoalist'] = Khoa::all();
		$data['nganhlist'] = Nganh::all();
		return view('layout.edittv',$data);
	}
	public function postEdit(Request $request,$id){
		$tv = new ThanhVien;
		$arr['ma_thanhvien'] = $request->ma_thanhvien;
		$arr['ten_thanhvien'] = $request->ten_thanhvien;
		$arr['password'] = bcrypt($request->password);
		$arr['quyen'] = $request->quyen;
		$arr['khoa_thanhvien'] = $request->khoa_thanhvien;
		$arr['nganh_thanhvien'] = $request->nganh_thanhvien;
		$arr['lop'] = $request->lop;
		$arr['email'] = $request->email;
		if ($request->hasfile('anh')) {
    		$anh = $request->anh->getClientOriginalName();
    		$arr['anh'] = $anh;
    		$request->anh->storeAs('avatar',$anh);
    	}
		$tv::where('id',$id)->update($arr);
		return redirect('thanh-vien/danh-sach');
	}

	public function getDanhSach(){
		$lh = ThanhVien::where('quyen',1)->get();
		$tb = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		$tvlist = DB::table('thanhvien')->join('khoa','thanhvien.khoa_thanhvien','=','id_khoa')->join('nganh','thanhvien.nganh_thanhvien','=','id_nganh')->orderBy('id','desc')->paginate(10);
		$khoalist = Khoa::all();
		return view('layout.dstv',compact('tvlist','khoalist','tb','lh'));
	}

	public function getSearch2(Request $request){
		$lh = ThanhVien::where('quyen',1)->get();
		$tb = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		$result2 = $request->result2;
		$keyword = $result2;
		$result2 = str_replace(' ', '%', $result2);
		$items2 = ThanhVien::where('ten_thanhvien','like','%'.$result2.'%')->orwhere('lop','like','%'.$result2.'%')->orwhere('ma_thanhvien','like','%'.$result2.'%')->get();
		$khoalist = Khoa::all();
		return view('layout.timkiem2',compact('items2','keyword','tb','khoalist','lh'));
	}

	public function getDelete($id){
		ThanhVien::destroy($id);
		return back();
	}

	public function getImp(){
		$data['lh'] = ThanhVien::where('quyen',1)->get();
		$data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		$data['khoalist'] = Khoa::all();
		return view('layout.import',$data);
	}

	public function postImp(Request $request){
		if($request->khoa_thanhvien=='unselect' || $request->nganh_thanhvien==0){
			return back()->withInput()->with('error','Thêm thành viên không thành công');
		}else{
			$file = $request->file('import');

			if($file) {
				$path = $file->getRealPath();
				 $sheetNames = Excel::load($file, function($reader) use (&$data) {
				 	$data = $reader;
				 })->getSheetNames();
				 // $insert = [];
				 if (isset($data) && count($sheetNames) == 1 ) {
				 	$data->each(function($row) use ($request){

				 		$data = [
				 			'ma_thanhvien' => $row->ma_sv,
				 			'ten_thanhvien' => $row->ho_va_ten,
				 			'password' => bcrypt($row->mat_khau),
				 			'lop' => $row->lop,
				 			'khoa_thanhvien' => $request->khoa_thanhvien,
				 			'nganh_thanhvien' => $request->nganh_thanhvien,
				 			'quyen' => (int)$row->quyen,
				 		];

				 		$check = ThanhVien::where('ma_thanhvien', $row->ma_sv)->firstOrFail();

				 		if (count($check) == 0) {
				 			ThanhVien::insert($data);
				 		}
				 		
				 	});
				 }

				 if (isset($data) && count($sheetNames)  > 1) {
				 	$data->each(function($sheet) use ($request){
				 		$sheet->each(function($row) use ($request){
				 			$data= [
				 			'ma_thanhvien' => $row->ma_sv,
				 			'ten_thanhvien' => $row->ho_va_ten,
				 			'password' => bcrypt($row->mat_khau),
				 			'lop' => $row->lop,
				 			'khoa_thanhvien' => $request->khoa_thanhvien,
				 			'nganh_thanhvien' => $request->nganh_thanhvien,
				 			'quyen' => (int)$row->quyen,

				 		];
				 		$check = ThanhVien::where('ma_thanhvien', $row->ma_sv)->get();

				 		if (count($check) == 0) {
				 			ThanhVien::insert($data);
				 		}

				 		});
				 	});
				 }
				 // ThanhVien::insert($insert);
			}
			return back();
		}
	}
}