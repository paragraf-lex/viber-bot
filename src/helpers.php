<?php


if (!function_exists('startWith')) {

    function startWith($needle, $haystack)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

}

if (!function_exists('endWith')) {

    function endWith($needle, $haystack)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }

}
