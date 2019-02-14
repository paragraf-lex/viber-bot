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

    public $Columns;

    public $Rows;

    public $BgColor;

    public $Image;

    public $TextHAlign;

    public $TextVAlign;

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

    public function setColumns($Columns)
    {
        $this->Columns = $Columns;

        return $this;
    }

    public function getColumns()
    {
        return $this->Columns;
    }

    public function setRows($Rows)
    {
        $this->Rows = $Rows;

        return $this;
    }

    public function getRows()
    {
        return $this->Rows;
    }

    public function setBgColor($BgColor)
    {
        $this->BgColor = $BgColor;

        return $this;
    }

    public function getBgColor()
    {
        return $this->BgColor;
    }

    public function setImage($Image)
    {
        $this->Image = $Image;

        return $this;
    }

    public function getImage()
    {
        return $this->Image;
    }

    public function setTextHAlign($TextHAlign)
    {
        $this->TextHAlign = $TextHAlign;

        return $this;
    }

    public function getTextHAlign($TextHAlign)
    {
        return $this->TextHAlign;
    }

    public function setTextVAlign($TextVAlign)
    {
        $this->TextVAlign = $TextVAlign;

        return $this;
    }

    public function getTextVAlign($TextVAlign)
    {
        return $this->TextVAlign;
    }
}
