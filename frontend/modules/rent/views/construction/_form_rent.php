<?php

use yii\helpers\Html;
use yii\web\JqueryAsset;
use yii\widgets\ActiveForm;

?>
<?php $this->registerJsFile('@web/js/calendar.js', ['depends' => JqueryAsset::className(),]); ?>
<div class="col-lg-8    ">
    <div class="container-fluid">
        <div class="row">
            <div class="form-group">
                <?php $form = ActiveForm::begin();?>
                <div class="col-lg-6">
                    <?php echo $form->field($modelRent, 'date')->label('Заголовок')->textInput(
                        ['type'=>'text','class'=>'datepicker-here','data-multiple-dates'=>"5",
                            'data-multiple-dates-separator'=>",",'style'=>"display: none;",
                            'data-position'=>'right top' ,'id'=>"custom-cells"]); ?>
                </div>
                <div class="col-lg-6">
                    <?php echo $form->field($modelRent, 'location')->label('Куда доставить'); ?>
                    <?php echo $form->field($modelRent, 'description')->label('Дополнительные пожелания')->textarea(); ?>

                    <?php echo Html::submitButton('Заказать'); ?>
                </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
</div>