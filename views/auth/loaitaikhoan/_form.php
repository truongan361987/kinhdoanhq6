<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\auth\Loaitaikhoan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loaitaikhoan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ten_loaitaikhoan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_role')->checkbox() ?>

    <?= $form->field($model, 'update_role')->checkbox() ?>

    <?= $form->field($model, 'view_role')->checkbox() ?>

    <?= $form->field($model, 'delete_role')->checkbox() ?>

    <?= $form->field($model, 'export_role')->checkbox() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
