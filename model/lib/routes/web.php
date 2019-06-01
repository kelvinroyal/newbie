<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route frontend
Route::get('/','FrontendController@getHome');
Route::post('signin','FrontendController@posSignin');
Route::post('signup','FrontendController@postSignup');
Route::get('logout2','FrontendController@getLogout');

Route::get('continent/{id}/{slug}.html','FrontendController@getContinent');

Route::get('nation/{id}/{slug}.html','FrontendController@getNation');

Route::get('{slug}/model/{id}.html','FrontendController@getModel');
Route::post('{slug}/model/{id}.html','FrontendController@postComment');

Route::get('album','FrontendController@getAlbum');
Route::get('contact','FrontendController@getContact');
Route::post('contact','FrontendController@postContact');
Route::get('hot','FrontendController@getHot');
Route::get('photo','FrontendController@getPhoto');
Route::get('single-album/{id}.html','FrontendController@getSingleAlbum');
Route::get('single-video/{id}.html','FrontendController@getSingleVideo');
Route::get('update','FrontendController@getUpdate');
Route::get('video','FrontendController@getVideo');

Route::get('search2','FrontendController@getSearch');

Route::group(['prefix'=>'ajax'],function(){ 
	Route::get('/view-photo','LoadAjax@loadViewPhoto');
	Route::get('/photo-model','LoadAjax@loadPhotoModel');
	Route::get('/nat','LoadAjax@loadNat');
	Route::get('/cont','LoadAjax@loadCont');
	Route::get('/cont2','LoadAjax@loadCont2');
	Route::get('/cont3','LoadAjax@loadCont3');
});

// Route backend
Route::group(['namespace'=>'Admin'],function(){
	Route::group(['prefix'=>'login','middleware'=>'CheckLogedIn'],function(){
		Route::get('/','LoginController@getLogin');
		Route::post('/','LoginController@postLogin');
	});
	Route::get('logout','HomeController@getLogout');
	Route::get('search','HomeController@getSearch');

	Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOut'],function(){
		Route::get('home','HomeController@getHome');

		Route::group(['prefix'=>'user','middleware'=>'CheckLogedOut'],function(){
			Route::get('list','UserController@getList');
			Route::get('add','UserController@getAdd');
			Route::post('add','UserController@postAdd');
			Route::get('edit/{id}','UserController@getEdit');
			Route::post('edit/{id}','UserController@postEdit');
			Route::get('del/{id}','UserController@getDel');
		});

		Route::group(['prefix'=>'model','middleware'=>'CheckLogedOut'],function(){
			Route::get('list','ModelController@getList');
			Route::get('add','ModelController@getAdd');
			Route::post('add','ModelController@postAdd');
			Route::get('edit/{id}','ModelController@getEdit');
			Route::post('edit/{id}','ModelController@postEdit');
			Route::get('del/{id}','ModelController@getDel');
		});

		Route::group(['prefix'=>'album','middleware'=>'CheckLogedOut'],function(){
			Route::get('list','AlbumController@getList');
			Route::get('add','AlbumController@getAdd');
			Route::post('add','AlbumController@postAdd');
			Route::get('edit/{id}','AlbumController@getEdit');
			Route::post('edit/{id}','AlbumController@postEdit');
			Route::get('del/{id}','AlbumController@getDel');
		});

		Route::group(['prefix'=>'video','middleware'=>'CheckLogedOut'],function(){
			Route::get('list','VideoController@getList');
			Route::get('add','VideoController@getAdd');
			Route::post('add','VideoController@postAdd');
			Route::get('edit/{id}','VideoController@getEdit');
			Route::post('edit/{id}','VideoController@postEdit');
			Route::get('del/{id}','VideoController@getDel');
		});

		Route::group(['prefix'=>'banner','middleware'=>'CheckLogedOut'],function(){
			Route::get('list','BannerController@getList');
			Route::get('add','BannerController@getAdd');
			Route::post('add','BannerController@postAdd');
			Route::get('edit/{id}','BannerController@getEdit');
			Route::post('edit/{id}','BannerController@postEdit');
			Route::get('del/{id}','BannerController@getDel');
		});

		Route::group(['prefix'=>'nation','middleware'=>'CheckLogedOut'],function(){
			Route::get('/','NationController@getNation');
			Route::post('/','NationController@postNation');
			Route::get('edit/{id}','NationController@getEdit');
			Route::post('edit/{id}','NationController@postEdit');
			Route::get('del/{id}','NationController@getDel');
		});

		Route::group(['prefix'=>'continent','middleware'=>'CheckLogedOut'],function(){
			Route::get('/','ContinentController@getContinent');
			Route::post('/','ContinentController@postContinent');
			Route::get('edit/{id}','ContinentController@getEdit');
			Route::post('edit/{id}','ContinentController@postEdit');
			Route::get('del/{id}','ContinentController@getDel');
		});

		Route::group(['prefix'=>'photo','middleware'=>'CheckLogedOut'],function(){
			Route::get('/','PhotoController@getPhoto');
			Route::post('/','PhotoController@postPhoto');
			Route::get('edit/{id}','PhotoController@getEdit');
			Route::post('edit/{id}','PhotoController@postEdit');
			Route::get('del/{id}','PhotoController@getDel');
		});

		Route::group(['prefix'=>'comment','middleware'=>'CheckLogedOut'],function(){
			Route::get('/','CommentController@getComment');
			Route::get('edit/{id}','CommentController@getEdit');
			Route::post('edit/{id}','CommentController@postEdit');
			Route::get('del/{id}','CommentController@getDel');
		});

		Route::group(['prefix'=>'slide','middleware'=>'CheckLogedOut'],function(){
			Route::get('/','SlideController@getSlide');
			Route::post('/','SlideController@postSlide');
			Route::get('edit/{id}','SlideController@getEdit');
			Route::post('edit/{id}','SlideController@postEdit');
			Route::get('del/{id}','SlideController@getDel');
		});

		Route::group(['prefix'=>'slide2','middleware'=>'CheckLogedOut'],function(){
			Route::get('/','Slide2Controller@getSlide2');
			Route::post('/','Slide2Controller@postSlide2');
			Route::get('edit/{id}','Slide2Controller@getEdit');
			Route::post('edit/{id}','Slide2Controller@postEdit');
			Route::get('del/{id}','Slide2Controller@getDel');
		});

		Route::group(['prefix'=>'contact','middleware'=>'CheckLogedOut'],function(){
			Route::get('/','ContactController@getContact');
			Route::get('del/{id}','ContactController@getDel');
		});
	});

	Route::group(['prefix'=>'ajax','middleware'=>'CheckLogedOut'],function(){
		Route::get('/nation','LoadAjax@loadNation');
	});
});