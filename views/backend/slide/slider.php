<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Carousel;


/* @var $this yii\web\View */
/* @var $searchModel kouosl\slider\models\SlideSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Slider';
$this->params['breadcrumbs'][] = $this->title;
$items = array();
?>
<div class="slide-slider">

    <h1><?= Html::encode($this->title); ?></h1>


    <!--?php $this->widget('bootstrap.widgets.TbCarousel', array(
    'items'=>array_map(function($record){
        return array(
            'image' => Html::encode($record['imageContent']),
                           // 'image' => Yii::app()->baseUrl.'/pics/iphone5c_image.jpg',

         
            //'label'=>CHtml::encode($record['file_content']),
            'caption'=>Html::encode($record['caption']),
        );
    },$dataProvider->getModels())))?-->
    

    
    <?php
        echo Carousel::widget([
        'options' => [
            'style' => [
                'margin: 60px auto;
                position:relative;
                clear:both;
                overflow:hidden;'
            ],
        ],
        'items' => $data
    ]);?>
</div>
