<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dm_loaicuahang".
 *
 * @property integer $id_loaicuahang
 * @property string $ten_loai
 * @property string $ghi_chu
 *
 * @property CuaHang[] $cuaHangs
 */
class DmLoaicuahang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dm_loaicuahang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ghi_chu'], 'string'],
            [['ten_loai'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_loaicuahang' => 'Id Loaicuahang',
            'ten_loai' => 'Loại cửa hàng',
            'ghi_chu' => 'Ghi chú',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuaHangs()
    {
        return $this->hasMany(CuaHang::className(), ['loaicuahang_id' => 'id_loaicuahang']);
    }
}
