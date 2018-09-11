<?php

return [
    'driver' => 'smtp',
    'host' => "smtp.gmail.com",
    'port' => 587,

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

    'encryption' => 'tls',

    'username' => 'farfetchmensfashion@gmail.com',

    'password' => 'ahgfucenfilgndxu',

    'sendmail' => '/usr/sbin/sendmail -bs',

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

];
