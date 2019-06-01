<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Khoa,Nam,TrongSo,HoiDong,ThongBao};
use Auth;

class TrongSoController extends Controller
{
	public function getTrongSo(){
		$data['lh'] = ThanhVien::where('quyen',1)->get();
		$data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		$data['khoalist'] = Khoa::all();
		$data['namlist'] = Nam::all();
		return view('layout.qltrongso',$data);
	}

	public function getDelete(Request $request,$id){
		$ts = new HoiDong;
        $arr['trong_so'] = null;
        $ts::where('id_hoidong',$request->id)->update($arr);
        return redirect('trong-so');
	}

	public function postTrongSo(Request $request){
        $ts = new HoiDong;
        $arr['trong_so'] = $request->trong_so;
        $ts::where('id_hoidong',$request->id)->update($arr);
        return redirect('trong-so');
    }
}