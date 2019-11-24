<?php

return [

    'driver' => env('MAIL_DRIVER', 'smtp'),

    'host' => env('MAIL_HOST', 'smtp.gmail.com'),

    'port' => env('MAIL_PORT', 587),

    'from' => ['address' => 'ukf.erasmus@gmail.com', 'name' => 'Erasmus+ ukf.sk'],

    'encryption' => env('MAIL_ENCRYPTION', 'tls'),

    'username' => env('MAIL_USERNAME', 'ukf.erasmus@gmail.com'),

    'password' => env('MAIL_PASSWORD', 'erasmus123'),

    'sendmail' => '/usr/sbin/sendmail -bs',

    'pretend' => false,
    'stream' => [
        'ssl' => [
            'allow_self_signed' => true,
            'verify_peer' => false,
            'verify_peer_name' => false,
        ],
    ],
];