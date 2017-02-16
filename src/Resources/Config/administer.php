<?php

return [
    
    // Database table prefix
    'table_prefix' => 'administer_',

    // Url prefix
    'url_prefix' => 'administer',
    
    // Models
    'models' => [
        App\User::class => [
            'present_fields' => ['username', 'email'],
            'editable_fields' => ['username', 'email'],
        ]
    ],

];