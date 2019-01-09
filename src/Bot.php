<?php

namespace Paragraf\ViberBot;

use Paragraf\ViberBot\Http\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Bot
{
    // TODO: Need to make Exceptions for every part of package.

    protected $proceed = false;

    protected $request;

    protected $text;

    protected $replays = [];

    protected $body = [];

    protected $event;

    protected $question;

    public function __construct($request, $type)
    {
        $this->request = $request;
        $this->body = $type->body();
    }

    public function on($event)
    {
        if ($this->request->event === $event->getEvent()) {
            $this->event = $event;

            $this->proceed = true;

        }

        return $this;
//        throw Exception;
    }

    public function hears($text)
    {
        if (is_array($text)) {
            foreach ($text as $txt) {
                if ($this->request->message['text'] === $txt) {
                    return $this->hears($txt);
                }
            }
        }

        if (is_string($text)) {
            if ($this->request->message['text'] === $text) {
                $this->text = $text;

                return $this;
            }

            $this->proceed = false;

//          throw Exception;
        }

        return $this;
    }

    public function replay($answer, $method = null)
    {
        if (is_array($answer)) {
            $this->replays = $answer;

            return $this;
        }

        if (is_string($answer)) {
            $this->replays[] = $answer;

            return $this;
        }

        if (is_a($answer, Collection::class)) {
            foreach ($answer as $item) {
                if (is_subclass_of($item, Model::class)) {
                    eval('$this->replays[] = $item->'.$method.';');
                }
            }

            return $this;
        }
    }

    public function send()
    {
        if ($this->proceed) {
            if (count($this->replays) === 1) {
                Http::call('POST', 'send_message', array_merge($this->body, ['text' => $this->replays[0], 'receiver' => $this->event->getUserId()]));

                $this->replays = [];

                return;
            }

            foreach ($this->replays as $replay) {
                Http::call('POST', 'send_message', array_merge($this->body, ['text' => $replay, 'receiver' => $this->event->getUserId()]));
            }
            $this->replays = [];

            return;
        }

//        throw Exception
    }

    // TODO: Make conversation part of bot / For the future
    /****/

//    public function conversation(Closure $conversation)
//    {
//        $conversation($conversation);
//
//        return $this;
//    }
//
//    public function ask($question/*,Closure $callback*/)
//    {
//        if (is_string($question))
//        {
//            $this->question = $question;
//
//            if ($this->proceed) {
////                $callback($question);
//                $this->replay($question)->send();
//
//                return $this;
//            }
//
//            return $this;
//        }
//
//        return;
//    }
//
//    public function say($answer)
//    {
//        $this->replay($answer)->send();
//
//        return;
//    }
}
