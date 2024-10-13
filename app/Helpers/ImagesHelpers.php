<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ImagesHelpers
{
    public static function imageView($img , $dir='storage')
    {
        if(is_null($img)){
            return 'No Image';
        }elseif(Str::startsWith($img , 'http')){
            return $img ;
        }else{
            return !is_null($dir) ? asset($dir."/".$img) : asset($img) ;
        }
    }
}
