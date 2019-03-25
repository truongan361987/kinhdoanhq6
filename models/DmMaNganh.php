<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dm_manganh".
 *
 * @property integer $id_manganh
 * @property string $ma_nganh
 * @property string $ten_nganh
 * @property integer $stt
 * @property integer $so_cap
 * @property string $nganh_cap_tren
 * @property string $donvi_tructhuoc
 * @property string $ma_nganh_ktqd
 * @property string $ma_nganh_goc
 * @property string $manganh_daydu
 */
class DmManganh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dm_manganh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stt', 'so_cap'], 'integer'],
            [['ma_nganh', 'nganh_cap_tren', 'ma_nganh_ktqd', 'ma_nganh_goc'], 'string', 'max' => 20],
            [['ten_nganh'], 'string', 'max' => 255],
            [['donvi_tructhuoc'], 'string', 'max' => 5],
            [['manganh_daydu'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_manganh' => 'Id Manganh',
            'ma_nganh' => 'Mã ngành',
            'ten_nganh' => 'Tên ngành',
            'stt' => 'Stt',
            'so_cap' => 'Số cấp',
            'nganh_cap_tren' => 'Ngành cấp trên',
            'donvi_tructhuoc' => 'Đơn vị trực thuộc',
            'ma_nganh_ktqd' => 'Mã ngành kinh tế quốc dân',
            'ma_nganh_goc' => 'Mã ngành gốc',
            'manganh_daydu' => 'Manganh Daydu',
        ];
    }
}
