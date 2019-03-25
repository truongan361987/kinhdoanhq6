<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\services;

use app\models\VChinhanh;
use yii\data\Pagination;
use function mb_strtoupper;

/**
 * Description of ChinhanhService
 *
 * @author TriLVH
 */
class ChinhanhService {
    public static function getListChinhanhGeojson() {
        $listChinhanh = VChinhanh::find();
        $listChinhanh->where('geo_x is not null and geo_y is not null');
        return $listChinhanh->select(['id_chinhanh as id', 'geo_x', 'geo_y', 'nganh_kd'])->asArray()->all();
    }

    public static function getChinhanh($slug) {
        $model = VChinhanh::find()->where(['id_chinhanh' => $slug])->asArray()->one();
        return $model;
    }
    
    public static function getListChinhanh($q=null) {
        $query = VChinhanh::find();
        if ($q != null) {
            $q = mb_strtoupper($q, 'UTF-8');
            $query->orWhere(['like', 'upper(ten_dn)', $q]);
            $query->orWhere(['like', 'upper(nguoi_daidien)', $q]);
            $query->orWhere(['like', 'upper(nganh_kd)', $q]);
            $query->orWhere(['like', 'upper(so_nha)', $q]);
            $query->orWhere(['like', 'upper(ten_duong)', $q]);
            $query->orWhere(['like', 'upper(ten_phuong)', $q]);
            $query->orWhere(['like', 'upper(ma_nganh)', $q]);
            $query->orWhere(['like', 'upper(ma_dn)', $q]);
            $query->orWhere(['like', 'upper(dien_thoai)', $q]);
            $query->orWhere(['like', 'upper(ten_loai)', $q]);
        }
        $countQuery = clone $query;
        $totalcount = $countQuery->count();
        $pages = new Pagination(['totalCount' => $totalcount]);
        $models = $query->offset($pages->offset)->limit($pages->limit)->asArray()->all();
        return ['pages' => $pages, 'models' => $models, 'totalcount' => $totalcount];
    }
}