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
use App\cates;
use App\subcates;
/*
Frontpage Route
*/



Route::get('/','pageController@index');
Route::get('/cates/{id}','pageController@cates');
Route::get('/cates/subcates/{id}','pageController@subcates');
Route::get('/books/{id}','pageController@books');
Route::get('/login','pageController@getLogin');
Route::post('/login','pageController@postLogin');
Route::get('logout','pageController@getLogout');
Route::post('comments/{id}','commentController@comments');
Route::get('logout','pageController@getLogout');
Route::post('comments/{id}','commentController@comments');
Route::get('user','pageController@getUser');
Route::post('user','pageController@postUser');
Route::get('signup','pageController@getSignup');
Route::post('signup','pageController@postSignup');
Route::post('search','pageController@search');
Route::post('comment/{id}','commentController@comments');
Route::get('borrowlist/{id}','pageController@borrowlist');

Route::get('send-message','RedisController@index');
Route::post('send-message','RedisController@postSendMessage');
Route::get('offline','RedisController@offline');

Route::get('emailus','pageController@getemailus');
Route::post('emailus','pageController@postemailus');
/*
Shopping Cart
*/
Route::get('addtocart/{id}','pageController@addtocart');
Route::get('delcart/{id}','pageController@delcart');
Route::get('orderdetail','pageController@orderdetail');
Route::get('checkout','pageController@getcheckout');
Route::post('checkout','pageController@postcheckout');
Route::get('confirm','pageController@confirm');







/*
Admin Routes
*/
Route::get('admin/login','LoginController@getLoginAdmin');
Route::post('admin/login','LoginController@postLoginAdmin');
Route::get('admin/logout','LoginController@getLogoutAdmin');

Route::group(['prefix'=>'students','middleware'=>'studentLogin'],function(){
	Route::get('myaccount','frontstudentController@myaccount');
	Route::get('myorder/{id}','frontstudentController@myorder');
	Route::get('myborrowing/{id}','frontstudentController@myborrowing');
	Route::get('mymessage/{id}','frontstudentController@getmymessage');
	Route::post('mymessage/{id}','frontstudentController@postmymessage');
	Route::get('edit/{id}','frontstudentController@getEdit');
	Route::post('edit/{id}','frontstudentController@postEdit');
	Route::get('myreturned/{id}','frontstudentController@myreturned');

	Route::get('menu','frontstudentController@menu');
	Route::get('changepassword/{id}','frontstudentController@getchangepassword');
	Route::post('changepassword/{id}','frontstudentController@postchangepassword');
});



Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){

	
	Route::get('dashboard','dashboardController@dashboard');
	Route::get('aboutus','dashboardController@aboutus');

	Route::group(['prefix'=>'cates'],function(){
		Route::get('list','CatesController@getList');

		Route::get('edit/{id}','CatesController@getEdit');
		Route::post('edit/{id}','CatesController@postEdit');

		Route::get('add','CatesController@getAdd');

		Route::post('add','CatesController@postAdd');

		Route::get('delete/{id}','CatesController@getDelete');
	});

	Route::group(['prefix'=>'subcates'],function(){
		Route::get('list/{id}','subCatesController@getList');

		Route::get('edit/{id}','subCatesController@getEdit');
		Route::post('edit/{id}','subCatesController@postEdit');

		Route::get('add','subCatesController@getAdd');

		Route::post('add','subCatesController@postAdd');

		Route::get('delete/{id}','subCatesController@getDelete');
	});

	Route::group(['prefix'=>'books'],function(){
			Route::get('list/{id}','BooksController@getList');

			Route::get('edit/{id}','BooksController@getEdit');
			Route::post('edit/{id}','BooksController@postEdit');

			Route::get('add','BooksController@getAdd');
			Route::get('managebooks','BooksController@managebooks');

			Route::post('add','BooksController@postAdd');

			Route::get('delete/{id}','BooksController@getDelete');
		});

	Route::group(['prefix'=>'ajax'],function(){
		Route::get('subcates/{idcates}','AjaxController@getSubcates');
		Route::get('subcates1/{idcates}','AjaxController@getSubcates1');
	});

	Route::group(['prefix'=>'user'],function(){
		Route::get('list','userController@getList');

		Route::get('edit/{id}','userController@getEdit');
		Route::post('edit/{id}','userController@postEdit');

		Route::get('add','userController@getAdd');

		Route::post('add','userController@postAdd');

		Route::get('delete/{id}','userController@getDelete');
	});

	Route::group(['prefix'=>'issue'],function(){
		Route::get('list','issueController@getList');

		

		Route::get('add','issueController@getAdd');

		Route::post('add','issueController@postAdd');

		Route::get('return/{id}','issueController@getReturn');
		Route::post('return/{id}','issueController@postReturn');

		Route::get('extend/{id}','issueController@getExtend');

		Route::post('extend/{id}','issueController@postExtend');
		Route::get('sendmessage/{id}','issueController@getMessage');

		Route::post('sendmessage/{id}','issueController@postMessage');

		Route::get('returnlist','issueController@returnlist');

		Route::get('editdetail/{id}','issueController@geteditdetail');
		Route::post('editdetail/{id}','issueController@posteditdetail');
	});

	Route::group(['prefix'=>'students'],function(){
		Route::get('list','studentController@getList');
		Route::get('add','studentController@getAdd');
		Route::post('add','studentController@postAdd');
		Route::get('detail/{id}','studentController@detail');
		Route::post('detail/{id}','studentController@postdetail');
		Route::get('edit/{id}','studentController@getEdit');
		Route::post('edit/{id}','studentController@postEdit');
		Route::get('delete/{id}','studentController@getDelete');

	});

	Route::group(['prefix'=>'message'],function(){
		Route::get('list','messageController@getList');

		

		Route::get('add','messageController@getAdd');

		Route::post('add','messageController@postAdd');

		Route::get('delete/{id}','messageController@getDelete');
	});
	Route::group(['prefix'=>'comment'],function(){
		
		Route::get('delete/{id}/{idbooks}','commentController@getDelete');
	});
	


	Route::group(['prefix'=>'order'],function(){
		Route::get('list','orderController@getList');
		Route::get('detail/{id}','orderController@getDetail');
		Route::post('detail/{id}','orderController@postDetail');					
		Route::get('delete/{id}','orderController@getDelete');
		Route::get('pendingorder','orderController@pendingorder');
		Route::get('completedorder','orderController@completedorder');
	});



});





