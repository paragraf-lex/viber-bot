<?php
/**
 * Created by PhpStorm.
 * User: nemanja.ivankovic
 * Date: 12/24/2018
 * Time: 3:39 PM
 */

namespace Paragraf\ViberBot\Messages;


use Paragraf\ViberBot\Intefaces\MessageInterface;

class FileMessage extends Message implements MessageInterface
{
    protected $media;

    protected $size;

    protected $type = 'file';

    protected $file_name;

    public function body()
    {
        return array_merge(parent::body(), [
            'media' => $this->media,
            'size' => $this->size,
            'file_name' => $this->file_name,
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

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    public function getFileName()
    {
        return $this->file_name;
    }

    public function setFileName($file_name)
    {
        $this->file_name = $file_name;

        return $this;
    }
}