<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Continent;
use App\Http\Requests\AddContinentRequest;
use DB;

class ContinentController extends Controller
{
    //
    public function getContinent(){
    	$data['cont'] = Continent::orderBy('id_continents','desc')->paginate(5);
    	return view('backend.continents',$data);
    }

    public function postContinent(AddContinentRequest $request){
    	$cont = new Continent();
        $cont->name_continents = $request->name_continents;
        $cont->save();
        return back();
    }

    public function getEdit($id){
    	$data['cont'] = Continent::find($id);
    	return view('backend.edit_continents',$data);
    }

    public function postEdit(Request $request,$id){
    	$cont = new Continent;
        $arr['name_continents'] = $request->name_continents;
        $cont::where('id_continents',$id)->update($arr);
        return redirect('admin/continent');
    }

    public function getDel($id){
        Continent::destroy($id);
        return back();
    }
}
