<?php
use yii\helpers\Html;
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
    <?php if (Yii::$app->user->isGuest):?>
        <?php echo "Для того чтобы арендовать технику авторизируйтесь"?>
    <?php else:?>
        <?= $this->render('@app/modules/rent/views/equipment/_form_rent', [
            'modelRent' => $modelRent,
            'equipment' => $equipment,
        ]) ?>
    <?php endif;?>


</div>


<?= $this->render('@app/modules/rent/views/equipment/_characteristics', [
    'characteristics' => $characteristics,
]) ?>
