<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Khoa,Nam,HoiDong,ThanhVien,TrongSo,ThietLap,ThongBao};
use App\Http\Requests\AddHoiDongRequest;
use App\Http\Requests\AddThietLapRequest;
use Auth;

class HoiDongController extends Controller
{
	public function getDanhSach(){
		$data['lh'] = ThanhVien::where('quyen',1)->get();
		$data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		$data['khoalist'] = Khoa::all();
		$data['namlist'] = Nam::all();
		return view('layout.dshoidong',$data);
	}
	public function getAdd(){
		$data['lh'] = ThanhVien::where('quyen',1)->get();
		$data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		$data['khoalist'] = Khoa::all();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
		$data['namlist'] = Nam::where('so_nam','>=',date('Y'))->get();
		return view('layout.addhoidong',$data);
	}
	public function getThietLap(){
		$data['lh'] = ThanhVien::where('quyen',1)->get();
		$data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		$data['khoalist'] = Khoa::all();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
		$data['namlist'] = Nam::where('so_nam','>=',date('Y'))->get();
		return view('layout.thietlap',$data);
	}
	public function postThietLap(AddThietLapRequest $request){
		if($request->ky=='unselect' || $request->nhom=='unselect' || $request->nam_detai=='unselect' || $request->hd1=='unselect' || $request->hd2=='unselect' || $request->hd3=='unselect' || $request->hd4=='unselect'){
			return back()->withInput()->with('error','Thiết lập không thành công');
		}else{
			$tl = new ThietLap;
			$tl->ky = $request->ky;
			$tl->nhom = $request->nhom;
			$tl->nam_thietlap = $request->nam_thietlap;
			$tl->khoa_thietlap = $request->khoatl;
			$tl->hd1 = $request->hd1;
			$tl->hd2 = $request->hd2;
			$tl->hd3 = $request->hd3;
			$tl->hd4 = $request->hd4;
			$tl->save();
			return redirect('hoi-dong/thiet-lap');
		}
	}

	public function postAdd(AddHoiDongRequest $request){
		if($request->ky=='unselect' || $request->nhom=='unselect' || $request->nam_hoidong=='unselect' || $request->thanhvien_hoidong=='unselect'){
			return back()->withInput()->with('error','Thêm giáo viên không thành công');
		}else{
			$hd = HoiDong::where([['ky',$request->ky],['nhom', $request->nhom],['nam_hoidong',$request->nam_hoidong],['thanhvien_hoidong',$request->thanhvien_hoidong]])->count();
			if($hd == 0){
				$hoidong = new HoiDong;
				$hoidong->ky = $request->ky;
				$hoidong->nhom = $request->nhom;
				$hoidong->thanhvien_hoidong = $request->thanhvien_hoidong;
				$hoidong->nam_hoidong = $request->nam_hoidong;
				$hoidong->save();
				return redirect('hoi-dong/danh-sach');
			}
			else{
				return back()->withInput()->with('error','Giáo viên đã có trong hội đồng');
			}
		}
	}

	public function getDelete($id){
		HoiDong::destroy($id);
		return back();
	}

	public function postEdit(Request $request){
        $hd = new HoiDong;
        $arr['ky'] = $request->ky;
        $arr['nhom'] = $request->nhom;
        $arr['nam_hoidong'] = $request->nam_hoidong;
        $hd::where('id_hoidong',$request->id)->update($arr);
        return redirect('hoi-dong/danh-sach');
    }
}