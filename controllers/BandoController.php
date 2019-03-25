<?php

namespace app\controllers;

use app\services\CuahangService;
use app\services\DoanhnghiepService;
use app\services\HokinhdoanhService;
use app\services\PoiService;
use app\services\SecurityService;
use Yii;
use yii\db\Exception;
use yii\db\Query;
use yii\web\Controller;

/**
 * Description of BandoController
 *
 * @author TriLVH
 */
class BandoController extends base\AbstractKinhdoanhq6Controller {

    public function actionBando() {
        return $this->render("bando");
    }

    public function actionHokinhdoanhGeojson() {
        if (SecurityService::checkCurrentUserCanAccessGeojson()) {
            $list_hokinhdoanh = HokinhdoanhService::getListHoKinhdoanhGeojson();
            return json_encode($list_hokinhdoanh);
        }
        return json_encode(['errors' => ['Thao tác không cho phép']]);
    }

    public function actionDoanhnghiepGeojson() {
        if (SecurityService::checkCurrentUserCanAccessGeojson()) {
            $list_doanhnghiep = DoanhnghiepService::getListDoanhnghiepGeojson();
            return json_encode($list_doanhnghiep);
        }
        return json_encode(['errors' => ['Thao tác không cho phép']]);
    }

    public function actionCuahangGeojson() {
        if (SecurityService::checkCurrentUserCanAccessGeojson()) {
            $list_cuahang = CuahangService::getListCuahangGeojson();
            return json_encode($list_cuahang);
        }
        return json_encode(['errors' => ['Thao tác không cho phép']]);
    }

    public function actionListHokinhdoanh() {
        $models = [];
        $q = Yii::$app->request->get('q', null);
        if (SecurityService::checkCurrentUserCanAccessList()) {
            $models = HokinhdoanhService::getListHoKinhdoanh($q);
        }
        return $this->renderPartial("_list-hokinhdoanh", $models);
    }

    public function actionListDoanhnghiep() {
        $models = [];
        $q = Yii::$app->request->get('q', null);
        if (SecurityService::checkCurrentUserCanAccessList()) {
            $models = DoanhnghiepService::getListDoanhnghiep($q);
        }
        return $this->renderPartial("_list-doanhnghiep", $models);
    }

    public function actionListCuahang() {
        $models = [];
        $q = Yii::$app->request->get('q', null);
        if (SecurityService::checkCurrentUserCanAccessList()) {
            $models = CuahangService::getListCuahang($q);
        }
        return $this->renderPartial("_list-cuahang", $models);
    }

    public function actionHokinhdoanhGet() {
        $slug = Yii::$app->request->get('slug', null);
        if (SecurityService::checkCurrentUserCanAccessList()) {
            $model = HokinhdoanhService::getHoKinhdoanh($slug);
        }
        return $this->renderPartial("_item-hokinhdoanh", ["model" => $model]);
    }

    public function actionDoanhnghiepGet() {
        $slug = Yii::$app->request->get('slug', null);
        if (SecurityService::checkCurrentUserCanAccessList()) {
            $model = DoanhnghiepService::getDoanhnghiep($slug);
        }
        return $this->renderPartial("_item-doanhnghiep", ["model" => $model]);
    }

    public function actionCuahangGet() {
        $slug = Yii::$app->request->get('slug', null);
        if (SecurityService::checkCurrentUserCanAccessList()) {
            $model = CuahangService::getCuahang($slug);
        }
        return $this->renderPartial("_item-cuahang", ["model" => $model]);
    }

    public function actionHokinhdoanhIncircle() {
        $lat = Yii::$app->request->get('lat', null);
        $lng = Yii::$app->request->get('lng', null);
        $radius = Yii::$app->request->get('radius', null);
        $json = Yii::$app->request->get('json', null);
        try {
            if (is_numeric($lat) && is_numeric($lng) && is_numeric($radius)) {
                $sql_point = "st_transform(st_setsrid(st_makepoint($lng, $lat), 4326), 32648)";
                $sql_circle = "st_buffer($sql_point, $radius)";
                $sql_geom = "st_transform(st_setsrid(geom, 4326), 32648)";
                $sql_contains = "st_contains($sql_circle, $sql_geom)";
                $pois = PoiService::$ARRAY_POI;
                $count = [];
                foreach ($pois as $poi_name => $poi_title) {
                    $count[$poi_name] = ['count' => (new Query())->from($poi_name)->where($sql_contains)->count(), 'title' => $poi_title];
                }
                if (isset($json)) {
                    return json_encode(['data' => $count]);
                }
                return $this->renderPartial('table-count-incircle', ['data' => $count, 'params' => ['lat' => $lat, 'lng' => $lng, 'radius' => $radius]]);
            }
        } catch (Exception $e) {
              \app\services\DebugService::dumpdie($e);
        }
        return json_encode(['message' => 'not found']);
    }

    public function actionPoidetailIncircle() {
        $lat = Yii::$app->request->get('lat', null);
        $lng = Yii::$app->request->get('lng', null);
        $radius = Yii::$app->request->get('radius', null);
        $json = Yii::$app->request->get('json', null);
        $poi = Yii::$app->request->get('poi', null);
        $pois = PoiService::$ARRAY_POI;
        try {
            if (is_numeric($lat) && is_numeric($lng) && is_numeric($radius) && array_key_exists($poi, $pois)) {
                $sql_point = "st_transform(st_setsrid(st_makepoint($lng, $lat), 4326), 32648)";
                $sql_circle = "st_buffer($sql_point, $radius)";
                $sql_geom = "st_transform(st_setsrid(geom, 4326), 32648)";
                $sql_contains = "st_contains($sql_circle, $sql_geom)";
                $models = (new Query())->select(['*, st_x(geom) as geo_x, st_y(geom) as geo_y, ST_Distance(st_transform(st_setsrid(st_makepoint(' . $lng . ',' . $lat . '), 4326), 32648),st_transform(st_setsrid(geom, 4326),32648))  as dist'])->from($poi)->where($sql_contains)->all();
                //  \app\services\DebugService::dumpdie($models);
                if (isset($json)) {
                    return json_encode(['data' => $models]);
                }
                return $this->renderPartial('poidetail-incircle', ['data' => $models, 'params' => ['lat' => $lat, 'lng' => $lng, 'radius' => $radius, 'poi' => $poi]]);
            }
        } catch (Exception $e) {
            \app\services\DebugService::dumpdie($e);
        }
        return json_encode(['message' => 'not found']);
    }

}
