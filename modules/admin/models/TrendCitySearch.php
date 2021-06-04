<?php

namespace app\modules\admin\models;

use app\models\TrendCity;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * GuidesSearch represents the model behind the search form about `common\models\Guide`.
 */
class TrendCitySearch extends TrendCity
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
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
        $query = TrendCity::find();

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
        ]);

        $query->andFilterWhere(['like', 'city', $this->city]);

        return $dataProvider;
    }
}
