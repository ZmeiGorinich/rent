<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "new_table".
 *
 * @property int $idnew_table
 * @property string $new_tablecol
 * @property string $new_tablecol1
 * @property string $new_tablecol2
 */
class NewTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'new_table';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idnew_table'], 'required'],
            [['idnew_table'], 'integer'],
            [['new_tablecol', 'new_tablecol1', 'new_tablecol2'], 'string', 'max' => 45],
            [['idnew_table'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idnew_table' => 'Idnew Table',
            'new_tablecol' => 'New Tablecol',
            'new_tablecol1' => 'New Tablecol1',
            'new_tablecol2' => 'New Tablecol2',
        ];
    }
}
