<?php

namespace App\Helpers;

use Carbon\Carbon;

class TimeHelpers{

    public static function humanReadableDiff($time)
    {
        return Carbon::parse($time)->diffForHumans(short:true);
    }

}



