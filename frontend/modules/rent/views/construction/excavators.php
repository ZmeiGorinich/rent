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

    <?php echo Yii::t('rent_construction_view', 'model_excavators')," ","$characteristics->model_excavators";?><br>
    <?php echo Yii::t('rent_construction_view', 'bucket_capacity')," ","$characteristics->bucket_capacity";?><br>
    <?php echo Yii::t('rent_construction_view', 'radius_digging')," ","$characteristics->radius_digging";?><br>
    <?php echo Yii::t('rent_construction_view', 'kinematic_depth_digging')," ","$characteristics->kinematic_depth_digging";?><br>
    <?php echo Yii::t('rent_construction_view', 'discharge_height')," ","$characteristics->discharge_height";?><br>
</div>
