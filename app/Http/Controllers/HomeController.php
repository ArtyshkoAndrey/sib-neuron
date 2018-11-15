<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Photo;
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
    $breadcrumbs = Request::Get('breadcrumbs');
    $users = User::all();
    return view('dashboard.user', compact('breadcrumbs','users'));
  }

  public function user_photos_vk() {
    $breadcrumbs = Request::Get('breadcrumbs');
    $photos = Photo::where('user_id', Auth::id())->paginate(25);
    return view('dashboard.user_photos', compact('breadcrumbs', 'photos'));
  }

  public function user_photos_new_video() {
    $breadcrumbs = Request::Get('breadcrumbs');
    return view('dashboard.user', compact('breadcrumbs'));
  }
}
