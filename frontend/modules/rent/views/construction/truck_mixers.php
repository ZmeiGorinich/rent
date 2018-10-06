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

    <?php echo Yii::t('rent_construction_view', 'model_truck_mixers')," ","$characteristics->model_truck_mixers";?><br>
    <?php echo Yii::t('rent_construction_view', 'volume_concrete_mixer')," ","$characteristics->volume_concrete_mixer";?><br>
</div>
