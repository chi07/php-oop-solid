<?php

return [
    'name' => 'Backend Vietnam',
    'defaultRoute' => 'home/index',
    'components' => [
        'db' => [
            'class' => 'app\components\MySqlConnection',
            'dsn' => 'mysql:host=165.22.245.167;port=3307;dbname=blog',
            'username' => 'root',
            'password' => 'password',
        ],
    ]
];
