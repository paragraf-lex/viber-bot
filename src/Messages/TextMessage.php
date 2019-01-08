<?php

namespace Paragraf\ViberBot;

use Paragraf\ViberBot\Intefaces\MessageInterface;
use Paragraf\ViberBot\Messages\Message;

class TextMessage extends Message implements MessageInterface
{
    protected $text;

    protected $type = 'text';

    public function body()
    {
        return array_merge(parent::body(), [
            'text' => $this->text,
        ]);
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


}