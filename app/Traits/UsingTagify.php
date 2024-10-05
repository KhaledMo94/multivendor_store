<?php

namespace App\Traits;

trait UsingTagify
{
    public static function acceptTagifyToArray($value){
        $res = json_decode($value, true);
        $result = [];
        foreach($res as $item){
            $result[] = $item['value'];
        }
        return $result;
    }
}
