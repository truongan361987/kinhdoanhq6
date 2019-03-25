
<div id='ketqua-thongke' class='collapse in'>
    <table class="table table-hover table-consended">
        <thead>
            <tr>
                <th>Lớp dữ liệu</th>
                <th>Số lượng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $name => $item): ?>
                <tr>
                    <td><?= $item['title'] ?></td>
                    <td><a href='#' class="custom-count-incircle" data-href='<?= Yii::$app->homeUrl ?>bando/poidetail-incircle?lat=<?= $params['lat'] ?>&lng=<?= $params['lng'] ?>&radius=<?= $params['radius'] ?>&poi=<?= $name ?>' data-toggle='collapse' data-target="#<?= $name ?>"><?= $item['count'] ?></a></td>
                </tr>
                <tr style="padding: 0px">
                    <td colspan='2' style="padding: 0px">
                        <div style="max-height: 200px; overflow: auto" id="<?= $name ?>" class="collapse">
                            Đang lấy dữ liệu...
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('.custom-count-incircle').on('click', function() {
            var _this = $(this);
            var _url = _this.attr('data-href');
            var _target = $(_this.attr('data-target'));

            if (typeof(_target.attr('data-set')) == 'undefined')
            $.ajax({
                url: _url,
                success: function(html) {
                    _target.attr('data-set', true);
                    _target.empty().append(html);
                }
            })
        })
    });
</script>