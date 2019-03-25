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
        <span class="active">Thông tin tài khoản</span>
    </li>
</ul>
<?php $form = ActiveForm::begin() ?>

<div class="row">
    <?php $success = Yii::$app->session->getFlash('updated') ?>
    <?php if (isset($success)): ?>
        <div class="portlet box green" id="notice">
            <div class="portlet-title">
                <div class="caption"><span class="fa fa-check-circle-o"></span> Cập nhật tài khoản thành công!</div>
            </div>
        </div>
    <?php endif; ?>
    <div class="col-md-12">
        <div>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-users"></i> Thông tin tài khoản
                    </div>
                </div>
                <div class="portlet-body">
                    <?= $form->field($model['tai-khoan'], 'ho_ten')->input('text')->label('Họ tên') ?>
                    <?= $form->field($model['tai-khoan'], 'dien_thoai')->input('text')->label('Điện thoại') ?>
                    <?= $form->field($model['tai-khoan'], 'email')->input('email')->label('Email') ?>
                    <?= $form->field($model['tai-khoan'], 'dia_chi')->input('text')->label('Địa chỉ') ?>
                    <div class="text-center">
                        <?= Html::submitButton('Cập nhật', ['class' => 'btn btn-warning']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end() ?>