<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Slide,Models,Slide2,Banner,Album,Continent,Nation,Photo,Video,User};
use App\Http\Requests;
use DB;

class LoadAjax extends Controller
{
    //
    public function loadViewPhoto(Request $request) {
        $p = Photo::with('model')->find($request->id);
        return view('frontend.component.child.view-photo', compact('p'));
    }

    public function loadPhotoModel(Request $request) {
        $p = Photo::with('model')->find($request->id);
        return view('frontend.component.child.photo-model', compact('p'));
    }

    public function loadNat(Request $request) {
        $model = Models::with('continents','nation')->where('nation_model',$request->nation_continents)->orderBy('id_model','desc')->get();
    	return view('frontend.component.nat', compact('model'));
    }

    public function loadCont(Request $request) {
    	$album = Album::whereHas('model', function($qr) use ($request) {
            $qr->where('continents_model', $request->continents);
        })->orderBy('id_album','desc')->get();
    	return view('frontend.component.cont', compact('album'));
    }

    public function loadCont2(Request $request) {
    	$photo = Photo::whereHas('model', function($qr) use ($request) {
            $qr->where('continents_model', $request->continents);
        })->orderBy('id_photo','desc')->get();
    	return view('frontend.component.cont2', compact('photo'));
    }

    public function loadCont3(Request $request) {
    	$video = Video::whereHas('model', function($qr) use ($request) {
            $qr->where('continents_model', $request->continents);
        })->orderBy('id_video','desc')->get();
    	return view('frontend.component.cont3', compact('video'));
    }
}