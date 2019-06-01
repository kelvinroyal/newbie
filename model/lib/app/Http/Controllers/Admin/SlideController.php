<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Http\Requests\AddSlideRequest;

class SlideController extends Controller
{
    //
    public function getSlide(){
    	$data['slide'] = Slide::orderBy('id_slide','desc')->paginate(5);
    	return view('backend.slides',$data);
    }

    public function postSlide(AddSlideRequest $request){
    	$slide = new Slide;
    	$slide->link_slide = $request->link_slide;
    	if ($request->hasFile('photo_slide')) {
            $filename = $request->photo_slide->getClientOriginalName();
            $slide->photo_slide = $filename;
            $request->photo_slide->storeAs('bg-img',$filename);
        }
        $slide->cont_slide = $request->cont_slide;
        $slide->na_slide = $request->na_slide;
        $slide->name_slide = $request->name_slide;
        $slide->save();
        return back();
    }

    public function getEdit($id){
    	$data['slide'] = Slide::find($id);
    	return view('backend.edit_slides',$data);
    }

    public function postEdit(Request $request,$id){
    	$slide = new Slide;
    	$arr['link_slide'] = $request->link_slide;
    	if ($request->hasfile('photo_slide')) {
            $photo_slide = $request->photo_slide->getClientOriginalName();
            $arr['photo_slide'] = $photo_slide;
            $request->photo_slide->storeAs('bg-img',$photo_slide);
        }
        $arr['cont_slide'] = $request->cont_slide;
        $arr['na_slide'] = $request->na_slide;
        $arr['name_slide'] = $request->name_slide;
        $slide::where('id_slide',$id)->update($arr);
        return redirect('admin/slide');
    }

    public function getDel($id){
    	Slide::destroy($id);
    	return back();
    }
}
