<?php

namespace  frontend\modules\rent\models;

use Yii;

/**
 * This is the model class for table "category_rent".
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string $urlImg
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class CategoryRent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_rent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['type', 'name', 'urlImg'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'name' => 'Name',
            'urlImg' => 'Url Img',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
