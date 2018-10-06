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

    <?php echo Yii::t('rent_construction_view', 'model_compressors')," ","$characteristics->model_compressors";?><br>
    <?php echo Yii::t('rent_construction_view', 'power_compressors')," ","$characteristics->power_compressors";?><br>
</div>
