<?php

namespace kouosl\slider\controllers\frontend;

use Yii;
use kouosl\slider\models\Slide;
use kouosl\slider\models\Slider;
use kouosl\slider\models\SlideSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use yii\helpers\Url;
/**
 * SlideController implements the CRUD actions for Slide model.
 */
class SliderController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public $id;
    public $data = array();
    /**
     * Lists all Slide models.
     * @return mixed
     */
    public function actionIndex()
    {
        $models = new Slide();
        $searchModel = new SlideSearch();
        $models = $this->getSliderData();
        return $this->render('index', [
            'models' => $models
        ]);
    }

    protected function findAllSlider()
    {
        $model = Slider::find()->where(['<>','id', '99999'])->all();
        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findAll($id)
    {
        $model = Slide::find()->where(['slideId' => $id])->all();
        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function getSliderContentData($id) {
        
        $data = array();
        $models = $this->findAll($id);
        foreach($models as $model) {
                $data[] = array('content' => Html::img(Url::to('/data/', true).$model->imageContent),
                'caption' => '<h3>'.$model->caption.'</h3 class="captionText">','imageOptions' => 'width => 200');
    
        }

        return $data;
    }
    protected function getSliderData() {
        
        $data = array();
        $models = $this->findAllSlider();
        foreach($models as $model) {
                $data[] = $this->getSliderContentData($model->id);
        }

        return $data;
    }

    protected function randomString($length) {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));
    
        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }
    
        return $key;
    }
    
}
