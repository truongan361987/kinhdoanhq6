<?php

use kartik\form\ActiveForm;
?>

<div class="col-lg-6 col-lg-offset-3">
    <?php $success = Yii::$app->session->getFlash('dangkythanhcong') ?>
    <?php if (isset($success)): ?>
        <div class="portlet box green" id="notice">
            <div class="portlet-title">
                <div class="caption"><span class="fa fa-check-circle-o"></span> Đăng ký tài khoản thành công!</div>
            </div>
        </div>
    <?php endif; ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#notice').delay(3000).fadeOut();
        });
    </script>
  
    <div class="portlet box blue-steel">
        <div class="portlet-title bg-blue-skhcn">
            <div class="caption">
                <span class="caption-subject font-white bold uppercase"><i
                        class="fa fa-sign-in font-white"></i> HỆ THỐNG QUẢN LÝ KINH DOANH QUẬN 6</span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="col-lg-12">
                <?php $form = ActiveForm::begin() ?>

                <div class="form-group">
                    <?= $form->field($model, 'ten_dang_nhap')->input('text', ['class' => 'form-control form-control-solid placeholder-no-fix'])->label('Tên đăng nhập', ['class' => 'font-blue-sharp uppercase']) ?>
                    <?php $error_username = Yii::$app->session->getFlash('error_username'); ?>
                    <?php if (isset($error_username)): ?>
                        <div class="alert alert-danger" style="padding-top: 0;padding-bottom: 0">
                            <h6 class="font-red-flamingo">
                                <span class="fa fa-exclamation-triangle"></span>
                                <i>Tên truy cập không tồn tại!</i>
                            </h6>
                        </div>
                    <?php endif; ?>
                    <?php $error_locked = Yii::$app->session->getFlash('locked'); ?>
                    <?php if (isset($error_locked)): ?>
                        <div class="alert alert-danger" style="padding-top: 0;padding-bottom: 0">
                            <h6 class="font-red-flamingo">
                                <span class="fa fa-exclamation-triangle"></span>
                                <i>Tên truy cập đã bị khóa!</i>
                            </h6>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <?= $form->field($model, 'mat_khau')->input('password', ['class' => 'form-control form-control-solid placeholder-no-fix'])->label('Mật khẩu', ['class' => 'font-blue-sharp uppercase']) ?>
                    <?php $error_password = Yii::$app->session->getFlash('error_password'); ?>
                    <?php if (isset($error_password)): ?>
                        <div class="alert alert-danger" style="padding-top: 0;padding-bottom: 0">
                            <h6 class="font-red-flamingo">
                                <span class="fa fa-exclamation-triangle"></span>
                                <i>Mật khẩu không chính xác!</i>
                            </h6>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <button type="submit"
                            class="btn btn-success uppercase">Đăng nhập
                    </button>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            <div style="clear: both"></div>
        </div>
    </div>
</div>