<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Team;

/**
 * TeamSearch represents the model behind the search form about `common\models\Team`.
 */
class TeamSearch extends Team
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['image', 'name_en', 'name_ru', 'name_am', 'sname_en', 'sname_ru', 'sname_am', 'created_date', 'updated_date', 'position_en', 'position_ru', 'position_am'], 'safe'],
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
        $query = Team::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'name_ru', $this->name_ru])
            ->andFilterWhere(['like', 'name_am', $this->name_am])
            ->andFilterWhere(['like', 'sname_en', $this->sname_en])
            ->andFilterWhere(['like', 'sname_ru', $this->sname_ru])
            ->andFilterWhere(['like', 'sname_am', $this->sname_am])
            ->andFilterWhere(['like', 'position_en', $this->position_en])
            ->andFilterWhere(['like', 'position_ru', $this->position_ru])
            ->andFilterWhere(['like', 'position_am', $this->position_am]);

        return $dataProvider;
    }
}
