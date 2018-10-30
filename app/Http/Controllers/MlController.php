<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Phpml\Classification\KNearestNeighbors;
use Phpml\Classification\SVC;
use Phpml\SupportVectorMachine\Kernel;
use App\Image2Ml;
use Phpml\ModelManager;
use Illuminate\Http\Request;

class MlController extends Controller
{

  public function teach() {

  //   $modelManager = new ModelManager();

  // 	$classifier = $modelManager->restoreFromFile(public_path() . '/neuron/data');

  // 	$im = imagecreatefromjpeg(public_path() . "/images/dogs/n02086240_1011.jpg");
		// $im1=imagecreatetruecolor(40,40);
	 //  imagecopyresampled($im1,$im,0,0,0,0,40,40,imagesx($im),imagesy($im));

	 //  $cur_array = array();
	 //  $cnt = 0;
	 //  for($y=0; $y<imagesy($im1); $y++)
	 //  {
	 //      for($x=0; $x < imagesx($im1); $x++)
	 //      {
	 //          $rgb = imagecolorat($im1, $x, $y) / 16777215;
	 //          $cur_array[$cnt] = $rgb;
	 //          $cnt++; 
	 //          if($cnt == 1999)
	 //          	break;
	 //      }
	 //  }

	 //  imagedestroy($im);
	 //  imagedestroy($im1);
	 //  $predictedLabels = $classifier->predict(array_slice($cur_array,1));

	 //  return array_slice($cur_array,1);
      
   	return view('teach');   
  }

    public function trainTest(Request $request) {
    	if($request->isMethod('post')){

        if($request->hasFile('image')) {
          $file = $request->file('image');
          $filename = rand(0, 1000).'.jpg';
          $file->move(public_path() . '/data', $filename);

          $label = array((string)$request->label);

          $modelManager = new ModelManager();

			  	$classifier = $modelManager->restoreFromFile(public_path() . '/neuron/data');

			  	$im = imagecreatefromjpeg(public_path() . '/data/' . $filename);
					$im1=imagecreatetruecolor(40,40);
				  imagecopyresampled($im1,$im,0,0,0,0,40,40,imagesx($im),imagesy($im));
				  imagedestroy($im);
				  $cur_array = array();
				  $cnt = 0;
				  for($y=0; $y<imagesy($im1); $y++)
				  {
				      for($x=0; $x < imagesx($im1); $x++)
				      {
				          $rgb = imagecolorat($im1, $x, $y) / 16777215;
				          $cur_array[$cnt] = $rgb;
				          $cnt++;
				      }
				  }
				  imagedestroy($im1);
				  $classifier->train(array(array_slice($cur_array,1)), $label);
				  $predictedLabel = $classifier->predict(array_slice($cur_array,1));
				  $modelManager->saveToFile($classifier, public_path() . '/neuron/data');
				  return redirect('teach')->with('label', $predictedLabel);
        }
    	}
    }
}
