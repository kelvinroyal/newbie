<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Http\Requests\AddBannerRequest;

class BannerController extends Controller
{
    //
    public function getList(){
        $data['banner'] = Banner::paginate(5);
    	return view('backend.list_banner',$data);
    }

    public function getAdd(){
    	return view('backend.add_banner');
    }

    public function postAdd(AddBannerRequest $request){
        $banner = new Banner;
        $banner->content_banner = $request->content_banner;
        $banner->link_banner = $request->link_banner;
        $banner->save();
        return back();
    }

    public function getEdit($id){
        $data['banner'] = Banner::find($id);
    	return view('backend.edit_banner',$data);
    }

    public function postEdit(Request $request,$id){
        $banner = new Banner;
        $arr['content_banner'] = $request->content_banner;
        $arr['link_banner'] = $request->link_banner;
        $banner::where('id_banner',$id)->update($arr);
        return redirect('admin/banner/list');
    }

    public function getDel($id){
        Banner::destroy($id);
        return back();
    }
}
