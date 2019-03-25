<?php
use yii\helpers\Url;

return [
    
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
//        [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'id_nn',
//    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ten_nganh',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ghi_chu',
    ],
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
            'data-confirm-title'=>'Bạn có chắc chắn?',
            'data-confirm-message'=>'Xoá thông tin?',  
            'data-confirm-ok' => 'Xóa',
            'data-confirm-cancel' => 'Đóng',                                  
        ], 
    ],

];   