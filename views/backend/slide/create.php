<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model kouosl\slider\models\Slide */

$this->title = 'Create Slide';
$this->params['breadcrumbs'][] = ['label' => 'Slides', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slide-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php $model->slideId = Yii::$app->session['viewSliderId']; ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
