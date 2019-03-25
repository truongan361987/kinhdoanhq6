<?php
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Tổng quan
        </h1>
    </div>
    <!-- END PAGE TITLE -->

</div>
<!-- END PAGE HEAD-->

<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
    <div class ="col-xs-12">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <div class="number">
                    <h3 class="font-red-haze">
                        <span data-counter="counterup" data-value="1349"><?= $model ?></span>
                    </h3>
                    <small><a href="<?= Yii::$app->homeUrl ?>hokinhdoanh">Hộ kinh doanh</a></small>
                </div>
                <div class="icon">
                    <i class="icon icon-home"></i>
                </div>

            </div>
        </div>
    </div>
    <div class ="col-xs-4">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <h3 class="font-red-haze">
                    <span data-counter="counterup" data-value="1349">    <a href="<?= Yii::$app->homeUrl ?>hokinhdoanh/create"> <i class="glyphicon glyphicon-plus"></i> Thêm mới hộ kinh doanh</a></span>
                </h3>

            </div>
        </div>
    </div>
    <div class ="col-xs-4">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <h3 class="font-red-haze">
                    <span data-counter="counterup" data-value="1349">    <a href="<?= Yii::$app->homeUrl ?>hokinhdoanh/timkiem"> <i class="glyphicon glyphicon-search"></i></i> Tìm kiếm hộ kinh doanh</a></span>
                </h3>           
            </div>
        </div>
    </div>
    <div class ="col-xs-4">
        <div class="dashboard-stat2 bordered">
            <div class="display">
                <h3 class="font-red-haze">
                    <span data-counter="counterup" data-value="1349">   <a href="<?= Yii::$app->homeUrl ?>thongtinvipham/timkiem"> <i class="glyphicon glyphicon-search"></i></i> Tìm kiếm thông tin vi phạm</a></span>
                </h3>           
            </div>
        </div>
    </div>
</div>

