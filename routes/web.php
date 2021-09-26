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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'user'], function() {
    Route::get('/home', 'MhsController@beranda')->name('home');
    Route::get('/biodata', 'MhsController@biodata')->name('biodata');
    Route::patch('/biodata', "MhsController@updatebiodata")->name('updatebiodata');
    Route::patch('/biodata/resetpassword', "MhsController@resetpwbiodata")->name('resetpwbiodata');
    Route::get('/isikrs', 'MhsController@halamanisikrs')->name('halamanisikrs');
    Route::post('/isikrs', 'MhsController@storekrs')->name('storekrs');
    Route::get('/krssaya', 'MhsController@krssaya')->name('krssaya');
});


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('/datamahasiswa', 'AdminController@datamahasiswa')->name('datamahasiswa');
    Route::get('/createmahasiswa', 'AdminController@createmahasiswa')->name('createmahasiswa');
    Route::post('/datamahasiswa', 'AdminController@storemahasiswa')->name('storemahasiswa');
    Route::get('/mahasiswa/{user}', 'AdminController@showmahasiswa')->name('showmahasiswa');
    Route::get('/mahasiswa/{user}/krs', 'AdminController@showkrsmahasiswa')->name('showkrsmahasiswa');
    Route::get('/mahasiswa/{user}/edit', "AdminController@editmahasiswa")->name('editmahasiswa');
    Route::patch('/mahasiswa/{user}', "AdminController@updatemahasiswa")->name('updatemahasiswa');
    Route::patch('/mahasiswa/resetpassword/{user}', "AdminController@resetpwmahasiswa")->name('resetpwmahasiswa');
    Route::delete('/mahasiswa/{user}', "AdminController@destroymahasiswa");

    Route::get('/datamatkul', 'AdminController@datamatkul')->name('datamatkul');
    Route::get('/creatematkul', 'AdminController@creatematkul')->name('creatematkul');
    Route::post('/datamatkul', 'AdminController@storematkul')->name('storematkul');
    Route::get('/matkul/{matkul}/edit', "AdminController@editmatkul")->name('editmatkul');
    Route::patch('/matkul/{matkul}', "AdminController@updatematkul")->name('updatematkul');
    Route::delete('/matkul/{matkul}', "AdminController@destroymatkul")->name('destroymatkul');
});