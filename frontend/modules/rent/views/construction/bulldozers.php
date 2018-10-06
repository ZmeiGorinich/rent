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

    <?php echo Yii::t('rent_construction_view', 'model_bulldozers')," ","$characteristics->model_bulldozers";?><br>
    <?php echo Yii::t('rent_construction_view', 'power_kwt')," ","$characteristics->power_kwt";?><br>
    <?php echo Yii::t('rent_construction_view', 'blade_width')," ","$characteristics->blade_width";?><br>
    <?php echo Yii::t('rent_construction_view', 'blade_height')," ","$characteristics->blade_height";?><br>
    <?php echo Yii::t('rent_construction_view', 'max_pulling_force')," ","$characteristics->max_pulling_force";?><br>
</div>
