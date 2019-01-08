<?php
/**
 * Created by PhpStorm.
 * User: nemanja.ivankovic
 * Date: 12/24/2018
 * Time: 3:46 PM.
 */

namespace Paragraf\ViberBot\Messages;

use Paragraf\ViberBot\Intefaces\MessageInterface;

class LocationMessage extends Message implements MessageInterface
{
    protected $lat;

    protected $lng;

    protected $type = 'location';

    // TODO: Check does contact paramter works well
    public function body()
    {
        return array_merge(parent::body(), [
            'location' => [
                'lat' => '',
                'lon' => '',
            ],
        ]);
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLng()
    {
        return $this->lng;
    }

    public function setLng($lng)
    {
        $this->lng = $lng;

        return $this;
    }
}
