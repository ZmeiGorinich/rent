<?php
use yii\helpers\Html;
?>
<div class="post-default-index">
    <h1>View Post</h1>
    <div class="row">



        <p><?= Html::encode($equipment->name)?></p>

        <div class="col-md-12">
            <img src="<?php echo Yii::$app->storage->getFile($equipment->filename); ?>"
        </div>

    </div>

    <?php echo Yii::t('rent_construction_view', 'model_concrete_pump')," ","$characteristics->model_concrete_pump";?><br>
    <?php echo Yii::t('rent_construction_view', 'max_theoretical_produce')," ","$characteristics->max_theoretical_produce";?><br>
    <?php echo Yii::t('rent_construction_view', 'max_pressure_concrete')," ","$characteristics->max_pressure_concrete";?><br>
    <?php echo Yii::t('rent_construction_view', 'max_delivery_height')," ","$characteristics->max_delivery_height";?><br>
    <?php echo Yii::t('rent_construction_view', 'max_feed_range')," ","$characteristics->max_feed_range";?><br>
    <?php echo Yii::t('rent_construction_view', 'pump_volume_concrete_mixer')," ","$characteristics->pump_volume_concrete_mixer";?><br>
    <?php echo Yii::t('rent_construction_view', 'width_car_expanded_form')," ","$characteristics->width_car_expanded_form";?><br>
    <?php echo Yii::t('rent_construction_view', 'height_working_condition')," ","$characteristics->height_working_condition";?><br>
</div>
