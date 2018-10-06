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

    <?php echo Yii::t('rent_construction_view', 'model_cranes_manipulators')," ", "$characteristics->model_cranes_manipulators";?><br>
    <?php echo Yii::t('rent_construction_view', 'car_load_capacity')," ","$characteristics->car_load_capacity";?><br>
    <?php echo Yii::t('rent_construction_view', 'boom_outreach')," ","$characteristics->boom_outreach";?><br>
    <?php echo Yii::t('rent_construction_view', 'crane_lifting_capacity')," ","$characteristics->crane_lifting_capacity";?><br>
    <?php echo Yii::t('rent_construction_view', 'dimensions_platform')," ","$characteristics->dimensions_platform";?><br>
</div>
