<?php

namespace kouosl\slider\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use kouosl\slider\models\Slide;

/**
 * SlideSearch represents the model behind the search form of `kouosl\slider\models\Slide`.
 */
class SlideSearch extends Slide
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'slideId'], 'integer'],
            [['imageContent', 'caption', 'updated_at', 'created_at'], 'safe'],
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
        $query = Slide::find();

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
            'slideId' => $this->slideId,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'imageContent', $this->imageContent])
            ->andFilterWhere(['like', 'caption', $this->caption]);

        return $dataProvider;
    }
}
