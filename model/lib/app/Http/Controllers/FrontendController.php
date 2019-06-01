<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\AddContactRequest;
use App\Models\{Slide,Models,Slide2,Banner,Album,Continent,Nation,Photo,Video,User,Comment,Contact};
use Auth;

class FrontendController extends Controller
{
    //
    public function getHome(){
    	$data['slide'] = Slide::orderBy('id_slide','desc')->take(6)->get();
    	$data['model'] = Models::with('continents','nation')->orderBy('id_model','desc')->take(18)->get();
    	$data['slide2'] = Slide2::orderBy('id_slide2','desc')->take(8)->get();
        $data['comment'] = Comment::where('status_comment',1)->get();
    	return view('frontend.home',$data);
    }

    public function getAlbum(){
    	$data['album'] = Album::orderBy('id_album','desc')->paginate(20);
    	return view('frontend.album',$data);
    }

    public function getContinent($id){
    	$data['continent'] = Continent::find($id);
    	$data['nation'] = Nation::where('continents_nation',$id)->get();
    	$data['model'] = Models::with('continents','nation')->where('continents_model',$id)->orderBy('id_model','desc')->get();
    	return view('frontend.cont',$data);
    }

    public function getNation($id){
        $data['nation'] = Nation::with('continents')->find($id);
        $data['model'] = Models::with('continents','nation')->where('nation_model',$id)->orderBy('id_model','desc')->get();
        return view('frontend.nation',$data);
    }

    public function getContact(){
    	return view('frontend.contact');
    }

    public function getHot(){
    	$data['model'] = Models::with('continents','nation')->where('status',1)->orderBy('id_model','desc')->get();
    	return view('frontend.hot',$data);
    }

    public function getModel($slug,$id){
    	$data['model'] = Models::with('continents','nation')->find($id);
    	$data['c'] = Continent::select('id_continents')->where('name_continents',$slug)->get();
    	$data['sug'] = Models::with('nation')->where('continents_model',$data['c']->toArray())->orderBy('id_model','desc')->take(5)->get();
    	$data['photo'] = Photo::where('model_photo',$id)->get();
    	$data['video'] = Video::where('model_video',$id)->get();
    	$data['album'] = Album::where('model_album',$id)->get();
        $data['comment'] = Comment::where([['model_comment',$id],['status_comment',1]])->orderBy('id_comment','desc')->paginate(5);
        $data['comment2'] = Comment::where([['model_comment',$id],['status_comment',1]])->count();
    	return view('frontend.model',$data);
    }

    public function postComment(Request $request,$slug,$id){
        $comment = new Comment;
        $comment->content_comment = $request->content_comment;
        $comment->status_comment = 0;
        $comment->model_comment = $id;
        $comment->user_comment = Auth::user()->id;
        $comment->save();
        return back();
    }

    public function getPhoto(){
    	$data['photo'] = Photo::with('model')->orderBy('id_photo','desc')->paginate(30);
    	return view('frontend.photo',$data);
    }

    public function getSingleAlbum($id){
    	$data['sa'] = Album::with('model')->find($id);
    	return view('frontend.single-album',$data);
    }

    public function getSingleVideo($id){
    	$data['sv'] = Video::find($id);
    	return view('frontend.single-video',$data);
    }

    public function getUpdate(){
    	$data['model'] = Models::with('continents','nation')->orderBy('updated_at','desc')->get();
    	return view('frontend.update',$data);
    }

    public function getVideo(){
    	$data['video'] = Video::with('model')->orderBy('id_video','desc')->paginate(20);
    	return view('frontend.video',$data);
    }

    public function getSearch(Request $request){
    	$result = $request->result;
    	$data['key'] = $result;
    	$result = str_replace(' ', '%', $result);
    	$data['item'] = Models::with('continents','nation')->where('name_model','like','%'.$result.'%')->get();
    	return view('frontend.search',$data);
    }

    public function posSignin(Request $request){
        $arr = ['email' => $request->email, 'password' => $request->password];
        if($request->remember = 'Remember me'){
            $remember = true;
        }else{
            $remember= false;
        }
        if (Auth::attempt($arr,$remember)) {
            return back();
        }else{
            return back()->withInput()->with('error','Login fail !');
        }
    }

    public function postSignup(AddUserRequest $request){
        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->name_user = $request->name_user;
        $user->level = 3;
        if ($request->hasFile('avatar')) {
            $filename = $request->avatar->getClientOriginalName();
            $user->avatar = $filename;
            $request->avatar->storeAs('avatar',$filename);
        }
        $user->save();
        return back();
    }

    public function postContact(AddContactRequest $request){
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->facebook = $request->facebook;
        $contact->twitter = $request->twitter;
        $contact->instagram = $request->instagram;
        $contact->info = $request->info;
        $contact->save();
        return back();
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/');
    }
}
