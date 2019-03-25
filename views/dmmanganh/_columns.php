<?php
use yii\helpers\Url;

return [
    
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
//        [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'id_manganh',
//    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ma_nganh',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ten_nganh',
    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'stt',
//    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'so_cap',
    ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'nganh_cap_tren',
     ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'donvi_tructhuoc',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'ma_nganh_ktqd',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'ma_nganh_goc',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'header' => 'Thao tác',
        'width' => '120px',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>[
            'role'=>'modal-remote',
            'title'=>'Chi tiết',
            'data-toggle'=>'tooltip',
            'class' =>'btn btn-xs btn-info'
        ],
        'updateOptions'=>[
            'role'=>'modal-remote',
            'title'=>'Cập nhật', 
            'data-toggle'=>'tooltip',
            'class' =>'btn btn-xs btn-warning'
        ],
        'deleteOptions'=>[
            'role'=>'modal-remote',
            'title'=>'Xóa',
            'class' => 'btn btn-xs btn-danger',
            'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
            'data-request-method'=>'post',
            'data-toggle'=>'tooltip',
            'data-confirm-title'=>'Are you sure?',
            'data-confirm-message'=>'Are you sure want to delete this item',  
            'data-confirm-ok' => 'Xóa',
            'data-confirm-cancel' => 'Đóng',                                  
        ], 
    ],

];   