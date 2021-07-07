<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Thing;

/**
 * GuidesSearch represents the model behind the search form about `common\models\Guide`.
 */
class ThingSearch extends Thing
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_rent'], 'integer'],
            [['name', 'img'], 'string'],
            [['cat', 'parent_cat', 'user'], 'safe'],
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
        $query = Thing::find();

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
            'is_rent' => $this->is_rent,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->joinWith(['users' => function ($q) {
            $q->where('user.fio LIKE "%' . $this->user . '%" ');
        }]);
        $query->joinWith(['category' => function ($q) {
            $q->where('cats_thing.name LIKE "%' . $this->cat . '%" ');
        }]);
        return $dataProvider;
    }
}

