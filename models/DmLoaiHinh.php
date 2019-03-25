<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dm_loai_hinh".
 *
 * @property integer $id_loaihinh
 * @property string $ten_loaihinh
 *
 * @property HangRong[] $hangRongs
 */
class DmLoaiHinh extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dm_loai_hinh';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten_loaihinh'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_loaihinh' => 'Id Loaihinh',
            'ten_loaihinh' => 'Loại hình',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHangRongs()
    {
        return $this->hasMany(HangRong::className(), ['loaihinh_id' => 'id_loaihinh']);
    }
}
