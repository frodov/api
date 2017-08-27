<?php

return new \Phalcon\Config([
    'default' => [
        'adapter'     => Phalcon\Db\Adapter\Pdo\Mysql::class,
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => '',
        'dbname'      => 'techo',
        'charset'     => 'utf8',
    ]
]);
