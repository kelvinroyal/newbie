<?php

use Illuminate\Http\Request;
use App\Models\ThanhVien;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

// Route::Resource('thanh-vien','TVController');
// Route::get('thanh-vien',function(){
// 	return ThanhVien::all();
// });

Route::group(['prefix'=>'login','middleware'=>'CheckLogedIn'],function(){
	Route::get('/','LoginController@getLogin');
	Route::post('/','LoginController@postLogin');
});
Route::get('logout','TrangChuController@getLogout');

Route::get('trang-chu','TrangChuController@getTrangChu')->middleware('CheckLogedOut');

Route::group(['prefix'=>'thanh-vien','middleware'=>'CheckLogedOut'],function(){
	Route::get('danh-sach','TVController@getDanhSach');
	Route::get('add','TVController@getAdd');
	Route::get('edit/{id}','TVController@getEdit');
	Route::delete('delete/{id}','TVController@getDelete');
	Route::post('add','TVController@postAdd');
	Route::put('edit/{id}','TVController@postEdit');
});

Route::group(['prefix'=>'de-tai','middleware'=>'CheckLogedOut'],function(){
	Route::get('danh-sach','DeTaiController@getDanhSach');
	Route::get('add','DeTaiController@getAdd');
	Route::get('edit/{id}','DeTaiController@getEdit');
	Route::delete('delete/{id}','DeTaiController@getDelete');
	Route::post('add','DeTaiController@postAdd');
	Route::put('edit/{id}','DeTaiController@postEdit');
});

Route::group(['prefix'=>'khoa-luan','middleware'=>'CheckLogedOut'],function(){
	Route::get('dang-ky','KhoaLuanController@getDangKy');
	Route::get('xac-nhan','KhoaLuanController@getXacNhan');
	Route::get('danh-sach','KhoaLuanController@getDanhSach');
});

Route::group(['prefix'=>'hoi-dong','middleware'=>'CheckLogedOut'],function(){
	Route::get('danh-sach','HoiDongController@getDanhSach');
	Route::get('add','HoiDongController@getAdd');
	Route::get('thiet-lap','HoiDongController@getThietLap');
});

Route::get('trong-so','TrongSoController@getTrongSo')->middleware('CheckLogedOut');

Route::get('bao-cao','BaoCaoController@getBaoCao')->middleware('CheckLogedOut');

Route::get('thong-ke','ThongKeController@getThongKe')->middleware('CheckLogedOut');

Route::group(['prefix'=>'khoa','middleware'=>'CheckLogedOut'],function(){
	Route::get('/','KhoaController@getKhoa');
	Route::post('/','KhoaController@postKhoa');
	Route::get('edit/{id}','KhoaController@getEdit');
	Route::put('edit/{id}','KhoaController@postEdit');
	Route::delete('delete/{id}','KhoaController@getDelete');
});

Route::group(['prefix'=>'nganh','middleware'=>'CheckLogedOut'],function(){
	Route::get('/','NganhController@getNganh');
	Route::post('/','NganhController@postNganh');
	Route::get('edit/{id}','NganhController@getEdit');
	Route::put('edit/{id}','NganhController@postEdit');
	Route::delete('delete/{id}','NganhController@getDelete');
});

Route::group(['prefix'=>'nam','middleware'=>'CheckLogedOut'],function(){
	Route::get('/','NamController@getNam');
	Route::post('/','NamController@postNam');
	Route::get('edit/{id}','NamController@getEdit');
	Route::put('edit/{id}','NamController@postEdit');
	Route::delete('delete/{id}','NamController@getDelete');
});