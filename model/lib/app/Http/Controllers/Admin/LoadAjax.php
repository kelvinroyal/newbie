<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Nation,Continent};
use DB,Auth;

class LoadAjax extends Controller
{
    //
    public function loadNation(Request $request)
    {
    	$data['nations'] = Continent::with('nation')->find($request->idcont);
    	if ($request->idnation) {
    		$data['idnation'] = $request->idnation;
    	}
    	
    	return view('backend.component.nation', $data);
    }
}
