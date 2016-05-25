<?php

return [
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Тестовое задание',
    'id' => 'test-dev',
    'language' => 'ru',
    'aliases' => [
        'vendor' => realpath(__DIR__ . '/../../vendor'),
        'bootstrap' => dirname(__FILE__).'/../extensions/bootstrap',
    ],
    'modules' => [
        'gii' => [
            'class' => 'vendor.yiisoft.yii.framework.gii.GiiModule',#'system.gii.GiiModule',
            'password' => 'giitest',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => false,#['127.0.0.1','::1','*'],
        ],
    ],

    // preloading 'log' component
    'preload' => ['log'],

    // autoloading model and component classes
    'import' => [
        'application.models.*',
        'application.components.*',
        'ext.shortcut.Y',
        'ext.helpers.*',
    ],

    // application components
    'components' => [

        'urlManager' => [
            'urlFormat' => 'path',
            'urlSuffix' => '.html',
            'showScriptName' => false,
            'appendParams' => false,
            'rules' => [],
        ],

        'user' => [
            'allowAutoLogin' => true,
        ],

        'db' => require(dirname(__FILE__) . '/database.php'),

        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'log' => [
            'class' => 'CLogRouter',
            'routes' => [
                [
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ],
            ],
        ],

        'bootstrap'=>[
            'class'=>'ext.bootstrap.components.Bootstrap',
        ],

    ],

    'behaviors' => [
        ['class' => 'application.extensions.CorsBehavior',
            'route' => ['site/MathNumbers'],
            'allowOrigin' => '*'
        ],
    ],

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => [
        'adminEmail' => 'stenleegun@gmail.com',
    ],
];