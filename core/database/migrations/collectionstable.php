<?php

return [
    // Name of the scheme
    'table_name' => 'collections',

    // Query to drop the scheme
    'drop_scheme' => "SET foreign_key_checks = 0;
        DROP TABLE IF EXISTS `collections`",

   // The scheme
   'scheme' => "CREATE TABLE `collections` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `is_public` boolean NOT NULL DEFAULT FALSE,
    `image_path` varchar(255),
    `color` char(7),
    `collection_category` varchar(100) NOT NULL,
    `created` timestamp NOT NULL,
    `updated` timestamp DEFAULT CURRENT_TIMESTAMP,
    `deleted` timestamp,
    `created_by` int(11) NOT NULL,
    `updated_by` int(11),
    `deleted_by` int(11),
    PRIMARY KEY (id)
) ENGINE=INNODB  DEFAULT CHARSET=latin1;",

    // Seeder data goes here
     'seeder' => [
        'type' => 'array',
        'data' => array(
        [
            'name' => "Vinyl",
            'is_public'  => true,
            `color` => "#ff1100",
            `collection_category` => "music",
            'created'    => date('Y-m-d H:i:s'),
            'created_by' => 1
        ]),
    ],
    
];
