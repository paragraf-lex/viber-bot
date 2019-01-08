<?php
/**
 * Created by PhpStorm.
 * User: nemanja.ivankovic
 * Date: 12/31/2018
 * Time: 10:39 AM.
 */

namespace Paragraf\ViberBot\Messages;

use Paragraf\ViberBot\TextMessage;
use Paragraf\ViberBot\Intefaces\MessageInterface;

class BroadcastMessage extends TextMessage implements MessageInterface
{
    protected $broadcast = [];

    public function body()
    {
        $array = array_merge(parent::body(), ['broadcast_list' => $this->broadcast]);

        unset($array['receiver']);

        return $array;
    }

    public function getBroadcast()
    {
        return $this->broadcast;
    }

    public function setBroadcast($broadcast)
    {
        $this->broadcast = $broadcast;

        return $this;
    }
}
