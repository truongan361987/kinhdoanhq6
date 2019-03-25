<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "giao_thong".
 *
 * @property integer $idduong
 * @property string $tenduong
 */
class GiaoThong extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'giao_thong';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ten_duong'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idduong' => 'Idduong',
            'ten_duong' => 'Tenduong',
        ];
    }
}
