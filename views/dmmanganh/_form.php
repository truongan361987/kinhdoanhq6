<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DmMaNganh */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dm-ma-nganh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ma_nganh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ten_nganh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'so_cap')->textInput() ?>

    <?= $form->field($model, 'nganh_cap_tren')->textInput(['maxlength' => true]) ?>

  

    <?= $form->field($model, 'ma_nganh_ktqd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ma_nganh_goc')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
