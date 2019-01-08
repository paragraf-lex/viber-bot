<?php
namespace Paragraf\ViberBot\Messages;


use Paragraf\ViberBot\Http\Http;
use Paragraf\ViberBot\Intefaces\MessageInterface;
use Paragraf\ViberBot\Intefaces\MessageSendInterface;

class Message implements MessageInterface, MessageSendInterface
{

    protected $user_id;

    protected $type;

    protected $tracking_data = "tracking data";

    protected $min_api_version = 1;

    public function body()
    {
        return [
            'receiver' => $this->getUserId(),
            'type' => $this->getType(),
            'sender' => [
                'name' => config('viberbot.name'),
                'avatar' => config('viberbot.photo'),
            ],
            'tracking_data' => $this->getTrackingData(),
            'min_api_version' => $this->getMinApiVersion(),
        ];
    }

    public function send()
    {
        Http::call('POST', 'send_message', $this->body());
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function getTrackingData()
    {
        return $this->tracking_data;
    }

    public function setTrackingData($tracking_data)
    {
        $this->tracking_data = $tracking_data;

        return $this;
    }

    public function getMinApiVersion()
    {
        return $this->min_api_version;
    }

    public function setMinApiVersion($min_api_version)
    {
        $this->min_api_version = $min_api_version;

        return $this;
    }




}