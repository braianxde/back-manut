<?php

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/Phinx/Migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/Phinx/Seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'production' => [
            'adapter' => 'sqlite',
            'name' => 'Phinx/db/manut',
            'suffix'=> '.db'
        ],
        'development' => [
            'adapter' => 'sqlite',
            'name' => 'Phinx/db/manut',
            'suffix'=> '.db'
        ],
        'testing' => [
            'adapter' => 'sqlite',
            'name' => 'Phinx/db/manut',
            'suffix'=> '.db'
        ]
    ],
    'version_order' => 'creation'
];
