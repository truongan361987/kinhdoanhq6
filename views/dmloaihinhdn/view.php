<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DmLoaihinhdn */
?>
<div class="dm-loaihinhdn-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_loaihinhdn',
            'ten_loai',
            'ghi_chu:ntext',
        ],
    ]) ?>

</div>
