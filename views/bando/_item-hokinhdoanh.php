<div style="font-family: Tahoma" class="hokd-item" data-point-x="<?= $model["geo_x"] ?>" data-point-y="<?= $model["geo_y"] ?>">
    <div class="ten"><?= (($model['ten_hkd'] == NULL) ? '(Chưa có)' : $model['ten_hkd']) ?></div>
    <div class="nganhnghe" title="<?= $model['nganh_kd'] ?>">Ngành KD: <?= $model['nganh_kd'] ?></div>
    <div class="daidien">Người đại diện: <?= $model['nguoi_daidien'] ?></div>
    <div class="giayphepso">Số GCN: <?= $model['giayphep_so'] ?> - Ngày cấp: <?= (($model['giayphep_ngay'] == NULL) ? '(Chưa có)' : date('d/m/Y', strtotime($model['giayphep_ngay']))) ?>   </div>
    <div class="diachi">Địa chỉ: <?= (($model['vi_tri'] == NULL) ? '' : $model['vi_tri'] . ', ') . (($model['so_nha'] == NULL) ? '' : $model['so_nha'] . ', ') . (($model['ten_duong'] == NULL) ? '' : $model['ten_duong'] . ', ') . (($model['ten_phuong'] == NULL) ? '' : $model['ten_phuong']) ?></div>

    <div><a class="custom-element-load-ajax-div pull-right" data-target-div="#ajaxModalContent" onclick="HokinhdoanhView(<?= $model['id_hkd'] ?>)"  data-toggle="modal" data-target="#ajaxModal"><i class="fa fa-eye"></i> (Xem chi tiết) </a></div>

</div>