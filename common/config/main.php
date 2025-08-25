<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            // 'defaultRoles' => ['admin', 'user'],
        ],


        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class, // or yii\swiftmailer\Mailer::class
            'transport' => [
                'scheme' => 'smtp',
                'host' => 'smtp.gmail.com', // Your SMTP host
                'username' => '',
                'password' => '',
                'port' => 587, // Or your SMTP port
            ],
            'viewPath' => '@common/mail', // Optional: path for email templates
            'useFileTransport' => false, // Set to false to send real emails
        ],

    ],
];
