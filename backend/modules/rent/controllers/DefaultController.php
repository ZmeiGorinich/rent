<?php

namespace backend\modules\rent\controllers;

use backend\models\User;
use common\models\CharacteristicsTech;
use common\models\EquipmentRent;
use common\models\NewTable;
use common\models\Rent;
use common\models\RentDate;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `rent` module
 */
class DefaultController extends Controller
{

    /**
     * Renders the index view for the module
     * @return string
     * @throws \yii\base\Exception
     */
    public function actionGenerateUser()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 1000; $i++) {
            $user = new User([
                'username' => $faker->name,
                'email' => $faker->email,
                'number' => $faker->phoneNumber,
                'region' => rand(1, 477),
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

        $dates= $faker->dateTimeBetween($startDate= 'now',$endDate='+2 month')->format('Y-m-d');


        for ($i = 0; $i < 5000; $i++) {
            $id_tech = rand(5,6000);
            $id_user = rand(5,6000);
            $total = rand(1,6000);
            $location = $faker->streetAddress;
            $description = $faker->text;
            $rent = new Rent([

                'id_tech'=> $id_tech,
                'id_user' => $id_user,
                'total' => $total,
                'location' => $location,
                'description' => $description,
                'created_at' => $time = time(),
                'updated_at' => $time,

            ]);
            $rent->save(false);
            $insert_id = Yii::$app->db->getLastInsertID();



            $date= new RentDate([
                'id_order'=>$insert_id,
                'id_tech'=>$id_tech,
                'date'=> $dates,
            ]);
            $date->save(false);



        }

    }

    public function actionGenerateEquipment()
    {
        $faker = \Faker\Factory::create();




        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 6000; $i++) {
            $model_aerial_platform = $faker->randomNumber(); $lifting_height = $faker->randomNumber(); $lifting_capacity_cradle = $faker->randomNumber(); $number_cradle = $faker->randomNumber();
            $model_truck_cranes = $faker->randomNumber(); $lifting_capacity = $faker->randomNumber(); $length_boom = $faker->randomNumber(); $boom_extension_length = $faker->randomNumber(); $maximum_reach_boom = $faker->randomNumber();
            $model_cranes_manipulators = $faker->randomNumber(); $car_load_capacity = $faker->randomNumber(); $boom_outreach = $faker->randomNumber(); $crane_lifting_capacity = $faker->randomNumber(); $dimensions_platform = $faker->randomNumber();
            $model_excavators = $faker->randomNumber();$bucket_capacity = $faker->randomNumber(); $radius_digging = $faker->randomNumber(); $kinematic_depth_digging = $faker->randomNumber();$discharge_height = $faker->randomNumber();
            $model_backhoe_loaders = $faker->randomNumber(); $bucket_capacity_excavator = $faker->randomNumber(); $digging_depth_excavator = $faker->randomNumber(); $bucket_capacity_loader = $faker->randomNumber(); $unloading_height_loader = $faker->randomNumber();
            $model_bulldozers = $faker->randomNumber(); $power_kwt = $faker->randomNumber(); $blade_width = $faker->randomNumber(); $blade_height = $faker->randomNumber(); $max_pulling_force = $faker->randomNumber();
            $model_hammers = $faker->randomNumber(); $hydraulic_breaker_brand = $faker->randomNumber(); $impact_energy = $faker->randomNumber(); $mass_hydraulic_breaker = $faker->randomNumber(); $hammer_beat_frequency = $faker->randomNumber();
            $model_concrete_pump = $faker->randomNumber(); $max_theoretical_produce = $faker->randomNumber(); $max_pressure_concrete = $faker->randomNumber(); $max_delivery_height = $faker->randomNumber(); $max_feed_range = $faker->randomNumber(); $pump_volume_concrete_mixer = $faker->randomNumber(); $width_car_expanded_form = $faker->randomNumber(); $height_working_condition = $faker->randomNumber();
            $model_front_loader = $faker->randomNumber(); $bucket_cutting_edge_width = $faker->randomNumber(); $front_loader_bucket_capacity = $faker->randomNumber(); $tipping_load = $faker->randomNumber(); $operating_weight = $faker->randomNumber(); $maximum_discharge_height = $faker->randomNumber();
            $model_truck_mixers = $faker->randomNumber(); $volume_concrete_mixer = $faker->randomNumber();
            $model_compressors = $faker->randomNumber(); $power_compressors = $faker->randomNumber();
            $model_generators = $faker->randomNumber(); $power_generators = $faker->randomNumber();
            $model_dumpers = $faker->randomNumber(); $dumpers_lifting_capacity = $faker->randomNumber(); $board_height = $faker->randomNumber(); $bead_length = $faker->randomNumber();
            $model_road_rollers = $faker->randomNumber(); $working_width = $faker->randomNumber();



            $array_aerial_platform = ['model_aerial_platform' => $model_aerial_platform, 'lifting_height' => $lifting_height, 'lifting_capacity_cradle' => $lifting_capacity_cradle, 'number_cradle' => $number_cradle];
            $array_truck_cranes = ['model_truck_cranes'=>$model_truck_cranes, 'lifting_capacity'=>$lifting_capacity, 'length_boom'=>$length_boom, 'boom_extension_length'=>$boom_extension_length, 'maximum_reach_boom'=>$maximum_reach_boom];
            $array_cranes_manipulators=[ 'model_cranes_manipulators'=>$model_cranes_manipulators, 'car_load_capacity'=>$car_load_capacity, 'boom_outreach'=>$boom_outreach, 'crane_lifting_capacity'=>$crane_lifting_capacity, 'dimensions_platform'=>$dimensions_platform];
            $array_excavators=['model_excavators'=>$model_excavators, 'bucket_capacity'=>$bucket_capacity, 'radius_digging'=>$radius_digging, 'kinematic_depth_digging'=>$kinematic_depth_digging, 'discharge_height'=>$discharge_height];
            $array_backhoe_loaders=['model_backhoe_loaders'=>$model_backhoe_loaders, 'bucket_capacity_excavator'=>$bucket_capacity_excavator, 'digging_depth_excavator'=>$digging_depth_excavator, 'bucket_capacity_loader'=>$bucket_capacity_loader, 'unloading_height_loader'=>$unloading_height_loader];
            $array_bulldozers=['model_bulldozers'=>$model_bulldozers, 'power_kwt'=>$power_kwt, 'blade_width'=>$blade_width, 'blade_height'=>$blade_height, 'max_pulling_force'=>$max_pulling_force];
            $array_hammers=['model_hammers'=>$model_hammers, 'hydraulic_breaker_brand'=>$hydraulic_breaker_brand, 'impact_energy'=>$impact_energy, 'mass_hydraulic_breaker'=>$mass_hydraulic_breaker, 'hammer_beat_frequency'=>$hammer_beat_frequency];
            $array_concrete_pump=['model_concrete_pump'=>$model_concrete_pump, 'max_theoretical_produce'=>$max_theoretical_produce, 'max_pressure_concrete'=>$max_pressure_concrete, 'max_delivery_height'=>$max_delivery_height, 'max_feed_range'=>$max_feed_range, 'pump_volume_concrete_mixer'=>$pump_volume_concrete_mixer, 'width_car_expanded_form'=>$width_car_expanded_form, 'height_working_condition'=>$height_working_condition];
            $array_front_loader=['model_front_loader'=>$model_front_loader, 'bucket_cutting_edge_width'=>$bucket_cutting_edge_width, 'front_loader_bucket_capacity'=>$front_loader_bucket_capacity, 'tipping_load'=>$tipping_load, 'operating_weight'=>$operating_weight, 'maximum_discharge_height'=>$maximum_discharge_height];
            $array_truck_mixers=['model_truck_mixers'=>$model_truck_mixers, 'volume_concrete_mixer'=>$volume_concrete_mixer];
            $array_compressors=['model_compressors'=>$model_compressors, 'power_compressors'=>$power_compressors];
            $array__generators=['model_generators'=>$model_generators, 'power_generators'=>$power_generators];
            $array_dumpers=['model_dumpers'=>$model_dumpers, 'dumpers_lifting_capacity'=>$dumpers_lifting_capacity, 'board_height'=>$board_height, 'bead_length'=>$bead_length];
            $array_road_rollers=['model_road_rollers'=>$model_road_rollers, 'working_width'=>$working_width];


            $array_all=['1'=>$array_aerial_platform,'2'=>$array_truck_cranes,'3'=>$array_cranes_manipulators,'4'=>$array_excavators,'5'=>$array_backhoe_loaders,
                '6'=>$array_bulldozers,'7'=>$array_hammers,'8'=>$array_concrete_pump,'9'=>$array_front_loader,'10'=>$array_truck_mixers,'11'=>$array_compressors,
                '12'=>$array__generators,'13'=>$array_dumpers,'14'=>$array_road_rollers];

            $author= rand(2,6000);
            $name = $faker->company;
            $picture = '47/52/242cb54ab7c26838a5578f4de9fd4a8221a1.jpg';
            $description = $faker->text(200);
            //$category = 10;
            $category = rand(1, 14);
            $price = rand(100, 10000);
            $min_order = rand(1, 8);
            $district = rand(28, 477);
            $height = rand(1000, 4000);
            $length = rand(1000, 4000);
            $width = rand(1000, 4000);
            $weight = rand(1000, 4000);
            $equipment = new EquipmentRent([
                'author_id' => $author,
                'name' => $name,
                'category' => $category,
                'filename' => $picture,
                'price' => $price,
                'min_order' => $min_order,
                'description' => $description,
                'district_id' => $district,
                'height' => $height,
                'length' => $length,
                'width' => $width,
                'weight' => $weight,
                'created_at' => $time = time(),
                'updated_at' => $time,

            ]);
            $equipment->save(false);

            $insert_id = Yii::$app->db->getLastInsertID();



            foreach ($array_all["$category"] as $key => $item) {

                $characteristics = new CharacteristicsTech();

                $characteristics->equipment_id = $insert_id;

                $characteristics->feature = $item;

                $characteristics->feature_id = $key;

                $characteristics->save(false);
            }
        }

    }


}
