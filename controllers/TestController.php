<?php

namespace app\controllers;

use app\models\HoKinhDoanh;
use app\services\UtilityService;
use Yii;
use yii\httpclient\Client;
use yii\web\Controller;

/**
 * HochamController implements the CRUD actions for HocHam model.
 */
class TestController extends Controller {

    public function actionCreate() {

        $client = new Client(['requestConfig' => [
                'format' => Client::FORMAT_JSON
            ],
            'responseConfig' => [
                'format' => Client::FORMAT_JSON
            ],]);
        $username = 'lienthonghshc.q6';
        $password = '123';
        $response = $client->createRequest()
                ->setMethod('GET')
                ->setUrl('http://q6.neoegov.vn/ui-04-portlet/api/secure/jsonws/giaycndkkd/get-list-gcndkkd?count=500')
//            ->headers
//            ->set('Authorization', )
                ->setHeaders(['Authorization' => 'Basic ' . base64_encode("$username:$password")])
                ->send();

        $data = $response->getData();

        $insertCnt = 0;
        $updateCnt = 0;
        foreach ($data as $insert) {
            $model = HoKinhDoanh::findOne(['giayphep_so' => $insert['soGiayPhepDKKD']]);
            if ($model == NULL) {
                $model = new HoKinhDoanh();
                if ($insert['gioiTinh'] = 'Nam') {
                    $model->gioi_tinh = 1;
                } else if ($insert['gioiTinh'] = 'Nữ') {
                    $model->gioi_tinh = 0;
                }
                $model->quoc_tich = $insert['quocTich'];
                $model->ngay_cap = date('Y-m-d', strtotime(str_replace('/', '-', $insert['ngayCapCMND'])));
                $model->nganh_kd = $insert['nganhNgheKinhDoanh'];
                $model->noi_cap = $insert['noiCapCMND'];
                $model->noisong_hientai = $insert['diaChiTamTru'];
                $model->ten_hkd = $insert['tenHoKinhDoanh'];
                $model->von_kd = $insert['vonKinhDoanh'];
                $model->loai_hoso = $insert['phanLoaiHoSo'];
                $model->so_cmnd = $insert['soCMND'];
                $model->ma_nganh = $insert['maNganh'];
                $model->dan_toc = $insert['danToc'];
                $model->dien_thoai = $insert['soDienThoai'];
                $model->ngay_sinh = date('Y-m-d', strtotime(str_replace('/', '-', $insert['ngaySinh'])));
                $model->hokhau_thuongtru = $insert['diaChiThuongTru'];
                $model->nguoi_daidien = $insert['nguoiDaiDien'];
                $model->vi_tri = $insert['diaDiemKinhDoanh'];
                $model->giayphep_ngay = date('Y-m-d', strtotime(str_replace('/', '-', $insert['ngayDangKyGiayPhep'])));
                $model->giayphep_so = $insert['soGiayPhepDKKD'];
                $model->isNewRecord = true;
                $model->save();
                $insertCnt ++;
            } else if ($model != NULL) {
                if ($insert['gioiTinh'] = 'Nam') {
                    $model->gioi_tinh = 1;
                } else if ($insert['gioiTinh'] = 'Nữ') {
                    $model->gioi_tinh = 0;
                }
                $model->quoc_tich = $insert['quocTich'];
                $model->ngay_cap = date('Y-m-d', strtotime(str_replace('/', '-', $insert['ngayCapCMND'])));
                $model->nganh_kd = $insert['nganhNgheKinhDoanh'];
                $model->noi_cap = $insert['noiCapCMND'];
                $model->noisong_hientai = $insert['diaChiTamTru'];
                $model->ten_hkd = $insert['tenHoKinhDoanh'];
                $model->von_kd = $insert['vonKinhDoanh'];
                $model->loai_hoso = $insert['phanLoaiHoSo'];
                $model->so_cmnd = $insert['soCMND'];
                $model->ma_nganh = $insert['maNganh'];
                $model->dan_toc = $insert['danToc'];
                $model->dien_thoai = $insert['soDienThoai'];
                $model->ngay_sinh = date('Y-m-d', strtotime(str_replace('/', '-', $insert['ngaySinh'])));
                $model->hokhau_thuongtru = $insert['diaChiThuongTru'];
                $model->nguoi_daidien = $insert['nguoiDaiDien'];
                $model->vi_tri = $insert['diaDiemKinhDoanh'];
                $model->giayphep_ngay = date('Y-m-d', strtotime(str_replace('/', '-', $insert['ngayDangKyGiayPhep'])));
                $model->save();
                $updateCnt ++;
            }
        }
        return json_encode(array($updateCnt, $insertCnt));
    }

    public function actionIndex() {

        return $this->render('test');
    }

    public function actionCheck() {

        $client = new Client(['requestConfig' => [
                'format' => Client::FORMAT_JSON
            ],
            'responseConfig' => [
                'format' => Client::FORMAT_JSON
            ],]);
        $username = 'lienthonghshc.q6';
        $password = '123';
        $response = $client->createRequest()
                ->setMethod('GET')
                ->setUrl('http://q6.neoegov.vn/ui-04-portlet/api/secure/jsonws/giaycndkkd/get-list-gcndkkd?count=1')
//            ->headers
//            ->set('Authorization', )
                ->setHeaders(['Authorization' => 'Basic ' . base64_encode("$username:$password")])
                ->send();

        $data = $response->getData();
        if ($data != NULL) {
            return 1;
        } else {
            return 0;
        }
    }

}
