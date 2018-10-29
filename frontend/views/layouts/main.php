<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\assets\AirDatepicker;
use common\widgets\Alert;

AppAsset::register($this);
AirDatepicker::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $menuItems = [
        ['label' => Yii::t('menu', 'Home'), 'url' => ['/site/index']],
        ['label' => Yii::t('menu', 'Rent'), 'url' => ['/rent/equipment/view']],
        //['label' => Yii::t('menu', 'Service'), 'url' => ['/service/default/index']],
        //['label' => Yii::t('menu', 'Shop'), 'url' => ['/shop/default/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Регистрация', 'url' => ['/user/default/signup']];
        $menuItems[] = ['label' => 'Войти', 'url' => ['/user/default/login']];
    } else {
        $menuItems[] = ['label' => 'Кабинет', 'items' => [
            ['label' => 'Профиль', 'url' => ['/user/profile/index']],
            //['label' => 'Ваша техника', 'url' => ['/user/profile/my-equipment']],
            //['label' => 'Сдать в Аренду', 'url' => ['/rent/create/create']],
            ['label' => 'Заявки на аренду', 'url' => ['/user/order/current']],
            ['label' => 'Выход', 'url' => ['user/default/logout'],
                'linkOptions' => ['data-method' => 'post']],
            //['label' => 'Продать', 'url' => ['/user/default/logout']],
            //['label' =>'Заказы', 'url' => ['/rent/construction/view']],
            //['label' => 'Предложения на продажу', 'url' => ['/user/default/logout']],
            //['label' => 'Заявки на продажу', 'url' => ['/user/default/logout']],
        ]];

    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>


    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

</div>
<div class="col-md-4 col-sm-4">
    <li>
        <?= Html::beginForm(['/site/language']) ?>
        <?= Html::dropDownList('language', Yii::$app->language, ['en-US' => 'English', 'ru-RU' => 'Русский']) ?>
        <?= Html::submitButton('Change') ?>
        <?= Html::endForm() ?>
    </li>
</div>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
