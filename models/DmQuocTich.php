<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dm_quoctich".
 *
 * @property integer $id_quoctich
 * @property string $ten_quoctich
 * @property string $ghi_chu
 */
class DmQuocTich extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dm_quoctich';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten_quoctich'], 'string', 'max' => 50],
            [['ghi_chu'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_quoctich' => 'Id Quoc Tich',
            'ten_quoctich' => 'Ten Quoc Tich',
            'ghi_chu' => 'Ghi Chu',
        ];
    }
}
