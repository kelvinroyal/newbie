<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{KhoaLuan,ThanhVien,Nam,Khoa,tv_hd,ThongBao};
use App\Http\Requests\AddKhoaLuanRequest;
use Auth,DB;

class KhoaLuanController extends Controller
{
    public function getDanhSach(){
        $data['lh'] = ThanhVien::where('quyen',1)->get();
        $data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
        $data['khoalist'] = Khoa::all();
        $data['namlist'] = Nam::all();
        return view('layout.dskhoaluan',$data);
    }
    public function getDangKy(){
        $data['lh'] = ThanhVien::where('quyen',1)->get();
        $data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data['khoaluan'] = Nam::where('so_nam','>=',date('Y'))->get();
        return view('layout.dkkhoaluan',$data);
    }
    public function getXacNhan(){
        $data['lh'] = ThanhVien::where('quyen',1)->get();
        $data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
        $data['khoalist'] = Khoa::all();
        $data['namlist'] = Nam::all();
        return view('layout.xacnhan',$data);
    }

    public function postDangKy(AddKhoaLuanRequest $request){
        if($request->ky=='unselect' || $request->nhom=='unselect' || $request->nam_khoaluan=='unselect'){
            return back()->withInput()->with('error','Đăng ký khóa luận không thành công');
        }else{
            $kl = KhoaLuan::where([['ky',$request->ky],['nhom',$request->nhom],['nam_khoaluan',$request->nam_khoaluan],['thanhvien_khoaluan',Auth::user()->id]])->count();
            $kls = KhoaLuan::where([['thanhvien_khoaluan',Auth::user()->id],['diem1',null],['diem2',null],['diem3',null],['diem4',null]])->count();
            if($kl == 0 && $kls == 0){
                $khoaluan = new KhoaLuan;
                $khoaluan->de_tai = $request->de_tai;
                $khoaluan->ky = $request->ky;
                $khoaluan->nhom = $request->nhom;
                $khoaluan->nam_khoaluan = $request->nam_khoaluan;
                $khoaluan->thanhvien_khoaluan = Auth::user()->id;
                $khoaluan->khoa_khoaluan = Auth::user()->khoa_thanhvien;
                $khoaluan->nganh_khoaluan = Auth::user()->nganh_thanhvien;
                $khoaluan->save();
                $tv = new ThanhVien;
                if(Auth::user()->quyen == 3){
                    $arr['trang_thai'] = 1;
                    $tv::where('id',Auth::user()->id)->update($arr);
                }
                $t = ThanhVien::where('quyen',1)->get()->toArray();
                
                foreach ($t as $key) {
                    $tb = new ThongBao;
                    $tb->id_gui = Auth::user()->id;
                    $tb->id_nhan = $key['id'];
                    $tb->noi_dung = Auth::user()->ma_thanhvien." đã đăng ký kỳ ".$request->ky." - nhóm ".$request->nhom;
                    $tb->save();
                }
                return back()->withInput()->with('success','Đăng ký khóa luận thành công'); 
            }
            else{
               return back()->withInput()->with('error','Khóa luận đã được đăng ký và chưa bảo vệ');
            }
        }
    }
    public function getDelete($id){
        KhoaLuan::destroy($id);
        return back();
    }

    public function postXacNhan(Request $request){
        $tb = new ThongBao;
        $tb->id_gui = Auth::user()->id;
        $tb->id_nhan = $request->tv;
        $tb->noi_dung = "Khóa luận đã được xác nhận";
        $tb->save(); 

        $xn = new KhoaLuan;
        $arr['giao_vien'] = $request->giao_vien;
        $arr['de_tai'] = $request->de_tai;
        $arr['thoi_gian'] = $request->thoi_gian;
        $arr['phong'] = $request->phong;
        if($request->thietlap_khoaluan != null){
            $arr['thietlap_khoaluan'] = $request->thietlap_khoaluan;
        }
        else{
            $arr['thietlap_khoaluan'] = null;
            if($request->hd1 != null && $request->hd2 != null && $request->hd3 != null && $request->hd4 != null)
            {
                $tv = new tv_hd;
                $tv->thanhvien_id = $request->hd1;
                $tv->khoaluan_id = $request->id;
                $tv->chuc_vu = 1;
                $tv->save();
                $tv = new tv_hd;
                $tv->thanhvien_id = $request->hd2;
                $tv->khoaluan_id = $request->id;
                $tv->chuc_vu = 2;
                $tv->save();
                $tv = new tv_hd;
                $tv->thanhvien_id = $request->hd3;
                $tv->khoaluan_id = $request->id;
                $tv->chuc_vu = 3;
                $tv->save();
                $tv = new tv_hd;
                $tv->thanhvien_id = $request->hd4;
                $tv->khoaluan_id = $request->id;
                $tv->chuc_vu = 4;
                $tv->save();
            }
        }
        $xn::where('id_khoaluan',$request->id)->update($arr);
        
        return redirect('khoa-luan/xac-nhan');
    }

    public function postDiem(Request $request){
        $d = new KhoaLuan;
        $arr['diem1'] = $request->diem1;
        $arr['diem2'] = $request->diem2;
        $arr['diem3'] = $request->diem3;
        $arr['diem4'] = $request->diem4;
        $arr['ts1'] = $request->ts1;
        $arr['ts2'] = $request->ts2;
        $arr['ts3'] = $request->ts3;
        $arr['ts4'] = $request->ts4;
        $d::where('id_khoaluan',$request->id)->update($arr);
        $result = $request->diem1*($request->ts1/100)+$request->diem2*($request->ts2/100)+$request->diem3*($request->ts3/100)+$request->diem4*($request->ts4/100);
        return [
            'result' => $result
        ];
    }

    public function getCanhan(){
        $data['lh'] = ThanhVien::where('quyen',1)->get();
        $data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
        $data['kl'] = KhoaLuan::with('nam')->where('thanhvien_khoaluan',Auth::user()->id)->get();
        return view('layout.canhan',$data);
    }
    public function getHuongdan(){
        $data['lh'] = ThanhVien::where('quyen',1)->get();
        $data['tb'] = ThongBao::where('id_nhan', Auth::user()->id)->orderBy('id_thongbao','desc')->paginate(5);
        $data['kl'] = KhoaLuan::with('nam')->where('giao_vien',Auth::user()->id)->orderBy('id_khoaluan','desc')->paginate(4);
        return view('layout.huongdan',$data);
    }
}