<?php

namespace app\controllers;

use app\models\CuaHang;
use app\models\HoKinhDoanh;
use app\models\TkHkdNganhnghe;
use app\models\TkHkdPhuong;
use app\models\TkPhuongNn;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * HochamController implements the CRUD actions for HocHam model.
 */
class ThongkeController extends Controller
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

    public function actionTknganhnghe()
    {
//       DebugService::dumpdie(Yii::$app->basePath);
        $this->layout = "@app/views/layouts/main_chart";
        $hkd = CuaHang::find()->count();
        $tknganhnghe = TkHkdNganhnghe::find()->select('ten_loai,sl_hokinhdoanh')->asArray()->orderBy('ten_loai')->all();
        $tkphuong = TkHkdPhuong::find()->select('ten_phuong,sl_hokinhdoanh')->asArray()->orderBy('ten_phuong')->all();
        //  DebugService::dumpdie($tknganhnghe);


        return $this->render('tknganhnghe', [
            'hkd' => $hkd,
            // 'ptn' => $ptn,
            'tknganhnghe' => $tknganhnghe,
            'tkphuong' => $tkphuong,
            //  'tkcghh' => $tkcghh,
            //  'tkcghv' => $tkcghv,
            //  'taikhoan' => $taikhoan,
        ]);
    }

    public function actionTkphuong()
    {
//       DebugService::dumpdie(Yii::$app->basePath);
        $this->layout = "@app/views/layouts/main_chart";
        $hkd = CuaHang::find()->count();
        $tkbennghe = TkPhuongNn::find()->select('ten_phuong,ten_loai,sl_hokinhdoanh')->where("ten_phuong='Phường Bến Nghé'")->asArray()->orderBy('ten_loai')->all();


        $tkbenthanh = TkPhuongNn::find()->select('ten_phuong,ten_loai,sl_hokinhdoanh')->where("ten_phuong='Phường Bến Thành'")->asArray()->orderBy('ten_loai')->all();
        $tkcaukho = TkPhuongNn::find()->select('ten_phuong,ten_loai,sl_hokinhdoanh')->where("ten_phuong='Phường Cầu Kho'")->asArray()->orderBy('ten_loai')->all();
        $tkcaulanh = TkPhuongNn::find()->select('ten_phuong,ten_loai,sl_hokinhdoanh')->where("ten_phuong='Phường Cầu Ông Lãnh'")->asArray()->orderBy('ten_loai')->all();
        $tkcogiang = TkPhuongNn::find()->select('ten_phuong,ten_loai,sl_hokinhdoanh')->where("ten_phuong='Phường Cô Giang'")->asArray()->orderBy('ten_loai')->all();
        $tkdakao = TkPhuongNn::find()->select('ten_phuong,ten_loai,sl_hokinhdoanh')->where("ten_phuong='Phường Đa Kao'")->asArray()->orderBy('ten_loai')->all();
        $tkcutrinh = TkPhuongNn::find()->select('ten_phuong,ten_loai,sl_hokinhdoanh')->where("ten_phuong='Phường Nguyễn Cư Trinh'")->asArray()->orderBy('ten_loai')->all();
        $tkthaibinh = TkPhuongNn::find()->select('ten_phuong,ten_loai,sl_hokinhdoanh')->where("ten_phuong='Phường Nguyễn Thái Bình'")->asArray()->orderBy('ten_loai')->all();
        $tkngulao = TkPhuongNn::find()->select('ten_phuong,ten_loai,sl_hokinhdoanh')->where("ten_phuong='Phường Phạm Ngũ Lão'")->asArray()->orderBy('ten_loai')->all();
        $tktandinh = TkPhuongNn::find()->select('ten_phuong,ten_loai,sl_hokinhdoanh')->where("ten_phuong='Phường Tân Định'")->asArray()->orderBy('ten_loai')->all();

        return $this->render('tkphuong', [
            'hkd' => $hkd,
            'tkbennghe' => $tkbennghe,
            'tkbenthanh' => $tkbenthanh,
            'tkcaukho' => $tkcaukho,
            'tkcaulanh' => $tkcaulanh,
            'tkcogiang' => $tkcogiang,
            'tkdakao' => $tkdakao,
            'tkcutrinh' => $tkcutrinh,
            'tkthaibinh' => $tkthaibinh,
            'tkngulao' => $tkngulao,
            'tktandinh' => $tktandinh,
        ]);
    }

}
