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
use Paragraf\ViberBot\Event\ConversationStartedEvent;

class ViberBotController extends Controller
{
    public function index(Request $request)
    {
        (new Bot($request, new TextMessage()))
            ->on(new ConversationStartedEvent($request->timestamp, $request->message_token,
                new ViberUser($request->user['id'], $request->user['name']), $request->type, $request->context, $request->subscribed))
            ->replay('Izlistavamo obaveze!')
            ->send();

//        (new Client())->broadcast('Zdravo tamo preko bare!', User::all(), 'name');

        (new Bot($request, new TextMessage()))
            ->on(new MessageEvent($request->timestamp, $request->message_token, new ViberUser($request->sender['id'], $request->sender['name']), $request->message))
            ->hears('Hi.')
            ->replay(User::all(), 'email')
            ->send();

        (new Bot($request, new TextMessage()))
            ->on(new MessageEvent($request->timestamp, $request->message_token, new ViberUser($request->sender['id'], $request->sender['name']), $request->message))
            ->hears('/^[\\\P\\\p][\d+]{5,5}$/')
            ->body(function (){
                dump(factory(User::class)->create()->id);
                dump(factory(User::class)->create()->id);
            })
            ->replay('Odzvanja regex!')
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
