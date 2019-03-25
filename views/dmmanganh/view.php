<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DmMaNganh */
?>
<div class="dm-ma-nganh-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id_manganh',
            'ma_nganh',
            'ten_nganh',
          //  'stt',
            'so_cap',
            'nganh_cap_tren',
          //  'donvi_tructhuoc',
          //  'ma_nganh_ktqd',
          //  'ma_nganh_goc',
        ],
    ]) ?>

</div>
