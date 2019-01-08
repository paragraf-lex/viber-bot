<?php
/**
 * Created by PhpStorm.
 * User: nemanja.ivankovic
 * Date: 12/24/2018
 * Time: 3:32 PM
 */

namespace Paragraf\ViberBot\Messages;


use Paragraf\ViberBot\Intefaces\MessageInterface;

class VideoMessage extends Message implements MessageInterface
{

    protected $media;

    protected $thumbnail;

    protected $type = 'video';

    protected $size;

    protected $duration;

    public function body()
    {
        return array_merge(parent::body(), [
            'media' => $this->media,
            'thumbnail' => $this->thumbnail,
            'size' => $this->size,
            'duration' => $this->duration,
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
    public function getThumbnail()
    {
        return $this->thumbnail;
    }
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

}