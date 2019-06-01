<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Nam,ThongBao,ThanhVien};
use App\Http\Requests\AddNamRequest;
use DB,Auth;

class NamController extends Controller
{
	public function getNam(){
		$data['lh'] = ThanhVien::where('quyen',1)->get();
		$data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		$data['namlist'] = DB::table('nam')->paginate(5);
		return view('layout.qlnam',$data);
	}
	public function postNam(AddNamRequest $request){
		$nam = new Nam;
		$nam->so_nam = $request->so_nam;
		$nam->save();
		return back();
	}

	public function getEdit($id){
		$data['lh'] = ThanhVien::where('quyen',1)->get();
		$data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		$data['nam'] = Nam::find($id);
		return view('layout.editnam',$data);
	}
	public function postEdit(Request $request,$id){
		$nam = new Nam;
		$arr['so_nam'] = $request->so_nam;
		$nam::where('id_nam',$id)->update($arr);
		return redirect('nam');
	}

	public function getDelete($id){
		Nam::destroy($id);
		return back();
	}
}