<?php
namespace Core;


class Container{
    protected $bindings=[];

    public function bind($key,$callback){
        $this->bindings[$key] = $callback;
    }

    public function resolve($key){
        if(!array_key_exists($key,$this->bindings)){
            throw new \Exception('no matching binding found for key ' . $key);
        }
        if(array_key_exists($key , $this->bindings)){
            return call_user_func($this->bindings[$key]);
        }
    }
}