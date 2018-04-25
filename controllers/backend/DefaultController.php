<?php

namespace kouosl\slider\controllers\backend;

use kouosl\slider\models\SLider;

class DefaultController extends \kouosl\base\controllers\backend\BaseController
{
    
    public function actionIndex()
    {
        $slider = new Slider();
        return $this->render('index', [
            'slider' => $slider,
        ]);
    }
}
