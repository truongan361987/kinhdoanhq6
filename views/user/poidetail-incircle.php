<style>
    .incircle-item {
        font-size: 11px;
        padding: 5px;
        cursor: pointer;
        border-bottom: 1px solid rgba(0, 0, 0, 0.39);
        border-bottom-style: dotted;
        background-color:white;
    }
    .incircle-item:hover {
        background-color: rgba(0, 0, 0, 0.02);
    }
</style>
<div class="incircle-<?= $params['poi'] ?>">
    <?php foreach ($data as $item ): ?>
        <div class="incircle-item" data-x="<?= $item['geo_x'] ?>"  data-y="<?= $item['geo_y'] ?>">
            <?php include("detail_".$params['poi'].'.php') ?>
        </div>
    <?php endforeach ?>
</div>

<script>
    $(document).ready(function() {
        $('.incircle-<?= $params['poi'] ?> .incircle-item').each(function() {
            var _this = $(this);
            if (typeof(_this.attr('incircle-item')) != 'undefined') {
                _this.attr('incircle-item', true);
                return;
            }
            var x = _this.attr('data-x');
            var y = _this.attr('data-y');

            _this.on('click', function() {
                mapZoomAndPanTo(y, x,18);
            })
        })
    })
</script>