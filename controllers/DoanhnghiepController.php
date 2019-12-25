<?php

namespace app\controllers;

use app\models\ChiNhanh;
use app\models\DmLoaihinhdn;
use app\models\DmManganh;
use app\models\DoanhNghiep;
use app\models\DoanhNghiepSearch;
use app\models\FileUpload;
use app\models\GiaoThong;
use app\models\RanhPhuong;
use app\models\VDoanhnghiep;
use app\services\DebugService;
use app\services\UtilityService;
use Box\Spout\Common\Type;
use Box\Spout\Reader\ReaderFactory;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;
use function mb_strtoupper;

/**
 * DoanhnghiepController implements the CRUD actions for DoanhNghiep model.
 */
class DoanhnghiepController extends Controller {

    /**
     * Lists all DoanhNghiep models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new DoanhNghiepSearch();
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
        $model['search'] = new DoanhNghiepSearch();
        if ($request->isGet && $request->queryParams != null) {
            $params['DoanhNghiepSearch'] = $request->queryParams;
            $dataProvider = $model['search']->search($params);
        }
        if ($request->isPost) {
            $model['search']->load($request->post());
            if ($model['search']->ma_nganh == NULL && $model['search']->ten_dn == null && $model['search']->nguoi_daidien == NULL && $model['search']->nganh_kd == NULL && $model['search']->so_nha == NULL && $model['search']->ten_duong == NULL && $model['search']->ten_phuong == NULL && $model['search']->tu_ngay == NULL && $model['search']->den_ngay == NULL) {
                return $this->redirect(Yii::$app->urlManager->createUrl('doanhnghiep/timkiem'));
            }
            return $this->redirect(Yii::$app->urlManager->createUrl('doanhnghiep/timkiem') .
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
     * Displays a single DoanhNghiep model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $request = Yii::$app->request;
        $model['doanhnghiep'] = $this->findVModel($id);
        return $this->render('view', [
                    'model' => $model,
        ]);
    }

    /**
     * Finds the DoanhNghiep model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DoanhNghiep the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = DoanhNghiep::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the VDoanhNghiep model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DoanhNghiep the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findVModel($id) {
        if (($model = VDoanhnghiep::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionViewbando($id) {
        $request = Yii::$app->request;
        $model['doanhnghiep'] = $this->findVModel($id);

        return $this->renderAjax('view_bando', [
                    'model' => $model,
        ]);
    }

    /**
     * Creates a new DoanhNghiep model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $request = Yii::$app->request;
        $model['doanhnghiep'] = new DoanhNghiep();
        $model['dmmanganh'] = DmMaNganh::find()->orderBy('ten_nganh')->all();
        $model['loaihinhdn'] = DmLoaihinhdn::find()->orderBy('id_loaihinhdn')->all();
        $model['ranhphuong'] = RanhPhuong::find()->orderBy('tenphuong')->all();
        $model['giaothong'] = GiaoThong::find()->orderBy('ten_duong')->distinct()->all();
        if ($model['doanhnghiep']->load($request->post())) {
            if ($model['doanhnghiep']->ngay_thaydoi != null) {
                $model['doanhnghiep']->ngay_thaydoi = date('Y-m-d', strtotime($model['doanhnghiep']->ngay_thaydoi));
            }
            if ($model['doanhnghiep']->ngay_cap != null) {
                $model['doanhnghiep']->ngay_cap = date('Y-m-d', strtotime($model['doanhnghiep']->ngay_cap));
            }
            $model['doanhnghiep']->save();
            UtilityService::alert('hkd_create_success');
            return $this->redirect(Yii::$app->urlManager->createUrl('doanhnghiep/view') . '?id=' . $model['doanhnghiep']->id_doanhnghiep);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DoanhNghiep model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $request = Yii::$app->request;
        $post = $request->post();
        $model['doanhnghiep'] = $this->findModel($id);
        $model['toado'] = $this->findVModel($id);
        $model['dmmanganh'] = DmManganh::find()->orderBy('ten_nganh')->all();
        $model['loaihinhdn'] = DmLoaihinhdn::find()->orderBy('id_loaihinhdn')->all();
        $model['ranhphuong'] = RanhPhuong::find()->orderBy('tenphuong')->all();
        $model['giaothong'] = GiaoThong::find()->orderBy('ten_duong')->distinct()->all();
        if ($model['doanhnghiep']->load($request->post())) {
            if ($model['doanhnghiep']->ngay_thaydoi != null) {
                $model['doanhnghiep']->ngay_thaydoi = date('Y-m-d', strtotime($model['doanhnghiep']->ngay_thaydoi));
            }
            if ($model['doanhnghiep']->ngay_cap != null) {
                $model['doanhnghiep']->ngay_cap = date('Y-m-d', strtotime($model['doanhnghiep']->ngay_cap));
            }
            if ($post['ToaDo']['geo_x'] != null && $post['ToaDo']['geo_y'] != null) {
                $query = "update doanh_nghiep set geom = ST_GeomFromText('POINT(" . $post['ToaDo']['geo_x'] . " " . $post['ToaDo']['geo_y'] . ")') where id_doanhnghiep = " . $model['doanhnghiep']->id_doanhnghiep;
                $connection = Yii::$app->getDb();
                $command = $connection->createCommand($query);
                $command->query();
                $connection->close();
            }
            $model['doanhnghiep']->save();
            UtilityService::alert('hkd_update_success');
            return $this->redirect(['view', 'id' => $model['doanhnghiep']->id_doanhnghiep]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Delete an existing DoanhNghiep model.
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
     * Delete multiple existing DoanhNghiep model.
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

    public function actionReadexcel() {
        $searchModel = new DoanhNghiepSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new FileUpload();
        $countUp = 0;
        $countIn = 0;
        if (\Yii::$app->request->isPost) {
            //    date_default_timezone_set('Asia/Ho_chi_minh');
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->uploadFile();
            $inputFileName = \Yii::$app->basePath . '/uploads/file/import/' . $model->file->baseName . '.' . $model->file->extension;
            $reader = ReaderFactory::create(Type::XLSX); // for XLSX files
            $reader->setShouldFormatDates(true);
            $reader->open($inputFileName);
            $transaction = Yii::$app->db->beginTransaction();
            foreach ($reader->getSheetIterator() as $sheet) {
                if ($sheet->getName() == 'Tong') {
                     DebugService::dumpdie($sheet);
                    // work with sheet I want
                    foreach ($sheet->getRowIterator() as $i => $row) {
                        if ($i >= 2) {
                            try {
                                $doanhnghiep = DoanhNghiep::findOne(['upper(ma_dn)' => strval(mb_strtoupper($row[1]))]);
                                 
                                if ($doanhnghiep != NULL) {
                                     DebugService::dumpdie($row);
                                    $countUp++;
                                    $doanhnghiep->ten_dn = $row[1];
                                    $doanhnghiep->dia_chi = $row[2];
                                    $doanhnghiep->von_dieule = $row[3];
                                    $doanhnghiep->tinhtrang_hd = $row[4];
                                    $doanhnghiep->dien_thoai = $row[5];
                                    $doanhnghiep->email = $row[6];
                                    $doanhnghiep->nguoi_daidien = $row[7];
                                    if ($row[8] != "") {
                                        $doanhnghiep->ngay_sinh = date('Y-m-d', strtotime($row[8]));
                                    }
                                    $doanhnghiep->so_cmnd = $row[9];
                                    if ($row[10] != "") {
                                        $doanhnghiep->ngaycap_cmnd = date('Y-m-d', strtotime($row[10]));
                                    }
                                    $doanhnghiep->noicap_cmnd = $row[11];
                                    $doanhnghiep->nganhnghe_chinh = $row[12];
                                    if ($row[13] != "") {
                                        $doanhnghiep->ngay_cap = date('Y-m-d', strtotime($row[13]));
                                    }
                                    if ($row[14] != "") {
                                        $doanhnghiep->ngay_thaydoi = date('Y-m-d', strtotime($row[14]));
                                    }
                                    $doanhnghiep->so_laodong = $row[15];
                                    $doanhnghiep->thanh_vien = $row[16];
                                    $doanhnghiep->co_dong = $row[17];
                                    $doanhnghiep->save();
                                } elseif ($doanhnghiep == NULL) {
                                    $countIn++;
                                    $doanhnghiep = new DoanhNghiep();
                                    $doanhnghiep->ma_dn = $row[0];
                                    $doanhnghiep->ten_dn = $row[1];
                                    $doanhnghiep->dia_chi = $row[2];
                                    $doanhnghiep->von_dieule = $row[3];
                                    $doanhnghiep->tinhtrang_hd = $row[4];
                                    $doanhnghiep->dien_thoai = $row[5];
                                    $doanhnghiep->email = $row[6];
                                    $doanhnghiep->nguoi_daidien = $row[7];
                                    if ($row[8] != "") {
                                        $doanhnghiep->ngay_sinh = date('Y-m-d', strtotime($row[8]));
                                    }
                                    $doanhnghiep->so_cmnd = $row[9];
                                    if ($row[10] != "") {
                                        $doanhnghiep->ngaycap_cmnd = date('Y-m-d', strtotime($row[10]));
                                    }
                                    $doanhnghiep->noicap_cmnd = $row[11];
                                    $doanhnghiep->nganhnghe_chinh = $row[12];
                                    if ($row[13] != "") {
                                        $doanhnghiep->ngay_cap = date('Y-m-d', strtotime($row[13]));
                                    }
                                    if ($row[14] != "") {
                                        $doanhnghiep->ngay_thaydoi = date('Y-m-d', strtotime($row[14]));
                                    }
                                    if ($row[15] == 'Chi nhánh') {
                                        $doanhnghiep->loaihinhdn_id = 1;
                                    } elseif ($row[15] == 'Công ty cổ phần') {
                                        $doanhnghiep->loaihinhdn_id = 4;
                                    } elseif ($row[15] == 'Công ty trách nhiệm hữu hạn hai thành viên trở lên') {
                                        $doanhnghiep->loaihinhdn_id = 3;
                                    } elseif ($row[15] == 'Công ty trách nhiệm hữu hạn một thành viên') {
                                        $doanhnghiep->loaihinhdn_id = 2;
                                    } elseif ($row[15] == 'Địa điểm kinh doanh') {
                                        $doanhnghiep->loaihinhdn_id = 6;
                                    } elseif ($row[15] == 'Doanh nghiệp tư nhân') {
                                        $doanhnghiep->loaihinhdn_id = 5;
                                    } elseif ($row[15] == 'Văn phòng đại diện') {
                                        $doanhnghiep->loaihinhdn_id = 7;
                                    }
                                    $doanhnghiep->so_laodong = $row[16];
                                    $doanhnghiep->thanh_vien = $row[17];
                                    $doanhnghiep->co_dong = $row[18];

                                    $doanhnghiep->save();
                                }
                            } catch (Exception $e) {
                                DebugService::dumpdie('Lỗi dòng số: ' . $i);
                                $transaction->rollBack();
                            }
                        }
                    }
                    $reader->close();
                    UtilityService::alert('dn_import_success');
                    $transaction->commit();
                    return $this->render('readexcel', [
                                'model' => $model, 'countUp' => $countUp,
                                'countIn' => $countIn,
                                'searchModel' => $searchModel,
                                'dataProvider' => $dataProvider,
                    ]);
                }
            }
        }
        return $this->render('readexcel', [
                    'model' => $model, 'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionImportChinhanh() {
        $searchModel = new DoanhNghiepSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new FileUpload();
        $countUp = 0;
        $countIn = 0;
        if (\Yii::$app->request->isPost) {
            //    date_default_timezone_set('Asia/Ho_chi_minh');
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->uploadFile();
            $inputFileName = \Yii::$app->basePath . '/uploads/file/import/' . $model->file->baseName . '.' . $model->file->extension;
            $reader = ReaderFactory::create(Type::XLSX); // for XLSX files
            $reader->setShouldFormatDates(true);
            $reader->open($inputFileName);
            $transaction = Yii::$app->db->beginTransaction();
            foreach ($reader->getSheetIterator() as $sheet) {
                if ($sheet->getName() == 'Sheet1') {
                    // work with sheet I want
                    foreach ($sheet->getRowIterator() as $i => $row) {
                        if ($i >= 2) {
                            try {
                                $doanhnghiep = ChiNhanh::findOne(['upper(ma_dn)' => strval(mb_strtoupper($row[0]))]);
                                //  DebugService::dumpdie($row[17]);
                                if ($doanhnghiep != NULL) {
                                    $countUp++;
                                    $doanhnghiep->ten_dn = $row[1];
                                    $doanhnghiep->dia_chi = $row[2];
                                   // $doanhnghiep->von_dieule = $row[3];
                                    $doanhnghiep->tinhtrang_hd = $row[4];
                                    $doanhnghiep->dien_thoai = $row[5];
                                    $doanhnghiep->email = $row[6];
                                    $doanhnghiep->nguoi_daidien = $row[7];
//                                    if ($row[8] != "") {
//                                        $doanhnghiep->ngay_sinh = date('Y-m-d', strtotime($row[8]));
//                                    }
//                                    $doanhnghiep->so_cmnd = $row[9];
//                                    if ($row[10] != "") {
//                                        $doanhnghiep->ngaycap_cmnd = date('Y-m-d', strtotime($row[10]));
//                                    }
//                                    $doanhnghiep->noicap_cmnd = $row[11];
                                    $doanhnghiep->nganhnghe_chinh = $row[12];
                                    if ($row[13] != "") {
                                        $doanhnghiep->ngay_cap = date('Y-m-d', strtotime($row[13]));
                                    }
                                    if ($row[14] != "") {
                                        $doanhnghiep->ngay_thaydoi = date('Y-m-d', strtotime($row[14]));
                                    }
                                    $doanhnghiep->so_laodong = $row[15];
                                 //   $doanhnghiep->thanh_vien = $row[16];
                                 //   $doanhnghiep->co_dong = $row[17];
                                    $doanhnghiep->save();
                                } elseif ($doanhnghiep == NULL) {
                                    $countIn++;
                                    $doanhnghiep = new DoanhNghiep();
                                    $doanhnghiep->ten_dn = $row[1];
                                    $doanhnghiep->dia_chi = $row[2];
                                  //  $doanhnghiep->von_dieule = $row[3];
                                    $doanhnghiep->tinhtrang_hd = $row[4];
                                    $doanhnghiep->dien_thoai = $row[5];
                                    $doanhnghiep->email = $row[6];
                                    $doanhnghiep->nguoi_daidien = $row[7];
//                                    if ($row[8] != "") {
//                                        $doanhnghiep->ngay_sinh = date('Y-m-d', strtotime($row[8]));
//                                    }
//                                    $doanhnghiep->so_cmnd = $row[9];
//                                    if ($row[10] != "") {
//                                        $doanhnghiep->ngaycap_cmnd = date('Y-m-d', strtotime($row[10]));
//                                    }
                                 //   $doanhnghiep->noicap_cmnd = $row[11];
                                    $doanhnghiep->nganhnghe_chinh = $row[12];
                                    if ($row[13] != "") {
                                        $doanhnghiep->ngay_cap = date('Y-m-d', strtotime($row[13]));
                                    }
                                    if ($row[14] != "") {
                                        $doanhnghiep->ngay_thaydoi = date('Y-m-d', strtotime($row[14]));
                                    }
                                    if ($row[15] == 'Chi nhánh') {
                                        $doanhnghiep->loaihinhdn_id = 1;
                                    } elseif ($row[15] == 'Công ty cổ phần') {
                                        $doanhnghiep->loaihinhdn_id = 4;
                                    } elseif ($row[15] == 'Công ty trách nhiệm hữu hạn hai thành viên trở lên') {
                                        $doanhnghiep->loaihinhdn_id = 3;
                                    } elseif ($row[15] == 'Công ty trách nhiệm hữu hạn một thành viên') {
                                        $doanhnghiep->loaihinhdn_id = 2;
                                    } elseif ($row[15] == 'Địa điểm kinh doanh') {
                                        $doanhnghiep->loaihinhdn_id = 6;
                                    } elseif ($row[15] == 'Doanh nghiệp tư nhân') {
                                        $doanhnghiep->loaihinhdn_id = 5;
                                    } elseif ($row[15] == 'Văn phòng đại diện') {
                                        $doanhnghiep->loaihinhdn_id = 7;
                                    }
                                    $doanhnghiep->so_laodong = $row[16];
                                   // $doanhnghiep->thanh_vien = $row[17];
                                  //  $doanhnghiep->co_dong = $row[18];

                                    $doanhnghiep->save();
                                }
                            } catch (Exception $e) {
                                DebugService::dumpdie('Lỗi dòng số: ' . $i);
                                $transaction->rollBack();
                            }
                        }
                    }
                    $reader->close();
                    UtilityService::alert('dn_import_success');
                    $transaction->commit();
                    return $this->render('readexcel', [
                                'model' => $model, 'countUp' => $countUp,
                                'countIn' => $countIn,
                                'searchModel' => $searchModel,
                                'dataProvider' => $dataProvider,
                    ]);
                }
            }
        }
        return $this->render('readexcel', [
                    'model' => $model, 'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

}
