<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function user() {

    return view('dashboard.user');
  }

  public function user_photos() {
    // // Формируем и выполняем запрос на получение фотографий пользователя
    // $query = file_get_contents("https://api.vk.com/method/photos.get?owner_id=" . Auth::user()->vk_id . "&album_id=saved&v=5.87&access_token=" . Auth::user()->vk_token);
    // $result = json_decode($query,true);
    // dd($result);
    //     //print_r($result);
    // //8 фото, все верно это тот альбом который нам нужен
    // foreach($result['response'] as $photos){
    //     echo "<img src='".$photos['src']."'>";
    // }
    // 
    $params = array(
      'v' => '5.77', // Версия API
      'access_token' => Auth::user()->vk_token, // Токен
      'owner_id' => Auth::user()->vk_id, // ID пользователя
      'album_id' => 'wall',
      'rev' => 1,
      'count' => 50
    );
    $query = file_get_contents('https://api.vk.com/method/photos.get?' . http_build_query($params)); 
    $result = json_decode($query,true);

    // dd($result['response']['items'][0]['sizes'][4]['url']);


    return view('dashboard.user_photos', compact('result'));
  }
}
