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
 * @property string $so_laodong
 * @property string $geom
 * @property string $ma_nganh
 * @property string $ghi_chu
 * @property string $ma_dn
 */
class DoanhNghiep extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doanh_nghiep';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loaihinhdn_id'], 'integer'],
            [['von_dieule'], 'match', 'pattern'=>'/^([0-9.,])+$/'],
            [['ngay_cap', 'ngay_thaydoi'], 'safe'],
            [['geom', 'ghi_chu'], 'string'],
            [['ten_dn', 'nganh_kd'], 'string', 'max' => 300],
            [['so_nha', 'ten_duong', 'ten_phuong', 'dien_thoai', 'nguoi_daidien', 'so_laodong', 'ma_nganh'], 'string', 'max' => 100],
            [['ma_dn'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
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
            'so_laodong' => 'So Laodong',
            'geom' => 'Geom',
            'ma_nganh' => 'Mã ngành',
            'ghi_chu' => 'Ghi chú',
            'ma_dn' => 'Mã doanh nghiệp',
        ];
    }
      public function beforeValidate() {
        $this->von_dieule = str_replace(",", ".", $this->von_dieule);
        return true;
    }
}
