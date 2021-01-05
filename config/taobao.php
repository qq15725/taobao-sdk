<?php

return [
    'appkey' => env('TAOBAO_APPKEY'),
    'appsecret' => env('TAOBAO_APPSECRET'),
    'sandbox' => (bool)env('TAOBAO_SANDBOX', false),
    // 'log' => [
    //   'default' => 'daily',
    //  'channels' => [
    //        'daily' => [
    //           'driver' => 'daily',
    //           'path' => app()->storagePath('logs/taobao.log'),
    //           'level' => 'debug',
    //           'days' => 14
    //       ]
    //   ],
    //],
];