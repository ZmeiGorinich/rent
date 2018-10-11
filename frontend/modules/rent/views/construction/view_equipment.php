<?php

use yii\helpers\Html;
use yii\web\JqueryAsset;
use yii\widgets\ActiveForm;

?>


<div class="container-fluid">
    <h1>View Post</h1>

    <div class="col-lg-8">
        <div class="row">


            <p><?= Html::encode($equipment->name) ?></p>

            <div class="col-md-12">
                <img src="<?php echo Yii::$app->storage->getFile($equipment->filename); ?>" class="img-thumbnail"
                     alt="Cinque Terre">
            </div>

        </div>
    </div>

    <?php switch ($equipment->category): ?>
<?php case 1: ?>
            <?= $this->render('@app/modules/rent/views/construction/category/aerial_platform', [
                'characteristics' => $characteristics,
            ]) ?>
            <?php break ?>

        <?php case 2: ?>
            <?= $this->render('@app/modules/rent/views/construction/category/truck_cranes', [
                'characteristics' => $characteristics,
            ]) ?>
            <?php break ?>

        <?php case 3: ?>
            <?= $this->render('@app/modules/rent/views/construction/category/cranes_manipulators', [
                'characteristics' => $characteristics,
            ]) ?>
            <?php break ?>

        <?php case 4: ?>
            <?= $this->render('@app/modules/rent/views/construction/category/excavators', [
                'characteristics' => $characteristics,
            ]) ?>
            <?php break ?>

        <?php case 5: ?>
            <?= $this->render('@app/modules/rent/views/construction/category/backhoe_loaders', [
                'characteristics' => $characteristics,
            ]) ?>
            <?php break ?>

        <?php case 6: ?>
            <?= $this->render('@app/modules/rent/views/construction/category/bulldozers', [
                'characteristics' => $characteristics,
            ]) ?>
            <?php break ?>

        <?php case 7: ?>
            <?= $this->render('@app/modules/rent/views/construction/category/hummers', [
                'characteristics' => $characteristics,
            ]) ?>
            <?php break ?>

        <?php case 8: ?>
            <?= $this->render('@app/modules/rent/views/construction/category/excavators', [
                'characteristics' => $characteristics,
            ]) ?>
            <?php break ?>

        <?php case 9: ?>
            <?= $this->render('@app/modules/rent/views/construction/category/excavators', [
                'characteristics' => $characteristics,
            ]) ?>
            <?php break ?>

        <?php case 10: ?>
            <?= $this->render('@app/modules/rent/views/construction/category/compressors', [
                'characteristics' => $characteristics,
            ]) ?>
            <?php break ?>

        <?php case 11: ?>
            <?= $this->render('@app/modules/rent/views/construction/category/excavators', [
                'characteristics' => $characteristics,
            ]) ?>
            <?php break ?>

        <?php case 12: ?>
            <?= $this->render('@app/modules/rent/views/construction/category/excavators', [
                'characteristics' => $characteristics,
            ]) ?>
            <?php break ?>

        <?php case 13: ?>
            <?= $this->render('@app/modules/rent/views/construction/category/excavators', [
                'characteristics' => $characteristics,
            ]) ?>
            <?php break ?>

        <?php case 14: ?>
            <?= $this->render('@app/modules/rent/views/construction/category/excavators', [
                'characteristics' => $characteristics,
            ]) ?>
            <?php break ?>

        <?php endswitch ?>




</div>

<?= $this->render('@app/modules/rent/views/construction/form_rent', [
    'modelRent' => $modelRent,
]) ?>

