<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait NamingUploadedImages
{
    public static function AccordingToModel($model_name)
    {
        $user = Auth::check() ? Auth::user()->name : "";
        return $model_name . Carbon::now()->secondOfMillennium . $user;
    }
}
