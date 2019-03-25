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
    <h4 class="modal-title">Thông tin hộ kinh doanh</h4>
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
                            <th>Tên hộ kinh doanh</th>
                            <td colspan="3"><?= $model['hokinhdoanh']->ten_hkd?></td>
                        </tr>
                        <tr>
                            <th>Địa điểm kinh doanh</th>
                            <td colspan="3"><?= (($model['hokinhdoanh']->vi_tri == NULL) ? '' : $model['hokinhdoanh']->vi_tri . ', ') . (($model['hokinhdoanh']->so_nha == NULL) ? '' : $model['hokinhdoanh']->so_nha . ', ') . (($model['hokinhdoanh']->ten_duong == NULL) ? '' : $model['hokinhdoanh']->ten_duong . ', ') . (($model['hokinhdoanh']->ten_phuong == NULL) ? '' : $model['hokinhdoanh']->ten_phuong)?></td>
                        </tr>
                        <tr>
                            <th>Giấy phép số</th>
                            <td><?= $model['hokinhdoanh']->giayphep_so?></td>
                            <th>Cấp ngày</th>
                            <td><?= ($model['hokinhdoanh']->giayphep_ngay != null) ? date('d-m-Y', strtotime($model['hokinhdoanh']->giayphep_ngay)) : ''?></td>
                        </tr>
                        <tr>
                            <th>Điện thoại</th>
                            <td><?= ($model['hokinhdoanh']->dien_thoai == null) ? '(Chưa có)' : $model['hokinhdoanh']->dien_thoai?></td>
                            <th>Fax</th>
                            <td><?= ($model['hokinhdoanh']->fax == null) ? '(Chưa có)' : $model['hokinhdoanh']->fax?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?= ($model['hokinhdoanh']->email == null) ? '(Chưa có)' : $model['hokinhdoanh']->email?></td>
                            <th>Website</th>
                            <td><?= ($model['hokinhdoanh']->website == null) ? '(Chưa có)' : $model['hokinhdoanh']->website?></td>
                        </tr>
                        <tr>
                            <th>Ngành nghề</th>
                            <td colspan="3"><?= $model['hokinhdoanh']->nganh_kd?></td>
                        </tr>
                        <tr>
                            <th>Vốn kinh doanh</th>
                            <td colspan="3"><?= ($model['hokinhdoanh']->von_kd == null) ? '(Chưa có)' : $model['hokinhdoanh']->von_kd?></td>
                        </tr>
                        <tr>
                            <th>Đại diện</th>
                            <td colspan="3"><?= ($model['hokinhdoanh']->nguoi_daidien == null) ? '(Chưa có)' : $model['hokinhdoanh']->nguoi_daidien?></td>
                        </tr>
                        <tr>
                            <th>Ngày sinh</th>
                            <td><?= ($model['hokinhdoanh']->ngay_sinh == null) ? '(Chưa có)' : date('d-m-Y', strtotime($model['hokinhdoanh']->ngay_sinh))?></td>
                            <th>Giới tính</th>
                            <td><?= ($model['hokinhdoanh']->gioi_tinh == null) ? '' : (($model['hokinhdoanh']->gioi_tinh == 1) ? 'Nam' : 'Nữ')?></td>
                        </tr>
                        <tr>
                            <th>Dân tộc</th>
                            <td><?= ($model['hokinhdoanh']->dan_toc == null) ? '(Chưa có)' : $model['hokinhdoanh']->dan_toc?></td>
                            <th>Quốc tịch</th>
                            <td><?= ($model['hokinhdoanh']->quoc_tich == null) ? '(Chưa có)' : $model['hokinhdoanh']->quoc_tich?></td>
                        </tr>
                        <tr>
                            <th>Chứng minh nhân dân</th>
                            <td colspan="3"><?= ($model['hokinhdoanh']->so_cmnd == null) ? '(Chưa có)' : ($model['hokinhdoanh']->so_cmnd.
                                (($model['hokinhdoanh']->ngay_cap == null) ? '(Chưa có)' : ' cấp ngày '.date('d/m/Y', strtotime($model['hokinhdoanh']->ngay_cap))).
                                (($model['hokinhdoanh']->noi_cap == null) ? '(Chưa có)' : ' tại '.$model['hokinhdoanh']->noi_cap))?></td>
                        </tr>
                        <tr>
                            <th>Hộ khẩu thường trú</th>
                            <td colspan="3"><?= ($model['hokinhdoanh']->hokhau_thuongtru == null) ? '(Chưa có)' : $model['hokinhdoanh']->hokhau_thuongtru?></td>
                        </tr>
                        <tr>
                            <th>Nơi số hiện tại</th>
                            <td colspan="3"><?= ($model['hokinhdoanh']->noisong_hientai == null) ? '(Chưa có)' : $model['hokinhdoanh']->noisong_hientai?></td>
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
    <a class="btn btn-warning pull-left" href="<?= Yii::$app->urlManager->createUrl('hokinhdoanh/update') . '?id=' . $model['hokinhdoanh']->id_hkd ?>">Cập nhật</a>
</div>