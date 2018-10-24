<?php

namespace backend\modules\area\controllers;

use common\models\Country;
use common\models\Region;
use Yii;
use common\models\District;
use backend\modules\area\models\SearchDistrict;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DistrictController implements the CRUD actions for District model.
 */
class DistrictController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all District models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchDistrict();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $modelCountry = Country::find()->orderBy('name ASC')->all();
        foreach ($modelCountry as $value){
            $arrayCountry[$value->id]= $value->name;
        }



        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'arrayCountry'=>$arrayCountry,
            'arrayRegion'=>[],
        ]);
    }

    /**
     * Displays a single District model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new District model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new District();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = time();
            $model->updated_at = time();

            if ($model->save()) {

                Yii::$app->session->setFlash('success', 'Norm');

                return $this->redirect(Yii::$app->request->referrer);

            } else {
                Yii::$app->session->setFlash('error', 'Fail');
            }
        }

        $modelCountry = Country::find()->orderBy('name ASC')->all();

        foreach ($modelCountry as $value){
            $arrayCountry[$value->id]= $value->name;
        }




        return $this->render('create', [
            'model' => $model,
            'arrayCountry' => $arrayCountry,
            'arrayRegion'=>[],
        ]);
    }

    /**
     * Updates an existing District model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing District model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the District model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return District the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = District::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionList($id){
        //$id =1;
        $countRegion = Region::find()
            ->where(['country_id'=>$id])
            ->count();
        $regions = Region::find()
            ->where(['country_id'=>$id])
            ->orderBy('name ASC')
            ->all();
        if ($countRegion > 0 ){
            echo "<option>выбрать...</option>";
            foreach ($regions as $region){
                echo  "<option value='".$region->id."'>$region->name</option>";
            }
        }
        else{
            echo "<option> - </option>";
        }
    }

    public function actionListc($id){
        //$id =1;
        $countRegion = Region::find()
            ->where(['country_id'=>$id])
            ->count();
        $regions = Region::find()
            ->where(['country_id'=>$id])
            ->orderBy('name ASC')
            ->all();
        if ($countRegion > 0 ){
            echo "<option>выбрать...</option>";
            foreach ($regions as $region){
                echo  "<option value='".$region->id."'>$region->name</option>";
            }
        }
        else{
            echo "<option> - </option>";
        }
    }

    public function actionListr($id){

        $countDistrict = District::find()
            ->where(['region_id'=>$id])
            ->count();
        $districts = District::find()
            ->where(['region_id'=>$id])
            ->orderBy('name ASC')
            ->all();
        if ($countDistrict > 0 ){
            echo "<option>выбрать...</option>";
            foreach ($districts as $district){
                echo  "<option value='".$district->id."'>$district->name</option>";
            }
        }
        else{
            echo "<option> - </option>";
        }
    }



}
