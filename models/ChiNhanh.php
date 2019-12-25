<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chi_nhanh".
 *
 * @property integer $id_chinhanh
 * @property string $ten_dn
 * @property integer $loaihinhdn_id
 * @property string $so_nha
 * @property string $ten_duong
 * @property string $ten_phuong
 * @property string $dien_thoai
 * @property string $nguoi_daidien
 * @property string $nganh_kd
 * @property string $ngay_cap
 * @property string $ngay_thaydoi
 * @property string $geom
 * @property string $ma_nganh
 * @property string $ghi_chu
 * @property integer $doanhnghiep_id
 * @property string $ma_dn
 * @property string $tinhtrang_hd
 * @property string $dia_chi
 * @property string $nganhnghe_chinh
 * @property string $so_laodong
 * @property string $email
 */
class ChiNhanh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chi_nhanh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loaihinhdn_id', 'doanhnghiep_id'], 'integer'],
            [['ngay_cap', 'ngay_thaydoi'], 'safe'],
            [['geom', 'ghi_chu', 'tinhtrang_hd', 'dia_chi', 'nganhnghe_chinh', 'so_laodong', 'email'], 'string'],
            [['ten_dn', 'nganh_kd'], 'string', 'max' => 300],
            [['so_nha', 'ten_duong', 'ten_phuong', 'dien_thoai', 'nguoi_daidien', 'ma_nganh'], 'string', 'max' => 100],
            [['ma_dn'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_chinhanh' => 'Id Chinhanh',
            'ten_dn' => 'Tên doanh nghiệp',
            'loaihinhdn_id' => 'Loaihinhdn ID',
            'so_nha' => 'Số nhà',
            'ten_duong' => 'Tên đường',
            'ten_phuong' => 'Tên Phường',
            'dien_thoai' => 'Điện thoại',
            'nguoi_daidien' => 'Người đại diện',
            'nganh_kd' => 'Ngành nghề KD',
            'ngay_cap' => 'Ngày cấp',
            'ngay_thaydoi' => 'Ngày thay đổi',
            'geom' => 'Geom',
            'ma_nganh' => 'Mã ngành',
            'ghi_chu' => 'Ghi chú',
            'doanhnghiep_id' => 'Doanhnghiep ID',
            'ma_dn' => 'Mã DN',
            'tinhtrang_hd' => 'Tình trạng',
            'dia_chi' => 'Địa chỉ',
            'nganhnghe_chinh' => 'Ngành nghề chính',
            'so_laodong' => 'Số lao động',
            'email' => 'Email',
        ];
    }
}
