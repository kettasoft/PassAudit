<?php

return [

    /*
    |--------------------------------------------------------------------------
    | PassAudit Tables
    |--------------------------------------------------------------------------
    |
    | These are the tables used by PassAudit to store all the passwords data.
    |
    */
    'table' => 'passwords',

    /*
    |--------------------------------------------------------------------------
    | PassAudit Middleware
    |--------------------------------------------------------------------------
    |
    | This configuration helps to customize the PassAudit middleware behavior.
    |
    */
    'middleware' => [
        /**
         * Define if the laratrust middleware are registered automatically in the service provider.
         */
        'register' => true,

        /**
         * Method to be called in the middleware return case.
         * Available: abort|redirect.
         */
        'handling' => 'abort',
    ]
];
