<?php
/**
 * Created by PhpStorm.
 * User: nemanja.ivankovic
 * Date: 12/27/2018
 * Time: 10:09 AM.
 */

namespace Paragraf\ViberBot\Intefaces;

interface MessageInterface
{
    public function getType();

    public function body();
}
