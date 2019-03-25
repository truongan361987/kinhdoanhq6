<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 8/3/2017
 * Time: 2:00 PM
 */
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Thêm mới tài khoản</h4>
</div>
<?php $form = ActiveForm::begin(); ?>
<div class="modal-body">
    <div class="form-group">
        <?= $form->field($model['taikhoan'], 'ten_dang_nhap')->input('text')->label('Tên đăng nhập') ?>
    </div>
    <div class="form-group">
        <?= $form->field($model['taikhoan'], 'mat_khau')->input('password')->label('Mật khẩu') ?>
    </div>
    <div class="form-group">
        <?= $form->field($model['taikhoan'], 'loaitaikhoan_id')->dropDownList([2 => 'Editor', 3 => 'Viewer'])->label('Loại tài khoản') ?>
    </div>

    <div style="clear:both;"></div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-success pull-left">Thêm mới</button>
    <button type="button" data-dismiss="modal" class="btn btn-default pull-right">Đóng</button>
</div>
<?php ActiveForm::end() ?>
<?php $form = ActiveForm::begin([
]) ?>


