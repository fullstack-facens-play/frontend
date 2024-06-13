<?php

namespace App\Common\Helpers;

use App\Domain\Model\Entities\Log;

class LogHelper
{
    public static function LogInformation(string $value)
    {
        $log = new Log();
        $log->loginfo = $value;
        $log->save();
    }
}