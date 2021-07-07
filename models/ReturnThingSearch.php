<?php

namespace app\models;
use yii\data\ActiveDataProvider;
use yii\base\Model;

/**
 * PagesSearch represents the model behind the search form of `common\models\Page`.
 */
class ReturnThingSearch extends ReturnThing
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['return_value', 'seen', 'user_id', 'returned', 'created_at'], 'integer'],
            [['things_ids', 'address'], 'string', 'max' => 255],
            [['return_time', 'price'], 'safe'],
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
        $query = ReturnThing::find();

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
            'user_id' => $this->user_id,
            'price' => $this->price,
            'returned' => $this->returned,
        ]);

        $query->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'address', $this->address])
            //->andFilterWhere(['like', 'returned', $this->returned])

        ;

        return $dataProvider;
    }
}




