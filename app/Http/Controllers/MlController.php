<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Phpml\Classification\KNearestNeighbors;
use Phpml\Classification\SVC;
use Phpml\SupportVectorMachine\Kernel;
use Phpml\ModelManager;
use Illuminate\Http\Request;
use App\Image2Ml;
use App\ImageParser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class MlController extends Controller
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

    public function teach()
    {
        //if(!rand(0,1))
            $im = new ImageParser('https://pixabay.com/api/?key=10542644-549c54b5d387dd41892ea2b24&q=people&image_type=photo&cat=people&order=latest&per_page=50&page='.rand(1,6));
        //else
        //    $im = new ImageParser('https://pixabay.com/api/?key=10542644-549c54b5d387dd41892ea2b24&q=dog&image_type=photo&order=latest&per_page=50&page='.rand(1,6));
        $im = $im->setIm();
//        $im1 = new Image2Ml($im);
//        $trainedData = $im1->grayScalePixels();

//        $modelManager = new ModelManager();
//        $classifier = $modelManager->restoreFromFile(public_path() . '/neuron/data');
//        $predictLabel = $classifier->predictProbability($trainedData);
//        $predict = NULL;
//        $maximus = NULL;
//        $maximus = $predictLabel[0]['people'];
//        $predict = 'человек';
//        if($maximus < $predictLabel[0]['dog']) {
//            $maximus = $predictLabel[0]['dog'];
//            $predict = 'собака';
//        }

//        return view('teach', compact('im', 'predict', 'maximus'));

        return view('teach', compact('im'));
    }

    public function trainTest(Request $request)
    {
        if ($request->isMethod('post')) {

            if (file_exists(public_path() . '/neuron/data') && $request->options != 'error') {

                $file = $request->image;
                $label = array((string)$request->options);

                $im = new Image2Ml($file);
                $trainedData = $im->grayScalePixels();
//                $classifier = new SVC(
//                    Kernel::LINEAR, // $kernel
//                    1.0,            // $cost
//                    3,              // $degree
//                    null,           // $gamma
//                    0.0,            // $coef0
//                    0.001,          // $tolerance
//                    100,            // $cacheSize
//                    true,           // $shrinking
//                    true            // $probabilityEstimates, set to true
//                );
                $modelManager = new ModelManager();
                $classifier = $modelManager->restoreFromFile(public_path() . '/neuron/data');
                $classifier->train($trainedData, $label);
                $modelManager->saveToFile($classifier, public_path() . '/neuron/data');


            }
        }
        return redirect('teach');
    }
}
