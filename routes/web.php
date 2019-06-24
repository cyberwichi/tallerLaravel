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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('busca','HomeController@busca')->name('busca');




Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function(){
    Route::resource('/admin/users','UserController', ['except'=>['show','create','store']]);
    Route::get('/admin/delete/{id}', 'ReparationController@destroy')->name('reparation.delete');
    Route::post('/admin/importreparations', 'ReparationController@import')->name('reparation.import');
    Route::get('/admin/userdelete/{id}', 'UserController@destroy')->name('user.delete');
   
    Route::resource('/admin/reparations','ReparationController');
       
});
