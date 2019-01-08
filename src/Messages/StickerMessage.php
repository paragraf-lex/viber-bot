<?php
/**
 * Created by PhpStorm.
 * User: nemanja.ivankovic
 * Date: 12/24/2018
 * Time: 3:50 PM
 */

namespace Paragraf\ViberBot\Messages;


use Paragraf\ViberBot\Intefaces\MessageInterface;

class StickerMessage extends Message implements MessageInterface
{

    public $sticker_id;

    protected $type = 'sticker';

    public function body()
    {
        return array_merge(parent::body(), [
            'sticker_id' => $this->sticker_id,
        ]);
    }

    public function getStickerId()
    {
        return $this->sticker_id;
    }

    public function setStickerId($sticker_id)
    {
        $this->sticker_id = $sticker_id;

        return $this;
    }

}