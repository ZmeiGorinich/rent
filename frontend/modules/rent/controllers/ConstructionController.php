<?php

namespace frontend\modules\rent\controllers;

use frontend\models\EquipmentRent;
use yii\web\Controller;



class ConstructionController extends Controller
{
    public function actionView(){

        $item =  EquipmentRent::find()->all();

        return $this->render('view', [
            'item'=>$item,
        ]);
    }



}












