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

    <?php echo"Модель крана манпулятора $characteristics->model_front_loader";?><br>
    <?php print_r($characteristics->bucket_cutting_edge_width);?><br>
    <?php print_r($characteristics->front_loader_bucket_capacity);?><br>
    <?php print_r($characteristics->tipping_load);?><br>
    <?php print_r($characteristics->operating_weight);?><br>
    <?php print_r($characteristics->maximum_discharge_height);?><br>
</div>
