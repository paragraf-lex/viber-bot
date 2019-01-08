<?php
/**
 * Created by PhpStorm.
 * User: nemanja.ivankovic
 * Date: 12/31/2018
 * Time: 8:06 AM
 */

namespace Paragraf\ViberBot\Messages;


use Paragraf\ViberBot\Intefaces\MessageInterface;

class KeyboardMessage extends Message implements MessageInterface
{
    protected $text;

    protected $type = 'text';

    protected $keyboard;

    public function body()
    {
        $array = array_merge(parent::body(), [
            'text' => $this->getText(),
            'keyboard' => $this->getKeyboard(),
        ]);

        unset(
            $array['sender'],
            $array['tracking_data'],
            $array['min_api_version']
        );

        return $array;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    public function getKeyboard()
    {
        return $this->keyboard;
    }

    public function setKeyboard($keyboard)
    {
        $this->keyboard = $keyboard;

        return $this;
    }

}