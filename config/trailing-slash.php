<?php

return [
    // Enable or disable trailing slashes
    'trailing' => env('TRAILING_SLASHES', true),

    // Enable or disable automatic setup of this package
    // When enabled, only installing this package is sufficient for everything to work
    'auto' => env('TRAILING_SLASHES_AUTO', true),

    // Execute middleware only on these methods
    'methods' => [
        'GET', 'HEAD', 'OPTIONS'
    ],
];
