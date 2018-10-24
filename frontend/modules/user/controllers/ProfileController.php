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
    public function actionOrders()
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect('/user/default/login');
        }else{
            $userId = Yii::$app->user->getId();

            $date = Rent::find()->where('id_user=:id', [':id' => $userId])->all();

//            echo '<pre>';
//            print_r($date);
//            echo '<pre>';
//            die;
            return $this->render('orders',[
                'date'=>$date,
            ]);
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
