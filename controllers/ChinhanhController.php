<?php

namespace app\controllers;

use app\models\ChiNhanh;
use app\models\ChiNhanhSearch;
use app\models\DmLoaihinhdn;
use app\models\DmManganh;
use app\models\DoanhNghiep;
use app\models\GiaoThong;
use app\models\RanhPhuong;
use app\models\VChinhanh;
use app\services\UtilityService;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * ChinhanhController implements the CRUD actions for ChiNhanh model.
 */
class ChinhanhController extends Controller {

    /**
     * Lists all ChiNhanh models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ChiNhanhSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTimkiem() {
        $request = Yii::$app->request;
        $dataProvider = NULL;
        $model['dmmanganh'] = DmMaNganh::find()->orderBy('ten_nganh')->all();
        $model['ranhphuong'] = RanhPhuong::find()->orderBy('tenphuong')->all();
        $model['loaihinhdn'] = DmLoaihinhdn::find()->orderBy('id_loaihinhdn')->all();
        $model['giaothong'] = GiaoThong::find()->orderBy('ten_duong')->distinct()->all();
        $model['search'] = new ChiNhanhSearch();
        if ($request->isGet && $request->queryParams != null) {
            $params['ChiNhanhSearch'] = $request->queryParams;
            $dataProvider = $model['search']->search($params);
        }
        if ($request->isPost) {
            $model['search']->load($request->post());
            if ($model['search']->ma_nganh == NULL && $model['search']->ten_dn == null && $model['search']->nguoi_daidien == NULL && $model['search']->nganh_kd == NULL && $model['search']->so_nha == NULL && $model['search']->ten_duong == NULL && $model['search']->ten_phuong == NULL && $model['search']->tu_ngay == NULL && $model['search']->den_ngay == NULL) {
                return $this->redirect(Yii::$app->urlManager->createUrl('chinhanh/timkiem'));
            }
            return $this->redirect(Yii::$app->urlManager->createUrl('chinhanh/timkiem') .
                            '?nguoi_daidien=' . $model['search']->nguoi_daidien .
                            '&ma_nganh=' . $model['search']->ma_nganh .
                            '&nganh_kd=' . $model['search']->nganh_kd .
                            '&so_nha=' . $model['search']->so_nha .
                            '&ten_duong=' . $model['search']->ten_duong .
                            '&ten_phuong=' . $model['search']->ten_phuong .
                            '&tu_ngay=' . $model['search']->tu_ngay .
                            '&den_ngay=' . $model['search']->den_ngay .
                            '&ten_dn=' . $model['search']->ten_dn
            );
        }
        return $this->render('timkiem', [
                    'model' => $model,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ChiNhanh model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $request = Yii::$app->request;
        $model['chinhanh'] = $this->findVModel($id);
        return $this->render('view', [
                    'model' => $model,
        ]);
    }

    /**
     * Finds the ChiNhanh model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ChiNhanh the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = ChiNhanh::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the VChiNhanh model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ChiNhanh the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findVModel($id) {
        if (($model = VChinhanh::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionViewbando($id) {
        $request = Yii::$app->request;
        $model['chinhanh'] = $this->findVModel($id);

        return $this->renderAjax('view_bando', [
                    'model' => $model,
        ]);
    }

    /**
     * Creates a new ChiNhanh model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $request = Yii::$app->request;
        $model['chinhanh'] = new ChiNhanh();
        $model['dmmanganh'] = DmMaNganh::find()->orderBy('ten_nganh')->all();
        $model['loaihinhdn'] = DmLoaihinhdn::find()->orderBy('id_loaihinhdn')->all();
        $model['ranhphuong'] = RanhPhuong::find()->orderBy('tenphuong')->all();
        $model['giaothong'] = GiaoThong::find()->orderBy('ten_duong')->distinct()->all();
        if ($model['chinhanh']->load($request->post())) {
            if ($model['chinhanh']->ngay_thaydoi != null) {
                $model['chinhanh']->ngay_thaydoi = date('Y-m-d', strtotime($model['chinhanh']->ngay_thaydoi));
            }
            if ($model['chinhanh']->ngay_cap != null) {
                $model['chinhanh']->ngay_cap = date('Y-m-d', strtotime($model['chinhanh']->ngay_cap));
            }
            $model['chinhanh']->save();
            UtilityService::alert('hkd_create_success');
            return $this->redirect(Yii::$app->urlManager->createUrl('chinhanh/view') . '?id=' . $model['chinhanh']->id_chinhanh);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ChiNhanh model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $request = Yii::$app->request;
        $post = $request->post();
        $model['chinhanh'] = $this->findModel($id);
        $model['toado'] = $this->findVModel($id);
        $model['dmmanganh'] = DmManganh::find()->orderBy('ten_nganh')->all();
        $model['loaihinhdn'] = DmLoaihinhdn::find()->orderBy('id_loaihinhdn')->all();
        $model['ranhphuong'] = RanhPhuong::find()->orderBy('tenphuong')->all();
        $model['giaothong'] = GiaoThong::find()->orderBy('ten_duong')->distinct()->all();
        if ($model['chinhanh']->load($request->post())) {
            if ($model['chinhanh']->ngay_thaydoi != null) {
                $model['chinhanh']->ngay_thaydoi = date('Y-m-d', strtotime($model['chinhanh']->ngay_thaydoi));
            }
            if ($model['chinhanh']->ngay_cap != null) {
                $model['chinhanh']->ngay_cap = date('Y-m-d', strtotime($model['chinhanh']->ngay_cap));
            }
            if ($post['ToaDo']['geo_x'] != null && $post['ToaDo']['geo_y'] != null) {
                $query = "update chi_nhanh set geom = ST_GeomFromText('POINT(" . $post['ToaDo']['geo_x'] . " " . $post['ToaDo']['geo_y'] . ")') where id_chinhanh = " . $model['chinhanh']->id_chinhanh;
                $connection = Yii::$app->getDb();
                $command = $connection->createCommand($query);
                $command->query();
                $connection->close();
            }
            $model['chinhanh']->save();
            UtilityService::alert('hkd_update_success');
            return $this->redirect(['view', 'id' => $model['chinhanh']->id_chinhanh]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Delete an existing ChiNhanh model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
             *   Process for non-ajax request
             */
            return $this->redirect(['index']);
        }
    }

    /**
     * Delete multiple existing ChiNhanh model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete() {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
             *   Process for non-ajax request
             */
            return $this->redirect(['index']);
        }
    }

    public function actionGet($q = null, $id = null) {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = DmMaNganh::find();
            $sqlWhere = "ma_nganh like '%' || '$q' || '%'";
//            DebugService::dumpdie($query->select("id_canhan AS id, concat(ho_ten, ' - ', NULL, dm_donvi.ten_donvi) AS text")->where($sqlWhere)->andWhere(['canhan.status' => 1]));
            $out['results'] = $query->select('ma_nganh AS id, manganh_daydu AS text')->where($sqlWhere)->asArray()->all();
        }

        return $out;
    }

    public function actionGetdn($q = null, $id = null) {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $query = DoanhNghiep::find();
            $sqlWhere = "ma_dn like '%' || '$q' || '%'";
//            DebugService::dumpdie($query->select("id_canhan AS id, concat(ho_ten, ' - ', NULL, dm_donvi.ten_donvi) AS text")->where($sqlWhere)->andWhere(['canhan.status' => 1]));
            $out['results'] = $query->select('id_doanhnghiep AS id, ten_dn AS text')->where($sqlWhere)->asArray()->all();
        }

        return $out;
    }

}
