<?php

/**
 * Note: You must have SSL from trusted CA on your site in order to all work properly.
 */

return [

    'api-key' => env('VIBERBOT_API'),

    'name' => env('VIBERBOT_NAME'),

    'photo' => env('VIBERBOT_PHOTO'),

    /*
     * When setting controller use full path to file (namespace).
     *
     * Example: \App\Http\Controllers\BotController@index
     */
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
