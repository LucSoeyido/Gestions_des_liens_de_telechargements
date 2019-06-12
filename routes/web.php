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
    return view('auth.login');
});
Route::get('create_file', function () {

    $this->middleware('auth');
   
    return view('create_file');
})->name('create_file');

Route::get('dashboard', function () {

    $this->middleware('auth');
    $file=App\Fichier::all();
    $filecount=App\Fichier::all()->count();
    return view('dashboard',[
        'file'=>$file,
        'filecount'=>$filecount,
    ]);
})->name('dashboard');
Route::get('gestion_file', function () {

    $this->middleware('auth');
    $file=App\Fichier::all();
    $filecount=App\Fichier::all()->count();
    return view('gestion_file',compact('file','filecount'));
})->name('gestion_file');
Route::get('file_update', function () {

    $this->middleware('auth');
 
    return view('file_update');
})->name('file_update');
Auth::routes();
Route::resource('file','FichierController');

Route::get('/home', 'HomeController@index')->name('home');
