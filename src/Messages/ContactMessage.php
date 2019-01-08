<?php
/**
 * Created by PhpStorm.
 * User: nemanja.ivankovic
 * Date: 12/24/2018
 * Time: 3:39 PM.
 */

namespace Paragraf\ViberBot\Messages;

use Paragraf\ViberBot\Intefaces\MessageInterface;

class ContactMessage extends Message implements MessageInterface
{
    protected $name;

    protected $type = 'contact';

    protected $phone_number;

    // TODO: Check does contact paramter works well
    public function body()
    {
        return array_merge(parent::body(), [
            'contact' => [
                'name' => '',
                'phone_number' => '',
            ],
        ]);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;

        return $this;
    }
}
