<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Nation,Continent};
use App\Http\Requests\AddNationRequest;
use DB;

class NationController extends Controller
{
    //
    public function getNation(){
    	$data['nation'] = DB::table('nation')->join('continents','continents_nation','=','id_continents')->orderBy('id_continents','desc')->paginate(5);
    	$data['cont'] = Continent::all();
    	return view('backend.nations',$data);
    }

    public function postNation(AddNationRequest $request){
    	$nation = new Nation;
    	$nation->name_nation = $request->name_nation;
    	$nation->continents_nation = $request->continents_nation;
    	$nation->save();
    	return back();
    }

    public function getEdit($id){
    	$data['nation'] = Nation::find($id);
    	$data['cont'] = Continent::all();
    	return view('backend.edit_nation',$data);
    }

    public function postEdit(Request $request,$id){
    	$nation = new Nation;
    	$arr['name_nation'] = $request->name_nation;
    	$arr['continents_nation'] = $request->continents_nation;
    	$nation::where('id_nation',$id)->update($arr);
    	return redirect('admin/nation');
    }

    public function getDel($id){
    	Nation::destroy($id);
    	return back();
    }
}
