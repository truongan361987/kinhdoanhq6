<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CuaHang;

/**
 * CuaHangSearch represents the model behind the search form about `app\models\CuaHang`.
 */
class CuaHangSearch extends CuaHang {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id_cuahang', 'loaicuahang_id'], 'integer'],
            [['ten_donvi', 'ten_cuahang', 'so_nha', 'ten_duong', 'ten_phuong', 'so_sap', 'ten_cho', 'nam_hoatdong', 'nganh_kd', 'ma_nganh', 'ghi_chu', 'geom', 'tinh_trang'], 'safe'],
            [['dien_tich'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = VCuahang::find();

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
            'id_cuahang' => $this->id_cuahang,
            'dien_tich' => $this->dien_tich,
            'loaicuahang_id' => $this->loaicuahang_id,
        ]);

        $query->andFilterWhere(['like', 'upper(ten_donvi)', mb_strtoupper($this->ten_donvi)])
                ->andFilterWhere(['like', 'upper(ten_cuahang)', mb_strtoupper($this->ten_cuahang)])
                ->andFilterWhere(['like', 'upper(so_nha)', mb_strtoupper($this->so_nha)])
                ->andFilterWhere(['=', 'upper(ten_duong)', mb_strtoupper($this->ten_duong)])
                ->andFilterWhere(['=', 'upper(ten_phuong)', mb_strtoupper($this->ten_phuong)])
                ->andFilterWhere(['=', 'upper(tinh_trang)', mb_strtoupper($this->tinh_trang)])
                ->andFilterWhere(['like', 'upper(so_sap)', mb_strtoupper($this->so_sap)])
                ->andFilterWhere(['like', 'upper(ten_cho)', mb_strtoupper($this->ten_cho)])
                ->andFilterWhere(['like', 'upper(nam_hoatdong)', mb_strtoupper($this->nam_hoatdong)])
                ->andFilterWhere(['like', 'upper(nganh_kd)', mb_strtoupper($this->nganh_kd)])
                ->andFilterWhere(['like', 'upper(ma_nganh)', mb_strtoupper($this->ma_nganh)])
                ->andFilterWhere(['like', 'upper(ghi_chu)', mb_strtoupper($this->ghi_chu)])
                ->andFilterWhere(['like', 'upper(geom)', mb_strtoupper($this->geom)]);

        return $dataProvider;
    }

}
