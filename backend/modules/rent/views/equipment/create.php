<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EquipmentRent */

$this->title = 'Create Equipment Rent';
$this->params['breadcrumbs'][] = ['label' => 'Equipment Rents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-rent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
