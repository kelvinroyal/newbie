<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Requests\AddContactRequest;

class ContactController extends Controller
{
    //
    public function getContact(){
    	$data['contact'] = Contact::orderBy('id_contact','desc')->paginate(10);
    	return view('backend.contact',$data);
    }

    public function getDel($id){
    	Contact::destroy($id);
    	return back();
    }
}
