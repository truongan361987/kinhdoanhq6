<div class="col-lg-12">
    <div style="font-size: 11px; margin-bottom: 10px" class="font-red-haze pull-right"><b>Có <?= $totalcount ?> kết quả</b></div>
</div>
<div class="mt-element-list hokd-list">
    <div class="mt-list-container list-simple ext-1 hokd-list" style='max-height: 400px; overflow: auto'>

        <?php foreach ($models as $model): ?>

            <div class="hokd-item" style="font-family: Tahoma" data-point-x="<?= $model["geo_x"] ?>"
                 data-point-y="<?= $model["geo_y"] ?>">
                <div class="col-lg-12">
                    <div class="ten"><a href='<?= Yii::$app->homeUrl ?>hokinhdoanh/view?id=<?= $model["id_hkd"] ?>'
                                        target='_blank'><?= (($model['ten_hkd'] == NULL) ? '(Chưa có)' : $model['ten_hkd']) ?></a>
                        <?php if ($model["geo_x"] != null): ?>
                            <span style='color: red'><i class="fa fa-map-marker"></i></span>
                        <?php else: ?>
                            <span style=''><i style='color: gray' class="fa fa-map-marker"></i></span>
                        <?php endif; ?>
                    </div>
                    <div class="daidien">Người đại diện: <?= $model['nguoi_daidien'] ?></div>
                    <div class="cmnd">CMND: <?= (($model['so_cmnd'] == NULL) ? '(Chưa có)' : $model['so_cmnd']) ?> - Ngày cấp: <?= (($model['ngay_cap'] == NULL) ? '(Chưa có)' : date('d/m/Y', strtotime($model['ngay_cap'])))?> - Nơi cấp: <?= (($model['noi_cap'] == NULL) ? '(Chưa có)' : $model['noi_cap']) ?>
                    </div>
                    <div class="nganhnghe" title="<?= $model['nganh_kd'] ?>">Ngành KD: <?= $model['nganh_kd'] ?> - Mã ngành: <?= (($model['ma_nganh'] == NULL) ? '(Chưa có)' : $model['ma_nganh']) ?>  </div>
                  
                    <div class="giayphepso">Số GCN: <?= $model['giayphep_so'] ?> - Ngày cấp: <?= (($model['giayphep_ngay'] == NULL) ? '(Chưa có)' : date('d/m/Y', strtotime($model['giayphep_ngay']))) ?>   </div>
                    <div class="dienthoai">Điện thoại: <?= (($model['dien_thoai'] == NULL) ? '(Chưa có)' : $model['dien_thoai']) ?>
                          <div class="diachi">Địa chỉ:  <?= (($model['vi_tri'] == NULL) ? '' : $model['vi_tri'] . ', ') . (($model['so_nha'] == NULL) ? '' : $model['so_nha'] . ', ') . (($model['ten_duong'] == NULL) ? '' : $model['ten_duong'] . ', ') . (($model['ten_phuong'] == NULL) ? '' : $model['ten_phuong']) ?>
                    </div>
                    </div>
                </div>


            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= yii\widgets\LinkPager::widget(['pagination' => $pages]); ?>