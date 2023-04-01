<?php
namespace Core;
class Validator{
    public static function string($val , $min=1 , $max=INF){
        $value = trim($val);
        return strlen($value) >= $min && strlen($value) <= $max;

    }
    public static function email($val){
        return filter_var($val, FILTER_VALIDATE_EMAIL);
    }
}