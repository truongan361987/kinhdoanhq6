<?php
/**
 * Created by PhpStorm.
 * User: Duc
 * Date: 8/26/2018
 * Time: 12:21 AM
 */
namespace app\modules\maps\controllers;

use app\services\MapService;
use app\services\SecurityService;
use yii\web\Controller;

class MapController extends Controller
{
    public function actionBanDo(){
        $this->layout = "@app/views/layouts/user/main_user";
        return $this->render('index');
    }

    public function actionGeojson() {

        if (SecurityService::checkCurrentUserCanAccessPhongthinghiemGeojson()) {
            $list = MapService::getListGeojson();
            return json_encode($list);
        }
        return json_encode(['errors' => ['Thao tác không cho phép']]);
    }

    public function actionListItems() {

        $models = [];
        $q = \Yii::$app->request->get('q', null);
        if (SecurityService::checkCurrentUserCanAccessListPhongthinghiem()) {
            $models = MapService::getListItems($q);
        }
        return $this->renderPartial("_list-items", $models);
    }

    public function actionItemGet() {

        $slug = \Yii::$app->request->get('slug', null);
        if (SecurityService::checkCurrentUserCanAccessListPhongthinghiem()) {
            $model = MapService::getItem($slug);
        }
        return $this->renderPartial("_detail-item", ["models" => $model]);
    }




    public function actionPhongthinghiemGeojson() {

        if (SecurityService::checkCurrentUserCanAccessPhongthinghiemGeojson()) {
            $list_Phongthinghiem = MapService::getListPhongthinghiemGeojson();
            return json_encode($list_Phongthinghiem);
        }
        return json_encode(['errors' => ['Thao tác không cho phép']]);
    }

    public function actionListPhongthinghiem() {

        $models = [];
        $q = \Yii::$app->request->get('q', null);
        if (SecurityService::checkCurrentUserCanAccessListPhongthinghiem()) {
            $models = MapService::getListPhongthinghiem($q);
        }
        return $this->renderPartial("_list-item", $models);
    }

    public function actionPhongthinghiemGet() {

        $slug = \Yii::$app->request->get('slug', null);
        if (SecurityService::checkCurrentUserCanAccessListPhongthinghiem()) {
            $model = MapService::getPhongthinghiem($slug);
        }
        return $this->renderPartial("_detail-item", ["models" => $model]);
    }
}