<?php

use yii\helpers\Html;
use yii\web\JqueryAsset;
use yii\widgets\ActiveForm;
?>
<?php $this->registerJsFile('@web/js/calendarreload.js', ['depends' => JqueryAsset::className(),]); ?>
<div class="col-lg-4">
    <div class="container-fluid">
        <div class="row">
            <div class="form-group">
                <?php $form = ActiveForm::begin(); ?>
                <div class="row">
                    <?php echo $form->field($modelRent, 'startDate')->label('Дата начала')->textInput([
                        'type' => 'text',
                        'class' => 'datepicker-here',
                        'id' => 'startDate',
                    ]) ?>
                </div>
                <div class="row">
                    <?php echo $form->field($modelRent, 'finishDate')->label('Дата окончания')->textInput([
                        'type' => 'text',
                        'class' => 'datepicker-here',
                        'id' => 'finishDate',
                    ]) ?>
                </div>
                <div class="row">
                    <?php echo $form->field($modelRent, 'location')->label('Куда доставить'); ?>
                </div>
                <div class="row">
                    <?php echo $form->field($modelRent, 'description')->label('Дополнительные пожелания')->textarea(); ?>
                </div>
                <div class="row">
                    <?php echo Html::submitButton('Send', ['class' => 'btn btn-success']);?>
                </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
</div>