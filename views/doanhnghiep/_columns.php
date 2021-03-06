<?php

use app\models\DmLoaihinhdn;
use app\models\RanhPhuong;
use yii\helpers\ArrayHelper;
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
                'attribute' => 'ten_dn',
                'format' => 'raw',
                'value' => function ($model) {
                    return ($model->ten_dn == null) ? '(Chưa có)' : $model->ten_dn;
                },
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'ma_dn',
                'format' => 'raw',
                'value' => function($model) {
                    return $model->ma_dn . '<br>' . (($model->ngay_cap != null) ? date('d-m-Y', strtotime($model->ngay_cap)) : '');
                }
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'width' => '10%',
                'attribute' => 'loaihinhdn_id',
                'label' => 'Loại hình DN',
                'format' => 'html',
                'value' => function($model) {
                    return $model->ten_loai;
                },
                'filter' => ArrayHelper::map(DmLoaihinhdn::find()->all(), 'id_loaihinhdn', 'ten_loai')
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
                'format' => 'html',
                'value' => function($model) {
                    return $model->ten_phuong;
                },
                'filter' => ArrayHelper::map(RanhPhuong::find()->all(), 'tenphuong', 'tenphuong')
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'nguoi_daidien',
            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'dien_thoai',
            ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'fax',
//    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'attribute'=>'email',
//    ],
            // [
            // 'class'=>'\kartik\grid\DataColumn',
            // 'attribute'=>'nganh_nghe',
            // ],
            // [
            // 'class'=>'\kartik\grid\DataColumn',
            // 'attribute'=>'website',
            // ],
            // [
            // 'class'=>'\kartik\grid\DataColumn',
            // 'attribute'=>'von_dieule',
            // ],
            // [
            // 'class'=>'\kartik\grid\DataColumn',
            // 'attribute'=>'gioi_tinh',
            // ],
            // [
            // 'class'=>'\kartik\grid\DataColumn',
            // 'attribute'=>'dan_toc',
            // ],
            // [
            // 'class'=>'\kartik\grid\DataColumn',
            // 'attribute'=>'ngay_sinh',
            // ],
            // [
            // 'class'=>'\kartik\grid\DataColumn',
            // 'attribute'=>'quoc_tich',
            // ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'so_cmnd',
            ],
//             [
//             'class'=>'\kartik\grid\DataColumn',
//             'attribute'=>'ngaycap_cmnd',
//             ],
//             [
//             'class'=>'\kartik\grid\DataColumn',
//             'attribute'=>'noicap_cmnd',
            // ],
            // [
            // 'class'=>'\kartik\grid\DataColumn',
            // 'attribute'=>'hokhau_thuongtru',
            // ],
            // [
            // 'class'=>'\kartik\grid\DataColumn',
            // 'attribute'=>'noisong_hientai',
            // ],
            // [
            // 'class'=>'\kartik\grid\DataColumn',
            // 'attribute'=>'giayphep_so',
            // ],
            // [
            // 'class'=>'\kartik\grid\DataColumn',
            // 'attribute'=>'ghi_chu',
            //            ],
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'tinhtrang_hd',
            ],
            // [
            // 'class'=>'\kartik\grid\DataColumn',
            // 'attribute'=>'geom',
            // ],
            // [
            // 'class'=>'\kartik\grid\DataColumn',
            // 'attribute'=>'id_nn',
            // ],
            // [
            // 'class'=>'\kartik\grid\DataColumn',
            // 'attribute'=>'giayphep_ngay',
            // ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'header' => 'Thao tác',
                'width' => '120px',
                'dropdown' => false,
                'vAlign' => 'middle',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return Url::to([$action, 'id' => $key]);
                },
                        'viewOptions' => ['title' => 'Chi tiết', 'data-toggle' => 'tooltip', 'class' => 'btn btn-xs btn-info', 'style' => ['margin' => 0]],
                        'updateOptions' => ['title' => 'Cập nhật', 'data-toggle' => 'tooltip', 'class' => 'btn btn-xs btn-warning', 'style' => ['margin' => 0]],
                        'deleteOptions' => [
                            'role' => 'modal-remote',
                            'title' => 'Xóa',
                            'class' => 'btn btn-xs btn-danger',
                            'data-confirm' => false, 'data-method' => false, // for overide yii data api
                            'data-request-method' => 'post',
                            'data-toggle' => 'tooltip',
                            'data-confirm-title' => 'Bạn có chắc chắn?',
                            'data-confirm-message' => 'Xoá thông tin?',
                            'data-confirm-ok' => 'Xóa',
                            'data-confirm-cancel' => 'Đóng',
                        ],
                    ],
                ];
                