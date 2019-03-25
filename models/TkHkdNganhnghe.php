<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tk_hkd_nganhnghe".
 *
 * @property string $sl_hokinhdoanh
 * @property integer $id_loaicuahang
 * @property string $ten_loai
 */
class TkHkdNganhnghe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tk_hkd_nganhnghe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sl_hokinhdoanh', 'id_loaicuahang'], 'integer'],
            [['ten_loai'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sl_hokinhdoanh' => 'Sl Hokinhdoanh',
            'id_loaicuahang' => 'Id Nn',
            'ten_loai' => 'Ten Nganh',
        ];
    }
}
