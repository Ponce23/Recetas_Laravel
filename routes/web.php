<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetaController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
//rutas para mandar a llamar a los controladores 
Route::get('/recetas', 'RecetaController@index')->name('recetas.index');
Route::get('/recetas/create', 'RecetaController@create')->name('recetas.create');
Route::post('/recetas/store', 'RecetaController@store')->name('recetas.store');

//Route::get('/home', 'HomeController@index')->name('home');
