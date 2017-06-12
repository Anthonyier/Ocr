<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ordenesdeanalisis;

/**
 * OrdenesdeanalisisSearch represents the model behind the search form about `app\models\Ordenesdeanalisis`.
 */
class OrdenesdeanalisisSearch extends Ordenesdeanalisis
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idord', 'idhist'], 'integer'],
            [['imagen', 'nombre'], 'safe'],
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
        $query = Ordenesdeanalisis::find();

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
            'idord' => $this->idord,
            'idhist' => $this->idhist,
        ]);

        $query->andFilterWhere(['like', 'imagen', $this->imagen])
            ->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
