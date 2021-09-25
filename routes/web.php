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

Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
Route::get('/datamahasiswa', 'AdminController@datamahasiswa')->name('datamahasiswa');
Route::get('/createmahasiswa', 'AdminController@createmahasiswa')->name('createmahasiswa');
Route::post('/datamahasiswa', 'AdminController@storemahasiswa')->name('storemahasiswa');
Route::get('/mahasiswa/{user}', 'AdminController@showmahasiswa')->name('showmahasiswa');
Route::get('/mahasiswa/{user}/edit', "AdminController@editmahasiswa")->name('editmahasiswa');
Route::patch('/mahasiswa/{user}', "AdminController@updatemahasiswa")->name('updatemahasiswa');
Route::delete('/mahasiswa/{user}', "AdminController@destroymahasiswa");

Route::get('/datamatkul', 'AdminController@datamatkul')->name('datamatkul');
Route::get('/creatematkul', 'AdminController@creatematkul')->name('creatematkul');
Route::post('/datamatkul', 'AdminController@storematkul')->name('storematkul');
Route::get('/matkul/{matkul}/edit', "AdminController@editmatkul")->name('editmatkul');
Route::patch('/matkul/{matkul}', "AdminController@updatematkul")->name('updatematkul');
Route::delete('/matkul/{matkul}', "AdminController@destroymatkul")->name('destroymatkul');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
