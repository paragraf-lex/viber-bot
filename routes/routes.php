<?php

Route::group([
        'middleware' => ['api'],
    ],
    function () {
        Route::post('viber-bot', config('viberbot.controller') ? config('viberbot.controller') : '\Paragraf\ViberBot\Http\Controllers\ViberBotController@index')->name('viber-bot');
    }
);
