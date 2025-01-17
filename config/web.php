<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
       
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'G-L9_adQbKAXOLQ9zxtaXdKtPPebwx-3',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
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
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    
    'modules' => [
	    'user' => [
		    'class' => 'dektrium\user\Module',
		    'enableFlashMessages' => true,
		    'enableRegistration' => true,
		    'enableGeneratingPassword' => true,
		    'enableConfirmation' => false,
		    'enableUnconfirmedLogin' => true,
		    'confirmWithin' => 21600,
		    'cost' => 12,
		    'admins' => ['admin']
        ],
        'rbac' => 'dektrium\rbac\RbacWebModule',
        'teacher' => [
            'class' => 'app\teacher\Teacher',
        ],
	    'markdown' => [
		    // the module class
		    'class' => 'kartik\markdown\Module',

		    // the controller action route used for markdown editor preview
		    'previewAction' => '/markdown/parse/preview',

		    // the list of custom conversion patterns for post processing
		    'customConversion' => [
			    '<table>' => '<table class="table table-bordered table-striped">'
		    ],

		    // whether to use PHP SmartyPantsTypographer to process Markdown output
		    'smartyPants' => true
	    ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
