<?php

namespace Paragraf\ViberBot;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Paragraf\ViberBot\Http\Http;
use Paragraf\ViberBot\Messages\BroadcastMessage;

class Client
{
    public function removeWebhook()
    {
        Http::call('POST', 'set_webhook', [
            'url' => ''
        ]);
    }

    public function getAccountInfo()
    {
        Http::call('POST', 'get_account_info');
    }

    /**
     * Max is 100 per request.
     */
    public function getOnlineStatus(array $userIds)
    {
        if (sizeof($userIds) <= 100) {
            Http::call('POST', 'get_online', $userIds);
        }
    }

    public function getUserDetails($user_id)
    {
        Http::call('POST', 'get_user_details', ['id' => $user_id]);
    }

    /**
     * Note: $method must be ID user from Viber who is subscribed already to us. If is not, it will fail without error message!
     */
    public function broadcast($text, $model, $method)
    {
        if (is_array($model))
        {
            $broadcast_array = [];

            foreach ($model as $item)
            {
                if (sizeof($model) === 300)
                {
                    Http::call('POST', 'send_message',
                        (new BroadcastMessage())
                            ->setBroadcast($model)
                            ->body()
                    );

                    $broadcast_array = [];
                }

                $broadcast_array[] = $item;
            }

            if (sizeof($broadcast_array) < 300)
            {
                Http::call('POST', 'send_message',
                    (new BroadcastMessage())
                        ->setBroadcast($model)
                        ->body()
                );
            }

            return;
        }

        if (is_a($model,  Collection::class))
        {
            $broadcast = [];

            foreach ($model as $item)
            {
                if (is_subclass_of($item, Model::class))
                {
                    if (sizeof($broadcast) === 300)
                    {
                        Http::call('POST', 'broadcast_message', (new BroadcastMessage())->setBroadcast($broadcast)->setText($text)->body());
                        $broadcast = [];
                    }

                    eval("\$broadcast[] = \$item->". $method.";");
                }
            }

            if (sizeof($broadcast) < 300)
            {
                Http::call('POST', 'broadcast_message', (new BroadcastMessage())->setBroadcast($broadcast)->body());
            }

            return;
        }

        return;
    }
}