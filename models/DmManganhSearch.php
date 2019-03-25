<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DmMaNganh;

/**
 * DmManganhSearch represents the model behind the search form about `app\models\DmMaNganh`.
 */
class DmManganhSearch extends DmMaNganh
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_manganh', 'stt', 'so_cap'], 'integer'],
            [['ma_nganh', 'ten_nganh', 'nganh_cap_tren', 'donvi_tructhuoc', 'ma_nganh_ktqd', 'ma_nganh_goc'], 'safe'],
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
        $query = DmMaNganh::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 30,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_manganh' => $this->id_manganh,
            'stt' => $this->stt,
            'so_cap' => $this->so_cap,
        ]);

        $query->andFilterWhere(['like', 'upper(ma_nganh)', mb_strtoupper($this->ma_nganh)])
            ->andFilterWhere(['like', 'upper(ten_nganh)', mb_strtoupper($this->ten_nganh)])
            ->andFilterWhere(['like', 'upper(nganh_cap_tren)', mb_strtoupper($this->nganh_cap_tren)])
            ->andFilterWhere(['like', 'upper(donvi_tructhuoc)', mb_strtoupper($this->donvi_tructhuoc)])
            ->andFilterWhere(['like', 'upper(ma_nganh_ktqd)', mb_strtoupper($this->ma_nganh_ktqd)])
            ->andFilterWhere(['like', 'upper(ma_nganh_goc)', mb_strtoupper($this->ma_nganh_goc)]);

        return $dataProvider;
    }
}
