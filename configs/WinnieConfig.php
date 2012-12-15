<?php
/**
 * Created by JetBrains PhpStorm.
 * User: drege_000
 * Date: 07.10.12
 * Time: 21:25
 * To change this template use File | Settings | File Templates.
 */
class WinnieConfig
{
    static private $_data = array (
        'dsn' => 'mysql:dbname=winnie_vs_winnie',
        'user' => 'artmy',
        'password' => 'mirror386'
    );

    static function get($key){
        if (array_key_exists($key,self::$_data)){
            return self::$_data[$key];
        } else {
            return null;
        }
    }
}
