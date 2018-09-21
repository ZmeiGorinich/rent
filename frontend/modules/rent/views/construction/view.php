<?php
use yii\helpers\Html;
?>
<?php foreach ($item as $items): ?>
<div>
    <p><?= Html::encode($items->name)?></p>

    <div class="col-md-12">
        <img src="<?php echo Yii::$app->storage->getFile($items->filename); ?>"
    </div>

</div>
<?php endforeach;?>