<?php
return [
    'id' => 'app-common-tests',
    'basePath' => dirname(__DIR__),
    'components' => [
        'user' => [
            'class' => 'yii\web\User',
            'identityClass' => 'common\models\User',
        ],
		'db' => [
		   'class' => 'yii\db\Connection',
		   'dsn' => 'pgsql:host=127.0.0.1;port=5432;dbname=integrada_test',
		   'username' => 'postgres',
		   'password' => '',
		   'charset' => 'utf8',
		],
    ],
];
