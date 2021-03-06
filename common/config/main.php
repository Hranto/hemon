<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'defaultRoute' => '/hem/index',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            //'class'=>'frontend\components\LangUrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [

                '<language:(en|ru|am)>/'=>'/',

                'login'=> 'hem/login',
                '<language:(en|ru|am)>/login'=> 'hem/login',

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
                '<language:(en|ru|am)>/projects/<page:\d+>'=> 'hem/projects',

                'partners'=> 'hem/partners',
                '<language:(en|ru|am)>/partners'=> 'hem/partners',

                'services'=> 'hem/services',
                '<language:(en|ru|am)>/services'=> 'hem/services',

                'project'=> 'hem/project',
                '<language:(en|ru|am)>/project'=> 'hem/project',

                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<language:(en|ru|am)>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',

                '<controller:\w+>/<action:\w+>/<page:\d+>' => '<controller>/<action>',
                '<language:(en|ru|am)>/<controller:\w+>/<action:\w+>/<page:\d+>' => '<controller>/<action>',

                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<language:(en|ru|am)>/<controller:\w+>/<id:\d+>' => '<controller>/view',
                
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<language:(en|ru|am)>/<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
    ],
];
