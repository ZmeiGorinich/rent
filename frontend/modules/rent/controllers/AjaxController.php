<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 19.10.2018
 * Time: 20:30
 */

namespace frontend\modules\rent\controllers;

use common\models\CategoryEquipment;
use common\models\District;
use common\models\Region;
use yii\web\Controller;


class AjaxController extends Controller
{

    public function actionGetRegion($id)
    {
        $countRegion = Region::find()
            ->where(['country_id' => $id])
            ->count();
        $regions = Region::find()
            ->where(['country_id' => $id])
            ->orderBy('name ASC')
            ->all();
        if ($countRegion > 0) {
            echo "<option value>выбрать...</option>";
            foreach ($regions as $region) {
                echo "<option value='" . $region->id . "'>$region->name</option>";
            }
        } else {
            echo "<option value> - </option>";
        }
    }

    public function actionGetDistrict($id)
    {

        $countDistrict = District::find()
            ->where(['region_id' => $id])
            ->count();
        $districts = District::find()
            ->where(['region_id' => $id])
            ->orderBy('name ASC')
            ->all();
        if ($countDistrict > 0) {
            echo "<option value>выбрать...</option>";
            foreach ($districts as $district) {
                echo "<option value='" . $district->id . "'>$district->name</option>";
            }
        } else {
            echo "<option value> - </option>";
        }
    }


    public function actionGetCategory($id)
    {

        $countCategory = CategoryEquipment::find()
            ->where(['type_id' => $id])
            ->count();
        $categories = CategoryEquipment::find()
            ->where(['type_id' => $id])
            ->orderBy('name ASC')
            ->all();
        if ($countCategory > 0) {
            echo "<option value>выбрать...</option>";
            foreach ($categories as $category) {
                echo "<option value='" . $category->id . "'>$category->name</option>";
            }
        } else {
            echo "<option value> - </option>";
        }
    }


    public function actionGetTypeCategory($typeID, $categoryID = 0)
    {
        $countCategory = CategoryEquipment::find()
            ->where(['type_id' => $typeID])
            ->count();
        $categories = CategoryEquipment::find()
            ->where(['type_id' => $typeID])
            ->orderBy('name ASC')
            ->all();

        if ($countCategory > 0) {
            echo "<option value>выбрать...</option>";
            foreach ($categories as $category) {
                if ($categoryID > 0 && $category->id == $categoryID) {
                    echo "<option value='" . $category->id . "'selected>$category->name</option>";
                } else {
                    echo "<option value='" . $category->id . "'>$category->name</option>";
                }
            }
        } else {
            echo "<option value> - </option>";
        }


    }


    public function actionGetCountryRegion($countryID = 0, $regionID = 0)
    {
        $countRegion = Region::find()
            ->where(['country_id' => $countryID])
            ->count();
        $regions = Region::find()
            ->where(['country_id' => $countryID])
            ->orderBy('name ASC')
            ->all();

        if ($countRegion > 0) {
            echo "<option value>выбрать...</option>";
            foreach ($regions as $region) {
                if ($regionID > 0 && $region->id == $regionID) {
                    echo "<option value='" . $region->id . "'selected>$region->name</option>";
                } else {
                    echo "<option value='" . $region->id . "'>$region->name</option>";
                }
            }
        } else {
            echo "<option value> - </option>";
        }


    }

    public function actionGetRegionDistrict($regionID = 0, $districtID = 0)
    {

        $countDistrict = District::find()
            ->where(['region_id' => $regionID])
            ->count();
        $districts = District::find()
            ->where(['region_id' => $regionID])
            ->orderBy('name ASC')
            ->all();
        if ($countDistrict > 0) {
            echo "<option value>выбрать...</option>";
            foreach ($districts as $district) {
                //echo "<option value='" . $district->id . "'>$district->name</option>";
                if ($districtID > 0 && $district->id == $districtID) {
                    echo "<option value='" . $district->id . "'selected>$district->name</option>";
                } else {
                    echo "<option value='" . $district->id . "'>$district->name</option>";
                }
            }
        } else {
            echo "<option value> - </option>";
        }
    }
}