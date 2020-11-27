<?php

return [
    'coupon'=>[
        'url'=>env('COUPON_URL', 'http://localhost:8001/api/'),
        'apply_coupon'=>'coupon/apply/',
        'timeout' => env('FEED_TIMEOUT', 3.0),
    ]
];
