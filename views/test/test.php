<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<style>
    body{
        background-color: #FBFBFB
    }

    .progress{
        border-radius: 0
    }
    label {
        background-color: pink;
        color: black;
        font-weight: bold;
        padding: 4px;
        text-transform: uppercase;
        font-family: Verdana, Arial, Helvetica, sans-serif;
        font-size: xx-small;
    }
</style>
<script src="https://cdn.rawgit.com/ilopX/jquery-ajax-progress/master/dist/jquery.ajax-progress.js"></script>
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="<?= Yii::$app->homeUrl ?>">Trang chủ</a>
        <i class="fa fa-circle"></i>
    </li>

    <li>
        <span class="active">Đồng bộ dữ liệu</span>
    </li>

</ul>

<div class="row">

    <div class="col-md-12 ">
        <!-- BEGIN GEOCODING PORTLET-->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-green"></i>
                    <span class="caption-subject font-green bold uppercase">Đồng bộ dữ liệu</span>

                </div>
                <div class="actions">
                    <div class="input-group" id="geocomplete-wrapper">
                        <button id="syncbutton" type="button" class="btn btn-success pull-left" onclick="ajaxGetData()">Đồng bộ</button>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div class="progress">
                    <div id="progress" class="progress-bar progress-bar-striped active" role="progressbar" >
                    </div>
                </div>
                <label id="lbltipAddedComment"></label>
            </div>
        </div>
        <!-- END GEOCODING PORTLET-->
    </div>
</div>
<script>
    $(document).ready(function () {
        $.ajax({
            method: 'GET',
            url: '<?= Yii::$app->homeUrl . 'test/check' ?>',
            success: function (respone) {
                console.log(respone);
                if (respone == 1) {
                    $("#lbltipAddedComment").text("Dữ liệu cần được đồng bộ!");
                } else {
                    $("#lbltipAddedComment").text("Không có dữ liệu đồng bộ!");
                }
            },
        });
    });
    function ajaxGetData() {
        $("#lbltipAddedComment").text("Đang đồng bộ dữ liệu...");
        $.ajax({
            method: 'GET',
            url: '<?= Yii::$app->homeUrl . 'test/create' ?>',
            data: {
                action: true
            },
            success: function (respone) {
                var result = $.parseJSON(respone);
                $("#lbltipAddedComment").text('Đã cập nhật: ' + result[0] + ' hồ sơ; ' + ' Đã thêm mới: ' + result[1] + ' hồ sơ.');
                $.ajax({
                    method: 'GET',
                    url: '<?= Yii::$app->homeUrl . 'test/check' ?>',
                    success: function (respone) {
                        console.log(respone);
                        if (respone == 1) {
                            ajaxGetData();
                        } else {
                            $("#lbltipAddedComment").text("Đã đồng bộ dữ liệu!");
                        }
                    },
                });
            },
            error: function () {
                $("#lbltipAddedComment").text("Lỗi đồng bộ dữ liệu!");
            },
            progress: function (e) {
                if (e.lengthComputable) {
                    setProgress(e.loaded / e.total * 100);
                    $('#content').html(e.srcElement.responseText);
                } else {
                    console.warn('Content Length not reported!');
                }
            }
        });

    }

    function setProgress(precis) {
        var progress = $('#progress');

        progress.toggleClass('active', precis < 100);

        progress.css({
            width: precis = precis.toPrecision(3) + '%'
        }).html('<span>' + precis + '</span>');
    }
</script>