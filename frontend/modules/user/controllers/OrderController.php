<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 27.10.2018
 * Time: 18:18
 */

namespace frontend\modules\user\controllers;

use common\models\Rent;
use Yii;
use yii\web\Controller;

class OrderController extends Controller
{
    public function actionCurrent()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/user/default/login');
        } else {
            $userId = Yii::$app->user->getId();

            $rents = Yii::$app->db->createCommand("SELECT equipment_rent.name ,rent.created_at, rent.location,  
rent.description, rent.id_tech, rent.total,rent.date_start,rent.date_finish 
FROM `rent` left JOIN `equipment_rent` ON `rent`.`id_tech` = `equipment_rent`.`id` where  id_user =	$userId and rent.status=10;")->queryAll();

            return $this->render('current', [
                'rents' => $rents,
            ]);
        }
    }

    public function actionPreOrder()
    {

        if (Yii::$app->user->isGuest) {
            return $this->redirect('/user/default/login');
        } else {
            $userId = Yii::$app->user->getId();

            $rents = Yii::$app->db->createCommand("SELECT equipment_rent.name ,rent.created_at, rent.location,  
rent.description, rent.id_tech, rent.total,rent.date_start,rent.date_finish 
FROM `rent` left JOIN `equipment_rent` ON `rent`.`id_tech` = `equipment_rent`.`id` where  id_user =	$userId and rent.status=5;")->queryAll();

            return $this->render('pre_order', [
                'rents' => $rents,
            ]);
        }
    }

    public function actionHistory()
    {

        if (Yii::$app->user->isGuest) {
            return $this->redirect('/user/default/login');
        } else {
            $userId = Yii::$app->user->getId();

            $rents = Yii::$app->db->createCommand("SELECT equipment_rent.name ,rent.created_at, rent.location,  
rent.description, rent.id_tech, rent.total,rent.date_start,rent.date_finish 
FROM `rent` left JOIN `equipment_rent` ON `rent`.`id_tech` = `equipment_rent`.`id` where  id_user =	$userId and rent.status=15;")->queryAll();

            return $this->render('history', [
                'rents' => $rents,
            ]);
        }

    }
}