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

// Route::get('/{any}', function () {
//     return view('layouts.vue');
// })->where('any', '.*');
Route::get('/register', 'Dashboar\RegisterController@index')->name('register.index');
Route::post('/register', 'Dashboar\RegisterController@store')->name('register.store');