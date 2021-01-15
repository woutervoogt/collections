<?php

return [
    'table_name' => 'users',

    'drop_scheme' => "SET foreign_key_checks = 0;
    DROP TABLE IF EXISTS `users`",

    'scheme' => "CREATE TABLE IF NOT EXISTS `users` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(80) NOT NULL,
        `email` varchar(255) NOT NULL,
        `password` varchar(255) NOT NULL,
        `created` timestamp,
        `updated` timestamp DEFAULT CURRENT_TIMESTAMP,
        `deleted` timestamp,
        `created_by` int(11) NOT NULL,
        `updated_by` int(11),
        `deleted_by` int(11),
        PRIMARY KEY (`id`)
    ) ENGINE=INNODB  DEFAULT CHARSET=latin1;",

    'seeder' => [
        'type' => 'array',
        'data' => array([
            'name' => 'admin',
            'email'      => 'admin@collections.nl',
            'password'   => password_hash('admin1', PASSWORD_DEFAULT),
            'created'    => date('Y-m-d H:i:s'),
            'created_by' => 1,
        ],
        [
            'name' => 'Jan',
            'email'      => 'jan@collections.nl',
            'password'   => password_hash('jan', PASSWORD_DEFAULT),
            'created'    => date('Y-m-d H:i:s'),
            'created_by' => 1,
        ],
        [
            'name' => 'Fred',
            'email'      => 'fred@collections.nl',
            'password'   => password_hash('fred', PASSWORD_DEFAULT),
            'created'    => date('Y-m-d H:i:s'),
            'created_by' => 1,
        ]
    ),
    ],
];
