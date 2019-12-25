<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doanh_nghiep".
 *
 * @property integer $id_doanhnghiep
 * @property string $ten_dn
 * @property integer $loaihinhdn_id
 * @property string $so_nha
 * @property string $ten_duong
 * @property string $ten_phuong
 * @property string $von_dieule
 * @property string $dien_thoai
 * @property string $nguoi_daidien
 * @property string $nganh_kd
 * @property string $ngay_cap
 * @property string $ngay_thaydoi
 * @property string $geom
 * @property string $ma_nganh
 * @property string $ghi_chu
 * @property string $ma_dn
 * @property string $tinhtrang_hd
 * @property string $so_cmnd
 * @property string $ngaycap_cmnd
 * @property string $noicap_cmnd
 * @property string $email
 * @property string $dia_chi
 * @property string $ngay_sinh
 * @property string $nganhnghe_chinh
 * @property string $chu_so_huu
 * @property string $thanh_vien
 * @property string $co_dong
 * @property string $so_laodong
 */
class DoanhNghiep extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'doanh_nghiep';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['ten_dn', 'so_nha', 'ten_duong', 'ten_phuong', 'dien_thoai', 'nguoi_daidien', 'nganh_kd', 'geom', 'ghi_chu', 'ma_dn', 'tinhtrang_hd', 'so_cmnd', 'noicap_cmnd', 'email', 'dia_chi', 'nganhnghe_chinh', 'chu_so_huu', 'thanh_vien', 'co_dong'], 'string'],
            [['loaihinhdn_id'], 'integer'],
            [['von_dieule', 'so_laodong'], 'match', 'pattern' => '/^([0-9.,])+$/'],
            [['ngay_cap', 'ngay_thaydoi', 'ngaycap_cmnd', 'ngay_sinh'], 'safe'],
            [['ma_nganh'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_doanhnghiep' => 'Id Doanhnghiep',
            'ten_dn' => 'Tên doanh nghiệp',
            'loaihinhdn_id' => 'Loaihinhdn ID',
            'so_nha' => 'Số nhà',
            'ten_duong' => 'Tên đường',
            'ten_phuong' => 'Tên Phường',
            'von_dieule' => 'Vốn điều lệ',
            'dien_thoai' => 'Điện thoại',
            'nguoi_daidien' => 'Người đại diện',
            'nganh_kd' => 'Ngành nghề KD',
            'ngay_cap' => 'Ngày cấp',
            'ngay_thaydoi' => 'Ngày thay đổi',
            'geom' => 'Geom',
            'ma_nganh' => 'Mã ngành',
            'ghi_chu' => 'Ghi chú',
            'ma_dn' => 'Mã doanh nghiệp',
            'tinhtrang_hd' => 'Tình trạng',
            'so_cmnd' => 'CMND',
            'ngaycap_cmnd' => 'Ngày cấp',
            'noicap_cmnd' => 'Nơi cấp',
            'email' => 'Email',
            'dia_chi' => 'Địa chỉ',
            'ngay_sinh' => 'Ngày sinh',
            'nganhnghe_chinh' => 'Ngành nghề chính',
            'chu_so_huu' => 'Chủ sở hữu',
            'thanh_vien' => 'Thành viên',
            'co_dong' => 'Cổ đông',
            'so_laodong' => 'Tổng số lao động',
        ];
    }
  public function beforeValidate() {
        $this->von_dieule = str_replace(",", ".", $this->von_dieule);
        $this->so_laodong = str_replace(",", ".", $this->so_laodong);
        return true;
    }
}
