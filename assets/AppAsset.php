<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot/resources';
    public $baseUrl = '@web/resources';
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $css = [
        'css/global/font-awesome.min.css',
        'css/simple-line-icons.min.css',
        'css/global/bootstrap.min.css',
        'css/global/icheck.css',
        'css/global/components.min.css',
        'css/profile.min.css',
        'css/layout.css',
        'css/light.min.css',
        'css/magnific-popup.css',
        'css/leaflet.css',
        'css/leaflet-measure.css',
        'js/leaflet/leaflet.draw.css',
        'css/prunecluster.css',
        //  'css/leaflet-gplaces-autocomplete.css',
        'css/app.css'
    ];
    public $js = [
        'js/global/jquery.min.js',
        'js/global/bootstrap.min.js',
        'js/global/js.cookie.min.js',
        'js/global/bootstrap-hover-dropdown.js',
        'js/global/jquery.slimscroll.min.js',
        'js/global/jquery.blockui.min.js',
        'js/global/bootstrap-switch.min.js',
        'js/global/icheck.min.js',
        'js/global/form-icheck.min.js',
        'js/global/app.min.js',
        'js/profile.min.js',
//        'js/dashboard.min.js',
        'js/layout.min.js',
        'js/demo.min.js',
        'js/quick-sidebar.min.js',
        'js/bootbox.min.js',
        'js/leaflet/leaflet.js',
        'js/leaflet/leaflet.draw.js',
        'js/leaflet-measure.js',
        'js/leaflet/PruneCluster.js',
        'js/leaflet/jquery.geocomplete.js',
        'js/ui-function.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];

}
