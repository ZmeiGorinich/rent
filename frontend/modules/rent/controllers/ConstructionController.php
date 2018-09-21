<?php

namespace frontend\modules\rent\controllers;

use frontend\models\EquipmentRent;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use frontend\modules\rent\models\forms\CreateEquipmentForm;
use Yii;
use yii\web\UploadedFile;


class ConstructionController extends Controller
{


    public function actionView(){

        $item =  EquipmentRent::find()->all();

        return $this->render('view', [
            'item'=>$item,
        ]);
    }



}












