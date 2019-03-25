<?php

use yii\helpers\Url;

return [

    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'id_loaitaikhoan',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'ten_loaitaikhoan',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'create_role',
        'value' => function($model){
            return $model->create_role;
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'update_role',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'view_role',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'delete_role',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'export_role',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'header' => 'Thao tác',
        'width' => '140px',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'viewOptions' => [
            'role' => 'modal-remote',
            'title' => 'Chi tiết',
            'data-toggle' => 'tooltip',
            'class' => 'btn btn-xs btn-info'
        ],
        'updateOptions' => [
            'role' => 'modal-remote',
            'title' => 'Cập nhật',
            'data-toggle' => 'tooltip',
            'class' => 'btn btn-xs btn-warning'
        ],
        'deleteOptions' => [
            'role' => 'modal-remote',
            'title' => 'Xóa',
            'class' => 'btn btn-xs btn-danger',
            'data-confirm' => false, 'data-method' => false,// for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Xóa danh mục',
            'data-confirm-message' => 'Bạn chắc chắn muốn xóa danh mục này?',
        ],
    ],

];   