<?php
 require_once('abstract/Request.php');
 require_once('abstract/Response.php');
/**
 * Created by JetBrains PhpStorm.
 * User: dregenor
 * Date: 03.10.12
 * Time: 21:14
 * To change this template use File | Settings | File Templates.
 */


//TODO: ADD methods routing PUT POST GET DEL

class Router
{
    private $routes = array();
    private $url;
    private $_isAjax;
    private $_method;
    private $_mpref = 'method_';

    function __construct()
    {
        if ( in_array( $_SERVER['REQUEST_METHOD'], array( 'GET', 'PUT', 'POST', 'DELETE' ) ) ){
            $this->_method = $_SERVER['REQUEST_METHOD'];
        }

        $this->_isAjax  = isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && $_SERVER[ 'HTTP_X_REQUESTED_WITH' ] == 'XMLHttpRequest';

        $this->url = $this->getUrl();
    }

    private function sanitizationUrl( $url ){
        $patterns = array(
            '../../', 'drop', '/passwd', 'select', 'update', 'show', 'flush',
        );

        $url = str_ireplace($patterns, '', $url);
        return $url;
    }

    public function getUrl(){
        $urlPath = parse_url(
            substr( self::sanitizationUrl( $_SERVER['REQUEST_URI'] ), 1 ),
            PHP_URL_PATH
        );

        $urlPath = trim( $urlPath, '/' );

        return $urlPath;
    }

    function addRoute($route='/',$controller='index',$action='index'){
        $this->routes[$route]['controller']=$controller;
        $this->routes[$route]['action']=$action;
    }


    function route(){
        $args = array();

        if (array_key_exists($this->url,$this->routes)) {
            $controller = $this->routes[$this->url]['controller'];
            $action = $this->routes[$this->url]['action'];
        } else {
            $args = explode('/',$this->url);
            list($controller,$action) = array_splice($args,0,2);
        }

        $classfile = $_SERVER['DOCUMENT_ROOT'].'/controllers/'.$controller.'.php';
        if (file_exists($classfile)){
            require_once($classfile);
            if (class_exists($controller)){
                $exemplar = new $controller;

                $method= $this->_mpref.$this->_method.$action;

                //гавенный кусок надо поправить логику

                if ( ! method_exists($exemplar,$method)){
                    $method= $this->_mpref.$action;
                }
                if (method_exists($exemplar,$method)){
                    $request = new Request($args,$this->_method);
                    $response = new Response(''.$controller.'/'.$action.'.tpl');

                    $exemplar->$method($request,$response);
                } else {
                    Response::return404();
                }
            } else {
                Response::return404();
            }
        } else {
            Response::return404();
        }
        if (isset($_GET['_debug'])){
            header('_debug',ErrorsCollections::out());
        }
    }

}
