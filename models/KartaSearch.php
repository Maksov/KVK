<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Karta;

/**
 * KartaSearch represents the model behind the search form about `app\models\Karta`.
 */
class KartaSearch extends Karta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_operation', 'id_organization'], 'integer'],
            [['person', 'period_operation', 'person_control', 'name_procedure', 'event', 'method', 'kind', 'period_control', 'date_create', 'date_edit'], 'safe'],
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
        $query = Karta::find();

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
            'id_operation' => $this->id_operation,
            'id_organization' => $this->id_organization,
            'date_create' => $this->date_create,
            'date_edit' => $this->date_edit,
        ]);

        $query->andFilterWhere(['like', 'person', $this->person])
            ->andFilterWhere(['like', 'period_operation', $this->period_operation])
            ->andFilterWhere(['like', 'person_control', $this->person_control])
            ->andFilterWhere(['like', 'name_procedure', $this->name_procedure])
            ->andFilterWhere(['like', 'event', $this->event])
            ->andFilterWhere(['like', 'method', $this->method])
            ->andFilterWhere(['like', 'kind', $this->kind])
            ->andFilterWhere(['like', 'period_control', $this->period_control]);

        return $dataProvider;
    }
}
