<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Khoa,Nam,KhoaLuan,ThongBao,ThanhVien};
use Illuminate\Support\Facades\Storage;
use Auth;

class BaoCaoController extends Controller
{
	public function getBaoCao(){
		$data['lh'] = ThanhVien::where('quyen',1)->get();
		$data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		$data['khoalist'] = Khoa::all();
		$data['namlist'] = Nam::all();
		return view('layout.qlbaocao',$data);
	}
	public function getEdit($id){
		$data['lh'] = ThanhVien::where('quyen',1)->get();
		$data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
		$data['bc'] = KhoaLuan::find($id);
		return view('layout.editbaocao',$data);
	}
	public function postBaoCao(Request $request,$id){
		$bc = new KhoaLuan;
		if ($request->hasfile('bao_cao')) {
    		$bao_cao = $request->bao_cao->getClientOriginalName();
    		$arr['bao_cao'] = $bao_cao;
    		$request->bao_cao->storeAs('report',$bao_cao);
    	}
		$bc::where('id_khoaluan',$id)->update($arr);
		return redirect('bao-cao');
	}
	public function postBc(Request $request){
		$bc = new KhoaLuan;
		$arr['pub'] = $request->pub;
		$bc::where('id_khoaluan',$request->id)->update($arr);
		return redirect('bao-cao');
	}
	public function getDelete(Request $request,$id){
		$bc = KhoaLuan::find($id);
		Storage::delete('report/'.$bc->bao_cao);
		$bc->bao_cao = null;
		$bc->save();
		return back();
	}
	
}