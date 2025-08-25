<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Departments;

/**
 * DepartmentsSearch represents the model behind the search form of `backend\models\Departments`.
 */
class DepartmentsSearch extends Departments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at'], 'integer'],
            [['name', 'status', 'branch_id', 'company_id'], 'safe'],
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Departments::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('company');
        $query->joinWith('branch');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            // 'branch_id' => $this->branch_id,
            // 'company_id' => $this->company_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'companies.name', $this->company_id])
            ->andFilterWhere(['like', 'branches.name', $this->branch_id])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
