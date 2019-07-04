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

Route::get(
    '/',
    function () {
        return view('welcome');
    }
);

Auth::routes();


Route::get('/pdf/{searchText?}', 'HomeController@pdf')->name('pdf');
Route::get('busca', 'HomeController@busca')->name('busca');
Route::post('/admin/exportreparations', 'Admin\ReparationController@export')->name('admin.reparation.export');





Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(
    function () {

        Route::resource('/admin/users', 'UserController', ['except' => ['show', 'create', 'store']]);
        Route::get('/admin/delete/{id}', 'ReparationController@destroy')->name('reparation.delete');
        Route::post('/admin/importreparations', 'ReparationController@import')->name('reparation.import');
        Route::get('/home', 'ReparationController@home')->name('home');

        Route::get('/admin/userdelete/{id}', 'UserController@destroy')->name('user.delete');
        Route::get('/admin/pdf/{searchText?}', 'ReparationController@pdf')->name('reparation.pdf');
        Route::get('/admin/deleteListadas/{searchText?}', 'ReparationController@destroyListadas')->name('reparation.deleteListadas');
        Route::get('/admin/deleteListadas2/{searchText?}', 'ReparationController@destroyListadas2')->name('reparation.deleteListadas2');

        Route::resource('/admin/reparations', 'ReparationController');;
    }
);
