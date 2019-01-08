<?php
/**
 * Created by PhpStorm.
 * User: nemanja.ivankovic
 * Date: 12/31/2018
 * Time: 10:09 AM
 */

namespace Paragraf\ViberBot\Model;


class Keyboard
{
    public $Type = 'keyboard';

    public $DefaultHeight = true;

    public $Buttons = [];

    public function __construct($Buttons, bool $DefaultHeight = true)
    {
        $this->DefaultHeight = $DefaultHeight;

        if (is_array($Buttons))
        {
            foreach ($Buttons as $button)
            {
                $this->Buttons[] = $button;
            }
        }
        else
        {
            $this->Buttons[] = $Buttons;
        }
    }

    public function getType()
    {
        return $this->Type;
    }

    public function setType(string $Type)
    {
        $this->Type = $Type;

        return $this;
    }

    public function isDefaultHeight()
    {
        return $this->DefaultHeight;
    }

    public function setDefaultHeight(bool $DefaultHeight)
    {
        $this->DefaultHeight = $DefaultHeight;

        return $this;
    }

    public function getButtons(): array
    {
        return $this->Buttons;
    }

    public function setButtons(array $Buttons)
    {
        $this->Buttons[] = $Buttons;

        return $this;
    }

}