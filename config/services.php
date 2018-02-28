<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe'   => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id'     => '1035431566620088',
        'client_secret' => '72347509deef514a2e76fd518e77ce46',
        'redirect'      => 'http://localhost:8001/callback/facebook',
    ],

    'google' => [
        'client_id'     => '914286726868-13qpgtf3kfvb43cum8p4krad7uvtpvj5.apps.googleusercontent.com',
        'client_secret' => 'fGSiemwqHtO1tPwtgSOD2ugL',
        'redirect'      => 'http://localhost:8001/callback/google',
    ],

    'twitter' => [
        'client_id'     => 'wn6gVmPPK5p3IjKK7BZCfSfxl',
        'client_secret' => 'ya9J6RV4jE9s5aB6hnBkvYJlM3vqgMA7UGJNsJtGa8w6dUk9rg',
        'redirect'      => 'http://localhost:8001/callback/twitter',
    ],

];
