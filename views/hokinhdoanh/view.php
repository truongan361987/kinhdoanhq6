<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\VChuyengia */
?>

<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="<?= Yii::$app->homeUrl ?>">Trang chủ</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="<?= Yii::$app->urlManager->createUrl('hokinhdoanh') ?>">Danh sách Hộ kinh doanh</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Chi tiết Hộ kinh doanh</span>
    </li>
</ul>
<?php $create = Yii::$app->session->getFlash('hkd_create_success') ?>
<?php if (isset($create)): ?>
    <div class="portlet box green" id="notice">
        <div class="portlet-title">
            <div class="caption"><span class="fa fa-check-circle-o"></span> Thêm mới thành công!</div>
        </div>
    </div>
<?php endif; ?>
<?php $update = Yii::$app->session->getFlash('hkd_update_success') ?>
<?php if (isset($update)): ?>
    <div class="portlet box green" id="notice">
        <div class="portlet-title">
            <div class="caption"><span class="fa fa-check-circle-o"></span> Cập nhật thành công!</div>
        </div>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-lg-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <span class="font-blue-steel">Chi tiết Hộ kinh doanh</span>
                </div>
                <div class="caption pull-right">
                    <a class="btn btn-warning pull-right"
                       href="<?= Yii::$app->urlManager->createUrl('hokinhdoanh/update') . '?id=' . $model['hokinhdoanh']->id_hkd ?>">Cập
                        nhật</a>
                     <a class="btn btn-info pull-right"
                       href="<?= Yii::$app->urlManager->createUrl('hokinhdoanh/create') ?>">Thêm mới</a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="tabbable-line">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#thongtinchung">Thông tin chung</a></li>

                    </ul>
                    <div class="tab-content">
                        <div class=" tab-pane active" id="thongtinchung">
                            <div class="col-md-7 form-group" >
                                <?=
                                DetailView::widget([
                                    'model' => $model['hokinhdoanh'],
                                    'attributes' => [
                                        'ten_hkd',
                                        [            
                                            'label' => 'Địa diểm kinh doanh',
                                            'value' => (($model['hokinhdoanh']->vi_tri == NULL) ? '' : $model['hokinhdoanh']->vi_tri . ', ') . (($model['hokinhdoanh']->so_nha == NULL) ? '' : $model['hokinhdoanh']->so_nha . ', ') . (($model['hokinhdoanh']->ten_duong == NULL) ? '' : $model['hokinhdoanh']->ten_duong . ', ') . (($model['hokinhdoanh']->ten_phuong == NULL) ? '' : $model['hokinhdoanh']->ten_phuong),
                                        ],
                                        'ma_nganh',
                                        'giayphep_so',
                                        [         
                                            'attribute' => 'giayphep_ngay',
                                            'format' => ['date', 'php:d-m-Y'],
                                        ],
                                        [
                                            'attribute' => 'dien_thoai',
                                            'value' => ($model['hokinhdoanh']->dien_thoai == null) ? '(Chưa có)' : $model['hokinhdoanh']->dien_thoai,
                                        ],
                                      
                                        'nganh_kd',
                                        [
                                            'attribute' => 'von_kd',
                                            'value' => ($model['hokinhdoanh']->von_kd == null) ? '(Chưa có)' : number_format($model['hokinhdoanh']->von_kd, 0, ',', ',') ,
                                        ],
                                        'nguoi_daidien',
                                        [                      // the owner name of the model
                                            'attribute' => 'ngay_sinh',
                                            // 'format' => ['date', 'php:d-m-Y'],
                                            'value' => ($model['hokinhdoanh']->ngay_sinh == null) ? '(Chưa có)' : date('d-m-Y', strtotime($model['hokinhdoanh']->ngay_sinh)),
                                        ],
                                        [
                                            'attribute' => 'dan_toc',
                                            'value' => ($model['hokinhdoanh']->dan_toc == null) ? '(Chưa có)' : $model['hokinhdoanh']->dan_toc,
                                        ],
                                        [
                                            'attribute' => 'quoc_tich',
                                            'value' => ($model['hokinhdoanh']->quoc_tich == null) ? '(Chưa có)' : $model['hokinhdoanh']->quoc_tich,
                                        ],
                                        [
                                            'attribute' => 'so_cmnd',
                                            'value' => ($model['hokinhdoanh']->so_cmnd == null) ? '(Chưa có)' : $model['hokinhdoanh']->so_cmnd,
                                        ],
                                        [                      // the owner name of the model
                                            'attribute' => 'ngay_cap',
                                            // 'format' => ['date', 'php:d-m-Y'],
                                            'value' => ($model['hokinhdoanh']->ngay_cap == null) ? '(Chưa có)' : date('d-m-Y', strtotime($model['hokinhdoanh']->ngay_cap)),
                                        ],
                                        [
                                            'attribute' => 'noi_cap',
                                            'value' => ($model['hokinhdoanh']->noi_cap == null) ? '(Chưa có)' : $model['hokinhdoanh']->noi_cap,
                                        ],
                                        [
                                            'label' => 'Giới Tính',
                                            'value' => ($model['hokinhdoanh']->gioi_tinh == null) ? '' : (($model['hokinhdoanh']->gioi_tinh == 1) ? 'Nam' : 'Nữ'),
                                        ],
                                        [
                                            'attribute' => 'hokhau_thuongtru',
                                            'value' => ($model['hokinhdoanh']->hokhau_thuongtru == null) ? '(Chưa có)' : $model['hokinhdoanh']->hokhau_thuongtru,
                                        ],
                                        [
                                            'attribute' => 'noisong_hientai',
                                            'value' => ($model['hokinhdoanh']->noisong_hientai == null) ? '(Chưa có)' : $model['hokinhdoanh']->noisong_hientai,
                                        ],
                                    ],
                                ])
                                ?>
                            </div>
                            <div class="col-md-5 form-group" >
                                <div id="capnhatvitri" style=" height: 650px;"></div>
                            </div>
                            <div style="clear: both"></div>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>

    </div>
    <div class="modal-footer">
        <a href="<?= Yii::$app->urlManager->createUrl('hokinhdoanh') ?>"
           class="btn btn-default pull-right"><i class="fa fa-arrow-left"></i> Quay lại</a>
    </div>
