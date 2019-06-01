<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Cart,Mail;
use App\Models\Product;

class CartController extends Controller
{
    //
    public function getAddCart($id){
    	$product = Product::find($id);
    	Cart::add(['id' => $id, 'name' => $product->prod_name, 'qty' => 1, 'price' => $product->prod_price, 'options' => ['img' => $product->prod_img]]);
    	return redirect('cart/show');
    }

    public function getShowCart(){
    	$data['total'] = Cart::total();
    	$data['items'] = Cart::content();
    	return view('frontend.cart',$data);
    }

    public function getDeleteCart($id){
    	if ($id=='all') {
    		Cart::destroy();
    	}else{
    		Cart::remove($id);
    	}
    	return back();
    }

    public function getUpdateCart(Request $request){
    	Cart::update($request->rowId,$request->qty);
    }

    public function postComplete(Request $request){
    	$data['info'] = $request->all();
    	$email = $request->email;

    	$data['total'] = Cart::total();
    	$data['cart'] = Cart::content();
    	Mail::send('frontend.email',$data, function($message) use ($email){
    		$message->from('kelvinroyal123@gmail.com', 'KelvinR');
    		$message->to($email,$email);
    		// $message->cc('cloneseedplaydota@gmail.com', 'Việt Hoàng');
    		$message->subject('Xác nhận hóa đơn mua hàng');
    	});
    	Cart::destroy();
    	return redirect('complete');
    }

    public function getComplete(){
    	return view('frontend.complete');
    }
}
