<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Request;
use App\Photo;
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
        $albums = [];
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
        $respons = array(
            'answer' => "гуд"
        );
        // $photos = Auth::user()->photos;
        // foreach ($photos as $photo) {
        //     if (file_exists(public_path() . '/neuron/model.data')) {

        //         $im = new Image2Ml($photo['th_url']);
        //         $Data = $im->grayScalePixels();
        //         $modelManager = new ModelManager();
        //         $classifier = $modelManager->restoreFromFile(public_path() . '/neuron/model.data');
        //         $label = $classifier->predictProbability($Data);
        //         if($label['dog'] > 0.7) {
        //             $newAlbum = new Albums();
        //             $newAlbum->photo_id = $photo->id;
        //             $newAlbum->user_id = Auth::id();
        //             $newAlbum->category_id = 1;
        //             $newAlbum->save();
        //         } else if($label['people'] > 0.7) {
        //             $newAlbum = new Albums();
        //             $newAlbum->photo_id = $photo->id;
        //             $newAlbum->user_id = Auth::id();
        //             $newAlbum->category_id = 2;
        //             $newAlbum->save();
        //         }
        //     }
        // }
        return respons()->json($respons);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
