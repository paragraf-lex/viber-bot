<?php

namespace Paragraf\ViberBot\Http\Controllers;

use App\User;
use Paragraf\ViberBot\Bot;
use Illuminate\Http\Request;
use Paragraf\ViberBot\Client;
use Paragraf\ViberBot\TextMessage;
use Paragraf\ViberBot\Model\Button;
use App\Http\Controllers\Controller;
use Paragraf\ViberBot\Model\Keyboard;
use Paragraf\ViberBot\Model\ViberUser;
use Paragraf\ViberBot\Event\MessageEvent;
use Paragraf\ViberBot\Messages\KeyboardMessage;

class ViberBotController extends Controller
{
    public function index(Request $request)
    {
        (new Client())->broadcast('Zdravo tamo preko bare!', User::all(), 'name');

        (new Bot($request, new TextMessage()))
            ->on(new MessageEvent($request->timestamp, $request->message_token, new ViberUser($request->sender['id'], $request->sender['name']), $request->message))
            ->hears('Hi.')
            ->replay(User::all(), 'email')
            ->send();

        (new Bot($request, new TextMessage()))
            ->on(new MessageEvent($request->timestamp, $request->message_token, new ViberUser($request->sender['id'], $request->sender['name']), $request->message))
            ->hears('obligations')
            ->replay('Hello World, Obligations!')
            ->send();

        (new Bot($request, ((new KeyboardMessage())->setKeyboard(
            new Keyboard([
                new Button('reply', 'Hi.', 'Hi.', 'regular'),
                new Button('reply', 'obligations', 'obligations', 'regular'),
            ])
        ))))
            ->on(new MessageEvent($request->timestamp, $request->message_token, new ViberUser($request->sender['id'], $request->sender['name']), $request->message))
            ->hears('Paragraf')
            ->replay('How was your day?')
            ->send();
    }
}