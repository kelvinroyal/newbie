<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddPhotoRequest;
use App\Models\{Photo,Models};

class PhotoController extends Controller
{
    //
    public function getPhoto(){
    	$data['photo'] = Photo::with('model')->orderBy('id_photo','desc')->paginate(5);
    	$data['model'] = Models::orderBy('id_model','desc')->get();
    	return view('backend.photos',$data);
    }

    public function postPhoto(AddPhotoRequest $request){
    	$photo = new Photo;
    	$photo->p_photo = $request->p_photo;
    	$photo->model_photo = $request->model_photo;
    	$photo->save();
    	return back();
    }

    public function getEdit($id){
    	$data['photo'] = Photo::find($id);
    	$data['model'] = Models::orderBy('id_model','desc')->get();
    	return view('backend.edit_photos',$data);
    }

    public function postEdit(Request $request,$id){
    	$photo = new Photo;
    	$arr['p_photo'] = $request->p_photo;
    	$arr['model_photo'] = $request->model_photo;
    	$photo::where('id_photo',$id)->update($arr);
    	return redirect('admin/photo');
    }

    public function getDel($id){
    	Photo::destroy($id);
    	return back();
    }
}
