<?php

namespace frontend\modules\user\controllers;

use common\models\Rent;
use Yii;

class ProfileController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect('/user/default/login');
        }else{
            return $this->render('index');
        }
    }


    public function actionMyEquipment()
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect('/user/default/login');
        }else{
            return $this->render('my-equipment');
        }
    }

}
