<?php

use yii\helpers\Url;

return [

    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
        'contentOptions' => function ($model, $key, $index, $column) {
            return ['style' => 'color:'
                . ($model->geom == NULL ? 'red' : '')];
        },
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'ten_hkd',
                'format' => 'raw',
                'value' => function ($model) {
                    return ($model->ten_hkd == null) ? '(Chưa có)' : $model->ten_hkd;
                },
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'giayphep_so',
                'label' => 'Giấy phép',
                'format' => 'raw',
                'value' => function($model) {
                    return $model->giayphep_so . '<br>' . (($model->giayphep_ngay != null) ? date('d-m-Y', strtotime($model->giayphep_ngay)) : '');
                }
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'so_nha',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'ten_duong',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'ten_phuong',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'nguoi_daidien',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'dien_thoai',
            ],
          

            [
                'class' => 'kartik\grid\ActionColumn',
                  'template' => '{view} {update} ',
                'header' => 'Thao tác',
                'width' => '120px',
                'dropdown' => false,
                'vAlign' => 'middle',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return Url::to([$action, 'id' => $key]);
                },
                        'viewOptions' => ['title' => 'Chi tiết', 'data-toggle' => 'tooltip', 'class' => 'btn btn-xs btn-info', 'style' => ['margin' => 0]],
                        'updateOptions' => ['title' => 'Cập nhật', 'data-toggle' => 'tooltip', 'class' => 'btn btn-xs btn-warning', 'style' => ['margin' => 0]],
                       
                    ],
                ];
                