<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dregenor
 * Date: 03.10.12
 * Time: 22:14
 * To change this template use File | Settings | File Templates.
 */
class Request
{
    public  $array_get = array();
    private $array_post = array();
    private $array_args = array();

    function __construct( $args = array(), $get = array(), $post = array()){
        if (is_array($args)){
            $this->array_args = $args;
        }

        if (is_array($get)){
            $this->array_get = $get;
        }

        if (is_array($post)){
            $this->array_post = $post;
        }
    }

    function get($key,$def = null){
        if (array_key_exists($key,$this->array_get)){
            return $this->array_get[$key];
        } else {
            return $def;
        }
    }

    function post($key,$def = null){
        if (array_key_exists($key,$this->array_post)){
            return $this->array_post[$key];
        } else {
            return $def;
        }
    }

    function args($key,$def = null){
        if (array_key_exists($key,$this->array_args)){
            return $this->array_args[$key];
        } else {
            return $def;
        }
    }

    function any($key,$def = null){
        if (array_key_exists($key,$this->array_get)){
            return $this->array_get[$key];
        } else if (array_key_exists($key,$this->array_post)){
            return $this->array_post[$key];
        } else {
            return $def;
        }
    }
}
