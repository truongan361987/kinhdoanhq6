<?php

namespace app\models;

use app\services\DebugService;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HoKinhDoanh;

/**
 * HoKinhDoanhSearch represents the model behind the search form about `app\models\HoKinhDoanh`.
 */
class HoKinhDoanhSearch extends HoKinhDoanh {

    /**
     * @inheritdoc
     */
    public $tu_ngay;
    public $den_ngay;

    public function rules() {
        return [
            [['id_hkd', 'von_kd', 'ma_nganh', 'gioi_tinh'], 'integer'],
            [['tu_ngay', 'den_ngay'], 'safe'],
            [['ten_hkd', 'dien_thoai', 'fax', 'email', 'nganh_kd', 'website', 'nguoi_daidien', 'dan_toc', 'ngay_sinh', 'quoc_tich', 'so_cmnd', 'ngay_cap', 'noi_cap', 'hokhau_thuongtru', 'noisong_hientai', 'so_nha', 'ten_duong', 'ten_phuong', 'vi_tri', 'giayphep_so', 'ghi_chu', 'geom', 'giayphep_ngay'], 'safe'],
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
        $query = HoKinhDoanh::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 30,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id_hkd' => SORT_DESC
                ]
            ]
        ]);

        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_hkd' => $this->id_hkd,
            'von_kd' => $this->von_kd,
            'ngay_sinh' => $this->ngay_sinh,
            'ngay_cap' => $this->ngay_cap,
            'giayphep_ngay' => $this->giayphep_ngay,
            'gioi_tinh' => $this->gioi_tinh,
        ]);

        $query->andFilterWhere(['like', 'upper(ten_hkd)', mb_strtoupper($this->ten_hkd)])
                ->andFilterWhere(['like', 'upper(dien_thoai)', mb_strtoupper($this->dien_thoai)])
                ->andFilterWhere(['like', 'upper(fax)', mb_strtoupper($this->fax)])
                ->andFilterWhere(['like', 'upper(email)', mb_strtoupper($this->email)])
                ->andFilterWhere(['like', 'upper(nganh_kd)', mb_strtoupper($this->nganh_kd)])
                ->andFilterWhere(['like', 'upper(ma_nganh)', mb_strtoupper($this->ma_nganh)])
                ->andFilterWhere(['like', 'upper(website)', mb_strtoupper($this->website)])
                ->andFilterWhere(['like', 'upper(nguoi_daidien)', mb_strtoupper($this->nguoi_daidien)])
                ->andFilterWhere(['like', 'upper(dan_toc)', mb_strtoupper($this->dan_toc)])
                ->andFilterWhere(['like', 'upper(quoc_tich)', mb_strtoupper($this->quoc_tich)])
                ->andFilterWhere(['like', 'upper(so_cmnd)', mb_strtoupper($this->so_cmnd)])
                ->andFilterWhere(['like', 'upper(noi_cap)', mb_strtoupper($this->noi_cap)])
                ->andFilterWhere(['like', 'upper(hokhau_thuongtru)', mb_strtoupper($this->hokhau_thuongtru)])
                ->andFilterWhere(['like', 'upper(noisong_hientai)', mb_strtoupper($this->noisong_hientai)])
                ->andFilterWhere(['like', 'upper(so_nha)', mb_strtoupper($this->so_nha)])
                ->andFilterWhere(['like', 'upper(ten_duong)', mb_strtoupper($this->ten_duong)])
                ->andFilterWhere(['like', 'upper(ten_phuong)', mb_strtoupper($this->ten_phuong)])
                ->andFilterWhere(['like', 'upper(vi_tri)', mb_strtoupper($this->vi_tri)])
                ->andFilterWhere(['like', 'upper(giayphep_so)', mb_strtoupper($this->giayphep_so)])
                ->andFilterWhere(['like', 'upper(ghi_chu)', mb_strtoupper($this->ghi_chu)]);
        if ($this->tu_ngay != null && $this->den_ngay != null) {
            $query->andWhere("giayphep_ngay between '" . date('Y-m-d', strtotime(str_replace('/', '-', $this->tu_ngay))) . "' and '" . date('Y-m-d', strtotime(str_replace('/', '-', $this->den_ngay))) . "'");
        }
        return $dataProvider;
    }

}
