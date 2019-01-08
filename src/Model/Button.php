<?php
/**
 * Created by PhpStorm.
 * User: nemanja.ivankovic
 * Date: 12/31/2018
 * Time: 8:09 AM.
 */

namespace Paragraf\ViberBot\Model;

class Button
{
    public $ActionType;

    public $ActionBody;

    public $Text;

    public $TextSize;

    public function __construct($ActionType, $ActionBody, $Text, $TextSize)
    {
        $this->ActionType = $ActionType;
        $this->ActionBody = $ActionBody;
        $this->Text = $Text;
        $this->TextSize = $TextSize;
    }

    public function getActionType()
    {
        return $this->ActionType;
    }

    public function setActionType($ActionType)
    {
        $this->ActionType = $ActionType;

        return $this;
    }

    public function getActionBody()
    {
        return $this->ActionBody;
    }

    public function setActionBody($ActionBody)
    {
        $this->ActionBody = $ActionBody;

        return $this;
    }

    public function getText()
    {
        return $this->Text;
    }

    public function setText($Text)
    {
        $this->Text = $Text;

        return $this;
    }

    public function getTextSize()
    {
        return $this->TextSize;
    }

    public function setTextSize($TextSize)
    {
        $this->TextSize = $TextSize;

        return $this;
    }
}
