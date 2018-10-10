<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rent_date".
 *
 * @property int $id
 * @property int $id_order
 * @property int $id_tech
 * @property string $date
 *
 * @property Rent $order
 */
class RentDate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rent_date';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_order', 'id_tech'], 'integer'],
            [['date'], 'safe'],
            [['id_order'], 'exist', 'skipOnError' => true, 'targetClass' => Rent::className(), 'targetAttribute' => ['id_order' => 'id_order']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_order' => 'Id Order',
            'id_tech' => 'Id Tech',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Rent::className(), ['id_order' => 'id_order']);
    }
}
