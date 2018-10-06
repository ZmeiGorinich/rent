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

    <?php echo Yii::t('rent_construction_view', 'model_hammers')," ","$characteristics->model_hammers";?><br>
    <?php echo Yii::t('rent_construction_view', 'hydraulic_breaker_brand')," ","$characteristics->hydraulic_breaker_brand";?><br>
    <?php echo Yii::t('rent_construction_view', 'impact_energy')," ","$characteristics->impact_energy";?><br>
    <?php echo Yii::t('rent_construction_view', 'mass_hydraulic_breaker')," ","$characteristics->mass_hydraulic_breaker";?><br>
    <?php echo Yii::t('rent_construction_view', 'hammer_beat_frequency')," ","$characteristics->hammer_beat_frequency";?><br>
</div>
