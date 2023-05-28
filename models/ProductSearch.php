<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class ProductSearch extends Model
{
    public $title;
    public $status;

    public function rules()
    {
        return [
            [['title', 'status'], 'safe']
        ];
    }

    public function search($params)
    {
        $query = Product::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'title', $this->title])->andFilterWhere(['=', 'status', $this->status]);

        return $dataProvider;
    }
}
