<?php
use yii\helpers\Html;
use yii\web\JqueryAsset;
?>
<?php foreach ($item as $value): ?>
<div>
    <p><?php echo $value->name; ?></p>
    <div class="col-md-12">
        <img src="<?php echo Yii::$app->storage->getFile($value->filename); ?>"
    </div>

</div>
<?php endforeach;?>