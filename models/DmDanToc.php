<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dm_dantoc".
 *
 * @property integer $id_dantoc
 * @property string $ten_dantoc
 * @property string $ghi_chu
 */
class DmDanToc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dm_dantoc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten_dantoc'], 'string', 'max' => 50],
            [['ghi_chu'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_dantoc' => 'Id Dan Toc',
            'ten_dantoc' => 'Ten Dan Toc',
            'ghi_chu' => 'Ghi Chu',
        ];
    }
}
