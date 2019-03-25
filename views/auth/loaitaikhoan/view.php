<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\auth\Loaitaikhoan */
?>
<div class="loaitaikhoan-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_loaitaikhoan',
            'ten_loaitaikhoan',
            'create_role:boolean',
            'update_role:boolean',
            'view_role:boolean',
            'delete_role:boolean',
            'export_role:boolean',
        ],
    ]) ?>

</div>
