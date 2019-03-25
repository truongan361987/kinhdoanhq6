<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 8/2/2017
 * Time: 11:11 AM
 */
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
?>

<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="<?= Yii::$app->homeUrl ?>">Trang chủ</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <span class="active">Quản lý tài khoản</span>
    </li>
</ul>

<?php $update = Yii::$app->session->getFlash('update') ?>
<?php if (isset($update)): ?>
    <div class="portlet box green" id="notice">
        <div class="portlet-title">
            <div class="caption"><span class="fa fa-check-circle-o"></span> Cập nhật thành công!</div>
        </div>
    </div>
<?php endif; ?>
<?php $restore = Yii::$app->session->getFlash('restore') ?>
<?php if (isset($restore)): ?>
    <div class="portlet box green" id="notice">
        <div class="portlet-title">
            <div class="caption"><span class="fa fa-check-circle-o"></span> Khôi phục thành công!</div>
        </div>
    </div>
<?php endif; ?>
<?php $success = Yii::$app->session->getFlash('username_success') ?>
<?php if (isset($success)): ?>
    <div class="portlet box green" id="notice">
        <div class="portlet-title">
            <div class="caption"><span class="fa fa-check-circle-o"></span> Thêm mới tài khoản thành công!</div>
        </div>
    </div>
<?php endif; ?>
<?php $fail = Yii::$app->session->getFlash('username_fail') ?>
<?php if (isset($fail)): ?>
    <div class="portlet box red" id="notice">
        <div class="portlet-title">
            <div class="caption"><span class="fa fa-exclamation-circle"></span> Tên đăng nhập đã được sử dụng</div>
        </div>
    </div>
<?php endif; ?>
<div class="page-content-inner">
    <div class="row">
        <div class="col-md-12">
            <div>
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-users"></i> Quản lý tài khoản
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="form-group">
                            <a class='btn btn-success custom-element-load-ajax-div' data-toggle='modal' data-target='#ajaxModal' data-target-div='#ajaxModalContent' data-url="<?= Yii::$app->urlManager->createUrl('auth/quan-ly-tai-khoan/create') ?>"><i class='fa fa-plus'></i> Thêm mới</a>
                        </div>
                        <div class="table-scrollable">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên đăng nhập</th>
                                    <th>Loại tài khoản</th>
                                    <th>Họ tên</th>
                                    <th>Điện thoại</th>
                                    <th>Email</th>
                                    <th>Lần đăng nhập cuối</th>
                                    <th>Thời gian khởi tạo</th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($model['danhsachtaikhoan'] != null): ?>
                                    <?php foreach ($model['danhsachtaikhoan'] as $i => $taikhoan): ?>
                                        <tr>
                                            <td><?= $i + 1 ?></td>
                                            <td><?= $taikhoan->ten_dang_nhap ?></td>
                                            <td><?= ($taikhoan->loaitaikhoan_id == 2) ? 'Editor' : '' ?>
                                                <?= ($taikhoan->loaitaikhoan_id == 3) ? 'Viewer' : ''?>

                                            </td>
                                            <td><?= isset($taikhoan->taikhoanInfos[0]) ? $taikhoan->taikhoanInfos[0]->ho_ten : '' ?></td>
                                            <td><?= isset($taikhoan->taikhoanInfos[0]) ? $taikhoan->taikhoanInfos[0]->dien_thoai : '' ?></td>
                                            <td><?= isset($taikhoan->taikhoanInfos[0]) ? $taikhoan->taikhoanInfos[0]->email : '' ?></td>
                                            <td><?= $taikhoan->last_login ?></td>
                                            <td><?= ($taikhoan->status == 0) ? 'Khóa' : 'Kích hoạt' ?></td>
                                            <td>
                                                <a class='btn btn-warning custom-element-load-ajax-div' data-toggle='modal' data-target='#ajaxModal' data-target-div='#ajaxModalContent' data-url="<?= Yii::$app->urlManager->createUrl('auth/quan-ly-tai-khoan/update').'?id='.$taikhoan->id_taikhoan ?>"><i class='fa fa-pencil'></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="9" style="text-align: center"><i>Chưa có dữ liệu</i></td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="ajaxModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 50%">
        <div class="modal-content" id="ajaxModalContent" style="padding: 0">

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#notice').delay(3000).fadeOut();
    });
</script>