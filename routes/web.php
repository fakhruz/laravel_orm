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
    return view('welcome');
});

// Route::get('/test', function () {
//     return view('test');
// });


Route::get('/home','TestController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth');

Route::group([
   'middleware' => ['auth'],
    'prefix' => 'admin',
], function(){
    Route::resource('users','UserController');
});


