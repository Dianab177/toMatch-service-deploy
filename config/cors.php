<?php

return [

    'paths' => ['api/*', '*'],

    'allowed_methods' => ['*'],

    'allowed_origins' => [  'https://tomatch-app-deploy.netlify.app',
        'http://localhost:3000'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
