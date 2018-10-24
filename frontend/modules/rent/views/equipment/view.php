<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<?php $models = $dataProvider->getModels()?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">

            <div class="row">
                <?php foreach ($models as $model): ?>
                        <div class="row">
                            <a href="<?php echo Url::to(['/rent/equipment/equipment?id=', 'id' => $model->id]); ?>">
                                <p><?= Html::encode($model->name); ?></p>
                            </a>
                        </div>

                        <div class="row">
                            <a href="<?php echo Url::to(['/rent/equipment/equipment', 'id' => $model->id]); ?>">
                                <img src="<?php echo Yii::$app->storage->getFile($model->filename); ?> "
                                     class="img-thumbnail" alt="Cinque Terre">
                            </a>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>


        <div class="col-lg-4">
            <?php echo $this->render('_filter', [
                'model' => $searchModel,
                'arrayType' => $arrayType,
                'arrayCategory' => [],
                'arrayCountry' => $arrayCountry,
                'arrayRegion' => [],

            ]); ?>
        </div>
    </div>
</div>
