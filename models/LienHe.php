<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lien_he".
 *
 * @property integer $id_lienhe
 * @property string $ho_ten
 * @property string $email
 * @property string $dien_thoai
 * @property string $noi_dung
 */
class LienHe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lien_he';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['noi_dung'], 'string'],
            [['ho_ten', 'email'], 'string', 'max' => 200],
            [['dien_thoai'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_lienhe' => Yii::t('app', 'Id Lienhe'),
            'ho_ten' => Yii::t('app', 'Ho Ten'),
            'email' => Yii::t('app', 'Email'),
            'dien_thoai' => Yii::t('app', 'Dien Thoai'),
            'noi_dung' => Yii::t('app', 'Noi Dung'),
        ];
    }
}
