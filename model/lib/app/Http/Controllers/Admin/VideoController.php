<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Video,Models};
use App\Http\Requests\AddVideoRequest;

class VideoController extends Controller
{
    //
    public function getList(){
        $data['video'] = Video::with('model')->orderBy('id_video','desc')->paginate(5);
    	return view('backend.list_video',$data);
    }

    public function getAdd(){
        $data['model'] = Models::orderBy('id_model','desc')->get();
    	return view('backend.add_video',$data);
    }

    public function postAdd(AddVideoRequest $request){
        $video = new Video;
        $video->embed = $request->embed;
        $video->model_video = $request->model_video;
        $video->download = $request->download;
        $video->avatar_video = $request->avatar_video;
        $video->save();
        return back();
    }

    public function getEdit($id){
        $data['video'] = Video::find($id);
        $data['model'] = Models::orderBy('id_model','desc')->get();
    	return view('backend.edit_video',$data);
    }

    public function postEdit(Request $request,$id){
        $video = new Video;
        $arr['embed'] = $request->embed;
        $arr['model_video'] = $request->model_video;
        $arr['download'] = $request->download;
        $arr['avatar_video'] = $request->avatar_video;
        $video::where('id_video',$id)->update($arr);
        return redirect('admin/video/list');
    }

    public function getDel($id){
        Video::destroy($id);
        return back();
    }
}
