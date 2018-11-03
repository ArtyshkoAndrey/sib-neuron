<?php
use Phpml\Classification\KNearestNeighbors;
use ATehnix\VkClient\Auth;

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

Route::get('vkauth', function () {
    $auth = new Auth(6740551, 'nFGHhzyGYsi1pnRh9AXe', 'http://95.188.80.41/very');

    echo "<a href='{$auth->getUrl()}'>ClickMe<a>";
});

Route::get('very', function(Auth, $auth) {
	$token = $auth->getToken($_GET['code']);
});
