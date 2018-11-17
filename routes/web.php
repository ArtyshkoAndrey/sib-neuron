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
})->name('index');
Route::get('teach',[
    'as' => 'teach', 'uses' => 'MlController@teach'
]);

Route::post('train',[
    'as' => 'train', 'uses' => 'MlController@trainTest'
]);

Route::group(['middleware' => ['breadcrumbs']], function () {

  Route::get('user',[
      'as' => 'user', 'uses' => 'HomeController@user'
  ]);

  Route::get('user/photo/vk',[
      'as' => 'user_photos_vk', 'uses' => 'HomeController@user_photos_vk'
  ]);

  Route::resource('user/photo/albums','AlbumsController');

  Route::get('user/photo/new-video',[
      'as' => 'user_photos_new_video', 'uses' => 'HomeController@user_photos_new_video'
  ]);
});

Route::get('login/vk', 'Auth\LoginController@redirectToProvider')->name('login');
Route::get('login/vk/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::post('api/train', 'Api\MlController@train');