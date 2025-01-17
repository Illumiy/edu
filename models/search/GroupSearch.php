<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Group;

/**
 * GroupSearch represents the model behind the search form of `app\models\Group`.
 */
class GroupSearch extends Group
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'p_id', 'author_id','educational_organization_id'], 'integer'],
            [['title', 'year_begin', 'year_end'], 'safe'],
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
        $query = Group::find();

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
            'year_begin' => $this->year_begin,
            'year_end' => $this->year_end,
            'p_id' => $this->p_id,
            'author_id' => $this->author_id,
            'educational_organization_id' => $this->educational_organization_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
