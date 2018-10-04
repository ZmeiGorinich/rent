<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rent".
 *
 * @property int $id_order
 * @property int $id_tech
 * @property int $id_user
 * @property string $date_issue
 * @property string $return_date
 * @property int $total
 * @property string $location
 *
 * @property EquipmentRent $tech
 * @property User $user
 */
class Rent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tech', 'id_user', 'total'], 'integer'],
            [['date_issue', 'return_date'], 'safe'],
            [['location'], 'string', 'max' => 255],
            [['id_tech'], 'exist', 'skipOnError' => true, 'targetClass' => EquipmentRent::className(), 'targetAttribute' => ['id_tech' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_order' => 'Id Order',
            'id_tech' => 'Id Tech',
            'id_user' => 'Id User',
            'date_issue' => 'Date Issue',
            'return_date' => 'Return Date',
            'total' => 'Total',
            'location' => 'Location',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTech()
    {
        return $this->hasOne(EquipmentRent::className(), ['id' => 'id_tech']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
