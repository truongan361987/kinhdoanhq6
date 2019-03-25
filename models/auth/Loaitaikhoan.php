<?php

namespace app\models\auth;

use Yii;

/**
 * This is the model class for table "loaitaikhoan".
 *
 * @property integer $id_loaitaikhoan
 * @property string $ten_loaitaikhoan
 * @property boolean $create_role
 * @property boolean $update_role
 * @property boolean $view_role
 * @property boolean $delete_role
 * @property boolean $export_role
 *
 * @property Taikhoan[] $taikhoans
 */
class Loaitaikhoan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'loaitaikhoan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_role', 'update_role', 'view_role', 'delete_role', 'export_role'], 'boolean'],
            [['ten_loaitaikhoan'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_loaitaikhoan' => 'Id Loaitaikhoan',
            'ten_loaitaikhoan' => 'Ten Loaitaikhoan',
            'create_role' => 'Create Role',
            'update_role' => 'Update Role',
            'view_role' => 'View Role',
            'delete_role' => 'Delete Role',
            'export_role' => 'Export Role',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaikhoans()
    {
        return $this->hasMany(Taikhoan::className(), ['loaitaikhoan_id' => 'id_loaitaikhoan']);
    }
}
