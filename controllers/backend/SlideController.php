<?php

namespace kouosl\slider\controllers\backend;

use Yii;
use kouosl\slider\models\Slide;
use kouosl\slider\models\SlideSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
/**
 * SlideController implements the CRUD actions for Slide model.
 */
class SlideController extends Controller
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

    /**
     * Lists all Slide models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider();
        $searchModel = new SlideSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (isset(Yii::$app->session['viewSliderId'])) {
            $param = Yii::$app->session['viewSliderId'];
            $dataProvider->query->andFilterWhere(['slideId'=>$param]);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'id' => $param,
            ]);
         } else {
            $param = null;
            $this->redirect(array('/slider/slider'));
         }
    }

    /**
     * Displays a single Slide model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionSlider($id)
    {
        $models = new Slide();
        $searchModel = new SlideSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['slideId'=>$id]);
        $models = $this->findAll($id);
        $data = $this->getSliderContentData($id);
        return $this->render('slider', [
            'dataProvider' => $dataProvider,
            'id' => $id,
            'data' => $data,
        ]);
    }
    

    /**
     * Creates a new Slide model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Slide();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $imageName = $model->caption;
            FileHelper::createDirectory('uploads');
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);
            
            $model->imageContent ='uploads/'.$imageName.'.'.$model->file->extension;

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Slide model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Slide model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Slide model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slide the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    protected function findAll($id)
    {
        $model = Slide::find()->where(['slideId' => $id])->all();
        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModel($id)
    {
        if (($model = Slide::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function getSliderContentData($id) {
        
        $data = array();
        $models = $this->findAll($id);
        foreach($models as $model) {
                $data[] = array('content' => Html::img(Yii::$app->getUrlManager()->getBaseUrl().'/'.$model->imageContent),
                'caption' => $model->caption,'imageOptions' => 'width => 200');
    
        }

        return $data;
    }
}
