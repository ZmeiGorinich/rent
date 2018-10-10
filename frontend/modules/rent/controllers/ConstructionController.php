<?php

namespace frontend\modules\rent\controllers;

use common\models\CharacteristicsTech;
use common\models\EquipmentRent;
use common\models\RentDate;
use frontend\modules\rent\models\forms\AddRent;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use Yii;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;


class ConstructionController extends Controller
{
    public function actionView()
    {

        $item = EquipmentRent::find()->all();
        //$q=Yii::$app->language;
        return $this->render('view', [
            'item' => $item,
        ]);
    }

    public function actionEquipment($id)
    {
        $modelRent = new AddRent(Yii::$app->user->identity);

        $modelRent->scenario = AddRent::SCENARIO_CREATE;

        if ($modelRent->load(Yii::$app->request->post())) {
            $modelRent->setIdEquipment($id);

            if ($modelRent->save()) {

                Yii::$app->session->setFlash('success', 'Norm');

                return $this->redirect(Yii::$app->request->referrer);

            } else {
                Yii::$app->session->setFlash('error', 'Fail');
            }
        }

        $item = EquipmentRent::findOne($id);
        $date=RentDate::find()->addSelect(['date'])->where('id_tech=:id', [':id' => $id])->asArray()->all();
        $date=ArrayHelper::getColumn($date,'date');
        $count=count($date);



        Yii::$app->view->registerJs("var start11 = " . Json::encode($date)
            . "; var end22= " . Json::encode($count) . ";",  \yii\web\View::POS_HEAD);


        //echo '<pre>';
        //print_r($script);
        //echo '<pre>';
        //die;

        switch ($item->category) {
            case 1:
                return $this->render('aerial_platform', [
                    'equipment' => $this->findPost($id),
                    'characteristics' => $this->findCharacteristics($id),
                    'modelRent' => $modelRent,
                ]);
                break;
            case 2:
                return $this->render('truck_cranes', [
                    'equipment' => $this->findPost($id),
                    'characteristics' => $this->findCharacteristics($id),
                ]);
                break;
            case 3:
                return $this->render('cranes_manipulators', [
                    'equipment' => $this->findPost($id),
                    'characteristics' => $this->findCharacteristics($id),
                ]);
                break;
            case 4 :
                return $this->render('excavators', [
                    'equipment' => $this->findPost($id),
                    'characteristics' => $this->findCharacteristics($id),
                ]);
                break;
            case 5:
                return $this->render('backhoe_loaders', [
                    'equipment' => $this->findPost($id),
                    'characteristics' => $this->findCharacteristics($id),
                ]);
                break;
            case 6:
                return $this->render('bulldozers', [
                    'equipment' => $this->findPost($id),
                    'characteristics' => $this->findCharacteristics($id),
                ]);
                break;
            case 7:
                return $this->render('hammers', [
                    'equipment' => $this->findPost($id),
                    'characteristics' => $this->findCharacteristics($id),
                ]);
                break;
            case 8:
                return $this->render('concrete_pump', [
                    'equipment' => $this->findPost($id),
                    'characteristics' => $this->findCharacteristics($id),
                ]);
                break;
            case 9:
                return $this->render('front_loader', [
                    'equipment' => $this->findPost($id),
                    'characteristics' => $this->findCharacteristics($id),
                ]);
                break;
            case 10:
                return $this->render('truck_mixers', [
                    'equipment' => $this->findPost($id),
                    'characteristics' => $this->findCharacteristics($id),
                ]);
                break;
            case 11:
                return $this->render('compressors', [
                    'equipment' => $this->findPost($id),
                    'characteristics' => $this->findCharacteristics($id),
                ]);
                break;
            case 12:
                return $this->render('generators', [
                    'equipment' => $this->findPost($id),
                    'characteristics' => $this->findCharacteristics($id),
                ]);
                break;
            case 13:
                return $this->render('dumpers', [
                    'equipment' => $this->findPost($id),
                    'characteristics' => $this->findCharacteristics($id),
                ]);
                break;
            case 14:
                return $this->render('road_rollers', [
                    'equipment' => $this->findPost($id),
                    'characteristics' => $this->findCharacteristics($id),
                ]);
                break;
        }


    }

    private function findPost($id)
    {
        if ($item = EquipmentRent::findOne($id)) {
            return $item;
        }
        throw new NotFoundHttpException();
    }

    private function findCharacteristics($id)
    {
        $aaa = CharacteristicsTech::find()->addSelect(['feature_id', 'feature'])->where('equipment_id=:id', [':id' => $id])->all();
        $result = ArrayHelper::map($aaa, 'feature_id', 'feature');
        $result = (object)$result;
        if ($result) {
            return $result;
        }
        throw new NotFoundHttpException();
    }


}












