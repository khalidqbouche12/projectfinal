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
use App\Item;
Route::get('/', function () {
	$items=Item::paginate(6);
    return view('welcome')->with('items',$items);
});



Route::get('/dashboard', 'DataController@index')->name('dashboard');
Route::resource('item','API\itemController');
Route::group(['middelware'=>'auth'],function(){
	
Route::get('/softedelete','API\itemController@softDelete')->name('deletes');
Route::get('/profil/{id}','DataController@datapersonnel')->name('profil');
Route::get('/modifier/{id}','DataController@modifiermotpass')->name('modifier');
Route::put('/update/{id}','DataController@update')->name('update');
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