</div>
<script>
    $(document).ready(function () {
        uiEventUpdate('#capnhatvitri ');
    });
    var map;
    map = L.map('capnhatvitri').setView([<?= ($model['hokinhdoanh']->geo_y != null) ? $model['hokinhdoanh']->geo_y : 10.7756587 ?>, <?= ($model['hokinhdoanh']->geo_x != null) ? $model['hokinhdoanh']->geo_x : 106.70042379999995 ?>], 18);
    var marker = new L.marker([<?= ($model['hokinhdoanh']->geo_y != null) ? $model['hokinhdoanh']->geo_y : 10.7756587 ?>, <?= ($model['hokinhdoanh']->geo_x != null) ? $model['hokinhdoanh']->geo_x : 106.70042379999995 ?>], {
        draggable: false
    })
            .addTo(map)


    // OVERLAYS -----------------------------------------------------
    var layerOpenStreetMap = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 22,
        maxNativeZoom: 22,
        attribution: '© OpenStreetMap contributors'
    });
    var layerHCMMap = L.tileLayer.wms('http://maps.hcmgis.vn/geoserver/ows?', {
        layers: 'hcm_map:hcm_map'
    });
    var googlelayer = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
        maxZoom: 24,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    });
    var mapbox = L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoic2thZGFtYmkiLCJhIjoiY2lqdndsZGg3MGNua3U1bTVmcnRqM2xvbiJ9.9I5ggqzhUVrErEQ328syYQ#3/0.00/0.00', {
        maxZoom: 18,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        id: 'streets-v9',
        //  accessToken: 'pk.eyJ1Ijoic2thZGFtYmkiLCJhIjoiY2lqdndsZGg3MGNua3U1bTVmcnRqM2xvbiJ9.9I5ggqzhUVrErEQ328syYQ'
    });
    var baseLayers = {
        "HCMGIS": layerHCMMap,
        //  "OpenStreetMap": layerOpenStreetMap,
        "Ảnh vệ tinh": googlelayer,
        "MapBox": mapbox

    };

    L.control.layers(baseLayers).addTo(this.map);
    this.map.addLayer(mapbox, true);

</script>