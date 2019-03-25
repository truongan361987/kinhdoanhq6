<?php

use kartik\date\DatePicker;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\select2\Select2;
$urlMN = Url::to(['hokinhdoanh/get']);
?>
<style>
    #geocomplete-wrapper {
        position: absolute;
        top: 10px;
        left: 70px;
        z-index: 1000;
        width: 500px;
    }
    #geocomplete { background-color: rgba(255,255,255,0.8); }

</style>
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
        <span class="active">Cập nhật Hộ kinh doanh</span>
    </li>
</ul>

<?php
$form = ActiveForm::begin([
            'id' => 'update-hokinhdoanh',
            'options' => [
                'class' => 'skin skin-square',
                'enctype' => 'multipart/form-data'
            ]
        ])
?>


<div class="row">
    <div class="col-lg-12">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <span class="font-blue-steel">Cập nhật Hộ kinh doanh</span>
                </div>

            </div>
            <div class="portlet-body">
                <div class="tabbable-line form-group">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#thongtinchung">Thông tin chung</a></li>
                        <li><a data-toggle="tab" href="#vitri" onclick=" setTimeout(function () {
                                    map.invalidateSize()
                                }, 200);">Vị trí không gian</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="thongtinchung">
                            <div class="col-sm-12">
                                <div class="col-sm-6" autofocus>
                                    <?= $form->field($model['hokinhdoanh'], 'ten_hkd', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->textInput(['maxlength' => true])->label('Tên hộ kinh doanh') ?>
                                </div>
                                <div class="col-sm-6">
                                    <?=
                                    $form->field($model['hokinhdoanh'], 'ma_nganh')->widget(Select2::classname(), [
                                        'initValueText' => $model['hokinhdoanh']->ma_nganh,
                                        'options' => ['placeholder' => 'Chọn mã ngành'],
                                        'pluginOptions' => [
                                            'allowClear' => true,
                                            'language' => [
                                                'errorLoading' => new \yii\web\JsExpression("function () { return 'Waiting for results...'; }"),
                                            ],
                                            'ajax' => [
                                                'url' => $urlMN,
                                                'dataType' => 'json',
                                                'data' => new \yii\web\JsExpression('function(params) { return {q:params.term}; }'),
                                            //'delay' => 1000,
                                            ],
                                            'escapeMarkup' => new \yii\web\JsExpression('function (markup) { return markup; }'),
                                            'templateSelection' => new \yii\web\JsExpression('function(donvi) { return donvi.text; }'),
                                            'templateResult' => new \yii\web\JsExpression('function(donvi) { return donvi.text; }'),
//
                                        ],
                                    ])->label('Mã ngành')
                                    ?>                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($model['hokinhdoanh'], 'giayphep_so')->textInput(['maxlength' => true])->label('Số giấy phép') ?>
                                </div>
                                <div class="col-sm-6">
                                    <?=
                                    $form->field($model['hokinhdoanh'], 'giayphep_ngay')->widget(DatePicker::classname(), [
                                        'options' => ['placeholder' => 'Ngày cấp ...',
                                            'value' => ($model['hokinhdoanh']->giayphep_ngay != null) ? date('d-m-Y', strtotime($model['hokinhdoanh']->giayphep_ngay)) : '',],
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'dd-mm-yyyy'
                                        ]
                                    ])->label('Ngày cấp');
                                    ?>                            
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-3">
                                    <?= $form->field($model['hokinhdoanh'], 'vi_tri')->textInput(['maxlength' => true])->label('Vị trí gian hàng') ?>
                                </div>
                                <div class="col-sm-3">
                                    <?= $form->field($model['hokinhdoanh'], 'so_nha')->textInput(['maxlength' => true])->label('Số nhà') ?>
                                </div>
                                <div class="col-sm-3">
                                    <?= $form->field($model['hokinhdoanh'], 'ten_duong')->textInput(['maxlength' => true])->label('Tên đường') ?>
                                </div>
                                <div class="col-sm-3">
                                    <?= $form->field($model['hokinhdoanh'], 'ten_phuong')->dropDownList(ArrayHelper::map($model['ranhphuong'], 'tenphuong', 'tenphuong'),['prompt' => 'Chọn tên phường'])->label('Tên phường') ?>
                                </div>

                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-3">
                                    <?= $form->field($model['hokinhdoanh'], 'dien_thoai')->textInput(['maxlength' => true])->label('Điện thoại') ?>
                                </div>
                                <div class="col-sm-3">
                                    <?= $form->field($model['hokinhdoanh'], 'fax')->textInput(['maxlength' => true])->label('Số FAX') ?>
                                </div>
                                <div class="col-sm-3">
                                    <?=
                                    $form->field($model['hokinhdoanh'], 'email'
                                    )->textInput(['placeholder' => 'Nhập chính xác địa chỉ email']);
                                    ?>
                                </div>
                                <div class="col-sm-3">
                                    <?= $form->field($model['hokinhdoanh'], 'website')->textInput(['maxlength' => true])->label('Website') ?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <?= $form->field($model['hokinhdoanh'], 'nganh_kd')->textarea()->label('Ngành, nghề kinh doanh') ?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <?= $form->field($model['hokinhdoanh'], 'von_kd')->textInput(['maxlength' => true])->label('Vốn') ?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <?= $form->field($model['hokinhdoanh'], 'nguoi_daidien')->textInput(['maxlength' => true])->label('Họ và tên đại diện hộ kinh doanh') ?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-3">
                                    <?= $form->field($model['hokinhdoanh'], 'gioi_tinh')->dropDownList([1 => 'Nam', 2 => 'Nữ'], ['prompt' => 'Chọn giới tính'])->label('Giới tính') ?>
                                </div>
                                <div class="col-sm-3">
                                    <?=
                                    $form->field($model['hokinhdoanh'], 'ngay_sinh')->widget(DatePicker::classname(), [
                                        'options' => [
                                            'placeholder' => 'Ngày sinh ...',
                                            'value' => ($model['hokinhdoanh']->ngay_sinh != null) ? date('d-m-Y', strtotime($model['hokinhdoanh']->ngay_sinh)) : '',
                                        ],
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'dd-mm-yyyy'
                                        ]
                                    ])->label('Ngày sinh');
                                    ?>
                                </div>
                                <div class="col-sm-3">
                                    <?= $form->field($model['hokinhdoanh'], 'dan_toc')->dropDownList(ArrayHelper::map($model['dmdantoc'], 'ten_dantoc', 'ten_dantoc'), ['options' => ['Kinh' => ['Selected' => TRUE]]])->label('Dân tộc') ?>
                                </div>
                                <div class="col-sm-3">
                                    <?= $form->field($model['hokinhdoanh'], 'quoc_tich')->dropDownList(ArrayHelper::map($model['dmquoctich'], 'ten_quoctich', 'ten_quoctich'), ['options' => ['Việt Nam' => ['Selected' => TRUE]]])->label('Quốc tịch') ?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <?= $form->field($model['hokinhdoanh'], 'so_cmnd')->textInput(['maxlength' => true])->label('CMND số') ?>
                                </div>
                                <div class="col-sm-4">
                                    <?=
                                    $form->field($model['hokinhdoanh'], 'ngay_cap')->widget(DatePicker::classname(), [
                                        'options' => ['placeholder' => 'Ngày cấp ...',
                                            'value' => ($model['hokinhdoanh']->ngay_cap != null) ? date('d-m-Y', strtotime($model['hokinhdoanh']->ngay_cap)) : '',],
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'dd-mm-yyyy'
                                        ]
                                    ])->label('Ngày cấp');
                                    ?>                            
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model['hokinhdoanh'], 'noi_cap')->textInput(['maxlength' => true])->label('Nơi cấp') ?>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <?= $form->field($model['hokinhdoanh'], 'hokhau_thuongtru')->textInput(['maxlength' => true])->label('Hộ khẩu thường trú') ?>
                                </div>
                                <div class="col-sm-12">
                                    <?= $form->field($model['hokinhdoanh'], 'noisong_hientai')->textInput(['maxlength' => true])->label('Chỗ ở hiện tại') ?>
                                </div>
                            </div>

                            <div style="clear: both"></div>

                        </div>
                        <div class="tab-pane" id="vitri">
                            <div class="col-md-12 form-group" >
                                <div id="capnhatvitri" style="height: 400px"></div>
                                <div id="geocomplete-wrapper">
                                    <input id="geocomplete" class="form-control" @keyup.enter="geoSearch" type="text" placeholder="Nhập vị trí tìm kiếm"/>
                                </div>
                            </div>
                            <div class="col-md-12" class="form-group">
                                <div class="col-md-6">
                                    <label>Kinh độ (Long)</label>
                                    <input class="form-control" type="text" name="ToaDo[geo_x]" id="geo_x" value="<?= $model['toado']->geo_x ?>">
                                </div>
                                <div class="col-md-6">
                                    <label>Vĩ độ (Lat)</label>
                                    <input class="form-control" type="text" name="ToaDo[geo_y]" id="geo_y" value="<?= $model['toado']->geo_y ?>">
                                </div>
                            </div>
                            <div style="clear: both"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning pull-left">Cập nhật</button>
                    <a class="btn btn-danger pull-left"
                       href="<?= Yii::$app->urlManager->createUrl('hokinhdoanh/view') . '?id=' . $model['hokinhdoanh']['id_hkd'] ?>">Huỷ</a>
                    <a href="<?= Yii::$app->urlManager->createUrl('hokinhdoanh') ?>"
                       class="btn btn-default pull-right"><i class="fa fa-arrow-left"></i> Quay lại</a>
                </div>
                <div style="clear: both"></div>

            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>

