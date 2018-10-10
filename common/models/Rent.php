<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rent".
 *
 * @property int $id_order
 * @property int $id_tech
 * @property int $id_user
 * @property int $total
 * @property string $location
 * @property string $description
 * @property int $created_at
 * @property int $updated_at
 *
 * @property EquipmentRent $tech
 * @property User $user
 * @property RentDate[] $rentDates
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
            [['id_tech', 'id_user', 'total', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'required'],
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
            'total' => 'Total',
            'location' => 'Location',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRentDates()
    {
        return $this->hasMany(RentDate::className(), ['id_order' => 'id_order']);
    }
}
