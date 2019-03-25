<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dm_loaihinhdn".
 *
 * @property integer $id_loaihinhdn
 * @property string $ten_loai
 * @property string $ghi_chu
 */
class DmLoaihinhdn extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dm_loaihinhdn';
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
            'id_loaihinhdn' => 'Id Loaihinhdn',
            'ten_loai' => 'Loại hình DN',
            'ghi_chu' => 'Ghi chú',
        ];
    }
}
