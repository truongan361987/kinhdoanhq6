<div style="font-family: Tahoma" class="ch-item" data-point-x="<?= $model["geo_x"] ?>" data-point-y="<?= $model["geo_y"] ?>">
    <div class="ten"><?= $model['ten_cuahang'] ?> </div>
    <div class="loaihinh" title="<?= $model['ten_loai'] ?>">Loại hình: <?= $model['ten_loai'] ?></div>
    <div class="donvi">Đơn vị chủ quản: <?= $model['ten_donvi'] ?></div>
    <div class="dientich">Diện tích: <?= (($model['dien_tich'] == NULL) ? '(Chưa có)' : number_format($model['dien_tich'], 0, ',', '.') ) ?> m<sup>2</sup> </div>
    <div class="diachi"></i> Địa chỉ: <?= (($model['so_nha'] == NULL) ? '' : $model['so_nha'] . ', ') . (($model['ten_duong'] == NULL) ? '' : $model['ten_duong'] . ', ') . (($model['ten_phuong'] == NULL) ? '' : $model['ten_phuong']) ?></div>

    <div><a class="custom-element-load-ajax-div pull-right" data-target-div="#ajaxModalContent" onclick="CuahangView(<?= $model['id_cuahang'] ?>)"  data-toggle="modal" data-target="#ajaxModal"><i class="fa fa-eye"></i> (Xem chi tiết) </a></div>
</div>