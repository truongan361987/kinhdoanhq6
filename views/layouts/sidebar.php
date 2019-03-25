<?php

use app\services\UtilityService;

/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 4/22/2017
 * Time: 10:24 AM
 */
?>
<div class="page-sidebar navbar-collapse collapse">
    <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
        <li class="nav-item start active open">
            <a href="<?= Yii::$app->homeUrl ?>" class="nav-link nav-toggle">
                <i class="fa fa-home"></i>
                <span class="title">Trang chủ</span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="<?= Yii::$app->urlManager->createUrl('site/huongdan') ?>" class="nav-link nav-toggle">
                <i class="fa fa-info"></i>
                <span class="title">Hướng dẫn sử dụng</span>
            </a>
        </li>
        <li class="heading">
            <h3 class="uppercase">Quản lý</h3>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-user-circle"></i>
                <span class="title">Cửa hàng</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="<?= Yii::$app->urlManager->createUrl('cuahang') ?>" class="nav-link ">
                        <span class="title">Danh sách</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= Yii::$app->urlManager->createUrl('cuahang/timkiem') ?>" class="nav-link ">
                        <span class="title">Tìm kiếm</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-user-circle"></i>
                <span class="title">Hộ kinh doanh</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="<?= Yii::$app->urlManager->createUrl('hokinhdoanh') ?>" class="nav-link ">
                        <span class="title">Danh sách</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= Yii::$app->urlManager->createUrl('hokinhdoanh/timkiem') ?>" class="nav-link ">
                        <span class="title">Tìm kiếm</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-shopping-cart"></i>
                <span class="title">Doanh nghiệp </span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="<?= Yii::$app->urlManager->createUrl('doanhnghiep') ?>" class="nav-link ">
                        <span class="title">Danh sách</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= Yii::$app->urlManager->createUrl('doanhnghiep/timkiem') ?>" class="nav-link ">
                        <span class="title">Tìm kiếm</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-shopping-cart"></i>
                <span class="title">Chi nhánh công ty </span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="<?= Yii::$app->urlManager->createUrl('chinhanh') ?>" class="nav-link ">
                        <span class="title">Danh sách</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= Yii::$app->urlManager->createUrl('chinhanh/timkiem') ?>" class="nav-link ">
                        <span class="title">Tìm kiếm</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="heading">
            <h3 class="uppercase">Danh mục</h3>
        </li>
        <li class="nav-item  ">
            <a href="<?= Yii::$app->homeUrl ?>dmloaicuahang" class="nav-link ">
                <i class="fa fa-list"></i>
                <span class="title">Loại cửa hàng</span>

            </a>
        </li>
        <li class="nav-item  ">
            <a href="<?= Yii::$app->homeUrl ?>dmmanganh" class="nav-link ">
                <i class="fa fa-book "></i>
                <span class="title">Mã ngành kinh tế</span>

            </a>
        </li>
        <li class="heading">
            <h3 class="uppercase">Thống kê</h3>
        </li>
        <li class="nav-item  ">
            <a href="<?= Yii::$app->homeUrl ?>thongke/tknganhnghe" class="nav-link nav-toggle">
                <i class="icon-bar-chart"></i>
                <span class="title">Theo ngành nghề</span>
            </a>
        </li>
        <li class="nav-item  ">
            <a href="<?= Yii::$app->homeUrl ?>thongke/tkphuong" class="nav-link nav-toggle">
                <i class="icon-bar-chart"></i>
                <span class="title">Theo phường</span>
            </a>
        </li>
        <li class="heading">
            <h3 class="uppercase">Tài khoản</h3>
        </li>
        <li class="nav-item  ">
            <a href="<?= Yii::$app->homeUrl ?>auth/quan-ly-tai-khoan/danh-sach" class="nav-link nav-toggle">
                <i class="fa fa-users"></i>
                <span class="title">Quản lý tài khoản</span>
            </a>
        </li>
        <li class="heading">
            <h3 class="uppercase">Đồng bộ dữ liệu</h3>
        </li>
        <li class="nav-item  ">
            <a href="<?= Yii::$app->homeUrl ?>test/index" class="nav-link nav-toggle">
                <i class="fa fa-refresh"></i>
                <span class="title">Đồng bộ dữ liệu</span>
            </a>
        </li>
    </ul>
    <!-- END SIDEBAR MENU -->
</div>
