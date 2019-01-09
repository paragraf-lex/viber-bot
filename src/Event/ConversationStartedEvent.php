<?php
/**
 * Created by PhpStorm.
 * User: nemanja.ivankovic
 * Date: 12/24/2018
 * Time: 3:10 PM.
 */

namespace Paragraf\ViberBot\Event;

use Paragraf\ViberBot\Model\ViberUser;
use Paragraf\ViberBot\Intefaces\EventInterface;

class ConversationStartedEvent extends Event implements EventInterface
{
    public $event = 'conversation_started';

    public $user;

    public $type;

    public $context;

    public $subscribed;

    public function __construct($timestamp, $message_token, ViberUser $user, $type, $context, $subscribed)
    {
        parent::__construct($timestamp, $message_token);

        $this->user = $user;
        $this->type = $type;
        $this->context = $context;
        $this->subscribed = $subscribed;
    }

    public function getUserId()
    {
        return $this->user->id;
    }
}
