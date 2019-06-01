<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\AddUserRequest;
use DB,Auth;

class UserController extends Controller
{
    //
    public function getList(){
        $data['list'] = DB::table('user')->orderBy('id','desc')->paginate(5);
        return view('backend.list_user',$data);
    }

    public function getAdd(){
    	return view('backend.add_user');
    }

    public function postAdd(AddUserRequest $request){
        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->name_user = $request->name_user;
        $user->level = $request->level;
        if ($request->hasFile('avatar')) {
            $filename = $request->avatar->getClientOriginalName();
            $user->avatar = $filename;
            $request->avatar->storeAs('avatar',$filename);
        }
        $user->save();
        return back();
    }

    public function getEdit($id){
        $data['user'] = User::find($id);
    	return view('backend.edit_user',$data);
    }

    public function postEdit(Request $request,$id){
        $user = new User;
        $arr['email'] = $request->email;
        $arr['password'] = bcrypt($request->password);
        $arr['name_user'] = $request->name_user;
        $arr['level'] = $request->level;
        if ($request->hasfile('avatar')) {
            $avatar = $request->avatar->getClientOriginalName();
            $arr['avatar'] = $avatar;
            $request->avatar->storeAs('avatar',$avatar);
        }
        $user::where('id',$id)->update($arr);
        return redirect('admin/user/list');
    }

    public function getDel($id){
        User::destroy($id);
        return back();
    }
}
