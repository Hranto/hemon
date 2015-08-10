<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'defaultRoute' => 'hem/index',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                'about'=> 'hem/about',
                '<language:(en|ru|am)>/about'=> 'hem/about',

                'news'=> 'hem/news',
                '<language:(en|ru|am)>/news'=> 'hem/news',

                'team'=> 'hem/team',
                '<language:(en|ru|am)>/team'=> 'hem/team',

                'contacts'=> 'hem/contacts',
                '<language:(en|ru|am)>/contacts'=> 'hem/contacts',

                'projects'=> 'hem/projects',
                '<language:(en|ru|am)>/projects'=> 'hem/projects',

                'partners'=> 'hem/partners',
                '<language:(en|ru|am)>/partners'=> 'hem/partners',

                'services'=> 'hem/services',
                '<language:(en|ru|am)>/services'=> 'hem/services',

                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<language:(en|ru|am)>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<language:(en|ru|am)>/<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<language:(en|ru|am)>/<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
    ],
];
