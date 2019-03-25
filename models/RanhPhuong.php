<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ranh_phuong".
 *
 * @property integer $gid
 * @property string $objectid
 * @property string $madvhc
 * @property string $caphc
 * @property string $maphuong
 * @property string $maquan
 * @property string $tenphuong
 * @property string $tenquan
 * @property string $soho
 * @property string $shape_leng
 * @property string $shape_area
 * @property string $geom
 */
class RanhPhuong extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ranh_phuong';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['objectid', 'soho', 'shape_leng', 'shape_area'], 'number'],
            [['geom'], 'string'],
            [['madvhc', 'maphuong', 'maquan', 'tenphuong'], 'string', 'max' => 50],
            [['caphc', 'tenquan'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'gid' => 'Gid',
            'objectid' => 'Objectid',
            'madvhc' => 'Madvhc',
            'caphc' => 'Caphc',
            'maphuong' => 'Maphuong',
            'maquan' => 'Maquan',
            'tenphuong' => 'Tenphuong',
            'tenquan' => 'Tenquan',
            'soho' => 'Soho',
            'shape_leng' => 'Shape Leng',
            'shape_area' => 'Shape Area',
            'geom' => 'Geom',
        ];
    }
}
