<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DmLoaicuahang */
?>
<div class="dm-loaicuahang-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_loaicuahang',
            'ten_loai',
            'ghi_chu:ntext',
        ],
    ]) ?>

</div>
