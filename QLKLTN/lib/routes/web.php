<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'login','middleware'=>'CheckLogedIn'],function(){
	Route::get('/','LoginController@getLogin');
	Route::post('/','LoginController@postLogin');
});
Route::get('logout','TrangChuController@getLogout');

Route::get('search','TrangChuController@getSearch')->middleware('CheckLogedOut');
Route::post('search','KhoaLuanController@postDiem')->middleware('CheckLogedOut');

Route::get('trang-chu','TrangChuController@getTrangChu')->middleware('CheckLogedOut');

Route::group(['prefix'=>'thanh-vien','middleware'=>'CheckLogedOut'],function(){
	Route::get('danh-sach','TVController@getDanhSach');
	Route::get('add','TVController@getAdd');
	Route::get('edit/{id}','TVController@getEdit');
	Route::get('delete/{id}','TVController@getDelete');
	Route::get('import','TVController@getImp');
	Route::post('import','TVController@postImp');
	Route::post('add','TVController@postAdd');
	Route::post('edit/{id}','TVController@postEdit');
	Route::get('search2','TVController@getSearch2');
});

Route::group(['prefix'=>'de-tai','middleware'=>'CheckLogedOut'],function(){
	Route::get('danh-sach','DeTaiController@getDanhSach');
	Route::get('add','DeTaiController@getAdd');
	Route::get('edit/{id}','DeTaiController@getEdit');
	Route::get('delete/{id}','DeTaiController@getDelete');
	Route::post('add','DeTaiController@postAdd');
	Route::post('edit/{id}','DeTaiController@postEdit');
});

Route::group(['prefix'=>'khoa-luan','middleware'=>'CheckLogedOut'],function(){
	Route::get('dang-ky','KhoaLuanController@getDangKy');
	Route::get('xac-nhan','KhoaLuanController@getXacNhan');
	Route::post('xac-nhan','KhoaLuanController@postXacNhan');
	Route::post('danh-sach','KhoaLuanController@postDiem');
	Route::get('danh-sach','KhoaLuanController@getDanhSach');
	Route::post('dang-ky','KhoaLuanController@postDangKy');
	Route::get('delete/{id}','KhoaLuanController@getDelete');
	Route::get('ca-nhan','KhoaLuanController@getCanhan');
	Route::get('huong-dan','KhoaLuanController@getHuongdan');
});

Route::group(['prefix'=>'hoi-dong','middleware'=>'CheckLogedOut'],function(){
	Route::get('danh-sach','HoiDongController@getDanhSach');
	Route::get('add','HoiDongController@getAdd');
	Route::get('thiet-lap','HoiDongController@getThietLap');
	Route::post('thiet-lap','HoiDongController@postThietLap');
	Route::post('add','HoiDongController@postAdd');
	Route::get('delete/{id}','HoiDongController@getDelete');
	Route::post('danh-sach','HoiDongController@postEdit');
});

Route::group(['prefix'=>'trong-so','middleware'=>'CheckLogedOut'],function(){
	Route::get('/','TrongSoController@getTrongSo');
	Route::get('delete/{id}','TrongSoController@getDelete');
	Route::post('/','TrongSoController@postTrongSo');
});

Route::group(['prefix'=>'bao-cao','middleware'=>'CheckLogedOut'],function(){
	Route::get('/','BaoCaoController@getBaoCao');
	Route::get('delete/{id}','BaoCaoController@getDelete');
	Route::get('edit/{id}','BaoCaoController@getEdit');
	Route::post('edit/{id}','BaoCaoController@postBaoCao');
	Route::post('/','BaoCaoController@postBc');
});

Route::get('thong-ke','ThongKeController@getThongKe')->middleware('CheckLogedOut');

Route::group(['prefix'=>'khoa','middleware'=>'CheckLogedOut'],function(){
	Route::get('/','KhoaController@getKhoa');
	Route::post('/','KhoaController@postKhoa');
	Route::get('edit/{id}','KhoaController@getEdit');
	Route::post('edit/{id}','KhoaController@postEdit');
	Route::get('delete/{id}','KhoaController@getDelete');
});

Route::group(['prefix'=>'nganh','middleware'=>'CheckLogedOut'],function(){
	Route::get('/','NganhController@getNganh');
	Route::post('/','NganhController@postNganh');
	Route::get('edit/{id}','NganhController@getEdit');
	Route::post('edit/{id}','NganhController@postEdit');
	Route::get('delete/{id}','NganhController@getDelete');
});

Route::group(['prefix'=>'nam','middleware'=>'CheckLogedOut'],function(){
	Route::get('/','NamController@getNam');
	Route::post('/','NamController@postNam');
	Route::get('edit/{id}','NamController@getEdit');
	Route::post('edit/{id}','NamController@postEdit');
	Route::get('delete/{id}','NamController@getDelete');
});

Route::group(['prefix'=>'ajax','middleware'=>'CheckLogedOut'],function(){ 
	Route::get('/nganh','LoadAjax@loadNganh');
	Route::get('/detai','LoadAjax@loadDeTai');
	Route::get('/khoa','LoadAjax@loadKhoa');
	Route::get('/giaovien','LoadAjax@loadGiaoVien');
	Route::get('/hoidong','LoadAjax@loadHoiDong');
	Route::get('/trongso','LoadAjax@loadTrongSo');
	Route::get('/baocao','LoadAjax@loadBaoCao');
	Route::get('/xacnhan','LoadAjax@loadXacNhan');
	Route::get('/xac-nhan','LoadAjax@loadXn');
	Route::get('/khoaluan','LoadAjax@loadKhoaLuan');
	Route::get('/chi-tiet','LoadAjax@loadChiTiet');
	Route::get('/hoi-dong','LoadAjax@loadHd');
	Route::get('/tim-kiem','LoadAjax@loadTimKiem');
	Route::get('/khoa-luan','LoadAjax@loadKl');
	Route::get('/trong-so','LoadAjax@loadTs');
	Route::get('/thietlap','LoadAjax@loadTl');
	Route::get('/thongke','LoadAjax@loadThongKe');
	Route::get('/tv','LoadAjax@loadTv');
	Route::get('/pub','LoadAjax@loadPub');
});