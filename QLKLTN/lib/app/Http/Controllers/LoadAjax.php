<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Khoa,DeTai,Nganh,ThanhVien,HoiDong,TrongSo,KhoaLuan,ThietLap};
use App\Http\Requests;
use DB;

class LoadAjax extends Controller
{
    //
    public function loadNganh(Request $request)
    {
    	$data['nganhs'] = Khoa::with('nganh')->find($request->idkhoa);
    	if ($request->idnganh) {
    		$data['idnganh'] = $request->idnganh;
    	}
    	
    	return view('component.nganh', $data);
    }

    public function loadTv(Request $request)
    {   
        $tvlist = ThanhVien::where([['khoa_thanhvien',$request->khoa],['trang_thai', $request->trang_thai],['quyen',3]])->get();

        $tvlist1 = ThanhVien::where([['khoa_thanhvien',$request->khoa],['quyen',3]])->get();

        $row = ThanhVien::where([['khoa_thanhvien',$request->khoa],['trang_thai', $request->trang_thai],['quyen',3]])->count();

        if($request->khoa != 0 && $request->trang_thai == 0){
        $row1 = ThanhVien::where([['khoa_thanhvien',$request->khoa],['quyen',3]])->count();
        }
        return view('component.tv', compact('tvlist','tvlist1','row','row1'));
    }

    public function loadDeTai(Request $request)
    {
        $detailist = DeTai::whereHas('thanhvien', function($qr) use ($request) {
            $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
        })->where([['ky',$request->ky],['nhom', $request->nhom],['nam_detai',$request->nam_detai]])->get();

        $detailist1 = DeTai::whereHas('thanhvien', function($qr) use ($request){
            $qr->where('khoa_thanhvien', $request->khoa);
        })->get();
        
        $detailist2 = DeTai::whereHas('thanhvien', function($qr) use ($request){
            $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
        })->get();

        $detailist3 = DeTai::whereHas('thanhvien', function($qr) use ($request){
            $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
        })->where('nam_detai',$request->nam_detai)->get();

        $row = DeTai::whereHas('thanhvien', function($qr) use ($request){
            $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
        })->where([['ky',$request->ky],['nhom', $request->nhom],['nam_detai',$request->nam_detai]])->count();

        if($request->khoa != 0 && $request->nganh != 0 && $request->ky == 0 && $request->nhom == 0 && $request->nam_detai != 0){
            $row3 = DeTai::whereHas('thanhvien', function($qr) use ($request){
                $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
            })->where('nam_detai',$request->nam_detai)->count();
        }

        if($request->khoa != 0 && $request->nganh != 0 && $request->ky == 0 && $request->nhom == 0 && $request->nam_detai == 0){
            $row2 = DeTai::whereHas('thanhvien', function($qr) use ($request){
                $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
            })->count();
        }
        if($request->khoa != 0 && $request->nganh == 0 && $request->ky == 0 && $request->nhom == 0 && $request->nam_detai == 0){
            $row1 = DeTai::whereHas('thanhvien', function($qr) use ($request){
                $qr->where('khoa_thanhvien', $request->khoa);
            })->count();
        }

        $kllist = KhoaLuan::all();

        $kl = KhoaLuan::find($request->id);
        $hd = HoiDong::with('thanhvien')->where([
            ['ky',$request->ky],
            ['nam_hoidong',$request->nam_khoaluan],
            ['nhom',$request->nhom]
        ])->get();
        return view('component.detai', compact('detailist','detailist2','detailist1','detailist3','row','row1','row2','row3','kllist','kl','hd'));

    }

    public function loadKhoa(Request $request)
    {
        $khoalist = DB::table('nganh')->join('khoa','nganh.khoa_nganh','=','id_khoa')->where('id_khoa',$request->khoa_nganh)->get();
        return view('component.khoa', compact('khoalist'));
    }

    public function loadGiaoVien(Request $request)
    {
        $data['giaovien'] = Nganh::with('thanhvien')->find($request->idnganh);
        if ($request->idgiaovien) {
            $data['idgiaovien'] = $request->idgiaovien;
        }
        
        return view('component.giaovien', $data);
    }

    public function loadHoiDong(Request $request)
    {
        $hoidonglist = HoiDong::whereHas('thanhvien', function($qr) use ($request) {
            $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
        })->where([['ky',$request->ky],['nhom', $request->nhom],['nam_hoidong',$request->nam_hoidong]])->get();
        
        return view('component.hoidong', compact('hoidonglist'));
    }

    public function loadTrongSo(Request $request)
    {
        $trongsolist = HoiDong::whereHas('thanhvien', function($qr) use ($request) {
            $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
        })->where([['ky',$request->ky],['nhom', $request->nhom],['nam_hoidong',$request->nam_hoidong]])->get();

        return view('component.trongso', compact('trongsolist'));
    }

