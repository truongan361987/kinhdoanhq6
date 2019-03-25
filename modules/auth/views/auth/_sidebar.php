<?php
/**
 * Created by PhpStorm.
 * User: MinhDuc
 * Date: 8/29/2018
 * Time: 10:30 AM
 */
?>
<div class="list-group">
    <?php $pathInfo = Yii::$app->request->pathInfo;?>
    <a class="list-group-item <?= ($pathInfo == 'auth/auth/thong-tin-ca-nhan') ? 'active' : ''?>" href="<?= Yii::$app->urlManager->createUrl('auth/auth/thong-tin-ca-nhan')?>">
        <span>Thông tin cá nhân</span>
    </a>
    <a class="list-group-item <?= ($pathInfo == 'auth/auth/doi-mat-khau') ? 'active' : ''?>" href="<?= Yii::$app->urlManager->createUrl('auth/auth/doi-mat-khau')?>">
        <span>Đổi mật khẩu</span>
    </a>
</div>
