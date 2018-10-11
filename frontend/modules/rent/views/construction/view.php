<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">

            <div class="row">
                <?php foreach ($item as $items): ?>
                        <div class="row">
                            <a href="<?php echo Url::to(['/rent/construction/equipment', 'id' => $items->id]); ?>">
                                <p><?= Html::encode($items->name); ?></p>
                            </a>
                        </div>

                        <div class="row">
                            <a href="<?php echo Url::to(['/rent/construction/equipment', 'id' => $items->id]); ?>">
                                <img src="<?php echo Yii::$app->storage->getFile($items->filename); ?> "
                                     class="img-thumbnail" alt="Cinque Terre">
                            </a>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>


        <div class="col-lg-4">
            
        </div>
    </div>
</div>
