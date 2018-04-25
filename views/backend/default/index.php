<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use nex\datepicker\DatePicker;
?>
<?= DatePicker::widget([
    'model' => $model,
    'attribute' => 'attrName',
    'language' => 'ru',
    'size' => 'lg',
    'readonly' => true,
    'placeholder' => 'Choose date',
    'clientOptions' => [
        'format' => 'L',
        'minDate' => '2015-08-10',
        'maxDate' => '2015-09-10',
    ],
    'clientEvents' => [
        'dp.show' => new \yii\web\JsExpression("function () { console.log('It works!'); }"),
    ],
]); ?>

<? $this->title = 'WYP Sample Application';

DatePicker::widget([
	'name' => 'check_issue_date', 
	'value' => date('d-M-Y', strtotime('+2 days')),
	'options' => ['placeholder' => 'Select issue date ...'],
	'pluginOptions' => [
		'format' => 'dd-M-yyyy',
		'todayHighlight' => true
	]
]);

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
    <?= $form->field($slider, 'title') ?>
    <?= $form->field($slider, 'date')->widget(
    DatePicker::className(), [
        'addon' => false,
        'size' => 'sm',
        'clientOptions' => [
            'format' => 'L LT',
            'stepping' => 30,
        ],
    ]);?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
