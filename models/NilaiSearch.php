<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Nilai;

/**
 * NilaiSearch represents the model behind the search form of `app\models\Nilai`.
 */
class NilaiSearch extends Nilai
{
    public $matkul;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nim', 'nilai'], 'integer'],
            [['mata_kuliah','matkul'], 'safe'],
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
        $query = Nilai::find()->innerJoinWith('matkul', true);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['matkul'] = [
            'asc' => ['nama_mata_kuliah' => SORT_ASC],
            'desc' => ['nama_mata_kuliah' => SORT_DESC],
        ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'nim' => $this->nim,
            'nilai' => $this->nilai,
        ]);

        $query->andFilterWhere(['like', 'mata_kuliah', $this->mata_kuliah]);
        $query->andFilterWhere(['like', 'nama_mata_kuliah', $this->matkul]);

        return $dataProvider;
    }
}
