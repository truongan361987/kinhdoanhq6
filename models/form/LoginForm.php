<?php

namespace app\models\form;

use app\models\auth\Taikhoan;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $ten_dang_nhap;
    public $mat_khau;
    public $rememberMe = true;
    private $_user;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['ten_dang_nhap'], 'required','message' => 'Tên đăng nhập không được để trống!'],
            [['mat_khau'], 'required','message' => 'Mật khẩu không được để trống!'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['mat_khau', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->mat_khau)) {
                $this->addError($attribute, 'Tên đăng nhập hoặc mật khẩu không đúng!');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {

            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Taikhoan::findByUsername($this->ten_dang_nhap);
        }

        return $this->_user;
    }
}
