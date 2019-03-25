<div style="font-family: Tahoma" class="dn-item" data-point-x="<?= $model["geo_x"] ?>" data-point-y="<?= $model["geo_y"] ?>">
    <div class="ten"><?= $model['ten_dn'] ?> </div>
    <div class="madn">Mã DN: <?= (($model['ma_dn'] == NULL) ? '(Chưa có)' : $model['ma_dn']) ?></div>
    <div class="nganhnghe" title="<?= $model['nganh_kd'] ?>">Ngành KD: <?= $model['nganh_kd'] ?></div>
    <div class="daidien">Người đại diện: <?= $model['nguoi_daidien'] ?></div>
    <div class="diachi">Địa chỉ: <?= (($model['so_nha'] == NULL) ? '' : $model['so_nha'] . ', ') . (($model['ten_duong'] == NULL) ? '' : $model['ten_duong'] . ', ') . (($model['ten_phuong'] == NULL) ? '' : $model['ten_phuong']) ?></div>

    <div><a class="custom-element-load-ajax-div pull-right" data-target-div="#ajaxModalContent" onclick="DoanhnghiepView(<?= $model['id_doanhnghiep'] ?>)"  data-toggle="modal" data-target="#ajaxModal"><i class="fa fa-eye"></i> (Xem chi tiết) </a></div>
</div>