<div style="clear: both"></div>

<script>

    var map;
    map = L.map('capnhatvitri').setView([<?= ($model['toado']->geo_y != null) ? $model['toado']->geo_y : 10.7756587 ?>, <?= ($model['toado']->geo_x != null) ? $model['toado']->geo_x : 106.70042379999995 ?>], 18);
    var marker = new L.marker([<?= ($model['toado']->geo_y != null) ? $model['toado']->geo_y : 10.7756587 ?>, <?= ($model['toado']->geo_x != null) ? $model['toado']->geo_x : 106.70042379999995 ?>], {draggable: 'true'});


    // OVERLAYS -----------------------------------------------------
    var layerOpenStreetMap = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 22,
        maxNativeZoom: 22,
        attribution: '© OpenStreetMap contributors'
    });
    var layerHCMMap = L.tileLayer.wms('http://pcd.hcmgis.vn/geoserver/ows?', {
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
        "OpenStreetMap": layerOpenStreetMap,
        "Ảnh vệ tinh": googlelayer,
        "MapBox": mapbox

    };

    var overLayers = {
        //  'Ranh tổ': layerRanhto.addTo(this.map),
        // 'Ranh nhà': gt_hcm,
        //'Ranh phường': layerRanhphuong.addTo(this.map),
        // 'Ranh quận': layerRanhquan,
        // 'Cần Giờ': layerCanGio,
    };
    $('#geocomplete')
            .geocomplete()
            .bind("geocode:result", function (event, result) {
                map.panTo([result.geometry.location.lat(), result.geometry.location.lng()]);
                marker.setLatLng(new L.LatLng(result.geometry.location.lat(), result.geometry.location.lng()), {draggable: 'true'});
                $('#geo_y').val(result.geometry.location.lat());
                $('#geo_x').val(result.geometry.location.lng());
                marker.addTo(map);
            });
    L.control.layers(baseLayers, overLayers).addTo(this.map);
    this.map.addLayer(mapbox, true);
    var x = 10.7840441;
    var y = 106.6939804;

    marker.on('dragend', function (event) {
        var marker = event.target;
        var position = marker.getLatLng();
        marker.setLatLng(new L.LatLng(position.lat, position.lng), {draggable: 'true'});
        map.panTo(new L.LatLng(position.lat, position.lng))
        $('#geo_y').val(position.lat);
        $('#geo_x').val(position.lng);
    });
    map.addLayer(marker);
    marker.bindPopup('<?= $model['hokinhdoanh']->ten_hkd ?>');
</script>