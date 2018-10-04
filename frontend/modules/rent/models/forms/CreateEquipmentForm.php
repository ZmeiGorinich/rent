<?php

namespace frontend\modules\rent\models\forms;


use common\models\CharacteristicsTech;
use yii\base\Model;
use Yii;
use common\models\EquipmentRent;
use frontend\models\User;

class CreateEquipmentForm extends Model
{
    const SCENARIO_CREATE = 'create';
    const MAX_DESCRIPTION_LENGTH = 1000;
    const MIN_DESCRIPTION_LENGTH = 10;

    private $user;

    public $picture;
    public $name;
    public $type;
    public $category;
    //public $category2;
    //public $category3;

    public $price;
    public $min_order;
    public $description;
    public $region;
    public $district;
    public $height;
    public $length;
    public $width;
    public $weight;

    public $model_aerial_platform, $lifting_height, $lifting_capacity_cradle, $number_cradle;
    public $model_truck_cranes, $lifting_capacity, $length_boom, $boom_extension_length, $maximum_reach_boom;
    public $model_cranes_manipulators, $car_load_capacity, $boom_outreach, $crane_lifting_capacity, $dimensions_platform;
    public $model_excavators, $bucket_capacity, $radius_digging, $kinematic_depth_digging, $discharge_height;
    public $model_backhoe_loaders, $bucket_capacity_excavator, $digging_depth_excavator, $bucket_capacity_loader, $unloading_height_loader;
    public $model_bulldozers, $power_kwt, $blade_width, $blade_height, $max_pulling_force;
    public $model_hammers, $hydraulic_breaker_brand, $impact_energy, $mass_hydraulic_breaker, $hammer_beat_frequency;
    public $model_concrete_pump, $max_theoretical_produce, $max_pressure_concrete, $max_delivery_height, $max_feed_range, $pump_volume_concrete_mixer, $width_car_expanded_form, $height_working_condition;
    public $model_front_loader, $bucket_cutting_edge_width, $front_loader_bucket_capacity, $tipping_load, $operating_weight, $maximum_discharge_height;
    public $model_truck_mixers, $volume_concrete_mixer;
    public $model_compressors, $power_compressors;
    public $model_generators, $power_generators;
    public $model_dumpers, $dumpers_lifting_capacity, $board_height, $bead_length;
    public $model_road_rollers, $working_width;

    public function scenarios()
    {
        return [
            self::SCENARIO_CREATE => ['picture', 'name', 'category', 'description',
                'type', 'price', 'min_order', 'region', 'district', 'height', 'length', 'width', 'weight',
                'model_aerial_platform', 'lifting_height', 'lifting_capacity_cradle', 'number_cradle',
                'model_truck_cranes', 'lifting_capacity', 'length_boom', 'boom_extension_length', 'maximum_reach_boom',
                'model_cranes_manipulators', 'car_load_capacity', 'boom_outreach', 'crane_lifting_capacity', 'dimensions_platform',
                'model_excavators', 'bucket_capacity', 'radius_digging', 'kinematic_depth_digging', 'discharge_height',
                'model_backhoe_loaders', 'bucket_capacity_excavator', 'digging_depth_excavator', 'bucket_capacity_loader', 'unloading_height_loader',
                'model_bulldozers', 'power_kwt', 'blade_width', 'blade_height', 'max_pulling_force',
                'model_hammers', 'hydraulic_breaker_brand', 'impact_energy', 'mass_hydraulic_breaker', 'hammer_beat_frequency',
                'model_concrete_pump', 'max_theoretical_produce', 'max_pressure_concrete', 'max_delivery_height', 'max_feed_range', 'pump_volume_concrete_mixer', 'width_car_expanded_form', 'height_working_condition',
                'model_front_loader', 'bucket_cutting_edge_width', 'front_loader_bucket_capacity', 'tipping_load', 'operating_weight', 'maximum_discharge_height',
                'model_truck_mixers', 'volume_concrete_mixer',
                'model_compressors', 'power_compressors',
                'model_generators', 'power_generators',
                'model_dumpers', 'dumpers_lifting_capacity', 'board_height', 'bead_length',
                'model_road_rollers', 'working_width',],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'category' => 'Категория',
            'model_aerial_platform' => 'Модель автовышки',
        ];
    }

