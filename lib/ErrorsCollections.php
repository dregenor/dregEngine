<?php
/**
 * Created by JetBrains PhpStorm.
 * User: drege_000
 * Date: 07.10.12
 * Time: 21:32
 * To change this template use File | Settings | File Templates.
 */
class ErrorsCollections
{
    static private $_errors = array();

    static function add($errtext){
        self::$_errors[] = $errtext;
    }

    static function out(){
        return json_encode(self::$_errors);
    }

}
