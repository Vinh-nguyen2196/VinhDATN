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

use Illuminate\Support\Facades\Route;

Route::get('/home','HomeController@getHome')->middleware('CheckMe');
Route::get('home/my_product','HomeController@getMyProduct')->middleware('CheckMe');
Route::get('home/reprice','HomeController@getReprice')->middleware('CheckMe');
Route::get('home/product/delete/{id}','HomeController@DeleteMyProduct');


Route::get('home/delete/{id}','HomeController@deleteSchedule');

Route::get('send/{id_product_notify}/{id_product_doi}/{id_nhan}',[
        'as'=>'send',
  'uses'=>'HomeController@getSend'
]);

Route::get('home/schedule','HomeController@getSchedule')->middleware('CheckMe');
Route::get('trang-chu',[
	'as'=> 'trang-chu',
	'uses'=>'PageController@getIndex'
]);
//backend

Route::get('login','AdminController@getLogin');
Route::post('login','AdminController@postLogin');
Route::get('logout','AdminController@getLogout');


// Route Admin
Route::middleware('isAdmin')->prefix('admin')->group(function (){
    Route::get('/','AdminController@getDashboard')->name('admin.getDashboards');

    Route::prefix('/users')->group(function (){
        Route::get('/','UserController@index')->name('users.index');
    });
    Route::get('categories','AdminController@getCategory');
    Route::get('products','AdminController@getProduct');
});



Route::get('loai-san-pham/{type}',[
    'as'=> 'loaisanpham',
    'uses'=>'PageController@getLoaiSP'

]);
Route::get('chi-tiet-san-pham/{id_prd}',[
      'as'=>'chitietsanpham',
      'uses'=>'PageController@getChitiet'

]);
Route::get('dang-nhap',[
        'as'=>'login',
        'uses'=>'PageController@getLogin'
])->middleware('CheckLogin');
Route::get('dang-ky',[
        'as'=>'sigin',
        'uses'=>'PageController@getSigin'
])->middleware('CheckSigin');
Route::post('dang-ky',[
        'as'=>'sigin',
        'uses'=>'PageController@postSigin'
]);
Route::post('dang-nhap',[
        'as'=>'login',
        'uses'=>'PageController@postLogin'
]);
Route::get('logout',[
        'as'=>'logout',
        'uses'=>'PageController@getLogout'
]);
Route::get('add-post',[
        'as'=>'addPost',
        'uses'=>'PageController@getAddPost'
]);
Route::post('save-post',[
        'as'=>'savePost',
        'uses'=>'PageController@savePost'
]);
Route::get('creat/{id?}',[
        'as'=>'creat',
        'uses'=>'PageController@savePost'
]);
Route::get('search',[
		'as'=>'search',
		'uses'=>'PageController@getSearch'


]);
Route::get('tang',[
	'as'=>'tang',
	'uses'=>'PageController@getTang'


]);
Route::get('thue',[
	'as'=>'thue',
	'uses'=>'PageController@getThue'


]);
Route::get('traodoi',[
	'as'=>'traodoi',
	'uses'=>'PageController@getTraodoi'


]);
Route::get('muon',[
	'as'=>'muon',
	'uses'=>'PageController@getMuon'


]);
Route::get('tang',[
	'as'=>'tang',
	'uses'=>'PageController@getTang'


]);
Route::get('thoathuan',[
	'as'=>'thoathuan',
	'uses'=>'PageController@getThoathuan'


]);
Route::get('doi/{id}/{id_sp}',[
            'as'=>'doi',
      'uses'=>'PageController@getDoiSP'
]);
Route::get('reprice/{id_product}/{id_user_post}',[
        'as'=>'reprice',
  'uses'=>'PageController@getReprice'
]);
Route::get('rate/{id_user_rated}/{id_product}',[
        'as'=>'rate',
        'uses'=>'PageController@getRate'

]);
Route::post('comment/{id}','PageController@postComment');
// Route::post('reprice/{id}','PageController@postPrice');
Route::get('notify','PageController@getNotify');
Route::get('dele-notice/{noti_id}','PageController@getDelNotify');
Route::get('detail-user/{user_id}','PageController@getDetailUser');
