<?php

/**
 * Note: You must have SSL from trusted CA on your site in order to all work properly.
 */

return [

    'api-key' => env('VIBERBOT_API'),

    'name' => env('VIBERBOT_NAME'),

    'photo' => env('VIBERBOT_PHOTO'),

    'controller' => '',

    'event_types' => [
        'delivered',
        'seen',
        'failed',
        'subscribed',
        'unsubscribed',
        'conversation_started',
    ],

];
