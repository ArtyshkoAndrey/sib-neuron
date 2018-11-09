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
Route::get('teach',[
    'as' => 'teach', 'uses' => 'MlController@teach'
]);

Route::post('train',[
    'as' => 'train', 'uses' => 'MlController@trainTest'
]);

Route::get('teach/dogs',[
    'as' => 'allDogs', 'uses' => 'MlController@allDogs'
]);

Route::get('login/vk', 'Auth\LoginController@redirectToProvider')->name('login');
Route::get('login/vk/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
