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
<div class="slider-index">

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

    <!--  'style' => 'border:1px solid black;text-align:center;padding:5px;' -->
    
    <style>
        .slide{
            margin-bottom:20px;
        }
        .item{
        width:100%;
        height:420px;
            img{
                display:none;
            }
        }
    </style>
    <script>
        $(".item").each(function() {
        var img_url = $(this).find('img').attr('src');
        $(this).css({
            'background-size': 'cover',
            'background-image': 'url(' + img_url + ')',
           'background-position': '50% 50%'
        });
        $(this).find('img').hide();
        });
    </script>
    <?php 
        foreach($models as $model){
            echo Carousel::widget([
                'options' => ['class' => 'carousel slide', 'data-interval' => '3000', 
                    'style' => ''
                    
                ],
                'items' => $model,
                'controls' => [ '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
                    '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>' ]
        ]);
        }
    ?>
</div>
