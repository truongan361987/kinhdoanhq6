<div class="col-lg-12">
    <div style="font-size: 11px; margin-bottom: 10px" class="font-red-haze pull-right"><b>Có <?= $totalcount ?> kết quả</b></div>
</div>
<div class="mt-element-list ch-list">
    <div class="mt-list-container list-simple ext-1 ch-list" style='max-height: 400px; overflow: auto'>

        <?php foreach ($models as $model): ?>

            <div class="ch-item" style="font-family: Tahoma" data-point-x="<?= $model["geo_x"] ?>"
                 data-point-y="<?= $model["geo_y"] ?>">
                <div class="col-lg-12">
                    <div class="ten"><a href='<?= Yii::$app->homeUrl ?>cuahang/view?id=<?= $model["id_cuahang"] ?>'
                                        target='_blank'><?= (($model['ten_cuahang'] == NULL) ? '(Chưa có)' : $model['ten_cuahang']) ?></a>
                                        <?php if ($model["geo_x"] != null): ?>
                            <span style='color: red'><i class="fa fa-map-marker"></i></span>
                        <?php else: ?>
                            <span style=''><i style='color: gray' class="fa fa-map-marker"></i></span>
                        <?php endif; ?>
                    </div>
                    <div class="loaihinh" title="<?= $model['ten_loai'] ?>">Loại hình: <?= $model['ten_loai'] ?></div>
                    <div class="donvi">Đơn vị chủ quản: <?= $model['ten_donvi'] ?></div>
                    <div class="hoatdong"> Năm hoạt động: <?= (($model['nam_hoatdong'] == NULL) ? '(Chưa có)' : $model['nam_hoatdong'] ) ?> </div>
                    <div class="nganhnghe" title="<?= $model['nganh_kd'] ?>">Ngành KD: <?= $model['nganh_kd'] ?> - Mã ngành:  <?= (($model['ma_nganh'] == NULL) ? '(Chưa có)' : $model['ma_nganh']) ?>  </div>
                    <div class="dientich">Diện tích: <?= (($model['dien_tich'] == NULL) ? '(Chưa có)' : number_format($model['dien_tich'], 0, ',', '.') ) ?> m<sup>2</sup> </div>
                    <div class="diachi">Địa chỉ: <?= (($model['so_nha'] == NULL) ? '' : $model['so_nha'] . ', ') . (($model['ten_duong'] == NULL) ? '' : $model['ten_duong'] . ', ') . (($model['ten_phuong'] == NULL) ? '' : $model['ten_phuong']) ?>
                    </div>
                </div>


            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= yii\widgets\LinkPager::widget(['pagination' => $pages]); ?>