<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Photo;
use App\Albums;
use App\Category;
use Request;

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
//  	phpinfo();
//		exec("ffmpeg -filter_complex aevalsrc=0 -loop 1 -i ".asset('images/header.jpeg')." -t 5 ".asset('out.mp4'));
//		exec('ffmpeg -loop 1 -i https://pp.userapi.com/c830609/v830609998/1b22c4/ooAYKYOk3ls.jpg -c:v libx264 -t 30 -pix_fmt yuv420p out.mp4');
		$breadcrumbs = Request::Get('breadcrumbs');
    $countProcessedPhotos = Albums::where('user_id', Auth::id())->count();
    $categories = Category::all();
    $i = 0;
    $albums = array();
    foreach ($categories as $category) {
      $count = Albums::where('user_id', Auth::id())->where('category_id', $category->id)->count();
      if($count < 1) {
        continue;
      }
      $albums[$i] = Albums::where('user_id', Auth::id())->where('category_id', $category->id)->first();
      $albums[$i]['category_name'] = $category->name;
      $albums[$i]['album_first_photo'] = Photo::where('id', $albums[$i]->photo_id)->first();
      $albums[$i]['category_id'] = $category->id;
      $i++;
    }
    return view('dashboard.user', compact('breadcrumbs','countProcessedPhotos', 'albums'));
  }

  public function user_photos_vk() {
    $breadcrumbs = Request::Get('breadcrumbs');
    $photos = Photo::where('user_id', Auth::id())->paginate(25);
    return view('dashboard.user_photos', compact('breadcrumbs', 'photos'));
  }
}
