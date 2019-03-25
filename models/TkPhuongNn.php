<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tk_phuong_nn".
 *
 * @property string $sl_hokinhdoanh
 * @property string $ten_phuong
 * @property string $ten_nganh
 */
class TkPhuongNn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tk_phuong_nn';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sl_hokinhdoanh'], 'integer'],
            [['ten_phuong', 'ten_nganh'], 'string'],
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
            'ten_nganh' => 'Ten Nganh',
        ];
    }
}
