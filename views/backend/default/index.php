<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
 
$this->title = 'WYP Sample Application';

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
    <?= $form->field($slider, 'name') ?>
    <?= $form->field($slider, 'description') ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
