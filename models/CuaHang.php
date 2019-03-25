<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cua_hang".
 *
 * @property integer $id_cuahang
 * @property string $ten_donvi
 * @property string $ten_cuahang
 * @property string $so_nha
 * @property string $ten_duong
 * @property string $ten_phuong
 * @property string $so_sap
 * @property string $ten_cho
 * @property string $dien_tich
 * @property string $nam_hoatdong
 * @property string $nganh_kd
 * @property string $ma_nganh
 * @property string $tinh_trang
 * @property string $ghi_chu
 * @property integer $loaicuahang_id
 * @property string $geom
 *
 * @property DmLoaicuahang $loaicuahang
 */
class CuaHang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cua_hang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dien_tich'],  'match', 'pattern'=>'/^([0-9.,])+$/'],
            [['ghi_chu', 'geom'], 'string'],
            [['loaicuahang_id'], 'integer'],
            [['ten_donvi', 'ten_cuahang'], 'string', 'max' => 300],
            [['so_nha', 'ten_duong', 'ten_phuong', 'so_sap', 'ten_cho', 'nam_hoatdong', 'nganh_kd', 'ma_nganh','tinh_trang'], 'string', 'max' => 100],
            [['loaicuahang_id'], 'exist', 'skipOnError' => true, 'targetClass' => DmLoaicuahang::className(), 'targetAttribute' => ['loaicuahang_id' => 'id_loaicuahang']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cuahang' => 'Id Cuahang',
            'ten_donvi' => 'Tên đơn vị',
            'ten_cuahang' => 'Tên cửa hàng',
            'so_nha' => 'Số nhà',
            'ten_duong' => 'Tên đường',
            'ten_phuong' => 'Tên phường',
            'so_sap' => 'So Sap',
            'ten_cho' => 'Ten Cho',
            'dien_tich' => 'Diện tích',
            'nam_hoatdong' => 'Năm hoạt động',
            'nganh_kd' => 'Ngành KD',
            'ma_nganh' => 'Ma Nganh',
            'ghi_chu' => 'Ghi chú',
            'loaicuahang_id' => 'Loaicuahang ID',
            'tinh_trang' => 'Tình trạng hoạt động',
            'geom' => 'Geom',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoaicuahang()
    {
        return $this->hasOne(DmLoaicuahang::className(), ['id_loaicuahang' => 'loaicuahang_id']);
    }
     public function beforeValidate() {
        $this->dien_tich = str_replace(",", ".", $this->dien_tich);
        return true;
    }
}
