<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\rent\models\SearchEquipment */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equipment Rents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-rent-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php echo $this->render('_search', [
                    'model' => $searchModel,
                    'arrayType' => $arrayType,
                    'arrayCategory' => [],
                    'arrayCountry' => $arrayCountry,
                    'arrayRegion' => [],

                ]); ?>
            </div>

<!--            --><?php //echo '<pre>';?>
<!--            --><?php //print_r($searchModel)?>
<!--            --><?php //echo '<pre>';die;?>
            <div class="col-lg-4">
                <?php $models = $dataProvider->getModels()?>


                <div class="row">
                    <?php foreach ($models as $model): ?>
                        <div class="row">
                            <a href="<?php echo Url::to(['/rent/equipment/view', 'id' => $model->id]); ?>">
                                <p><?= Html::encode($model->name); ?></p>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>


</div>
