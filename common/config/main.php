<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
            'itemFile' => '@common/rbac/items.php',
            'assignmentFile' => '@common/rbac/assignments.php',
            'ruleFile' => '@common/rbac/rules.php',
            'defaultRoles' => ['user'],
        ],
    ],
];
