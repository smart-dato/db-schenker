<?php

declare(strict_types=1);

// config for SmartDato/DbSchenker
return [
    // testing : https://wwwtest.dbschenker.com/nges-portal
    // prod    : https://www.dbschenker.com/nges-portal
    'base_url' => env('DB_SCHENKER_BASE_URL', ' https://wwwtest.dbschenker.com/nges-portal'),
    'token' => env('DB_SCHENKER_TOKEN', ''),
];
