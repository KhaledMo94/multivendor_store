<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

trait NamingUploadedImages
{
    public static function AccordingToModel($model_name)
    {
        $user = Auth::check() ? Auth::user()->name : "";
        return $model_name . Carbon::now()->secondOfMillennium . Str::slug($user);
    }
}
