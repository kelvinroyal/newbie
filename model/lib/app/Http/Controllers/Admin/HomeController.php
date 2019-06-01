<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Models,User};
use Auth;

class HomeController extends Controller
{
    //
    public function getHome(){
        $data['m'] = Models::count();
        $data['a'] = User::where('level',1)->count();
        $data['admin'] = User::where('level',1)->get();
    	return view('backend.home',$data);
    }

    public function getLogout(){
    	Auth::logout();
    	return redirect('login');
    }

    public function getSearch(Request $request){
    	$result = $request->result;
    	$data['key'] = $result;
    	$result = str_replace(' ', '%', $result);
    	$data['item'] = Models::with('continents','nation')->where('name_model','like','%'.$result.'%')->get();
    	return view('backend.search',$data);
    }
}
