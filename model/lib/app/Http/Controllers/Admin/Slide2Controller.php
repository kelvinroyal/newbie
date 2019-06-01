<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slide2;
use App\Http\Requests\AddSlide2Request;

class Slide2Controller extends Controller
{
    //
    public function getSlide2(){
    	$data['slide2'] = Slide2::orderBy('id_slide2','desc')->paginate(5);
    	return view('backend.slides2',$data);
    }

    public function postSlide2(AddSlide2Request $request){
    	$slide2 = new Slide2;
    	$slide2->link_slide2 = $request->link_slide2;
    	if ($request->hasFile('photo_slide2')) {
            $filename = $request->photo_slide2->getClientOriginalName();
            $slide2->photo_slide2 = $filename;
            $request->photo_slide2->storeAs('slide2-img',$filename);
        }
        $slide2->save();
        return back();
    }

    public function getEdit($id){
    	$data['slide2'] = Slide2::find($id);
    	return view('backend.edit_slides2',$data);
    }

    public function postEdit(Request $request,$id){
    	$slide2 = new Slide2;
    	$arr['link_slide2'] = $request->link_slide2;
    	if ($request->hasfile('photo_slide2')) {
            $photo_slide2 = $request->photo_slide2->getClientOriginalName();
            $arr['photo_slide2'] = $photo_slide2;
            $request->photo_slide2->storeAs('slide2-img',$photo_slide2);
        }
        $slide2::where('id_slide2',$id)->update($arr);
        return redirect('admin/slide2');
    }

    public function getDel($id){
    	Slide2::destroy($id);
    	return back();
    }
}
