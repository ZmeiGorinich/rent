<?php

namespace backend\modules\rent\controllers;

use backend\models\User;
use common\models\EquipmentRent;
use common\models\NewTable;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `rent` module
 */
class DefaultController extends Controller
{
    //public $picture='47/52/242cb54ab7c26838a5578f4de9fd4a8221a1.jpg';
    //public $name;
    //public $type = 1;
    //public $category;

    //public $price;
    //public $min_order;
    //public $description;
    //public $region;
    //public $district;
    //public $height;
    //public $length;
    //public $width;
    ////public $weight;

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
    /**
     * Renders the index view for the module
     * @return string
     * @throws \yii\base\Exception
     */
    public function actionGenerateUser()
    {
        $faker = \Faker\Factory::create();

        for ($i= 0; $i<1000; $i++){
            $user = new User([
                'username'=> $faker->name,
                'email'=>$faker->email,
                'number' => $faker->phoneNumber,
                'region' => rand(1, 72),
                'name_company' => $faker->company,
                'auth_key' => Yii::$app->security->generateRandomString(),
                'password' => '111111',
//                'create_at' => $time = time(),
//                'update_at' => $time,

            ]);
            $user->save(false);
        }

    }


    public function actionGenerateRent()
    {
        $faker = \Faker\Factory::create();


        for ($i= 0; $i<1000; $i++){
            $user = new User([
                'username'=> $faker->name,
                'email'=>$faker->email,
                'number' => $faker->phoneNumber,
                'region' => rand(1, 72),
                'name_company' => $faker->company,
                'auth_key' => Yii::$app->security->generateRandomString(),
                'password' => '111111',
//                'create_at' => $time = time(),
//                'update_at' => $time,

            ]);
            $user->save(false);
        }

    }

    public function actionGenerateEquipment()
    {

        $faker = \Faker\Factory::create();

        $name = $faker->company;
        $picture='47/52/242cb54ab7c26838a5578f4de9fd4a8221a1.jpg';
        $description= $faker->text(200);
        $type = 1;
        $category =rand(1,14);
        $price = rand(100,10000);
        $min_order = rand(1,8);
        $district = rand(1,72);
        $height = rand(1000,4000);
        $length = rand(1000,4000);
        $width= rand(1000,4000);
        $weight= rand(1000,4000);




        $faker = \Faker\Factory::create();

        for ($i= 0; $i<1000; $i++){
            $user = new EquipmentRent([
                'username'=> $faker->name,

            ]);
            $user->save(false);
        }

    }



}
