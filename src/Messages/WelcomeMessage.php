<?php
/**
 * Created by PhpStorm.
 * User: nemanja.ivankovic
 * Date: 12/26/2018
 * Time: 2:17 PM.
 */

namespace Paragraf\ViberBot\Messages;

use Paragraf\ViberBot\Intefaces\MessageInterface;

class WelcomeMessage extends Message implements MessageInterface
{
    // TODO: Welcome Message

    protected $text;

    public function body()
    {
        $array = array_merge(parent::body(), [
            'text' => $this->text,
        ]);

        unset($array['receiver']);

        return $array;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text): void
    {
        $this->text = $text;
    }
}
