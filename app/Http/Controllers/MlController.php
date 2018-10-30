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

class MlController extends Controller
{
    public function teach()
    {
        $im = new ImageParser('https://pixabay.com/api/?key=10542644-549c54b5d387dd41892ea2b24&q=people&image_type=photo&cat=people&order=latest&per_page=50');
        $im = $im->setIm();
        return view('teach', compact('im'));
    }

    public function trainTest(Request $request)
    {
        if ($request->isMethod('post')) {

            if (file_exists(public_path() . '/neuron/data') && $request->label != 'error') {

                $file = $request->image;
                $label = array((string)$request->label);

                $im = new Image2Ml($file);
                $trainedData = $im->grayScalePixels();
                $modelManager = new ModelManager();
                $classifier = $modelManager->restoreFromFile(public_path() . '/neuron/data');
                $classifier->train($trainedData, $label);
                $modelManager->saveToFile($classifier, public_path() . '/neuron/data');
            }
        }
        return redirect('teach');
    }
}
