<?php
/**
 * Created by PhpStorm.
 * User: nemanja.ivankovic
 * Date: 12/24/2018
 * Time: 3:49 PM.
 */

namespace Paragraf\ViberBot\Messages;

use Paragraf\ViberBot\Intefaces\MessageInterface;

class URLMessage extends Message implements MessageInterface
{
    protected $media;

    protected $type = 'url';

    public function body()
    {
        return array_merge(parent::body(), [
            'media' => $this->media,
        ]);
    }

    public function getMedia()
    {
        return $this->media;
    }

    public function setMedia($media)
    {
        $this->media = $media;

        return $this;
    }
}
