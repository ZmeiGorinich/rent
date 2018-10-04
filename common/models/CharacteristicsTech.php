<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "characteristics_tech".
 *
 * @property int $id
 * @property string $feature
 * @property int $equipment_id
 *
 * @property EquipmentRent $equipment
 */
class CharacteristicsTech extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'characteristics_tech';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['equipment_id'], 'integer'],
            [['feature'], 'string', 'max' => 255],
            [['equipment_id'], 'exist', 'skipOnError' => true, 'targetClass' => EquipmentRent::className(), 'targetAttribute' => ['equipment_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'feature' => 'Feature',
            'equipment_id' => 'Equipment ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment()
    {
        return $this->hasOne(EquipmentRent::className(), ['id' => 'equipment_id']);
    }
}
