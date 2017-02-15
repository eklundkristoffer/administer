<?php

return [
    
    // Database table prefix
    'table_prefix' => 'administer_',

    // Url prefix
    'url_prefix' => 'administer',

    // Roles
    'roles' => [
        'model.view' => 1,
        'model.edit' => 2,
    ],

    // Models
    'models' => [
        App\User::class => [
            'present_fields' => ['username', 'email'],
            'editable_fields' => ['username', 'email'],
        ]
    ],

];