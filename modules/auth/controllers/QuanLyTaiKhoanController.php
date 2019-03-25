<?php
/**
 * Created by PhpStorm.
 * User: Duc
 * Date: 8/26/2018
 * Time: 12:21 AM
 */

namespace app\modules\auth\controllers;

use app\models\auth\Taikhoan;
use app\services\DebugService;
use app\services\UtilityService;
use yii\web\Controller;

class QuanLyTaiKhoanController extends Controller
{

    public function actionDanhSach()
    {
        $this->layout = "@app/views/layouts/main";

        $request = \Yii::$app->request;
        $model['danhsachtaikhoan'] = Taikhoan::find()->joinWith('taikhoanInfos')->where(['status' => 1])->all();
//        DebugService::dumpdie(Yii::$app->user->id);
        if ($request->isPost && $model['tai-khoan']->load($request->post()) && $model['tai-khoan']->save()) {
            $model['flash'] = UtilityService::alert('updated');
            return $this->redirect(\Yii::$app->urlManager->createUrl('thong-tin-ca-nhan'));
        }

        return $this->render('danh-sach', [
            'model' => $model
        ]);
    }

    public function actionCreate()
    {
        $request = \Yii::$app->request;
        $model['taikhoan'] = new Taikhoan();
        
        if ($request->isPost && $model['taikhoan']->load($request->post())) {
           DebugService::dumpdie($request->post());
            $model['taikhoan']->save();
            return $this->redirect(['danh-sach']);
        }

        return $this->renderPartial('create', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id = null)
    {
        $request = \Yii::$app->request;
        $model['taikhoan'] = Taikhoan::findOne($id);

        if ($request->isPost && $model['taikhoan']->load($request->post())) {
            $model['taikhoan']->save();
            return $this->redirect(['danh-sach']);
        }

        return $this->renderPartial('update', [
            'model' => $model
        ]);
    }
}