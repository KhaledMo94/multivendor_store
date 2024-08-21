<?php

namespace App\Traits;

trait TagifyParsing
{
    public static function convertTagifyOutputToArray($json_column_output){
        if(empty($json_column_output) || is_null($json_column_output)){
            return null;
        }
        $output = [];
        $json_column_output = json_decode($json_column_output);      
        foreach($json_column_output as $object){
            $output[] = $object->value;
        }
        return $output;
    }
}
