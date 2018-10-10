<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8" style="background: yellow">

            <div class="row" style="background: red">
                <?php foreach ($item as $items): ?>
                    <div class="col-lg-8" style="background: brown">
                        <a href="<?php echo Url::to(['/rent/construction/equipment', 'id' => $items->id]); ?>">
                            <img src="<?php echo Yii::$app->storage->getFile($items->filename); ?> "
                                 class="img-thumbnail" alt="Cinque Terre">
                        </a>
                    </div>
                    <div class="col-lg-4" style="background: palegreen">
                        <a href="<?php echo Url::to(['/rent/construction/equipment', 'id' => $items->id]); ?>">
                            <p><?= Html::encode($items->name); ?></p>
                        </a>
                        <p>etrdu tifuyglihj; etrduti fuyglihj; etrdutifuy glihj;etrdut ifuyglihj;etrdu tifuyglihj; etrdutifuyglihj;etrduti uyglihj; etrdutif uyglihj;</p>
                    </div>
                <?php endforeach; ?>
            </div>
sdfsd
        </div>


        <div class="col-lg-4" style="background: #00CC00;">

        </div>
    </div>
</div>
