<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HoKinhDoanh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ho-kinh-doanh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ten_hkd')->textInput() ?>

    <?= $form->field($model, 'dien_thoai')->textInput() ?>

    <?= $form->field($model, 'fax')->textInput() ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'nganh_kd')->textInput() ?>

    <?= $form->field($model, 'website')->textInput() ?>

    <?= $form->field($model, 'von_kd')->textInput() ?>

    <?= $form->field($model, 'nguoi_daidien')->textInput() ?>

    <?= $form->field($model, 'gioi_tinh')->checkbox() ?>

    <?= $form->field($model, 'dan_toc')->textInput() ?>

    <?= $form->field($model, 'ngay_sinh')->textInput() ?>

    <?= $form->field($model, 'quoc_tich')->textInput() ?>

    <?= $form->field($model, 'so_cmnd')->textInput() ?>

    <?= $form->field($model, 'ngay_cap')->textInput() ?>

    <?= $form->field($model, 'noi_cap')->textInput() ?>

    <?= $form->field($model, 'hokhau_thuongtru')->textInput() ?>

    <?= $form->field($model, 'noisong_hientai')->textInput() ?>

    <?= $form->field($model, 'so_nha')->textInput() ?>

    <?= $form->field($model, 'ten_duong')->textInput() ?>

    <?= $form->field($model, 'ten_phuong')->textInput() ?>

    <?= $form->field($model, 'vi_tri')->textInput() ?>

    <?= $form->field($model, 'giayphep_so')->textInput() ?>

    <?= $form->field($model, 'ghi_chu')->textInput() ?>

     <?= $form->field($model, 'geom')->textInput() ?>

    <?= $form->field($model, 'ma_nganh')->textInput() ?>

    <?= $form->field($model, 'giayphep_ngay')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
