<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 22.09.2018
 * Time: 21:25
 */

namespace frontend\modules\rent\controllers;


use yii\web\Controller;
use frontend\modules\rent\models\forms\CreateEquipmentForm;
use Yii;
use yii\web\UploadedFile;

class CreateController extends Controller
{


    public function actionCreate()
    {
        $model = new CreateEquipmentForm(Yii::$app->user->identity);

        $model->scenario = CreateEquipmentForm::SCENARIO_CREATE;


        if ($model->load(Yii::$app->request->post())) {

            $model->picture = UploadedFile::getInstance($model,'picture');

            $model_array=$this->objectToArray($model);

            $model2 = (object) array_merge((array) $model, (array) $model_array);

            if ($model->save($model2)){

                Yii::$app->session->setFlash('success','Norm');

                return $this->goHome();

            }else{
                Yii::$app->session->setFlash('error','Fail');
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function objectToArray($model) {

        $json = json_encode($model);
        $arr = json_decode($json,true);

        $array = array_slice($arr,13,-1);
        $array = array_diff($array, array(''));
        for ($y=1;$y<13;$y++){
            array_slice($array,1,-1);
        }

        $i=count($array)+1;
        for($i; $i<11; $i++){
            array_push($array,'');
        }
        $a= array('feature1','feature2','feature3','feature4','feature5','feature6','feature7','feature8','feature9','feature10');

        $b=array_combine($a,$array);

        $object = (object) $b;

        return $object;
    }
}