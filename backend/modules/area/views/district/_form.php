<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\District */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="district-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'country_id')->dropDownList($arrayCountry,[
            'prompt'=>'',
            'onChange' => '$.post("/area/district/list?id='.'"+$(this).val(), function(data){
            $("select#district-region_id").html(data);
        })']) ?>

    <?= $form->field($model, 'region_id')->dropDownList($arrayRegion,['prompt'=>'']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
