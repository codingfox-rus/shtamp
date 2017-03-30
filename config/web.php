<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name' => 'СпецТехОснастка - Ювелирные штампы и инструменты',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'assetManager' => [
            'appendTimestamp' => true,
            //'linkAssets' => true
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
            'itemFile' => '@app/components/rbac/items.php',
            'assignmentFile' => '@app/components/rbac/assignments.php',
            'ruleFile' => '@app/components/rbac/rules.php'
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Shtamp new website',
            'baseUrl' => ''
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
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
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.yandex.ru',
                'port' => '465',
                'encryption' => 'ssl',
                'username' => $params['username'],
                'password' => $params['password']
            ]
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class' => 'yii\log\EmailTarget',
                    'levels' => ['error'],
                    'message' => [
                        'from' => $params['username'],
                        'to' => ['olegserebryakoff@mail.ru'],
                        'subject' => 'Shtamp-21 | Сообщение об ошибке',
                    ],
                    'except' => [
                        'yii\web\HttpException:404',
                    ],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'site/index',
                'catalog' => 'site/catalog',
                'novelties' => 'site/novelties',
                'admin' => 'site/admin',
                'login' => 'site/login',
                'test' => 'site/test',
                'contact' => 'site/contact',
                '<url:[\w\-]+>' => 'site/page',
                //'<action>' => 'site/<action>',
                '<controller>' => '<controller>/index',
                //'admin/<controller>' => '<controller>/index',
                //'admin/<controller>/<action>' => '<controller>/<action>',
            ]
        ],
    ],
    'params' => $params,
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Admin',
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];

    $config['components']['db'] = require(__DIR__ . '/db-local.php');
    $config['components']['assetManager']['forceCopy'] = true;
}

return $config;
