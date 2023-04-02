<?php
use App\Http\Controllers\Administrator;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::resource('horse', 'HorseController');
Route::resource('profile', 'ProfileController');
Route::resource('administrator', 'Administrator');
Route::post('race_create', 'HomeController@rececreate')->name('race_create');
Route::resource('search', 'SearchController');
Route::get('/index2', [Administrator::class,'index2'])->name('index2');