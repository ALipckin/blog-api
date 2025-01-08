<?php

use yii\rest\UrlRule;
use yii\web\JsonParser;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

$config = [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'enableCsrfValidation' => false,
            'csrfParam' => '_csrf-frontend',
            'parsers'   => [
                'application/json'  => JsonParser::class
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => UrlRule::class, 'controller' => ['post', 'comment']],
                [
                    'pattern' => 'posts/<postId:\d+>/comments',
                    'route' => 'comment/index'
                ]
            ],
        ],
    ],
    'params' => $params,
    'modules' => [
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['*'],
        ],
    ],
];

// Добавляем конфигурацию для модуля gii
$config['modules']['gii'] = [
    'class' => 'yii\gii\Module',
    'allowedIPs' => ['*'], // Разрешить доступ с любых IP (для разработки)
];

return $config;
