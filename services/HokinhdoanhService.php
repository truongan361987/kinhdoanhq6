<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\services;

use app\models\VHokinhdoanh;
use yii\data\Pagination;

/**
 * Description of HokinhdoanhService
 *
 * @author TriLVH
 */
class HokinhdoanhService {
    public static function getListHoKinhdoanhGeojson() {
        $listHokinhdoanh = VHokinhdoanh::find();
        $listHokinhdoanh->where('geo_x is not null and geo_y is not null ');
        return $listHokinhdoanh->select(['id_hkd as id', 'geo_x', 'geo_y', 'nganh_kd'])->asArray()->all();
    }

    public static function getHokinhdoanh($slug) {
        $model = VHokinhdoanh::find()->where(['id_hkd' => $slug])->asArray()->one();
        return $model;
    }
    
    public static function getListHokinhdoanh($q=null) {
        $query = VHokinhdoanh::find();
        if ($q != null) {
            $q = mb_strtoupper($q, 'UTF-8');
            $query->orWhere(['like', 'upper(ten_hkd)', $q]);
            $query->orWhere(['like', 'upper(nguoi_daidien)', $q]);
            $query->orWhere(['like', 'upper(nganh_kd)', $q]);
            $query->orWhere(['like', 'upper(so_nha)', $q]);
            $query->orWhere(['like', 'upper(ten_duong)', $q]);
            $query->orWhere(['like', 'upper(ten_phuong)', $q]);
            $query->orWhere(['like', 'upper(ma_nganh)', $q]);
            $query->orWhere(['like', 'upper(giayphep_so)', $q]);
            $query->orWhere(['like', 'upper(dien_thoai)', $q]);
            $query->orWhere(['like', 'upper(so_cmnd)', $q]);
        }
        $countQuery = clone $query;
        $totalcount = $countQuery->count();
        $pages = new Pagination(['totalCount' => $totalcount]);
        $models = $query->offset($pages->offset)->limit($pages->limit)->asArray()->all();
        return ['pages' => $pages, 'models' => $models, 'totalcount' => $totalcount];
    }
}