<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 15.09.2018
 * Time: 12:01
 */

namespace frontend\modules\rent\controllers;


use yii\web\Controller;

class MunicipalController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}