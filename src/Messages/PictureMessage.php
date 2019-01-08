<?php
/**
 * Created by PhpStorm.
 * User: nemanja.ivankovic
 * Date: 12/24/2018
 * Time: 3:28 PM.
 */

namespace Paragraf\ViberBot\Messages;

use Paragraf\ViberBot\Intefaces\MessageInterface;

class PictureMessage extends Message implements MessageInterface
{
    protected $text;

    protected $media;

    protected $type = 'picture';

    protected $thumbnail;

    public function body()
    {
        return array_merge(parent::body(), [
            'media' => $this->media,
            'thumbnail' => $this->thumbnail,
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

    public function getMedia()
    {
        return $this->media;
    }

    public function setMedia($media)
    {
        $this->media = $media;

        return $this;
    }

    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }
}
