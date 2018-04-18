<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Jadwal;

/**
 * JadwalSearch represents the model behind the search form of `app\models\Jadwal`.
 */
class JadwalSearch extends Jadwal
{
    # variable relasi matkul
    public $matkul;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_matkul', 'nim', 'hari', 'mulai', 'selesai','matkul'], 'safe'],
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

        ## QUERY INNER JOIN BAWAAN YII
        # BACA DI DOKUMENTASI LENGKAPPPPP
        $query = Jadwal::find()->innerJoinWith('matkul', true);

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
              'pageSize' => 7,
            ],
            ]);

        # tambah fungsi sorting relasi matkul
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

        // filter WHERE
        $query->andFilterWhere([
            'id' => $this->id,
            'mulai' => $this->mulai,
            'selesai' => $this->selesai,
        ]);

        # filtet WHERE LIKE
        $query->andFilterWhere(['like', 'id_matkul', $this->id_matkul]);
        $query->andFilterWhere(['like', 'nim', $this->nim]);
        $query->andFilterWhere(['like', 'hari', $this->hari]);

        # fungsi untuk SEARCH relasi matkul
        $query->andFilterWhere(['like', 'nama_mata_kuliah', $this->matkul]);

        return $dataProvider;
    }
}
