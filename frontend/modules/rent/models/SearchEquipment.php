<?php

namespace frontend\modules\rent\models;

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
            [['id', 'author_id',  'views', 'price',  'height', 'length', 'width', 'weight',  'created_at', 'updated_at',], 'integer'],
            [['name', 'type', 'filename', 'min_order', 'description', 'region_id', 'country_id','district_id','category','status',], 'safe'],
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
        $query = EquipmentRent::find()->joinWith('district');

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
            'category' => $this->category,
            'price' => $this->price,
            'district_id' => $this->district_id,
            //'status' => $this->status,

        ]);

        $query
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'equipment_rent.status', '20'])
            ->andFilterWhere(['like', 'district_id', $this->district_id])
            ->andFilterWhere(['like', 'district.country_id', $this->country_id])
            ->andFilterWhere(['like', 'district.region_id', $this->region_id]);
        return $dataProvider;
    }
}
