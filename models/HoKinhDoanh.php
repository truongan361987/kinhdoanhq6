<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ho_kinh_doanh".
 *
 * @property integer $id_hkd
 * @property string $ten_hkd
 * @property string $dien_thoai
 * @property string $fax
 * @property string $email
 * @property string $nganh_kd
 * @property string $website
 * @property string $von_kd
 * @property string $nguoi_daidien
 * @property string $dan_toc
 * @property string $ngay_sinh
 * @property integer $gioi_tinh
 * @property string $quoc_tich
 * @property string $so_cmnd
 * @property string $ngay_cap
 * @property string $noi_cap
 * @property string $hokhau_thuongtru
 * @property string $noisong_hientai
 * @property string $so_nha
 * @property string $ten_duong
 * @property string $ten_phuong
 * @property string $vi_tri
 * @property string $giayphep_so
 * @property string $geom
 * @property string $giayphep_ngay
 * @property string $ghi_chu
 * @property string $ma_thue
 * @property string $ma_nganh
 * @property string $loai_hoso
 */
class HoKinhDoanh extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'ho_kinh_doanh';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ten_hkd'], 'string'],
            [['nguoi_daidien'], 'required', 'message' => 'Tên người đại diện không để trống.'],
            [['email'], 'email', 'message' => 'Địa chỉ email không chính xác.'],
            [['dien_thoai', 'fax', 'nganh_kd', 'website', 'dan_toc', 'quoc_tich', 'so_cmnd', 'noi_cap', 'hokhau_thuongtru', 'noisong_hientai', 'so_nha', 'ten_duong', 'ten_phuong', 'vi_tri', 'giayphep_so', 'geom', 'ghi_chu', 'ma_thue', 'loai_hoso'], 'string'],
            [['von_kd'], 'number'],
            [['ngay_sinh', 'ngay_cap', 'giayphep_ngay'], 'safe'],
            [['gioi_tinh'], 'integer'],
            [['ma_nganh'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_hkd' => 'Id Hkd',
            'ten_hkd' => 'Tên hộ kinh doanh',
            'dien_thoai' => 'Số diện thoại',
            'fax' => 'Số Fax',
            'email' => 'Email',
            'nganh_kd' => 'Ngành, nghề kinh doanh',
            'website' => 'Website',
            'von_kd' => 'Vốn kinh doanh',
            'nguoi_daidien' => 'Người đại diện',
            'dan_toc' => 'Dân tộc',
            'ngay_sinh' => 'Ngày sinh',
            'gioi_tinh' => 'Giới tính',
            'quoc_tich' => 'Quốc tịch',
            'so_cmnd' => 'Số chứng minh nhân dân',
            'ngay_cap' => 'Ngày cấp CMND',
            'noi_cap' => 'Nơi cấp CMND',
            'hokhau_thuongtru' => 'Hộ khẩu thường trú',
            'noisong_hientai' => 'Chổ ở hiện tại',
            'so_nha' => 'Số nhà',
            'ten_duong' => 'Tên đường',
            'ten_phuong' => 'Tên phường',
            'vi_tri' => 'Vị trí gian hàng',
            'giayphep_so' => 'Số giấy phép ĐKKD',
            'geom' => 'Toạ độ',
            'giayphep_ngay' => 'Ngày đăng ký giấy phép',
            'ghi_chu' => 'Ghi chú',
            'ma_thue' => 'Mã số thuế',
            'ma_nganh' => 'Mã ngành',
            'loai_hoso' => 'Loại hồ sơ',
        ];
    }

}
