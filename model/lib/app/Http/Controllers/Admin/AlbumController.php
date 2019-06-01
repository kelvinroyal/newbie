<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Album,Models};
use App\Http\Requests\AddAlbumRequest;

class AlbumController extends Controller
{
    //
    public function getList(){
        $data['album'] = Album::with('model')->orderBy('id_album','desc')->paginate(10);
    	return view('backend.list_album',$data);
    }

    public function getAdd(){
        $data['model'] = Models::orderBy('id_model','desc')->get();
    	return view('backend.add_album',$data);
    }

    public function postAdd(AddAlbumRequest $request){
        $album = new Album;
        $album->name_album = $request->name_album;
        $album->content_album = $request->content_album;
        $album->model_album = $request->model_album;
        $album->avatar_album = $request->avatar_album;
        $album->save();
        return back();
    }

    public function getEdit($id){
        $data['album'] = Album::find($id);
        $data['model'] = Models::orderBy('id_model','desc')->get();
    	return view('backend.edit_album',$data);
    }

    public function postEdit(Request $request,$id){
        $album = new Album;
        $arr['name_album'] = $request->name_album;
        $arr['content_album'] = $request->content_album;
        $arr['model_album'] = $request->model_album;
        $arr['avatar_album'] = $request->avatar_album;
        $album::where('id_album',$id)->update($arr);
        return redirect('admin/album/list');
    }

    public function getDel($id){
        Album::destroy($id);
        return back();
    }
}
