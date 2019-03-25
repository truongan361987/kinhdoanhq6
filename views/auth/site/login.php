<?php
use kartik\form\ActiveForm;

?>
<!-- BEGIN LOGO -->
<div class="logo">
    <h2 class="font-white"><b>HỆ THỐNG QUẢN LÝ KINH DOANH QUẬN 6</b></h2>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <?php $form = ActiveForm::begin() ?>
    <h3 class="form-title uppercase" style="color: #012e61">Đăng nhập</h3>
    <?php $error_username = Yii::$app->session->getFlash('error_username'); ?>
    <?php if (isset($error_username)): ?>
        <div class="alert alert-danger" style="padding: 5px 5px 5px 5px; margin-bottom: 5px">
            <h4 style="margin-bottom: 0px">Tên truy cập không tồn tại!</h4>
        </div>
    <?php endif; ?>
    <?php $locked = Yii::$app->session->getFlash('locked'); ?>
    <?php if (isset($locked)): ?>
        <div class="alert alert-danger" style="padding: 5px 5px 5px 5px; margin-bottom: 5px">
            <h4 style="margin-bottom: 0px">Tài khoản đã bị khóa!</h4>
        </div>
    <?php endif; ?>
    <?php $error_password = Yii::$app->session->getFlash('error_password'); ?>
    <?php if (isset($error_password)): ?>
        <div class="alert alert-danger" style="padding: 5px 5px 5px 5px; margin-bottom: 5px">
            <h4 style="margin-bottom: 0px">Mật khẩu không chính xác!</h4>
        </div>
    <?php endif; ?>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <?= $form->field($model, 'ten_dang_nhap')->input('text', ['class' => 'form-control form-control-solid placeholder-no-fix'])->label('Tên đăng nhập',['color' => '#012e61']) ?>
    </div>
    <div class="form-group">
        <?= $form->field($model, 'mat_khau')->input('password', ['class' => 'form-control form-control-solid placeholder-no-fix'])->label('Mật khẩu',['color' => '#012e61']) ?>
    </div>
    <div class="form-group" STYLE="text-align: center">
        <button type="submit" class="btn green uppercase" style="background-color: #012e61">Đăng nhập</button>

    </div>

    <?php ActiveForm::end(); ?>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->

    <!-- END FORGOT PASSWORD FORM -->

</div>
