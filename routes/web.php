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


//ROTTE per Autenticazione
Auth::routes();



//tutte le rotte protette da autenticazione
Route::middleware('auth') //autenticazione
    ->namespace('Admin') //controller
    ->name('admin.') //nome rotte
    ->prefix('admin') //url rotte
    ->group(function(){
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('posts', 'PostController');
        Route::get('/categories/{category}', 'CategoryController@show')->name('categories.show');
        Route::get('/tags/{tag}', 'TagController@show')->name('tags.show');
});

//Rotte Pubbliche
//Route::get('/', 'HomeController@index')->name('home');
// Per la parte di fron-office dobbiamo aggiungere una rotta di fallback che va mappare tutte le rotte non intercettate nelle istruzioni precedenti
Route::get('{any?}', 'HomeController@index')->where('any', '.*')->name('home');