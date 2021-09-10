<?php

return [
    'sendinblue' => [
        'api_key' => env('SENDINBLUE_API_KEY', 'system_value'),
        'from_name' => env('SENDINBLUE_FROM_NAME', 'system_value'),
        'from_email' => env('SENDINBLUE_FROM_EMAIL', 'system_value'),
    ],

    'sparkpost' => [
        'api_key' => env('SPARKPOST_API_KEY', 'system_value'),
        'from_name' => env('SPARKPOST_FROM_NAME', 'system_value'),
        'from_email' => env('SPARKPOST_FROM_EMAIL', 'system_value'),
    ],
];
