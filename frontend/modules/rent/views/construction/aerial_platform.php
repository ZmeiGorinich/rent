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

    <?php echo Yii::t('rent_construction_view', 'model_aerial_platform')," ","$characteristics->model_aerial_platform";?><br>
    <?php echo Yii::t('rent_construction_view', 'lifting_height')," ","$characteristics->lifting_height";?><br>
    <?php echo Yii::t('rent_construction_view', 'lifting_capacity_cradle')," ","$characteristics->lifting_capacity_cradle";?><br>
    <?php echo Yii::t('rent_construction_view', 'number_cradle')," ","$characteristics->number_cradle";?><br>
</div>
