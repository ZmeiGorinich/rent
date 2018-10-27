<?php

namespace frontend\modules\rent\controllers;

use common\models\CharacteristicsTech;
use common\models\Country;
use common\models\EquipmentRent;
use common\models\RentDate;
use common\models\TypeEquipment;
use frontend\modules\rent\models\forms\AddRent;
use frontend\modules\rent\models\SearchEquipment;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use Yii;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;


class EquipmentController extends Controller
{
    public function actionView()
    {
        $searchModel = new SearchEquipment();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->pagination->pageSize = 30;

        $modelCountry = Country::find()->orderBy('name ASC')->all();

        foreach ($modelCountry as $value) {
            $arrayCountry[$value->id] = $value->name;
        }

        $modelType = TypeEquipment::find()->orderBy('name ASC')->all();

        foreach ($modelType as $value) {
            $arrayType[$value->id] = $value->name;
        }

        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'arrayType' => $arrayType,
            'arrayCountry' => $arrayCountry,
        ]);

    }

    public function actionEquipment($id)
    {
        $item = EquipmentRent::findOne($id);
        //$date = RentDate::find()->addSelect(['date'])->where('id_tech=:id', [':id' => $id])->asArray()->all();
        //$date = ArrayHelper::getColumn($date, 'date');
        //$count = count($date);


        //Yii::$app->view->registerJs("var start11 = " . Json::encode($date)
        //    . "; var end22= " . Json::encode($count) . ";", \yii\web\View::POS_HEAD);

        if (Yii::$app->user->isGuest){
            return $this->render('view_equipment', [
                'equipment' => $this->findPost($id),
                'characteristics' => $this->findCharacteristics($id),
            ]);
        }else{
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
            return $this->render('view_equipment', [
                'equipment' => $this->findPost($id),
                'characteristics' => $this->findCharacteristics($id),
                'modelRent' => $modelRent,
            ]);
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