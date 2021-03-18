<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Zapato;

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
    $zapato = Zapato::all();
    return view('welcome')->with('zapato', $zapato);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shoes', 'ZapatoController@index')->name('shoes.index');
Route::get('/shoes/create', 'ZapatoController@create')->name('shoes.create');
Route::post('/shoes', 'ZapatoController@store')->name('shoes.store');
Route::get('/shoes/{zapato}/edit','ZapatoController@edit')->name('shoes.edit');
Route::put('/shoes/{zapato}', 'ZapatoController@update')->name('shoes.update');
Route::get('/shoes/{zapato}', 'ZapatoController@show')->name('shoes.show');
Route::delete('/shoes/{zapato}', 'ZapatoController@destroy')->name('shoes.destroy');
