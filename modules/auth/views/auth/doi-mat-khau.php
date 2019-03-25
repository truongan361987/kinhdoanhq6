<?php

/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 8/29/2018
 * Time: 9:32 AM
 */
use kartik\form\ActiveForm;
use \yii\captcha\Captcha;
use yii\helpers\Html;
?>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="<?= Yii::$app->homeUrl ?>">Trang chủ</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Đổi mật khẩu</span>
    </li>
</ul>
<?php $form = ActiveForm::begin() ?>
<div class="row">
    <div class="col-md-12">
        <div>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-users"></i> Đổi mật khẩu
                    </div>
                </div>
                <div class="portlet-body">
                    <?= $form->field($model['doimatkhau'], 'password')->input('password')->label('Mật khẩu cũ') ?>
                    <?= $form->field($model['doimatkhau'], 'newpassword')->input('password')->label('Mật khẩu mới') ?>
                    <?= $form->field($model['doimatkhau'], 'confirm')->input('password')->label('Nhập lại mật khẩu mới') ?>
                    <?= $form->field($model['doimatkhau'], 'verifyCode')->widget(Captcha::className())->label('Mã xác thực') ?>
                    <div class="text-center">
                        <?= Html::submitButton('Đổi mật khẩu', ['class' => 'btn btn-warning']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
ActiveForm::end()?>