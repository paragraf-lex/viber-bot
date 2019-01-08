<?php
/**
 * Created by PhpStorm.
 * User: nemanja.ivankovic
 * Date: 12/24/2018
 * Time: 3:16 PM.
 */

namespace Paragraf\ViberBot\Event;

use Paragraf\ViberBot\Model\ViberUser;
use Paragraf\ViberBot\Intefaces\EventInterface;

class MessageEvent extends Event implements EventInterface
{
    public $event = 'message';

    public $user;

    public $message;

    // TODO: Assign right Message object and check is it working
    public function __construct($timestamp, $message_token, ViberUser $user, $message)
    {
        parent::__construct($timestamp, $message_token);

        $this->user = $user;
        $this->message = $message;
    }

    public function getUserId()
    {
        return $this->user->id;
    }
}
