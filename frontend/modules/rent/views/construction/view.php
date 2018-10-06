<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<?php foreach ($item as $items): ?>
    <div>
        <a href="<?php echo Url::to(['/rent/construction/equipment', 'id' => $items->id]); ?>">
            <p><?= Html::encode($items->name) ?></p>
        </a>
        <div class="col-md-12">
            <a href="<?php echo Url::to(['/rent/construction/equipment', 'id' => $items->id]); ?>">
                <img src="<?php echo Yii::$app->storage->getFile($items->filename); ?>"
            </a>
        </div>


    </div>
<?php endforeach; ?>