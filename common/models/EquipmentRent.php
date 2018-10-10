<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "equipment_rent".
 *
 * @property int $id
 * @property int $author_id
 * @property string $name
 * @property string $type
 * @property int $category
 * @property string $filename
 * @property int $views
 * @property int $price
 * @property string $min_order
 * @property string $description
 * @property int $district_id
 * @property int $height
 * @property int $length
 * @property int $width
 * @property int $weight
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $id_characteristics
 *
 * @property CharacteristicsTech[] $characteristicsTeches
 * @property User $author
 * @property District $district
 * @property CategoryEquipment $category0
 * @property Rent[] $rents
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

//    /**
//     * {@inheritdoc}
//     */
//    public function rules()
//    {
//        return [
//            [['author_id', 'category', 'views', 'price', 'district_id', 'height', 'length', 'width', 'weight', 'status', 'created_at', 'updated_at', 'id_characteristics'], 'integer'],
//            [['description'], 'string'],
//            [['created_at', 'updated_at'], 'required'],
//            [['name', 'type', 'filename', 'min_order'], 'string', 'max' => 255],
//            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
//            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['district_id' => 'id']],
//            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => CategoryEquipment::className(), 'targetAttribute' => ['category' => 'id']],
//        ];
//    }

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
            'district_id' => 'District ID',
            'height' => 'Height',
            'length' => 'Length',
            'width' => 'Width',
            'weight' => 'Weight',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'id_characteristics' => 'Id Characteristics',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacteristicsTeches()
    {
        return $this->hasMany(CharacteristicsTech::className(), ['equipment_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['id' => 'district_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(CategoryEquipment::className(), ['id' => 'category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRents()
    {
        return $this->hasMany(Rent::className(), ['id_tech' => 'id']);
    }
}