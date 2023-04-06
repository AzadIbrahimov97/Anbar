<?php

use Illuminate\Support\Facades\Route;

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

    Route::get('lang/home','App\Http\Controllers\LangController@index');
    Route::get('lang/change','App\Http\Controllers\LangController@change')->name('changeLang');

Route::group(['middleware'=>'notlogin'],function(){
    Route::get('/', 'App\Http\Controllers\anbarController@index')->name('brands');
    Route::post('/brands','App\Http\Controllers\anbarController@ok')->name('brand');
    Route::get('/sil/{id}', 'App\Http\Controllers\anbarController@sil')->name('sil');
    Route::get('/yes/{id}', 'App\Http\Controllers\anbarController@yes')->name('yes');
    Route::get('/no/{ad}', 'App\Http\Controllers\anbarController@no')->name('no');
    Route::get('/bedit/{id}', 'App\Http\Controllers\anbarController@bedit')->name('bedit');
    Route::post('/bupdate/{id}', 'App\Http\Controllers\anbarController@bupdate')->name('bupdate');
    Route::get('/Bexport','App\Http\Controllers\anbarController@Bexport')->name('Bexport');
  
    
    Route::get('/clients', 'App\Http\Controllers\anbarController@index1')->name('clients');
    Route::post('/clients','App\Http\Controllers\anbarController@ok1')->name('client');
    Route::get('/sil1/{id}', 'App\Http\Controllers\anbarController@sil1')->name('sil1');
    Route::get('/yes1/{id}', 'App\Http\Controllers\anbarController@yes1')->name('yes1');
    Route::get('/no1/{ad}', 'App\Http\Controllers\anbarController@no1')->name('no1');
    Route::get('/cedit/{id}', 'App\Http\Controllers\anbarController@cedit')->name('cedit');
    Route::post('/cupdate/{id}', 'App\Http\Controllers\anbarController@cupdate')->name('cupdate');
    Route::get('/Cexport','App\Http\Controllers\anbarController@Cexport')->name('Cexport');

    
    Route::get('/products','App\Http\Controllers\anbarController@index2')->name('products');
    Route::post('/products','App\Http\Controllers\anbarController@ok2')->name('product');
    Route::get('/sil2/{id}', 'App\Http\Controllers\anbarController@sil2')->name('sil2');
    Route::get('/yes2/{id}', 'App\Http\Controllers\anbarController@yes2')->name('yes2');
    Route::get('/no2/{ad}', 'App\Http\Controllers\anbarController@no2')->name('no2');
    Route::get('/pedit/{id}', 'App\Http\Controllers\anbarController@pedit')->name('pedit');
    Route::post('/pupdate/{id}', 'App\Http\Controllers\anbarController@pupdate')->name('pupdate');
    Route::get('/Pexport','App\Http\Controllers\anbarController@Pexport')->name('Pexport');


    Route::get('/staff','App\Http\Controllers\anbarController@index3')->name('staff');
    Route::post('/staff','App\Http\Controllers\anbarController@ok3')->name('staf');
    Route::get('/sil3/{id}', 'App\Http\Controllers\anbarController@sil3')->name('sil3');
    Route::get('/yes3/{id}', 'App\Http\Controllers\anbarController@yes3')->name('yes3');
    Route::get('/no3/{ad}', 'App\Http\Controllers\anbarController@no3')->name('no3');
    Route::get('/sedit/{id}', 'App\Http\Controllers\anbarController@sedit')->name('sedit');
    Route::post('/supdate/{id}', 'App\Http\Controllers\anbarController@supdate')->name('supdate');
    Route::get('/Stexport','App\Http\Controllers\anbarController@Stexport')->name('Stexport');

    
    Route::get('/departments','App\Http\Controllers\anbarController@departments')->name('departments');
    Route::post('/departments','App\Http\Controllers\anbarController@departments1')->name('departments1');
    Route::get('/sil6/{id}', 'App\Http\Controllers\anbarController@sil6')->name('sil6');
    Route::get('/yes6/{id}', 'App\Http\Controllers\anbarController@yes6')->name('yes6');
    Route::get('/no6/{ad}', 'App\Http\Controllers\anbarController@no6')->name('no6');
    Route::get('/dedit/{id}', 'App\Http\Controllers\anbarController@dedit')->name('dedit');
    Route::post('/dupdate/{id}', 'App\Http\Controllers\anbarController@dupdate')->name('dupdate');
    Route::get('/Dexport','App\Http\Controllers\anbarController@Dexport')->name('Dexport');


    Route::get('/xerc','App\Http\Controllers\anbarController@index4')->name('xerc');
    Route::post('/xerc','App\Http\Controllers\anbarController@ok4')->name('xerc1');
    Route::get('/sil4/{id}', 'App\Http\Controllers\anbarController@sil4')->name('sil4');
    Route::get('/yes4/{id}', 'App\Http\Controllers\anbarController@yes4')->name('yes4');
    Route::get('/no4/{ad}', 'App\Http\Controllers\anbarController@no4')->name('no4');
    Route::get('/xedit/{id}', 'App\Http\Controllers\anbarController@xedit')->name('xedit');
    Route::post('/xupdate/{id}', 'App\Http\Controllers\anbarController@xupdate')->name('xupdate');
    Route::get('/Xexport','App\Http\Controllers\anbarController@Xexport')->name('Xexport');


    Route::get('/orders','App\Http\Controllers\anbarController@orders')->name('orders');
    Route::post('/order_insert','App\Http\Controllers\anbarController@order_insert')->name('order_insert');
    Route::get('/sil5/{id}', 'App\Http\Controllers\anbarController@sil5')->name('sil5');
    Route::get('/yes5/{id}', 'App\Http\Controllers\anbarController@yes5')->name('yes5');
    Route::get('/no5/{ad}', 'App\Http\Controllers\anbarController@no5')->name('no5');
    Route::get('/oedit/{id}', 'App\Http\Controllers\anbarController@oedit')->name('oedit');
    Route::post('/oupdate/{id}', 'App\Http\Controllers\anbarController@oupdate')->name('oupdate');
    Route::get('/otesdiq/{id}', 'App\Http\Controllers\anbarController@otesdiq')->name('otesdiq');
    Route::get('/oimtina/{id}', 'App\Http\Controllers\anbarController@oimtina')->name('oimtina');
    Route::get('/Oexport','App\Http\Controllers\anbarController@Oexport')->name('Oexport');


    Route::get('/logout','App\Http\Controllers\anbarController@logout')->name('logout');

    Route::get('/profil','App\Http\Controllers\anbarController@Proindex')->name('profil');
    Route::post('/Prupdate', 'App\Http\Controllers\anbarController@Prupdate')->name('Prupdate');
    Route::post('/Parolupdate', 'App\Http\Controllers\anbarController@Parolupdate')->name('Parolupdate');
    
    Route::get('/sened', 'App\Http\Controllers\anbarController@sened_index')->name('sened');
    Route::post('/sened','App\Http\Controllers\anbarController@Sened_insert')->name('seneds');
    
    Route::get('/test', 'App\Http\Controllers\anbarController@testindex')->name('test');

   
                                                                          });

Route::group(['middleware'=>'islogin'],function(){
    Route::get('/registration','App\Http\Controllers\anbarController@users')->name('users');
    Route::post('/users_insert','App\Http\Controllers\anbarController@users_insert')->name('users_insert');

Route::get('/login', function(){return view('login');})->name('login1');
Route::post('/login','App\Http\Controllers\anbarController@login')->name('login');

});

