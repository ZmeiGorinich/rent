<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\rent\models\SearchEquipment */
/* @var $form yii\widgets\ActiveForm */
$request = Yii::$app->request;
$id = $request->get('SearchEquipment');
$typeID = $id['type_id'];
$categoryID = $id['category'];
$countryID = $id['country_id'];
$regionID = $id['region_id'];
$districtID = $id['district_id'];
if ($districtID = $id['district_id']) {
    $districtID = $id['district_id'];
} else $districtID = 0;

if ($id > 0) {
    $script = <<< JS
         $.post("/rent/ajax/get-type-category?typeID=$typeID"+"&categoryID=$categoryID", function(data){
         $("select#searchequipment-category").html(data);})
          $.post("/rent/ajax/get-country-region?countryID=$countryID"+"&regionID=$regionID", function(data){
         $("select#searchequipment-region_id").html(data);})
         $.post("/rent/ajax/get-region-district?regionID=$regionID"+"&districtID=$districtID", function(data){
            $("select#searchequipment-district_id").html(data);
        })
JS;
    $this->registerJs($script, yii\web\View::POS_READY);

}
?>

<div class="equipment-rent-search">

    <?php $form = ActiveForm::begin([
        'action' => ['view'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'type_id')->dropDownList($arrayType, [
        'prompt' => 'выбрать...', 'onChange' => '$.post("/rent/ajax/get-category?id=' . '"+$(this).val(), function(data){
            $("select#searchequipment-category").html(data);
        })']) ?>


    <?= $form->field($model, 'category')->dropDownList($arrayCategory, [
        'prompt' => '']) ?>


    <?= $form->field($model, 'country_id')->dropDownList($arrayCountry, [
        'prompt' => '',
        'onChange' => '$.post("/rent/ajax/get-region?id=' . '"+$(this).val(), function(data){
            $("select#searchequipment-region_id").html(data);
        })']) ?>

    <?= $form->field($model, 'region_id')->dropDownList($arrayRegion, ['prompt' => '',
        'onChange' => '$.post("/rent/ajax/get-district?id=' . '"+$(this).val(), function(data){
            $("select#searchequipment-district_id").html(data);
        })']) ?>

    <?= $form->field($model, 'district_id')->dropDownList($arrayRegion, ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
