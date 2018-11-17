<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Request;
use App\Photo;
use App\Category;
use App\Albums;
use App\Image2Ml;
use Phpml\ModelManager;

class AlbumsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
				$breadcrumbs = Request::Get('breadcrumbs');
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
			return view('dashboard.albums.index', compact('breadcrumbs', 'albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = Request::Get('breadcrumbs');
        return view('dashboard.albums.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        function exec_script($url, $params=array())
				{
					$parts = parse_url($url);

					if (!$fp = fsockopen($parts['host'], isset($parts['port']) ? $parts['port'] : 80)) {
						return false;
					}

					$data = "id=" . Auth::id();

					fwrite($fp, "POST " . url('/api/create-albums') . " HTTP/1.1\r\n");
					fwrite($fp, "Host: " . $parts['host'] . "\r\n");
					fwrite($fp, "Content-Type: application/x-www-form-urlencoded\r\n");
					fwrite($fp, "Content-Length: " . strlen($data) . "\r\n");
					fwrite($fp, "Connection: Close\r\n\r\n");
					fwrite($fp, $data);
					fclose($fp);

					return true;
				}
        $bool = exec_script(url("api/create-albums"), array('id' => Auth::id()));
        if($bool)
            return response()->json(array('label' => 'Ваши фотографии обрабатываются'));
        else
            return response()->json(array('label' => 'Ошибка'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $albums = Albums::where('category_id', $id)->where('user_id', Auth::id())->get();
        $i = 0;
        $albumsName = Category::where('id', $id)->first();
        foreach ($albums as $key) {
            $photos[$i] = Photo::where('id', $key->photo_id)->first();
            $i++;
        }
        $breadcrumbs = Request::Get('breadcrumbs');
        return view('dashboard.albums.show', compact('photos', 'breadcrumbs','albumsName'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Albums::where('user_id', Auth::id())->where('category_id', $id)->delete();
        return back()->with('status', 'Альбом удалён!');
    }
}
