<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 22.09.2018
 * Time: 21:25
 */

namespace frontend\modules\rent\controllers;



use yii\base\Theme;
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

            $model2=$this->switchCategoryConstruction($model);


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


    public function switchCategoryConstruction($model){
        switch ($model->category) {
            case 1:
                return $this->aerial_platform($model);
                break;
            case 2:
                return $this->truck_cranes($model);
                break;
            case 3:
                return $this->cranes_manipulators($model);
                break;
            case 4 :
                return $this->excavators($model);
                break;
            case 5:
                return $this->backhoe_loaders($model);
                break;
            case 6:
                return $this->bulldozers($model);
                break;
            case 7:
                return $this->hammers($model);
                break;
            case 8:
                return $this->concrete_pump($model);
                break;
            case 9:
                return $this->front_loader($model);
                break;
            case 10:
                return $this->truck_mixers($model);
                break;
            case 11:
                return $this->compressors($model);
                break;
            case 12:
                return $this->generators($model);
                break;
            case 13:
                return $this->dumpers($model);
                break;
            case 14:
                return $this->road_rollers($model);
                break;
        }
    }

    public function aerial_platform($model){
        $array = (array) [
            'model_aerial_platform' => $model->model_aerial_platform,
            'lifting_height' => $model->lifting_height,
            'lifting_capacity_cradle' => $model->lifting_capacity_cradle,
            'number_cradle' => $model->number_cradle,
        ];
        return $array;

    }

    public function truck_cranes($model){
        $array = (array) [
            'model_truck_cranes' => $model->model_truck_cranes,
            'lifting_capacity' => $model->lifting_capacity,
            'length_boom' => $model->length_boom,
            'boom_extension_length' => $model->boom_extension_length,
            'maximum_reach_boom' => $model->maximum_reach_boom,
        ];
        return $array;

    }

    public function cranes_manipulators($model){
        $array = (array) [
            'model_cranes_manipulators' => $model->model_cranes_manipulators,
            'car_load_capacity' => $model->car_load_capacity,
            'boom_outreach' => $model->boom_outreach,
            'crane_lifting_capacity' => $model->crane_lifting_capacity,
            'dimensions_platform' => $model->dimensions_platform,
        ];
        return $array;

    }

    public function excavators($model){
        $array = (array) [
            'model_excavators' => $model->model_excavators,
            'bucket_capacity' => $model->bucket_capacity,
            'radius_digging' => $model->radius_digging,
            'kinematic_depth_digging' => $model->kinematic_depth_digging,
            'discharge_height' => $model->discharge_height,
        ];
        return $array;

    }

    public function backhoe_loaders($model){
        $array = (array) [
            'model_backhoe_loaders' => $model->model_backhoe_loaders,
            'bucket_capacity_excavator' => $model->bucket_capacity_excavator,
            'digging_depth_excavator' => $model->digging_depth_excavator,
            'bucket_capacity_loader' => $model->bucket_capacity_loader,
            'unloading_height_loader' => $model->unloading_height_loader,
        ];
        return $array;

    }

    public function bulldozers($model){
        $array = (array) [
            'model_bulldozers' => $model->model_bulldozers,
            'power_kwt' => $model->power_kwt,
            'blade_width' => $model->blade_width,
            'blade_height' => $model->blade_height,
            'max_pulling_force' => $model->max_pulling_force,
        ];
        return $array;

    }

    public function hammers($model){
        $array = (array) [
            'model_hammers' => $model->model_hammers,
            'hydraulic_breaker_brand' => $model->hydraulic_breaker_brand,
            'impact_energy' => $model->impact_energy,
            'mass_hydraulic_breaker' => $model->mass_hydraulic_breaker,
            'hammer_beat_frequency' => $model->hammer_beat_frequency,
        ];
        return $array;

    }

    public function concrete_pump($model){
        $array = (array) [
            'model_concrete_pump' => $model->model_concrete_pump,
            'max_theoretical_produce' => $model->max_theoretical_produce,
            'max_pressure_concrete' => $model->max_pressure_concrete,
            'max_delivery_height' => $model->max_delivery_height,
            'max_feed_range' => $model->max_feed_range,
            'pump_volume_concrete_mixer' => $model->pump_volume_concrete_mixer,
            'width_car_expanded_form' => $model->width_car_expanded_form,
            'height_working_condition' => $model->height_working_condition,
        ];
        return $array;

    }

    public function front_loader($model){
        $array = (array) [
            'model_front_loader' => $model->model_front_loader,
            'bucket_cutting_edge_width' => $model->bucket_cutting_edge_width,
            'front_loader_bucket_capacity' => $model->front_loader_bucket_capacity,
            'tipping_load' => $model->tipping_load,
            'operating_weight' => $model->operating_weight,
            'maximum_discharge_height' => $model->maximum_discharge_height,
        ];
        return $array;

    }

    public function truck_mixers($model){
        $array = (array) [
            'model_truck_mixers' => $model->model_truck_mixers,
            'volume_concrete_mixer' => $model->volume_concrete_mixer,
        ];
        return $array;

    }

    public function compressors($model){
        $array = (array) [
            'model_compressors' => $model->model_compressors,
            'power_compressors' => $model->power_compressors,
        ];
        return $array;

    }

    public function generators($model){
        $array = (array) [
            'model_generators' => $model->model_generators,
            'power_generators' => $model->power_generators,
        ];
        return $array;

    }

    public function dumpers($model){
        $array = (array) [
            'model_dumpers' => $model->model_dumpers,
            'dumpers_lifting_capacity' => $model->dumpers_lifting_capacity,
            'board_height' => $model->board_height,
            'bead_length' => $model->bead_length,
        ];
        return $array;

    }

    public function road_rollers($model){
        $array = (array) [
            'model_road_rollers' => $model->model_road_rollers,
            'working_width' => $model->working_width,
        ];
        return $array;


    }
}