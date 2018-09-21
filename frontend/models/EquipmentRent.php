<?php

namespace frontend\models;

use Yii;
use frontend\components\Storage;

/**
 * This is the model class for table "equipment_rent".
 *
 * @property int $id
 * @property int $author_id
 * @property string $name
 * @property string $type
 * @property string $category
 * @property string $filename
 * @property int $views
 * @property string $price
 * @property string $min_order
 * @property string $description
 * @property string $region
 * @property string $district
 * @property string $height
 * @property string $length
 * @property string $width
 * @property string $weight
 * @property string $feature1
 * @property string $feature2
 * @property string $feature3
 * @property string $feature4
 * @property string $feature5
 * @property string $feature6
 * @property string $feature7
 * @property string $feature8
 * @property string $feature9
 * @property string $feature10
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $author
 */
class EquipmentRent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipment_rent';
    }

    /**
     * {@inheritdoc}
     */
    /*public function rules()
    {
        return [
            [['author_id', 'views', 'status', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'required'],
            [['name', 'type', 'category', 'filename', 'price', 'min_order', 'region', 'district', 'height', 'length', 'width', 'weight', 'feature1', 'feature2', 'feature3', 'feature4', 'feature5', 'feature6', 'feature7', 'feature8', 'feature9', 'feature10'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
        ];
    }*/

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'name' => 'Name',
            'type' => 'Type',
            'category' => 'Category',
            'filename' => 'Filename',
            'views' => 'Views',
            'price' => 'Price',
            'min_order' => 'Min Order',
            'description' => 'Description',
            'region' => 'Region',
            'district' => 'District',
            'height' => 'Height',
            'length' => 'Length',
            'width' => 'Width',
            'weight' => 'Weight',
            'feature1' => 'Feature1',
            'feature2' => 'Feature2',
            'feature3' => 'Feature3',
            'feature4' => 'Feature4',
            'feature5' => 'Feature5',
            'feature6' => 'Feature6',
            'feature7' => 'Feature7',
            'feature8' => 'Feature8',
            'feature9' => 'Feature9',
            'feature10' => 'Feature10',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    public function getImage()
    {
        return Yii::$app->storage->getFile($this->filename);
    }
}
