<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'forceCopy' => true,
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => []
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => []
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
            ],
        ],
         'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '<i>(Chưa có)</i>',
        ],
        'siteApi' => [
            'class' => 'mongosoft\soapclient\Client',
            'url' => 'http://116.193.64.9/CPKT_API/CPKD_API.asmx?wsdl',
            'options' => [
                'cache_wsdl' => WSDL_CACHE_NONE,
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'kinhdoanhq6',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\auth\Taikhoan',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'modules' => [
        'maps' => [
            'class' => 'app\modules\maps\Map',
//            'defaultRoute' => 'maps'
        ],
        'auth' => [
            'class' => 'app\modules\auth\Auth',
//            'defaultRoute' => 'maps'
        ],
    ],
    'params' => $params,
//    'as beforeRequest' => [
//        'class' => 'yii\filters\AccessControl',
//        'rules' => [
//            [
//                'allow' => true,
//                'actions' => ['login'],
//                'roles' => ['?'],
//            ],
//            [
//                'allow' => true,
//                'controllers' => [
//
//                ],
//                'roles' => ['@'],
//            ],
//        ],
//        'denyCallback' => function () {
//            return Yii::$app->response->redirect(['site/login']);
//        },
//    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    // $config['bootstrap'][] = 'debug';
    // $config['modules']['debug'] = [
    //     'class' => 'yii\debug\Module',
    //     // uncomment the following to add your IP if you are not connecting from localhost.
    //     //'allowedIPs' => ['127.0.0.1', '::1'],
    // ];
    //$config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
            // uncomment the following to add your IP if you are not connecting from localhost.
            //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
    $config['modules']['gridview'] = [
        'class' => 'kartik\grid\Module',
    ];
}

return $config;
