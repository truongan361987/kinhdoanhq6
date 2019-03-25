<?php

use kartik\date\DatePicker;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\select2\Select2;

$urlMN = Url::to(['chinhanh/get']);
$urlDN = Url::to(['chinhanh/getdn']);
?>

<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="<?= Yii::$app->homeUrl ?>">Trang chủ</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="<?= Yii::$app->urlManager->createUrl('chinhanh') ?>">Danh sách Chi nhánh</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Thêm mới Chi nhánh</span>
    </li>
</ul>
<?php
$form = ActiveForm::begin([
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
                    <span class="font-blue-steel">Thêm mới Chi nhánh</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="tabbable-line form-group">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#thongtinchung">Thông tin chung</a></li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="thongtinchung">
                            <div class="col-sm-12">
                                <div class="col-sm-6" autofocus>
                                    <?= $form->field($model['chinhanh'], 'ten_dn', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->textInput(['maxlength' => true])->label('Tên chi nhánh') ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($model['chinhanh'], 'loaihinhdn_id')->dropDownList(ArrayHelper::map($model['loaihinhdn'], 'id_loaihinhdn', 'ten_loai'))->label('Loại hình') ?>
                                </div>
                                  <div class="col-sm-6" no-padding-side>
                                    <?=
                                    $form->field($model['chinhanh'], 'doanhnghiep_id')->widget(Select2::classname(), [
                                        'options' => ['placeholder' => 'Chọn trụ sở chính'],
                                        'pluginOptions' => [
                                            'allowClear' => true,
                                            'language' => [
                                                'errorLoading' => new \yii\web\JsExpression("function () { return 'Waiting for results...'; }"),
                                            ],
                                            'ajax' => [
                                                'url' => $urlDN,
                                                'dataType' => 'json',
                                                'data' => new \yii\web\JsExpression('function(params) { return {q:params.term}; }'),
                                            //'delay' => 1000,
                                            ],
                                            'escapeMarkup' => new \yii\web\JsExpression('function (markup) { return markup; }'),
                                            'templateSelection' => new \yii\web\JsExpression('function(donvi) { return donvi.text; }'),
                                            'templateResult' => new \yii\web\JsExpression('function(donvi) { return donvi.text; }'),
//
                                        ],
                                    ])->label('Trụ sở chính')
                                    ?>
                                </div>
                                <div class="col-sm-6" no-padding-side>
                                    <?=
                                    $form->field($model['chinhanh'], 'ma_nganh')->widget(Select2::classname(), [
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
                                    ?>
                                </div>

                                <div class="col-sm-4">
                                    <?= $form->field($model['chinhanh'], 'ma_dn')->textInput(['maxlength' => true])->label('Mã DN') ?>
                                </div>
                                <div class="col-sm-4">
                                    <?=
                                    $form->field($model['chinhanh'], 'ngay_cap')->widget(DatePicker::classname(), [
                                        'options' => ['placeholder' => 'Ngày cấp ...'],
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'dd-mm-yyyy'
                                        ]
                                    ])->label('Ngày cấp');
                                    ?>                            
                                </div>
                                <div class="col-sm-4">
                                    <?=
                                    $form->field($model['chinhanh'], 'ngay_thaydoi')->widget(DatePicker::classname(), [
                                        'options' => ['placeholder' => 'Ngày thay đổi ...'],
                                        'pluginOptions' => [
                                            'autoclose' => true,
                                            'format' => 'dd-mm-yyyy'
                                        ]
                                    ])->label('Ngày thay đổi');
                                    ?>                            
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <?= $form->field($model['chinhanh'], 'nganh_kd')->textarea()->label('Ngành nghề kinh Doanh') ?>
                                </div>
                            </div>
                          
                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <?= $form->field($model['chinhanh'], 'so_nha')->textInput(['maxlength' => true])->label('Số nhà') ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model['chinhanh'], 'ten_duong')->textInput(['maxlength' => true])->label('Tên đường') ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($model['chinhanh'], 'ten_phuong')->dropDownList(ArrayHelper::map($model['ranhphuong'], 'tenphuong', 'tenphuong'))->label('Tên phường') ?>
                                </div>

                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <?= $form->field($model['chinhanh'], 'nguoi_daidien')->textInput(['maxlength' => true])->label('Người đại diện') ?>
                                </div>
                                <div class="col-sm-6">
                                    <?= $form->field($model['chinhanh'], 'dien_thoai')->textInput(['maxlength' => true])->label('Điện thoại') ?>
                                </div>
                            </div>
                            <div style="clear: both"></div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success pull-left">Thêm mới Chi nhánh</button>
                    <a href="<?= Yii::$app->urlManager->createUrl('chinhanh') ?>"
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

    $("#cboCountry").change(function () {

        if ($(this).val() == "Chấm dứt") {

            $("#txtcboDenngay").hide();

            $("#txtcboTungay").show();

        } else if ($(this).val() == "Tạm ngừng") {

            $("#txtcboTungay").show();
            $("#txtcboDenngay").show();
        } else if ($(this).val() == "Đang hoạt động") {

            $("#txtcboTungay").hide();
            $("#txtcboDenngay").hide();
        }

    });

</script>