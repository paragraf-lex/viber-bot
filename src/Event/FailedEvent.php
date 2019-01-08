<?php
/**
 * Created by PhpStorm.
 * User: nemanja.ivankovic
 * Date: 12/24/2018
 * Time: 3:15 PM.
 */

namespace Paragraf\ViberBot\Event;

use Paragraf\ViberBot\Intefaces\EventInterface;

class FailedEvent extends Event implements EventInterface
{
    public $event = 'failed';

    public $user_id;

    public $description;

    public function __construct($timestamp, $message_token, $user_id, $description)
    {
        parent::__construct($timestamp, $message_token);

        $this->user_id = $user_id;
        $this->description = $description;
    }

    public function getUserId()
    {
        return $this->user_id;
    }
}
