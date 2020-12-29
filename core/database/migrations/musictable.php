<?php

return [
    'table_name' => 'music',

    'drop_scheme' => "SET foreign_key_checks = 0; 
    DROP TABLE IF EXISTS `music`",

    'scheme' => "CREATE TABLE IF NOT EXISTS `music` (
        `id` int NOT NULL AUTO_INCREMENT,
        `name` varchar(255) NOT NULL,
        `image1_path` varchar(500),
        `image2_path` varchar(500),
        `image3_path` varchar(500),
        `format` varchar(255),
        `artist` varchar(255),
        `album` varchar(255),
        `song` varchar(255),
        `genre` varchar(255),
        `id_code` varchar(255),
        `year` smallint,
        `tracklist` json,
        `amount` int,
        `description` varchar(500),
        `notes` varchar(500),
        `collection_id` int,
        `created` timestamp,
        `updated` timestamp DEFAULT CURRENT_TIMESTAMP,
        `deleted` timestamp,
        `created_by` int NOT NULL,
        `updated_by` int,
        `deleted_by` int,
        PRIMARY KEY (`id`),
        CONSTRAINT fk_music_collection 
        FOREIGN KEY (collection_id) 
            REFERENCES collections(id)
            ON UPDATE CASCADE
            ON DELETE CASCADE
    ) ENGINE=INNODB  DEFAULT CHARSET=latin1;",

    'seeder' => [
        'type' => 'array',
        'data' => array([
            'name' => 'The Doors - Strange Days',
            'artist'  => 'The Doors',
            'album'      => 'Strange Days',
            'tracklist'   => '[
                {"nr" : "1", "Title" : "Strange Days", "Duration" : "3:05"},
                {"nr" : "2", "Title" : "You re Lost Little Girl", "Duration" : "3:01"},
                {"nr" : "3", "Title" : "Love Me Two Times", "Duration" : "3:23"},
                {"nr" : "4", "Title" : "Unhappy Girl", "Duration" : "2:00"},
                {"nr" : "5", "Title" : "Horse Latitudes", "Duration" : "1:30"},
                {"nr" : "6", "Title" : "Moonlight Drive", "Duration" : "3:00"},
                {"nr" : "7", "Title" : "People Are Strange", "Duration" : "2:10"},
                {"nr" : "8", "Title" : "My Eyes Have Seen You", "Duration" : "2:22"},
                {"nr" : "9", "Title" : "I Can t See Your Face In My Mind", "Duration" : "3:18"},
                {"nr" : "10", "Title" : "When the Music s Over", "Duration" : "11:00"}
                ]',
            'collection_id' => 1,
            'created'    => date('Y-m-d H:i:s'),
            'created_by' => 1
        ]),
    ],
];
