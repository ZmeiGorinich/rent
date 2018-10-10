<?php

use yii\helpers\Html;
use yii\web\JqueryAsset;
use yii\widgets\ActiveForm;

?>


<div class="post-default-index">
    <h1>View Post</h1>

    <div class="row">


        <p><?= Html::encode($equipment->name) ?></p>

        <div class="col-md-12">
            <img src="<?php echo Yii::$app->storage->getFile($equipment->filename); ?>"
        </div>

    </div>

    <?php echo Yii::t('rent_construction_view', 'model_aerial_platform'), " ", "$characteristics->model_aerial_platform"; ?>
    <br>
    <?php echo Yii::t('rent_construction_view', 'lifting_height'), " ", "$characteristics->lifting_height"; ?><br>
    <?php echo Yii::t('rent_construction_view', 'lifting_capacity_cradle'), " ", "$characteristics->lifting_capacity_cradle"; ?>
    <br>
    <?php echo Yii::t('rent_construction_view', 'number_cradle'), " ", "$characteristics->number_cradle"; ?><br>
    <br>
    <br>
    <div class="example">
        <div class="example-content">
            <div class="list-inline">

                <div id="custom-cells-events">
                    <strong>
                    </strong>
                    <p>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->registerJsFile('@web/js/calendar.js', ['depends' => JqueryAsset::className(),]); ?>

<div class="form_for_rent">

            <?php $form = ActiveForm::begin();?>

            <?php echo $form->field($modelRent, 'date')->label('Заголовок')->textInput(
                    ['type'=>'text','class'=>'datepicker-here','data-multiple-dates'=>"5",
                           'data-multiple-dates-separator'=>",",'style'=>"display: none;",
                           'data-position'=>'right top' ,'id'=>"custom-cells"]); ?>

            <?php echo $form->field($modelRent, 'location')->label('Куда доставить'); ?>
            <?php echo $form->field($modelRent, 'description')->label('Дополнительные пожелания')->textarea(); ?>

            <?php echo Html::submitButton('Заказать'); ?>

            <?php ActiveForm::end() ?>
</div>
