<?php

namespace App\Common\Helpers;

class DatetimeHelper
{
    public static function formatToSave($value)
    {
        if (isset($value))
        {
            $value = str_replace('/', '-', $value);
            return date("Y-m-d H:i:s", strtotime($value));
        }

        return $value;
    }

    public static function formatToView(string $value)
    {
        if (isset($value))
        {
            return date("d/m/Y H:i", strtotime($value));
        }

        return $value;
    }

    public static function formatDateToView(string $value)
    {
        if (isset($value))
        {
            return date("d/m/Y", strtotime($value));
        }

        return $value;
    }

    public static function getTimeInFormat(string $time, string $format)
    {
        $time = strtotime($time);
        return date($format, $time);
    }

    public static function getMiliSeconds(string $time)
    {
        $seconds = strtotime("1970-01-01 $time UTC");
        $miliseconds = $seconds * 1000;
        return $miliseconds;
    }

}