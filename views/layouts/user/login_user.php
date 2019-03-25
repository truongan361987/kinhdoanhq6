<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title>Quản lý kinh doanh quận 6</title>
        <?php $this->head() ?>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVofCmO1bDdRaP5bMhwrZ-pEAi9AEhAgQ&libraries=places&regions=country:vn"></script>
    </head>
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
        <?php $this->beginBody() ?>
       
        <!-- END HEADER -->
        <div class="clearfix"></div>
        <div class="page-container">
            <div class="page-content">
                <?= $content ?>
            </div>

        </div>
        <a href="javascript:;" class="page-quick-sidebar-toggler">
            <i class="icon-logout"></i>
        </a>
        <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
            <?php include('quicksidebar.php'); ?>
        </div>
        <div class="page-footer">
            <?php include('footer_user.php'); ?>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
