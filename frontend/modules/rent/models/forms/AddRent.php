<?php

namespace frontend\modules\rent\models\forms;


use common\models\Rent;
use common\models\RentDate;
use frontend\models\User;
use Yii;
use yii\base\Model;


class AddRent extends Model
{
    const SCENARIO_CREATE = 'create_rent';
    public $date, $location, $description;
    private $user, $id;

    public function scenarios()
    {
        return [
            self::SCENARIO_CREATE => [
                'date', 'location', 'description','id'
            ]
        ];
    }

    public function rules()
    {
        return [
            [['date', 'location'], 'required'],
        ];
    }

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function save()
    {
        if ($this->validate()) {
            $this->date= $this->getData();

            $rent = new Rent();

            $rent->id_tech = $this->id;
            $rent->id_user = $this->user->getId();

            $rent->location = $this->location;
            $rent->description = $this->description;

            $rent->created_at = time();
            $rent->updated_at = time();

            $rent->save(false);


            $insert_id = Yii::$app->db->getLastInsertID();


            foreach ($this->date as $item) {

                $rentDate = new RentDate();
                $rentDate->id_tech = $this->id;
                $rentDate->id_order = $insert_id;
                $rentDate->date = $item;
                $rentDate->save();
            }

        }


        return $rentDate->save(false);
    }


    public function getData()
    {
        $arrayDate = array();
        $string = $this->date;

        $array = explode(",", $string);
        foreach ($array as $item) {
            $dates = date("Y.m.d", strtotime($item));
            array_push($arrayDate, "$dates");
        }
        return $this->date = $arrayDate;

    }

    public function setIdEquipment($idEquipment)
    {
        $this->id = $idEquipment;
    }
}