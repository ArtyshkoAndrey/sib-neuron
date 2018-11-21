<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Photo;
use App\Albums;
use App\Image2Ml;
use Phpml\ModelManager;
use Illuminate\Http\Request;
use App\Video;

class VideoController extends Controller
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
		$breadcrumbs = [];
		return view('dashboard.videos.index', compact('breadcrumbs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$breadcrumbs = [];
		return view('dashboard.videos.create', compact('breadcrumbs'));
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
			$data = "id=" . Auth::id().'&category_id='.$params['category_id'];

			fwrite($fp, "POST " . url('api/create-video') . " HTTP/1.1\r\n");
			fwrite($fp, "Host: " . $parts['host'] . "\r\n");
			fwrite($fp, "Content-Type: application/x-www-form-urlencoded\r\n");
			fwrite($fp, "Content-Length: " . strlen($data) . "\r\n");
			fwrite($fp, "Connection: Close\r\n\r\n");
			fwrite($fp, $data);
			return true;
		}
		return $bool = response()->json(exec_script(url("api/create-video"), array('id' => Auth::id(), 'category_id' => $request->category_id)));
		if($bool)
			return response()->json(array('label' => 'Ваше видео создаётся'));
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
		
		$breadcrumbs = [];
		$video = Video::where('id', $id)->first();
		// exec('ffmpeg -i '. public_path('video/'.$video->src.'.mp4'), $output);
		function get_video_attributes($video, $ffmpeg) {
		
			$command = $ffmpeg . ' -i ' . $video . ' -vstats 2>&1';
			$output = shell_exec($command);
		
			$regex_sizes = "/Video: ([^,]*), ([^,]*), ([0-9]{1,4})x([0-9]{1,4})/"; // or : $regex_sizes = "/Video: ([^\r\n]*), ([^,]*), ([0-9]{1,4})x([0-9]{1,4})/"; (code from @1owk3y)
			if (preg_match($regex_sizes, $output, $regs)) {
				$codec = $regs [1] ? $regs [1] : null;
				$width = $regs [3] ? $regs [3] : null;
				$height = $regs [4] ? $regs [4] : null;
			}
		
			$regex_duration = "/Duration: ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2}).([0-9]{1,2})/";
			if (preg_match($regex_duration, $output, $regs)) {
				$hours = $regs [1] ? $regs [1] : null;
				$mins = $regs [2] ? $regs [2] : null;
				$secs = $regs [3] ? $regs [3] : null;
				$ms = $regs [4] ? $regs [4] : null;
			}
		
			return array('codec' => $codec,
				'width' => $width,
				'height' => $height,
				'hours' => $hours,
				'mins' => $mins,
				'secs' => $secs,
				'ms' => $ms
			);
		}
		
		function _human_filesize($bytes, $decimals = 2) {
			$sz = 'BKMGTP';
			$factor = floor((strlen($bytes) - 1) / 3);
			return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
		}
		$vid = public_path('video/'.$video->src.'.mp4');
		$ffmpeg_path = 'ffmpeg';

		if (file_exists($vid)) {

			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			$mime_type = finfo_file($finfo, $vid); // check mime type
			finfo_close($finfo);
		
			$video_attributes = get_video_attributes($vid, $ffmpeg_path);
	
			$size = _human_filesize(filesize($vid));

		}
		
		

		return view('dashboard.videos.show', compact('breadcrumbs', 'video', 'video_attributes','size'));
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
