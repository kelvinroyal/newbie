<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Models,Continent,Nation};
use App\Http\Requests\AddModelRequest;

class ModelController extends Controller
{
    //
    public function getList(){
        $data['model'] = Models::with('continents','nation')->orderBy('id_model','desc')->paginate(10);
    	return view('backend.list_model',$data);
    }

    public function getAdd(){
        $data['cont'] = Continent::all();
        $data['nation'] = Nation::all();
    	return view('backend.add_model',$data);
    }

    public function postAdd(AddModelRequest $request){
        $model = new Models;
        $model->name_model = $request->name_model;
        $model->continents_model = $request->continents_model;
        $model->nation_model = $request->nation_model;
        $model->facebook = $request->facebook;
        $model->twitter = $request->twitter;
        $model->instagram = $request->instagram;
        $model->info_model = $request->info_model;
        $model->status = $request->status;
        if ($request->hasFile('avatar_model')) {
            $filename = $request->avatar_model->getClientOriginalName();
            $model->avatar_model = $filename;
            $request->avatar_model->storeAs('avarmodel-img',$filename);
        }
        $model->cover_model = $request->cover_model;
        $model->save();
        return back();
    }

    public function getEdit($id){
        $data['model'] = Models::find($id);
        $data['cont'] = Continent::all();
        $data['nation'] = Nation::all();
    	return view('backend.edit_model',$data);
    }

    public function postEdit(Request $request,$id){
        $model = new Models;
        $arr['name_model'] = $request->name_model;
        $arr['continents_model'] = $request->continents_model;
        $arr['nation_model'] = $request->nation_model;
        $arr['facebook'] = $request->facebook;
        $arr['twitter'] = $request->twitter;
        $arr['instagram'] = $request->instagram;
        $arr['info_model'] = $request->info_model;
        $arr['status'] = $request->status;
        if ($request->hasfile('avatar_model')) {
            $avatar_model = $request->avatar_model->getClientOriginalName();
            $arr['avatar_model'] = $avatar_model;
            $request->avatar_model->storeAs('avarmodel-img',$avatar_model);
        }
        $arr['cover_model'] = $request->cover_model;
        $model::where('id_model',$id)->update($arr);
        return redirect('admin/model/list');
    }

    public function getDel($id){
        Models::destroy($id);
        return back();
    }
}
