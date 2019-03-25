<?php

namespace app\models\auth;

use Yii;

/**
 * This is the model class for table "taikhoan_info".
 *
 * @property integer $id_taikhoaninfo
 * @property integer $taikhoan_id
 * @property string $ho_ten
 * @property string $email
 * @property string $dia_chi
 * @property string $dien_thoai
 * @property integer $phongban_id
 * @property string $created_at
 * @property string $created_by
 *
 * @property Taikhoan $taikhoan
 */
class TaikhoanInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taikhoan_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['taikhoan_id', 'phongban_id'], 'integer'],
            [['created_at', 'created_by'], 'safe'],
            [['ho_ten', 'email', 'dien_thoai'], 'string', 'max' => 100],
            [['dia_chi'], 'string', 'max' => 200],
            [['taikhoan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Taikhoan::className(), 'targetAttribute' => ['taikhoan_id' => 'id_taikhoan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_taikhoaninfo' => 'Id Taikhoaninfo',
            'taikhoan_id' => 'Taikhoan ID',
            'ho_ten' => 'Ho Ten',
            'email' => 'Email',
            'dia_chi' => 'Dia Chi',
            'dien_thoai' => 'Dien Thoai',
            'phongban_id' => 'Phongban ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaikhoan()
    {
        return $this->hasOne(Taikhoan::className(), ['id_taikhoan' => 'taikhoan_id']);
    }
}
