<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\rent\models\SearchEquipment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipment-rent-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'type')->dropDownList($arrayType,[
        'prompt'=>'','onChange' => '$.post("/rent/equipment/list?id='.'"+$(this).val(), function(data){
            $("select#searchequipment-category").html(data);
        })']) ?>


    <?= $form->field($model, 'category')->dropDownList($arrayCategory,[
        'prompt'=>'']) ?>


    <?= $form->field($model, 'country_id')->dropDownList($arrayCountry,[
        'prompt'=>'',
        'onChange' => '$.post("/area/district/listc?id='.'"+$(this).val(), function(data){
            $("select#searchequipment-region_id").html(data);
        })']) ?>

    <?= $form->field($model, 'region_id')->dropDownList($arrayRegion,['prompt'=>'',
        'onChange' => '$.post("/area/district/listr?id='.'"+$(this).val(), function(data){
            $("select#searchequipment-district_id").html(data);
        })']) ?>

    <?= $form->field($model, 'district_id')->dropDownList($arrayRegion,['prompt'=>'']) ?>


<!--    --><?php echo $form->field($model, 'height') ?>
<!---->
<!--    --><?php  echo $form->field($model, 'length') ?>
<!---->
<!--    --><?php  echo $form->field($model, 'width') ?>
<!---->
<!--    --><?php  echo $form->field($model, 'weight') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
