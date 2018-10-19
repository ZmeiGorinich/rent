<?php

namespace backend\modules\rent\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EquipmentRent;

/**
 * SearchEquipment represents the model behind the search form of `common\models\EquipmentRent`.
 */
class SearchEquipment extends EquipmentRent
{
    public $country_id,$region_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'author_id', 'category', 'views', 'price', 'district_id', 'height', 'length', 'width', 'weight', 'status', 'created_at', 'updated_at',], 'integer'],
            [['name', 'type', 'filename', 'min_order', 'description', 'region_id', 'country_id',], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = EquipmentRent::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'author_id' => $this->author_id,
            'category' => $this->category,
            'views' => $this->views,
            'price' => $this->price,
            'district_id' => $this->district_id,
            'height' => $this->height,
            'length' => $this->length,
            'width' => $this->width,
            'weight' => $this->weight,
            //'status' => $this->status,
            //'10' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'type', $this->type])

            ->andFilterWhere(['like', 'filename', $this->filename])
            ->andFilterWhere(['like', 'min_order', $this->min_order])
            ->andFilterWhere(['like', 'status', '10'])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
