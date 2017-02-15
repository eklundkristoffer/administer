<?php

return [
    
    // Database table prefix
    'table_prefix' => 'administer_',

    // Url prefix
    'url_prefix' => 'administer',

    // Roles
    'roles' => [
        'administer' => 1,
        'model.view' => 2,
        'model.edit' => 4,
    ],

    // Models
    'models' => [
        App\User::class => [
            'present_fields' => ['username', 'email'],
            'editable_fields' => ['username', 'email'],
        ]
    ],

];