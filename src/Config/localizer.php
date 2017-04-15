<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default settings for localizer
    |--------------------------------------------------------------------------
    */
    'routes'             => true,
    'set_auto_lang'      => true,
    'default_lang'       => 'en', // If set_auto_lang is true has no effect
    'prefix'             => 'localizer',
    'allowed_langs'      => ['en', 'ca', 'es', 'de', 'it'], // If is empty only english will be allowed,
    'middleware'         => Aitor24\Localizer\Middlewares\LocalizerMiddleware::class,
];
