<?php

namespace app\controllers;

use app\models\RanhPhuong;
use app\models\ThongtinVipham;
use app\models\ThongtinViphamSearch;
use app\models\VHokdVipham;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * ThongtinviphamController implements the CRUD actions for VHokdVipham model.
 */
class ThongtinviphamController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all VHokdVipham models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ThongtinViphamSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTimkiem()
    {
        $request = Yii::$app->request;
        $dataProvider = NULL;
        $model['search'] = new ThongtinViphamSearch();
        $model['ranhphuong'] = RanhPhuong::find()->orderBy('tenphuong')->all();
        if ($request->isGet && $request->queryParams != null) {
            $params['ThongtinViphamSearch'] = $request->queryParams;
            $dataProvider = $model['search']->search($params);
        }
        if ($request->isPost) {
            //  \app\services\DebugService::dumpdie($request->post());
            $model['search']->load($request->post());
            if ($model['search']->quyetdinh_so == NULL && $model['search']->dai_dien == NULL && $model['search']->quyetdinh_ngay == NULL && $model['search']->so_nha == NULL && $model['search']->ten_duong == NULL && $model['search']->ten_phuong == NULL && $model['search']->tu_ngay == NULL && $model['search']->den_ngay == NULL) {
                return $this->redirect(Yii::$app->urlManager->createUrl('thongtinvipham/timkiem'));
            }
            return $this->redirect(Yii::$app->urlManager->createUrl('thongtinvipham/timkiem') .
                '?dai_dien=' . $model['search']->dai_dien .
                '&quyetdinh_so=' . $model['search']->quyetdinh_so .
                '&quyetdinh_ngay=' . $model['search']->quyetdinh_ngay .
                '&so_nha=' . $model['search']->so_nha .
                '&ten_duong=' . $model['search']->ten_duong .
                '&ten_phuong=' . $model['search']->ten_phuong .
                '&tu_ngay=' . $model['search']->tu_ngay .
                '&den_ngay=' . $model['search']->den_ngay
            );
        }
        return $this->render('timkiem', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VHokdVipham model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "<b>Thông tin vi phạm</b>",
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-right', 'data-dismiss' => "modal"]) .
                    Html::a('Cập nhật', ['update', 'id' => $id], ['class' => 'btn btn-warning pull-left', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Finds the VHokdVipham model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VHokdVipham the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ThongtinVipham::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new VHokdVipham model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new ThongtinVipham();

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "<b>Thêm mới thông tin vi phạm</b>",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-right', 'data-dismiss' => "modal"]) .
                        Html::button('Thêm mới', ['class' => 'btn btn-success pull-left', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "<b>Thêm mới thông tin vi phạm</b>",
                    'content' => '<span class="text-success">Thêm mới VHokdVipham thành công</span>',
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-right', 'data-dismiss' => "modal"]) .
                        Html::a('Tiếp tục thêm mới', ['create'], ['class' => 'btn btn-success pull-left', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "<b>Thêm mới thông tin vi phạm</b>",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-right', 'data-dismiss' => "modal"]) .
                        Html::button('Thêm mới', ['class' => 'btn btn-success pull-left', 'type' => "submit"])
                ];
            }
        } else {
            /*
             *   Process for non-ajax request
             */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_ttvp]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Updates an existing VHokdVipham model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "<b>Cập nhật VHokdVipham</b>",
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-right', 'data-dismiss' => "modal"]) .
                        Html::button('Cập nhật', ['class' => 'btn btn-warning pull-left', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "<b>Thông tin vi phạm</b>",
                    'content' => $this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-right', 'data-dismiss' => "modal"]) .
                        Html::a('Cập nhật', ['update', 'id' => $id], ['class' => 'btn btn-warning pull-left', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "<b>Thông tin vi phạm</b>",
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-right', 'data-dismiss' => "modal"]) .
                        Html::button('Cập nhật', ['class' => 'btn btn-warning pull-left', 'type' => "submit"])
                ];
            }
        } else {
            /*
             *   Process for non-ajax request
             */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_ttvp]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing VHokdVipham model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if ($request->isAjax) {
            /*
             *   Process for ajax request
             */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "<b>Xóa thông tin vi phạm</b>",
                    'content' => $this->renderAjax('delete', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-right', 'data-dismiss' => "modal"]) .
                        Html::button('Xóa', ['class' => 'btn btn-danger pull-left', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Xóa thông tin vi phạm",
                    'content' => '<span class="text-danger">Xóa thành công!</span>',
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-right', 'data-dismiss' => "modal"])
                ];
            } else {
                return [
                    'title' => "Xoá thông tin vi phạm",
                    'content' => $this->renderAjax('delete', [
                        'model' => $model,
                    ]),
                    'footer' => Html::button('Đóng', ['class' => 'btn btn-default pull-right', 'data-dismiss' => "modal"]) .
                        Html::button('Xóa', ['class' => 'btn btn-danger pull-left', 'type' => "submit"])
                ];
            }
        } else {
            /*
             *   Process for non-ajax request
             */
            return $this->redirect(['index']);
        }
    }

    /**
     * Delete multiple existing VHokdVipham model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkDelete()
    {
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

}
