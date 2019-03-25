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
<?php $form = ActiveForm::begin([
]) ?>

<div class="row">

    <div class="modal-body">
        <h4>Bạn chắc chắn khôi phục lại tài khoản?</h4>
    </div>
    <div class="modal-footer">
        <?= Html::input('submit', null,'Khôi phục', ['class' => 'btn btn-info pull-left']) ?>
        <?= Html::button('Đóng',['class' => 'btn btn-default pull-right','data-dismiss' => 'modal'])?>
    </div>

</div>
<?php ActiveForm::end() ?>
