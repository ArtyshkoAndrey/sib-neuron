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
    $auth = new Auth(env('VKONTAKTE_KEY'), env('VKONTAKTE_SECRET'), env('VKONTAKTE_REDIRECT_URI'));

    echo "<a href='{$auth->getUrl()}'>ClickMe<a>";
});

Route::get('very', function() {
	if (isset($_GET['code'])) {
    $params = array(
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'code' => $_GET['code'],
        'redirect_uri' => $redirect_uri
    );

    $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

    if (isset($token['access_token'])) {
        $params = array(
            'uids'         => $token['user_id'],
            'fields'       => 'uid,first_name,last_name,screen_name,sex,bdate,photo_big',
            'access_token' => $token['access_token']
        );
        return $params;
    }
}
});
