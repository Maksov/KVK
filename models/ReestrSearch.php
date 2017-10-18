<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reestr;

/**
 * ReestrSearch represents the model behind the search form about `app\models\Reestr`.
 */
class ReestrSearch extends Reestr
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code_v', 'point_v', 'name_v', 'risk1', 'risk2', 'risk3', 'risk4', 'risk5'], 'safe'],
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
        $query = Reestr::find();

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
        $query->andFilterWhere(['like', 'code_v', $this->code_v])
            ->andFilterWhere(['like', 'point_v', $this->point_v])
            ->andFilterWhere(['like', 'name_v', $this->name_v]);

        return $dataProvider;
    }
}
