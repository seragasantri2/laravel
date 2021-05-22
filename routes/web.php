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

Route::get('/dashboard', function () {
    return view('layouts.master');
});

Route::get('/',('Auth\AuthController@index'))->name('login');
Route::post('/login',('Auth\AuthController@login'))->name('login.masuk');


Route::get('/tes',('CrudController@index'))->name('tes');
Route::get('/tes/tambah',('CrudController@tambah'))->name('tambah.tes');
Route::post('/tes/simpan',('CrudController@simpan'))->name('simpan.tes');
Route::delete('/tes/delete/{id}',('CrudController@delete'))->name('delete.tes');
Route::get('/tes/{id}/edit',('CrudController@edit'))->name('edit.tes');
Route::patch('/tes/{id}',('CrudController@update'))->name('update.tes');


