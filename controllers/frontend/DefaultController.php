<?php

namespace kouosl\slider\controllers\frontend;


class DefaultController extends \kouosl\base\controllers\backend\BaseController
{
    public function actionIndex()
    {
        $this->redirect(array('/slider/slider'));
    }
}
