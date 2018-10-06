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

    <?php echo Yii::t('rent_construction_view', 'model_truck_cranes')," ","$characteristics->model_truck_cranes";?><br>
    <?php echo Yii::t('rent_construction_view', 'lifting_capacity')," ","$characteristics->lifting_capacity";?><br>
    <?php echo Yii::t('rent_construction_view', 'length_boom')," ","$characteristics->length_boom";?><br>
    <?php echo Yii::t('rent_construction_view', 'boom_extension_length')," ","$characteristics->boom_extension_length";?><br>
    <?php echo Yii::t('rent_construction_view', 'maximum_reach_boom')," ","$characteristics->maximum_reach_boom";?><br>
</div>