    public function rules()
    {
        return [

            [['picture'], 'file',

                'skipOnEmpty' => true,
                'extensions' => ['jpg', 'png'],
                'checkExtensionByMimeType' => true,
                'maxSize' => $this->getMaxFileSize()],

            [['name', 'type', 'price', 'min_order', 'region', 'district', 'height', 'length', 'width', 'weight'], 'required'],

            [['category'], 'number', 'min' => '1', 'message' => 'Выберите категорию'],


            [['description'], 'string', 'min' => self::MIN_DESCRIPTION_LENGTH, 'max' => self::MAX_DESCRIPTION_LENGTH],


            [['model_aerial_platform'], 'required', 'when' => function ($model) {
                return $model->category == '1';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '1';}"],
            [['lifting_height'], 'required', 'when' => function ($model) {
                return $model->category == '1';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '1';}"],
            [['lifting_capacity_cradle'], 'required', 'when' => function ($model) {
                return $model->category == '1';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '1';}"],
            [['number_cradle'], 'required', 'when' => function ($model) {
                return $model->category == '1';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '1';}"],

            [['model_truck_cranes'], 'required', 'when' => function ($model) {
                return $model->category == '2';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '2';}"],
            [['lifting_capacity'], 'required', 'when' => function ($model) {
                return $model->category == '2';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '2';}"],
            [['length_boom'], 'required', 'when' => function ($model) {
                return $model->category == '2';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '2';}"],
            [['boom_extension_length'], 'required', 'when' => function ($model) {
                return $model->category == '2';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '2';}"],
            [['maximum_reach_boom'], 'required', 'when' => function ($model) {
                return $model->category == '2';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '2';}"],

            [['model_cranes_manipulators'], 'required', 'when' => function ($model) {
                return $model->category == '3';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '3';}"],
            [['car_load_capacity'], 'required', 'when' => function ($model) {
                return $model->category == '3';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '3';}"],
            [['boom_outreach'], 'required', 'when' => function ($model) {
                return $model->category == '3';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '3';}"],
            [['crane_lifting_capacity'], 'required', 'when' => function ($model) {
                return $model->category == '3';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '3';}"],
            [['dimensions_platform'], 'required', 'when' => function ($model) {
                return $model->category == '3';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '3';}"],

            [['model_excavators'], 'required', 'when' => function ($model) {
                return $model->category == '4';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '4';}"],
            [['bucket_capacity'], 'required', 'when' => function ($model) {
                return $model->category == '4';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '4';}"],
            [['radius_digging'], 'required', 'when' => function ($model) {
                return $model->category == '4';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '4';}"],
            [['kinematic_depth_digging'], 'required', 'when' => function ($model) {
                return $model->category == '4';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '4';}"],
            [['discharge_height'], 'required', 'when' => function ($model) {
                return $model->category == '4';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '4';}"],

            [['model_backhoe_loaders'], 'required', 'when' => function ($model) {
                return $model->category == '5';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '5';}"],
            [['bucket_capacity_excavator'], 'required', 'when' => function ($model) {
                return $model->category == '5';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '5';}"],
            [['digging_depth_excavator'], 'required', 'when' => function ($model) {
                return $model->category == '5';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '5';}"],
            [['bucket_capacity_loader'], 'required', 'when' => function ($model) {
                return $model->category == '5';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '5';}"],
            [['unloading_height_loader'], 'required', 'when' => function ($model) {
                return $model->category == '5';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '5';}"],

            [['model_bulldozers'], 'required', 'when' => function ($model) {
                return $model->category == '6';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '6';}"],
            [['power_kwt'], 'required', 'when' => function ($model) {
                return $model->category == '6';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '6';}"],
            [['blade_width'], 'required', 'when' => function ($model) {
                return $model->category == '6';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '6';}"],
            [['blade_height'], 'required', 'when' => function ($model) {
                return $model->category == '6';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '6';}"],
            [['max_pulling_force'], 'required', 'when' => function ($model) {
                return $model->category == '6';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '6';}"],

            [['model_hammers'], 'required', 'when' => function ($model) {
                return $model->category == '7';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '7';}"],
            [['hydraulic_breaker_brand'], 'required', 'when' => function ($model) {
                return $model->category == '7';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '7';}"],
            [['impact_energy'], 'required', 'when' => function ($model) {
                return $model->category == '7';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '7';}"],
            [['mass_hydraulic_breaker'], 'required', 'when' => function ($model) {
                return $model->category == '7';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '7';}"],
            [['hammer_beat_frequency'], 'required', 'when' => function ($model) {
                return $model->category == '7';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '7';}"],

            [['model_concrete_pump'], 'required', 'when' => function ($model) {
                return $model->category == '8';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '8';}"],
            [['max_theoretical_produce'], 'required', 'when' => function ($model) {
                return $model->category == '8';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '8';}"],
            [['max_pressure_concrete'], 'required', 'when' => function ($model) {
                return $model->category == '8';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '8';}"],
            [['max_delivery_height'], 'required', 'when' => function ($model) {
                return $model->category == '8';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '8';}"],
            [['max_feed_range'], 'required', 'when' => function ($model) {
                return $model->category == '8';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '8';}"],
            [['pump_volume_concrete_mixer'], 'required', 'when' => function ($model) {
                return $model->category == '8';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '8';}"],
            [['width_car_expanded_form'], 'required', 'when' => function ($model) {
                return $model->category == '8';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '8';}"],
            [['height_working_condition'], 'required', 'when' => function ($model) {
                return $model->category == '8';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '8';}"],

            [['model_front_loader'], 'required', 'when' => function ($model) {
                return $model->category == '9';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '9';}"],
            [['bucket_cutting_edge_width'], 'required', 'when' => function ($model) {
                return $model->category == '9';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '9';}"],
            [['front_loader_bucket_capacity'], 'required', 'when' => function ($model) {
                return $model->category == '9';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '9';}"],
            [['tipping_load'], 'required', 'when' => function ($model) {
                return $model->category == '9';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '9';}"],
            [['operating_weight'], 'required', 'when' => function ($model) {
                return $model->category == '9';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '9';}"],
            [['maximum_discharge_height'], 'required', 'when' => function ($model) {
                return $model->category == '9';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '9';}"],

            [['model_truck_mixers'], 'required', 'when' => function ($model) {
                return $model->category == '10';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '10';}"],
            [['volume_concrete_mixer'], 'required', 'when' => function ($model) {
                return $model->category == '10';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '10';}"],

            [['model_compressors'], 'required', 'when' => function ($model) {
                return $model->category == '11';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '11';}"],
            [['power_compressors'], 'required', 'when' => function ($model) {
                return $model->category == '11';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '11';}"],

            [['model_generators'], 'required', 'when' => function ($model) {
                return $model->category == '12';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '12';}"],
            [['power_generators'], 'required', 'when' => function ($model) {
                return $model->category == '12';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '12';}"],

            [['model_dumpers'], 'required', 'when' => function ($model) {
                return $model->category == '13';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '13';}"],
            [['dumpers_lifting_capacity'], 'required', 'when' => function ($model) {
                return $model->category == '13';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '13';}"],
            [['board_height'], 'required', 'when' => function ($model) {
                return $model->category == '13';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '13';}"],
            [['bead_length'], 'required', 'when' => function ($model) {
                return $model->category == '13';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '13';}"],

            [['model_road_rollers'], 'required', 'when' => function ($model) {
                return $model->category == '14';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '13';}"],
            [['working_width'], 'required', 'when' => function ($model) {
                return $model->category == '14';
            },
                'whenClient' => "function (attribute, value){return $('#createequipmentform-category').val() == '13';}"],


        ];
    }

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function save($model2)
    {
        if ($this->validate()) {
            $equipmentRent = new EquipmentRent();


            $equipmentRent->name = $this->name;
            $equipmentRent->author_id = $this->user->getId();
            $equipmentRent->type = $this->type;
            $equipmentRent->category = $this->category;
            $equipmentRent->filename = Yii::$app->storage->saveUploadedFile($this->picture);
            $equipmentRent->price = $this->price;
            $equipmentRent->min_order = $this->min_order;
            $equipmentRent->description = $this->description;

            $equipmentRent->district_id = $this->district;

            $equipmentRent->height = $this->height;
            $equipmentRent->width = $this->width;
            $equipmentRent->length = $this->length;
            $equipmentRent->weight = $this->weight;

            $equipmentRent->created_at = time();
            $equipmentRent->updated_at = time();

            return $equipmentRent->save(false);

        }

            $insert_id = Yii::$app->db->getLastInsertID();

            foreach ($model2 as $item){
                $characteristics = new CharacteristicsTech();

                $characteristics->equipment_id=$insert_id;

                $characteristics->feature=$item;

                $characteristics->save();
            }
            return $characteristics->save(false);

        }


    private function getMaxFileSize()
    {
        return Yii::$app->params['maxFileSize'];
    }

}