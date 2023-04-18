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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::group(['middleware' => ['auth', 'can:admin_only']], function () {
    Route::resource('administrator', 'Administrator');
});
Route::post('race_create', 'HomeController@rececreate')->name('race_create');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/index2', 'Administrator@index2')->name('index2');
Route::get('/index3/{id}','Administrator@index3')->name('administrator.index3');
Route::resource('horse', 'HorseController');
Route::resource('profile', 'ProfileController');
Route::resource('administrator', 'Administrator');
Route::resource('search', 'SearchController');
Route::resource('userdestroy', 'UserdestroyController');
Route::get('/destroy/{id}', 'UserdestroyController@destroyform')->name('destroyform');
Route::post('/upload', 'ProfileController@upload')->name('upload');
Route::post('/like', 'HorseController@like')->name('like');