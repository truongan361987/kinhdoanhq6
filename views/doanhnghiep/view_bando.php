<?php

use yii\widgets\DetailView;

/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 10/6/2017
 * Time: 4:50 PM
 */
?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Thông tin doanh nghiệp</h4>
</div>
<div class="modal-body">
    <div class="tabbable-line">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#thongtinchung">Thông tin chung</a></li>

        </ul>
        <div class="tab-content">
            <div class=" tab-pane active" id="thongtinchung">
                <div class="col-md-12 form-group" >
                    <table class="table table-responsive table-bordered table-striped">
                        <tr>
                            <th>Tên doanh nghiệp</th>
                            <td colspan="3"><?= $model['doanhnghiep']->ten_dn ?></td>
                        </tr>
                        <tr>
                            <th>Địa chỉ</th>
                            <td colspan="3"><?= (($model['doanhnghiep']->so_nha == NULL) ? '' : $model['doanhnghiep']->so_nha . ', ') . (($model['doanhnghiep']->ten_duong == NULL) ? '' : $model['doanhnghiep']->ten_duong . ', ') . (($model['doanhnghiep']->ten_phuong == NULL) ? '' : $model['doanhnghiep']->ten_phuong)?></td>
                        </tr>
                        <tr>
                            <th>Giấy phép số</th>
                            <td><?= $model['doanhnghiep']->ma_dn ?></td>
                            <th>Ngày cấp</th>
                            <td><?= ($model['doanhnghiep']->ngay_cap != null) ? date('d-m-Y', strtotime($model['doanhnghiep']->ngay_cap)) : '' ?></td>
                            <th>Ngày thay đổi</th>
                            <td><?= ($model['doanhnghiep']->ngay_thaydoi != null) ? date('d-m-Y', strtotime($model['doanhnghiep']->ngay_thaydoi)) : '' ?></td>
                        </tr>
                        <tr>
                            <th>Điện thoại</th>
                            <td><?= ($model['doanhnghiep']->dien_thoai == null) ? '(Chưa có)' : $model['doanhnghiep']->dien_thoai ?></td>
                            <th>Vốn kinh doanh</th>
                            <td colspan="3"><?= ($model['doanhnghiep']->von_dieule == null) ? '(Chưa có)' : $model['doanhnghiep']->von_dieule ?></td>
                            <th>Số lao động</th>
                            <td><?= ($model['doanhnghiep']->so_laodong == null) ? '(Chưa có)' : $model['doanhnghiep']->so_laodong ?></td>
                        </tr>
                        <tr>
                        <tr>
                            <th>Ngành nghề</th>
                            <td colspan="3"><?= $model['doanhnghiep']->nganh_kd ?></td>
                        </tr>
                        <tr>
                            <th>Đại diện</th>
                            <td colspan="3"><?= ($model['doanhnghiep']->nguoi_daidien == null) ? '(Chưa có)' : $model['doanhnghiep']->nguoi_daidien ?></td>
                        </tr>

                    </table>
                </div>
            </div>


        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Đóng</button>
    <a class="btn btn-warning pull-left" href="<?= Yii::$app->urlManager->createUrl('doanhnghiep/update') . '?id=' . $model['doanhnghiep']->id_doanhnghiep ?>">Cập nhật</a>
</div>