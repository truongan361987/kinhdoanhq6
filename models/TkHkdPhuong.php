<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tk_hkd_phuong".
 *
 * @property string $sl_hokinhdoanh
 * @property string $ten_phuong
 */
class TkHkdPhuong extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tk_hkd_phuong';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sl_hokinhdoanh'], 'integer'],
            [['ten_phuong'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sl_hokinhdoanh' => 'Sl Hokinhdoanh',
            'ten_phuong' => 'Ten Phuong',
        ];
    }
}
