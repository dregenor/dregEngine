<?php

require_once('abstract/View.php');
/**
 * Created by JetBrains PhpStorm.
 * User: dregenor
 * Date: 03.10.12
 * Time: 22:22
 * To change this template use File | Settings | File Templates.
 */
class Response
{
    private $data = array();
    private $head = array();
    private $view;

    function __construct($template){
        $this->view = new View($template);
    }

    function set($key, $value){
        $this->data[$key] = $value;
    }

    function setAll($array){
        $this->data = $array;
    }

    static private function setStatus($status){
        switch ($status) {
            case 200:
                header('Status: 200 Ok');
                break;
            case 404:
                header('HTTP/1.0 404 Not Found');
                header('Status: 404 Not Found');
                break;
            default:
                header('Status: 200 Ok');
                break;
        }
    }

    function returnJSON($status = 200){

        $this->setStatus($status);
        echo json_encode($this->data);
    }

    function returnOk(){
        $this->setStatus(200);
        echo $this->view->render($this->data);
    }

    function redirect($url){
        header('location:$url');
        die;//на всякий случай
    }

    static function return404(){
        self::setStatus(404);
        echo 'адрес по которому вы перешли не существует';
    }
}
