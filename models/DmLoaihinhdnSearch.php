<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DmLoaihinhdn;

/**
 * DmLoaihinhdnSearch represents the model behind the search form about `app\models\DmLoaihinhdn`.
 */
class DmLoaihinhdnSearch extends DmLoaihinhdn
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_loaihinhdn'], 'integer'],
            [['ten_loai', 'ghi_chu'], 'safe'],
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
        $query = DmLoaihinhdn::find();

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
            'id_loaihinhdn' => $this->id_loaihinhdn,
        ]);

        $query->andFilterWhere(['like', 'upper(ten_loai)', mb_strtoupper($this->ten_loai)])
            ->andFilterWhere(['like', 'upper(ghi_chu)', mb_strtoupper($this->ghi_chu)]);

        return $dataProvider;
    }
}
