<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Phpml\Classification\KNearestNeighbors;
use Phpml\Classification\SVC;
use Phpml\SupportVectorMachine\Kernel;
use Phpml\ModelManager;
use Illuminate\Http\Request;
use App\Image2Ml;
use App\ImageParser;
use Illuminate\Http\RedirectResponse;

class MlController extends Controller
{

    public function train(Request $request)
    {
        $response = array(
            'msg' => '',
            'im' =>  '',
        );
        //Заглушка редирект назад с ошибкой
        // return bac\k()->with('status', 'Обучение приостоновлено!! Доступ откроется в 3 часа по МСК');
        if ($request->isMethod('post')) {

            if (file_exists(public_path() . '/neuron/model.data') && $request->options != 'error') {

                $file = $request->image;
                $label = array((string)$request->label);

                $im = new Image2Ml($file);
                $trainedData = $im->grayScalePixels();
                $modelManager = new ModelManager();
                $classifier = $modelManager->restoreFromFile(public_path() . '/neuron/model.data');
                $classifier->train($trainedData, $label);
                $modelManager->saveToFile($classifier, public_path() . '/neuron/model.data');
                $response['msg'] = "Тест траин пройден";

            } else
                $response['msg'] = "Тест траин не пройден";
        }
        if(!rand(0,1))
            $im = new ImageParser('https://pixabay.com/api/?key=10542644-549c54b5d387dd41892ea2b24&q=people&image_type=photo&cat=people&order=latest&per_page=50&page='.rand(1,6));
        else
           $im = new ImageParser('https://pixabay.com/api/?key=10542644-549c54b5d387dd41892ea2b24&q=dog&image_type=photo&order=latest&per_page=50&page='.rand(1,6));
        $im = $im->setIm();
        $response['im'] = $im;
        return response()->json($response);
    }
}


        // $modelManager = new ModelManager();
        // $classifier = $modelManager->restoreFromFile(public_path() . '/neuron/data');
        // $binP = base_path() ."/vendor/php-ai/php-ml/bin/libsvm";
        // $varP = base_path() ."/vendor/php-ai/php-ml/var";
        // $classifier->setBinPath($binP);
        // $classifier->setVarPath($varP);
        // $modelManager->saveToFile($classifier, public_path() . '/neuron/model.data');