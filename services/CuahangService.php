<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\services;

use app\models\VCuahang;
use yii\data\Pagination;
use function mb_strtoupper;

/**
 * Description of cuahangService
 *
 * @author TriLVH
 */
class CuahangService {
    public static function getListCuahangGeojson() {
        $listcuahang = VCuahang::find();
        $listcuahang->where('geo_x is not null and geo_y is not null');
        return $listcuahang->select(['id_cuahang as id', 'geo_x', 'geo_y', 'loaicuahang_id'])->asArray()->all();
    }

    public static function getCuahang($slug) {
        $model = VCuahang::find()->where(['id_cuahang' => $slug])->asArray()->one();
        return $model;
    }
    
    public static function getListCuahang($q=null) {
        $query = VCuahang::find();
        if ($q != null) {
            $q = mb_strtoupper($q, 'UTF-8');
            $query->orWhere(['like', 'upper(ten_donvi)', $q]);
            $query->orWhere(['like', 'upper(ten_cuahang)', $q]);
            $query->orWhere(['like', 'upper(nganh_kd)', $q]);
            $query->orWhere(['like', 'upper(so_nha)', $q]);
            $query->orWhere(['like', 'upper(ten_duong)', $q]);
            $query->orWhere(['like', 'upper(ten_phuong)', $q]);
            $query->orWhere(['like', 'upper(ma_nganh)', $q]);
           // $query->orWhere(['like', 'upper(ma_dn)', $q]);
          //  $query->orWhere(['like', 'upper(dien_thoai)', $q]);
            $query->orWhere(['like', 'upper(ten_loai)', $q]);
        }
        $countQuery = clone $query;
        $totalcount = $countQuery->count();
        $pages = new Pagination(['totalCount' => $totalcount]);
        $models = $query->offset($pages->offset)->limit($pages->limit)->asArray()->all();
        return ['pages' => $pages, 'models' => $models, 'totalcount' => $totalcount];
    }
}