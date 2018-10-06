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

    <?php echo Yii::t('rent_construction_view', 'model_dumpers')," ","$characteristics->model_dumpers";?><br>
    <?php echo Yii::t('rent_construction_view', 'dumpers_lifting_capacity')," ","$characteristics->dumpers_lifting_capacity";?><br>
    <?php echo Yii::t('rent_construction_view', 'board_height')," ","$characteristics->board_height";?><br>
    <?php echo Yii::t('rent_construction_view', 'bead_length')," ","$characteristics->bead_length";?><br>
</div>
