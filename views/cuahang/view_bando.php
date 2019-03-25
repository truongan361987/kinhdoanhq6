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
    <h4 class="modal-title">Thông tin Cửa hàng</h4>
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
                            <th>Tên cửa hàng</th>
                            <td colspan="3"><?= $model['cuahang']->ten_cuahang ?></td>
                        </tr>
                        <tr>
                            <th>Loại hình</th>
                            <td colspan="3"><?= $model['cuahang']->ten_loai ?></td>
                        </tr>
                        <tr>
                            <th>Địa chỉ</th>
                            <td colspan="3"><?= (($model['cuahang']->so_nha == NULL) ? '' : $model['cuahang']->so_nha . ', ') . (($model['cuahang']->ten_duong == NULL) ? '' : $model['cuahang']->ten_duong . ', ') . $model['cuahang']->ten_phuong ?></td>
                        </tr>
                        <tr>
                            <th>Ngành nghề</th>
                            <td colspan="3"><?= ($model['cuahang']->nganh_kd == null) ? '(Chưa có)' : $model['cuahang']->nganh_kd ?></td>
                        </tr>
                        <tr>
                            <th>Người đại diện</th>
                            <td colspan="3"><?= ($model['cuahang']->ten_donvi == null) ? '(Chưa có)' : $model['cuahang']->ten_donvi ?></td>
                        </tr>
                        <tr>
                            <th>Năm hoạt động</th>
                            <td colspan="3"><?= ($model['cuahang']->nam_hoatdong == null) ? '(Chưa có)' : $model['cuahang']->nam_hoatdong ?></td>
                        </tr>
                         <tr>
                            <th>Diện tích kinh doanh</th>
                            <td colspan="3"><?= ($model['cuahang']->dien_tich == null) ? '(Chưa có)' : number_format($model['cuahang']->dien_tich , 0, ',', '.') ?> m<sup>2</sup></td>
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
    <a class="btn btn-warning pull-left" href="<?= Yii::$app->urlManager->createUrl('cuahang/update') . '?id=' . $model['cuahang']->id_cuahang ?>">Cập nhật</a>
</div>