    public function loadBaoCao(Request $request)
    {
        $khoaluanlist = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
            $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
        })->where([['ky',$request->ky],['nhom', $request->nhom],['nam_khoaluan',$request->nam_khoaluan]])->orderBy('id_khoaluan','desc')->get();

        $khoaluanlist1 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
            $qr->where('khoa_thanhvien', $request->khoa);
        })->orderBy('id_khoaluan','desc')->get();
        
        $khoaluanlist2 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
            $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
        })->orderBy('id_khoaluan','desc')->get();

        $khoaluanlist3 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
            $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
        })->where('nam_khoaluan',$request->nam_khoaluan)->orderBy('id_khoaluan','desc')->get();

        $row = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
            $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
        })->where([['ky',$request->ky],['nhom', $request->nhom],['nam_khoaluan',$request->nam_khoaluan]])->count();

        if($request->khoa != 0 && $request->nganh != 0 && $request->ky == 0 && $request->nhom == 0 && $request->nam_khoaluan != 0){
            $row3 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
                $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
            })->where('nam_khoaluan',$request->nam_khoaluan)->count();
        }

        if($request->khoa != 0 && $request->nganh != 0 && $request->ky == 0 && $request->nhom == 0 && $request->nam_khoaluan == 0){
            $row2 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
                $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
            })->count();
        }
        if($request->khoa != 0 && $request->nganh == 0 && $request->ky == 0 && $request->nhom == 0 && $request->nam_khoaluan == 0){
            $row1 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
                $qr->where('khoa_thanhvien', $request->khoa);
            })->count();
        }

        return view('component.baocao', compact('khoaluanlist','khoaluanlist2','khoaluanlist3','khoaluanlist1','row','row2','row1','row3'));
    }

    public function loadXacNhan(Request $request)
    {
        $khoaluanlist = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
            $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
        })->where([['ky',$request->ky],['nhom', $request->nhom],['nam_khoaluan',$request->nam_khoaluan]])->orderBy('id_khoaluan','desc')->get();

        $khoaluanlist1 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
            $qr->where('khoa_thanhvien', $request->khoa);
        })->orderBy('id_khoaluan','desc')->get();
        
        $khoaluanlist2 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
            $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
        })->orderBy('id_khoaluan','desc')->get();

        $khoaluanlist3 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
            $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
        })->where('nam_khoaluan',$request->nam_khoaluan)->orderBy('id_khoaluan','desc')->get();

        $row = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
            $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
        })->where([['ky',$request->ky],['nhom', $request->nhom],['nam_khoaluan',$request->nam_khoaluan]])->count();

        if($request->khoa != 0 && $request->nganh != 0 && $request->ky == 0 && $request->nhom == 0 && $request->nam_khoaluan != 0){
            $row3 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
                $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
            })->where('nam_khoaluan',$request->nam_khoaluan)->count();
        }

        if($request->khoa != 0 && $request->nganh != 0 && $request->ky == 0 && $request->nhom == 0 && $request->nam_khoaluan == 0){
            $row2 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
                $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
            })->count();
        }
        if($request->khoa != 0 && $request->nganh == 0 && $request->ky == 0 && $request->nhom == 0 && $request->nam_khoaluan == 0){
            $row1 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
                $qr->where('khoa_thanhvien', $request->khoa);
            })->count();
        }
        return view('component.xacnhan', compact('khoaluanlist','khoaluanlist2','khoaluanlist3','khoaluanlist1','row','row2','row1','row3'));
    }

    public function loadKhoaLuan(Request $request)
    {
        $khoaluanlist = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
            $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
        })->where([['ky',$request->ky],['nhom', $request->nhom],['nam_khoaluan',$request->nam_khoaluan]])->orderBy('id_khoaluan','desc')->get();

        $khoaluanlist1 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
            $qr->where('khoa_thanhvien', $request->khoa);
        })->orderBy('id_khoaluan','desc')->get();
        
        $khoaluanlist2 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
            $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
        })->orderBy('id_khoaluan','desc')->get();

        $khoaluanlist3 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
            $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
        })->where('nam_khoaluan',$request->nam_khoaluan)->orderBy('id_khoaluan','desc')->get();

        $row = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
            $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
        })->where([['ky',$request->ky],['nhom', $request->nhom],['nam_khoaluan',$request->nam_khoaluan]])->count();

        if($request->khoa != 0 && $request->nganh != 0 && $request->ky == 0 && $request->nhom == 0 && $request->nam_khoaluan != 0){
            $row3 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
                $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
            })->where('nam_khoaluan',$request->nam_khoaluan)->count();
        }

        if($request->khoa != 0 && $request->nganh != 0 && $request->ky == 0 && $request->nhom == 0 && $request->nam_khoaluan == 0){
            $row2 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
                $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
            })->count();
        }
        if($request->khoa != 0 && $request->nganh == 0 && $request->ky == 0 && $request->nhom == 0 && $request->nam_khoaluan == 0){
            $row1 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
                $qr->where('khoa_thanhvien', $request->khoa);
            })->count();
        }
        return view('component.khoaluan', compact('khoaluanlist','khoaluanlist2','khoaluanlist3','khoaluanlist1','row','row2','row1','row3'));
    }

    public function loadXn(Request $request) {
        $kl = KhoaLuan::find($request->id);
        $hd = HoiDong::with('thanhvien')->where([
            ['ky',$kl->ky],
            ['nam_hoidong',$kl->nam_khoaluan],
            ['nhom',$kl->nhom]
        ])->get();
        $tl = ThietLap::where([
            ['ky',$kl->ky],
            ['nam_thietlap',$kl->nam_khoaluan],
            ['nhom',$kl->nhom]
        ])->get();
        $gv = ThanhVien::where('quyen',2)->where('khoa_thanhvien',$kl->thanhvien->khoa_thanhvien)->get();
        return view('component.child.xacnhan', compact('kl','hd','gv','tl'));
    }

    public function loadChiTiet(Request $request) {
        $ct = ThanhVien::find($request->id);
        return view('component.child.chitiet', compact('ct'));
    }

    public function loadPub(Request $request) {
        $bc = KhoaLuan::find($request->id);
        return view('component.child.pub', compact('bc'));
    }

    public function loadHd(Request $request) {
        $hd = HoiDong::with('nam')->find($request->id);
        return view('component.child.hoidong', compact('hd'));
    }

    public function loadTimKiem(Request $request) {
        $tk = KhoaLuan::find($request->id);
        $hd = HoiDong::with('thanhvien')->where([
            ['ky',$tk->ky],
            ['nam_hoidong',$tk->nam_khoaluan],
            ['nhom',$tk->nhom]
        ])->get();
        $tl = ThietLap::find($tk->thietlap_khoaluan);
        return view('component.child.timkiem', compact('tk','tl','hd'));
    }

    public function loadKl(Request $request) {
        $kl = KhoaLuan::find($request->id);
        $hd = HoiDong::with('thanhvien')->where([
            ['ky',$kl->ky],
            ['nam_hoidong',$kl->nam_khoaluan],
            ['nhom',$kl->nhom]
        ])->get();
        $tl = ThietLap::find($kl->thietlap_khoaluan);
        return view('component.child.khoaluan', compact('kl','hd','tl'));
    }

    public function loadTs(Request $request) {
        $ts = HoiDong::find($request->id);
        return view('component.child.trongso', compact('ts'));
    }

    public function loadTl(Request $request)
    {
        $data['tl'] = ThietLap::find($request->idhoidong);
        if ($request->idthietlap) {
            $data['idthietlap'] = $request->idthietlap;
        }
        return view('component.child.drop.thietlap', $data);
    }

    public function loadThongKe(Request $request)
    {
        $tk = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
            $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
        })->where([['ky',$request->ky],['nhom', $request->nhom],['nam_khoaluan',$request->nam_khoaluan]])->get();

        $tk1 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
            $qr->where('khoa_thanhvien', $request->khoa);
        })->get();
        
        $tk2 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
            $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
        })->get();

        $tk3 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
            $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
        })->where('nam_khoaluan',$request->nam_khoaluan)->get();

        $row = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
            $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
        })->where([['ky',$request->ky],['nhom', $request->nhom],['nam_khoaluan',$request->nam_khoaluan]])->count();

        if($request->khoa != 0 && $request->nganh != 0 && $request->ky == 0 && $request->nhom == 0 && $request->nam_khoaluan != 0){
            $row3 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
                $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
            })->where('nam_khoaluan',$request->nam_khoaluan)->count();
        }

        if($request->khoa != 0 && $request->nganh != 0 && $request->ky == 0 && $request->nhom == 0 && $request->nam_khoaluan == 0){
            $row2 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
                $qr->where([['khoa_thanhvien', $request->khoa],['nganh_thanhvien', $request->nganh]]);
            })->count();
        }
        if($request->khoa != 0 && $request->nganh == 0 && $request->ky == 0 && $request->nhom == 0 && $request->nam_khoaluan == 0){
            $row1 = KhoaLuan::whereHas('thanhvien', function($qr) use ($request){
                $qr->where('khoa_thanhvien', $request->khoa);
            })->count();
        }
        return view('component.thongke', compact('tk','tk1','tk2','tk3','row','row1','row2','row3'));
    }

}