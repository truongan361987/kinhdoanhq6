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
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Thông tin doanh nghiệp</h4>
</div>
<div class="modal-body">
    1
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Đóng</button>
    <a class="btn btn-warning pull-left"
       href="<?= Yii::$app->urlManager->createUrl('doanhnghiep/update') . '?id=' . $model['doanhnghiep']->id_doanhnghiep ?>">Cập
        nhật</a>
</div>