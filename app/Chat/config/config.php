<?php
return [
    'servicemanager' => [
        'factory' => [
            'ChatService' => 'diwip\\Chat\\Chat\\ChatService::create',
        ],
        'invokable' => [
            'HttpSession' => 'diwip\\Base\\Http\\HttpSession'
        ]
    ],

    'routes' => [
        '/' => [
            'controller'    => 'diwip\\Chat\\Dashboard\\DashboardController',
            'action'        => 'index',
            'di'            => ['HttpSession'],
        ],
        '/Messages/Send' => [
            'controller'    => 'diwip\\Chat\\Chat\\ChatController',
            'action'        => 'send',
            'di'            => ['ChatService'],
        ],
        '/Messages/Receive' => [
            'controller'    => 'diwip\\Chat\\Chat\\ChatController',
            'action'        => 'receive',
            'di'            => ['ChatService'],
        ],
        '/scripts.js' => [
            'controller'    => 'diwip\\Chat\\Util\\UtilController',
            'action'        => 'scripts',
            'di'            => [],
        ],
    ],

    'dbs' => [
        'chatDb' => [
            'dsn'   => 'mysql:dbname=chat;host=localhost;port=3306',
            'username' => 'root',
            'password' => '',
        ]
    ],
];