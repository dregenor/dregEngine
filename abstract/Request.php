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
    private $_isAjax = false;

    function __construct( $args = array(),$method = null){
        if (is_array($args)){
            $this->array_args = $args;
        }
        $this->array_get = $_GET;
        $this->array_post = $_POST;

        if ($method == 'PUT'){
            parse_str( file_get_contents("php://input"), $this->array_post);
        }

        $this->_isAjax  = isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && $_SERVER[ 'HTTP_X_REQUESTED_WITH' ] == 'XMLHttpRequest';
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

    function isAjax(){
        return $this->_isAjax;
    }
}
