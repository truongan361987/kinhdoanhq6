<?php

namespace app\models\auth;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "taikhoan".
 *
 * @property integer $id_taikhoan
 * @property string $ten_dang_nhap
 * @property string $mat_khau
 * @property integer $loaitaikhoan_id
 * @property string $last_login
 * @property integer $status
 * @property string $access_token
 * @property string $auth_key
 *
 * @property Loaitaikhoan $loaitaikhoan
 * @property TaikhoanInfo[] $taikhoanInfos
 */
class Taikhoan extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taikhoan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loaitaikhoan_id', 'status'], 'integer'],
            [['last_login'], 'safe'],
            [['ten_dang_nhap', 'mat_khau'], 'string', 'max' => 100],
            [['access_token', 'auth_key'], 'string', 'max' => 200],
            [['loaitaikhoan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Loaitaikhoan::className(), 'targetAttribute' => ['loaitaikhoan_id' => 'id_loaitaikhoan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_taikhoan' => 'Id Taikhoan',
            'ten_dang_nhap' => 'Ten Dang Nhap',
            'mat_khau' => 'Mat Khau',
            'loaitaikhoan_id' => 'Loaitaikhoan ID',
            'last_login' => 'Last Login',
            'status' => 'Status',
            'access_token' => 'Access Token',
            'auth_key' => 'Auth Key',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoaitaikhoan()
    {
        return $this->hasOne(Loaitaikhoan::className(), ['id_loaitaikhoan' => 'loaitaikhoan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaikhoanInfos()
    {
        return $this->hasMany(TaikhoanInfo::className(), ['taikhoan_id' => 'id_taikhoan']);
    }

    public static function findIdentity($id)
    {
        return self::findOne(['id_taikhoan' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['ten_dang_nhap' => $username, 'status' => 1]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id_taikhoan;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->mat_khau = md5($password.'@hcmgis#2018');
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->mat_khau === md5($password.'@hcmgis#2018');
    }
}
