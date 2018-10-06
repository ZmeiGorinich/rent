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

    <?php echo Yii::t('rent_construction_view', 'model_backhoe_loaders')," ","$characteristics->model_backhoe_loaders";?><br>
    <?php echo Yii::t('rent_construction_view', 'bucket_capacity_excavator')," ","$characteristics->bucket_capacity_excavator";?><br>
    <?php echo Yii::t('rent_construction_view', 'digging_depth_excavator')," ","$characteristics->digging_depth_excavator";?><br>
    <?php echo Yii::t('rent_construction_view', 'bucket_capacity_loader')," ","$characteristics->bucket_capacity_loader";?><br>
    <?php echo Yii::t('rent_construction_view', 'unloading_height_loader')," ","$characteristics->unloading_height_loader";?><br>
</div>
