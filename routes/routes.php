<?php

Route::group([
        'namespace' => 'Paragraf\ViberBot\Http\Controllers',
        'middleware' => ['api'],
    ],
    function () {
        Route::post('viber-bot', config('viberbot.controller') ? config('viberbot.controller') : 'ViberBotController@index')->name('viber-bot');
    }
);
