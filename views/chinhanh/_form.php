<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HoKinhDoanh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ho-kinh-doanh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ten_dn')->textInput() ?>

    <?= $form->field($model, 'dien_thoai')->textInput() ?>

      <?= $form->field($model, 'nganh_kd')->textInput() ?>

    <?= $form->field($model, 'von_dieule')->textInput() ?>

    <?= $form->field($model, 'nguoi_daidien')->textInput() ?>


    <?= $form->field($model, 'ngay_cap')->textInput() ?>

    <?= $form->field($model, 'ngay_thaydoi')->textInput() ?>

    <?= $form->field($model, 'so_nha')->textInput() ?>

    <?= $form->field($model, 'ten_duong')->textInput() ?>

    <?= $form->field($model, 'ten_phuong')->textInput() ?>

    <?= $form->field($model, 'ma_dn')->textInput() ?>

    <?= $form->field($model, 'ghi_chu')->textInput() ?>

    <?= $form->field($model, 'geom')->textInput() ?>

    <?= $form->field($model, 'ma_nganh')->textInput() ?>


    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>
