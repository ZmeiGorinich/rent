<?php

namespace frontend\modules\rent\models\forms;


use common\models\Rent;
use frontend\models\User;
use Yii;
use yii\base\Model;


class AddRent extends Model
{
    const SCENARIO_CREATE = 'create_rent';
    public $location, $description, $startDate, $finishDate;
    private $user, $id;

    public function scenarios()
    {
        return [
            self::SCENARIO_CREATE => [
                'location', 'description', 'id', 'startDate', 'finishDate'
            ]
        ];
    }

    public function rules()
    {
        return [
            [['location', 'startDate', 'finishDate'], 'required'],
            [['startDate', 'finishDate'], 'validateDateEmpty', 'skipOnEmpty' => false],
        ];
    }

    public function validateDateEmpty()
    {
        $start = strtotime($this->startDate);
        $finish = strtotime($this->finishDate);

        $rent = Yii::$app->db->createCommand("select count(*) from rent where id_tech = $this->id and
            ((date_start>=:start AND date_finish > :start AND date_start < :finish ) OR
            (date_finish>:start AND date_start < :start) OR
            (date_start < :start AND date_finish> :finish))
            ")->bindValues([':start' => $start, ':finish' => $finish])->queryScalar();
        if ($rent > 0) {
            $errorMsg = 'Занято';
            $this->addError('startDate', $errorMsg);
            $this->addError('finishDate', $errorMsg);
        }


    }

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function save()
    {
        if ($this->validate()) {
            $rent = new Rent();
            $rent->id_tech = $this->id;
            $rent->id_user = $this->user->getId();
            $rent->location = $this->location;
            $rent->total = '1000';
            $rent->date_start = strtotime($this->startDate);
            $rent->date_finish = strtotime($this->finishDate);
            $rent->created_at = time();
            $rent->updated_at = time();
            if ($rent->save(false)) {
                return true;
            }
        }
        return false;

    }


    public function setIdEquipment($idEquipment)
    {
        $this->id = $idEquipment;
    }
}