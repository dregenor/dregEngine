<?php

require_once('abstract/Model.php');
/**
 * Created by JetBrains PhpStorm.
 * User: drege_000
 * Date: 07.10.12
 * Time: 21:07
 * To change this template use File | Settings | File Templates.
 */
class VoteModel extends Model
{
    private $_data =array();

    function __construct($arr){
        if (array_key_exists('left',$arr)){
            $this->_data['cnt']['left'] = $arr['left'];
        }
        if (array_key_exists('right',$arr)){
            $this->_data['cnt']['right'] = $arr['right'];
        }
    }

    function getVote($key){
        return $this->_data['cnt'][$key];
    }

    function setVote($key){
        if (in_array($key,array('left','right'))){
            $this->_data['vote'] = $key;
        }
    }

    function getPost(){
        return $this->_data['vote'];
    }
}
