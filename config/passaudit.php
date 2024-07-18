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
         * Define if the PassAudit middleware are registered automatically in the service provider.
         */
        'register' => true,

        /**
         * Method to be called in the middleware return case.
         * Available: http|api.
         */
        'handling' => 'abort',
    ],

    'rule' => [
        /**
         * Add a custom message to show when any user's old password is found.
         */
        'message' => 'This password is already in use. Please use a stronger password'
    ]
];
